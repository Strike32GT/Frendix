<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\UsuarioController;


/*Route::get('/', function () {
    return view('welcome');
});*/

Route::redirect("/","login");
Route::resource('categorias', CategoriaController::class);
Route::resource('peliculas', PeliculaController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('series', SerieController::class);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');


Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    $user=User::updateOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name' => $googleUser->getName(),
            'google_id' => $googleUser->getId(),
            'avatar'=>$googleUser->getAvatar(),
            'email_verified_at' => now(),
            'password' => bcrypt(Str::random(16)),
        ]
    );

    Auth::login($user);

    return redirect('/dashboard');
});




