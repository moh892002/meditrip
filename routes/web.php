<?php

use App\Http\Controllers\Dashboard\HospitalController as DashboardHospitalController;
use App\Http\Controllers\Dashboard\SpecializationController as DashboardSpecializationController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\HospitalController as SiteHospitalController;
use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Site\ProfileController;
use App\Http\Controllers\Site\RateController;
use App\Http\Controllers\Site\SpecializationController as SiteSpecializationController;
use Illuminate\Support\Facades\Route;

// Public Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about-us', fn() => view('meditrip.about-us'))->name("about");
Route::get('contact-us', [ContactController::class, 'index'])->name("contact");
Route::post('contact-us', [ContactController::class, 'store'])->name("contact.send");
Route::get("/service-details", fn() => view("meditrip.service-details"))->name("service-details");
Route::get('policies', fn() => view('meditrip.policies'))->name("policies");
Route::get('privacy', fn() => view('meditrip.privacy'))->name("privacy");

// Authentication
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name("login");
    Route::post('login', [AuthController::class, 'login'])->name("login.attempt");

    Route::get('register', [AuthController::class, 'showRegister'])->name("register");
    Route::post('register', [AuthController::class, 'register'])->name("register.attempt");

    Route::get('forgetpassword', [AuthController::class, 'showForgetPassword'])->name("forgetpassword");
    Route::post('forgetpassword', [AuthController::class, 'sendResetLink'])->name("forgetpassword.send");

    Route::get('reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// User Profile
Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name("profile");
    Route::get('user-info', [ProfileController::class, 'edit'])->name("user-info");
    Route::post('user-info', [ProfileController::class, 'update'])->name("user-info.update");
    Route::delete('orders/{order}', [ProfileController::class, 'destroyOrder'])->name("order.destroy");

    // Order / quote questionnaire flow
    Route::get('hospitals/{hospital}/quote', [OrderController::class, 'start'])->name("quote.start");
    Route::get('questions', [OrderController::class, 'question1'])->name("questions");
    Route::post('questions', [OrderController::class, 'storeQuestion1'])->name("questions.store");
    Route::get('q2', [OrderController::class, 'question2'])->name("q2");
    Route::post('q2', [OrderController::class, 'storeQuestion2'])->name("q2.store");
    Route::get('q3', [OrderController::class, 'question3'])->name("q3");
    Route::post('q3', [OrderController::class, 'storeQuestion3'])->name("q3.store");
    Route::get('q4', [OrderController::class, 'question4'])->name("q4");
    Route::post('q4', [OrderController::class, 'storeQuestion4'])->name("q4.store");
    Route::get('q5', [OrderController::class, 'question5'])->name("q5");
    Route::post('q5', [OrderController::class, 'storeQuestion5'])->name("q5.store");

    Route::get('order', [OrderController::class, 'summary'])->name("order");
    Route::post('order', [OrderController::class, 'store'])->name("order.store");
    Route::get('request-details/{order}', [OrderController::class, 'show'])->name("request-details");

    // Rates
    Route::post('hospitals/{hospital}/rate', [RateController::class, 'store'])->name("rate.store");
});

// Blog
Route::get('blog', [BlogController::class, 'index'])->name("blog");
Route::get('blog-details/{article}', [BlogController::class, 'show'])->name("blog-details");

// Hospitals
Route::get('hospitals', [SiteHospitalController::class, 'index'])->name("hospitals");
Route::get('hospitals/{hospital}', [SiteHospitalController::class, 'show'])->name("hospital-details");

// Specializations
Route::get('specializations', [SiteSpecializationController::class, 'index'])->name("specializations");
Route::get('specializations/{specialization}', [SiteSpecializationController::class, 'show'])->name("specializations.details");

// Dashboard Routes (Admin)
Route::middleware(['auth', 'admin'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', function () {
        $stats = [
            'hospitals_count' => \App\Models\Hospital::count(),
            'specializations_count' => \App\Models\Specializtion::count(),
            'specialists_count' => \App\Models\Specialist::count(),
            'offers_count' => \App\Models\Offer::count(),
            'orders_count' => \App\Models\Order::count(),
            'articles_count' => \App\Models\Article::count(),
            'users_count' => \App\Models\User::count(),
            'rates_count' => \App\Models\Rate::count(),
            'total_rating_avg' => \App\Models\Rate::avg('rating') ?? 0,
        ];

        $recentHospitals = \App\Models\Hospital::latest()->take(5)->get();
        $recentSpecializations = \App\Models\Specializtion::withCount('hospitals')->latest()->take(5)->get();
        $recentOrders = \App\Models\Order::with(['hospital', 'specialization'])->latest()->take(5)->get();
        $recentUsers = \App\Models\User::latest()->take(5)->get();
        $topRatedHospitals = \App\Models\Hospital::withAvg('rates', 'rating')
            ->withCount('rates')
            ->get()
            ->filter(fn ($hospital) => $hospital->rates_avg_rating > 0)
            ->sortByDesc('rates_avg_rating')
            ->take(5)
            ->values();

        $hospitalsByCity = \App\Models\Hospital::selectRaw('city, count(*) as total')
            ->groupBy('city')
            ->orderByDesc('total')
            ->take(10)
            ->pluck('total', 'city');

        return view('dashboard.index', compact(
            'stats',
            'recentHospitals',
            'recentSpecializations',
            'recentOrders',
            'recentUsers',
            'topRatedHospitals',
            'hospitalsByCity'
        ));
    })->name("index");

    // Dashboard Hospitals CRUD
    Route::resource('hospitals', DashboardHospitalController::class);

    // Dashboard Specializations CRUD
    Route::resource('specializations', DashboardSpecializationController::class);
});
