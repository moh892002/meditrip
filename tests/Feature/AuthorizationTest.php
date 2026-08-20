<?php

use App\Models\User;
use App\Models\Hospital;
use App\Models\Order;
use App\Models\Specialization;

it('redirects guests to login', function () {
    $response = $this->get('/dashboard');

    $response->assertRedirect('/login');
});

it('allows admin to access dashboard', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    $response = $this->actingAs($admin)->get('/dashboard');

    $response->assertOk();
});

it('returns 403 for non-admin on dashboard', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertForbidden();
});

it('logs in with valid credentials', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    $response = $this->post('/login', [
        'email' => 'test@example.com',
        'password' => 'password',
    ]);

    $response->assertRedirect(route('profile'));
    $this->assertAuthenticatedAs($user);
});

it('rejects invalid login credentials', function () {
    $response = $this->post('/login', [
        'email' => 'wrong@example.com',
        'password' => 'wrongpassword',
    ]);

    $response->assertSessionHasErrors('email');
    $this->assertGuest();
});

it('returns 403 when viewing another users order', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $hospital = Hospital::factory()->create();
    $order = Order::factory()->create([
        'user_id' => $owner->id,
        'hospital_id' => $hospital->id,
    ]);

    $response = $this->actingAs($other)->get("/request-details/{$order->id}");

    $response->assertForbidden();
});

it('allows owner to view their own order', function () {
    $user = User::factory()->create();
    $hospital = Hospital::factory()->create();
    $order = Order::factory()->create([
        'user_id' => $user->id,
        'hospital_id' => $hospital->id,
    ]);

    $response = $this->actingAs($user)->get("/request-details/{$order->id}");

    $response->assertOk();
});

it('prevents admin from deleting their own account', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    $response = $this->actingAs($admin)->delete("/dashboard/users/{$admin->id}");

    $response->assertSessionHasErrors('error');
    $this->assertDatabaseHas('users', ['id' => $admin->id]);
});

it('prevents deleting the last admin via direct controller call', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    $response = $this->actingAs($admin)->delete("/dashboard/users/{$admin->id}");

    $response->assertSessionHasErrors('error');
    $this->assertDatabaseHas('users', ['id' => $admin->id]);
});

it('allows admin to delete a regular user', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $user = User::factory()->create(['is_admin' => false]);

    $response = $this->actingAs($admin)->delete("/dashboard/users/{$user->id}");

    $response->assertRedirect();
    $this->assertDatabaseMissing('users', ['id' => $user->id]);
});

it('prevents unauthenticated user from accessing profile', function () {
    $response = $this->get('/profile');

    $response->assertRedirect('/login');
});

it('allows authenticated user to access profile', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/profile');

    $response->assertOk();
});
