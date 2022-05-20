<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */
/* USER ZONE */
// Route::middleware([
//     'canLogin' => Route::has('login'),
//     'canRegister' => Route::has('register'),
//     'laravelVersion' => Application::VERSION,
//     'phpVersion' => PHP_VERSION,
// ])->group(function () {
//     Route::get('/', function () {
//         return Inertia::render('Home');
//     });
// });
Route::get('/', function () {
    return Inertia::render('Public/home/Welcome');
})->name('home');

Route::get('/tratamientos', function () {
    return Inertia::render('Public/treatments/Services');
})->name('treatments');

Route::get('/tratamiento-henna', function () {
    return Inertia::render('Public/treatments/tratamiento-henna');
})->name('treatments.henna');

Route::get('/tratamiento-henna-neutra', function () {
    return Inertia::render('Public/treatments/tratamiento-henna-neutra');
})->name('treatments.henna.neutra');

Route::get('/tratamiento-manzanilla', function () {
    return Inertia::render('Public/treatments/tratamiento-manzanilla');
})->name('treatments.manzanilla');

Route::get('/tratamiento-ghassoul', function () {
    return Inertia::render('Public/treatments/tratamiento-ghassoul');
})->name('treatments.ghassoul');

Route::get('/blog', function () {
    return Inertia::render('Home');
})->name('blog');

Route::get('/nosotros', function () {
    return Inertia::render('Home');
})->name('nosotros');

Route::get('/contacto', function () {
    return Inertia::render('Home');
})->name('contacto');

Route::get('/faqs', function () {
    return Inertia::render('Home');
})->name('faqs');

Route::get('/aviso-legal', function () {
    return Inertia::render('Home');
})->name('aviso-legal');



/* USER ZONE */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        }
        )->name('dashboard');
    });

/* ADMIN ZONE */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isAdmin',
])->group(function () {
    Route::get('/users', function () {
            return Inertia::render('Dashboard');
        }
        )->name('users');

        Route::get('/test', function () {
            return Inertia::render('Test', [
            'is_admin' => 1
            ]);
        }
        )->name('test');    });
