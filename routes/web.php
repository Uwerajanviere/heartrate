<?php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/features', function () {
    return view('features');
})->name('features');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Admin routes
    Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('dashboard-admin');
        })->name('admindashboard');
    });

    // User routes
    Route::middleware([\App\Http\Middleware\UserMiddleware::class])->group(function () {
        Route::get('/user/dashboard', function () {
            return view('dashboard-user');
        })->name('userdashboard');
    });

    // Common authenticated user routes
    Route::get('/heart-rate', function () {
        return view('heart-rate');
    })->name('heart-rate');

    Route::get('/tips', function () {
        return view('tips');
    })->name('tips');

    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});

// Already added previously
Route::get('/owner', function () {
    return view('dashboard-owner');
})->name('ownerdashboard');

Route::get('/my-projects', function () {
    return view('owner-projects');
})->name('owner.projects');

Route::get('/submit-project', function () {
    return view('submit-project');
})->name('submit.project');

// New placeholder routes for other links
Route::get('/heart-rate', function () {
    return view('heart-rate');
})->name('heart-rate');

Route::get('/tips', function () {
    return view('tips');
})->name('tips');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');
