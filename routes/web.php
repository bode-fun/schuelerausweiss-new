<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('card');
});

Route::get('/card', function () {
    $user = Auth::user();
    if ($user == null) {
        abort(401);
    }

    // dd($user);

    # Ergebnis am Ende:
    # Nicht zu technisch, aber auch nicht zu einfach
    # Rest erzeugt nur Eindruck, was im Kopf bleibt sind 15 Sekunden

    return view('card', [
        'firstName' => $user->cn[0],
        'sirName' => $user->sn[0],
        'class' => $user->roomnumber[0],
        'imgURL' => $user->carlicense[0],
    ]);
})->middleware(['auth', 'verified'])->name('card');

Route::get('/verify/{token}', function () {
    // TODO: Verify the token
})->middleware(['auth', 'verified'])->name('verify');

require __DIR__ . '/auth.php';
