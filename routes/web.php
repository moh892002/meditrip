<?php

use App\Http\Controllers\Dashboard\ArticleController as DashboardArticleController;
use App\Http\Controllers\Dashboard\ContactMessageController as DashboardContactMessageController;
use App\Http\Controllers\Dashboard\DashboardController as DashboardDashboardController;
use App\Http\Controllers\Dashboard\HospitalController as DashboardHospitalController;
use App\Http\Controllers\Dashboard\OfferController as DashboardOfferController;
use App\Http\Controllers\Dashboard\OrderController as DashboardOrderController;
use App\Http\Controllers\Dashboard\RateController as DashboardRateController;
use App\Http\Controllers\Dashboard\SpecialistController as DashboardSpecialistController;
use App\Http\Controllers\Dashboard\SpecializationController as DashboardSpecializationController;
use App\Http\Controllers\Dashboard\UserController as DashboardUserController;
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
    Route::post('login', [AuthController::class, 'login'])->name("login.attempt")->middleware('throttle:6,1');

    Route::get('register', [AuthController::class, 'showRegister'])->name("register");
    Route::post('register', [AuthController::class, 'register'])->name("register.attempt")->middleware('throttle:6,1');

    Route::get('forgetpassword', [AuthController::class, 'showForgetPassword'])->name("forgetpassword");
    Route::post('forgetpassword', [AuthController::class, 'sendResetLink'])->name("forgetpassword.send")->middleware('throttle:6,1');

    Route::get('reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.update')->middleware('throttle:6,1');
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
    Route::get('/', [DashboardDashboardController::class, 'index'])->name("index");

    // Dashboard Hospitals CRUD
    Route::resource('hospitals', DashboardHospitalController::class);

    // Dashboard Specializations CRUD
    Route::resource('specializations', DashboardSpecializationController::class);

    // Dashboard Specialists CRUD
    Route::resource('specialists', DashboardSpecialistController::class);

    // Dashboard Offers CRUD
    Route::resource('offers', DashboardOfferController::class);

    // Dashboard Orders (read-only + status update + delete)
    Route::resource('orders', DashboardOrderController::class)->only(['index', 'show', 'destroy']);
    Route::put('orders/{order}/status', [DashboardOrderController::class, 'updateStatus'])->name('orders.updateStatus');

    // Dashboard Articles CRUD
    Route::resource('articles', DashboardArticleController::class);

    // Dashboard Users (read-only + delete)
    Route::resource('users', DashboardUserController::class)->only(['index', 'show', 'destroy']);

    // Dashboard Contact Messages (read-only + delete + mark as read)
    Route::resource('messages', DashboardContactMessageController::class)->only(['index', 'show', 'destroy']);
    Route::patch('messages/{message}/read', [DashboardContactMessageController::class, 'markRead'])->name('messages.markRead');

    // Dashboard Rates (read-only + delete)
    Route::resource('rates', DashboardRateController::class)->only(['index', 'show', 'destroy']);
});
