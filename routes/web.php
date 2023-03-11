<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::middleware('auth')->group(function () {
    Route::post('/logout',  [LoginController::class, 'destroy'])->name('logout');

    Route::get('/', fn() => Inertia::render('Home'));

    Route::get('/users/create', function() {
        return Inertia::render('Users/Create');
    });
    Route::post('/users', function() {
        sleep(2);
        $attributes = Request::validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        User::create($attributes);

        return redirect('/users');
    });

    Route::get('/users', function () {
        return Inertia::render('Users/Index', [
            'users' => User::query()
                ->when(Request::input('search'), function($query, $search) {
                    return $query->where('name', 'like', '%'.$search.'%');
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email
                ]),
            'filters' => Request::only(['search'])
        ]);
    });


    Route::get('settings',fn() => Inertia::render('Settings'));
});

