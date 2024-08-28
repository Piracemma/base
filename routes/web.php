<?php

use App\Http\Controllers\AutenticarGoogle;
use App\Http\Controllers\Auth;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\EmailVerify;
use App\Livewire\Auth\Login;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', Home::class)->name('index');

Route::get('/sair', [Auth::class, 'destroy'])->name('logout');

Route::get('/email/vericificar', EmailVerify::class)->middleware('auth')->name('verification.notice');

Route::get('/email/vericificar/{id}/{hash}', function (EmailVerificationRequest $request) {

    $request->fulfill();
 
    return redirect('/');

})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/nova-notificacao', function (Request $request) {

    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');

})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

#GUEST
Route::middleware(['guest'])->group(function(){

    Route::get('login', Login::class)->middleware(['throttle:login'])->name('login');

    Route::get('/cadastrar', Register::class)->name('register');

    Route::get('/autenticargoogle', [AutenticarGoogle::class, 'autenticar'])->name('autenticar-google');

});