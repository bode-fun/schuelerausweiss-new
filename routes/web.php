<?php

use App\Http\Controllers\Tokencontroller;
use App\Models\Token;
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

    $token = Tokencontroller::createToken();
    $uuid = $token->uuid;


    $createdAt = $token->created_at;
    // As string
    $expiresAt = $createdAt->addMinutes((int) $_ENV["TOKEN_EXPIRATION_MINUTES"])->format('H:i');

    // dd($user);

    # Ergebnis am Ende:
    # Nicht zu technisch, aber auch nicht zu einfach
    # Rest erzeugt nur Eindruck, was im Kopf bleibt sind 15 Sekunden

    $firstName = $user->cn[0];
    // Get first and last character of first name
    $firstCharName = mb_substr($firstName, 0, 1);
    $lastCharName = mb_substr($firstName, -1);
    $lenName = mb_strlen($firstName);
    $abbreviatedFirstName = $firstCharName  . str_repeat('.', $lenName - 2) . $lastCharName;
    $encryptedFirstName = urlencode(encrypt($abbreviatedFirstName));

    // Get first and last character of sir name
    $sirName = $user->sn[0];
    $birthday = $user->title[0];
    $firstCharSirName = mb_substr($sirName, 0, 1);
    $lastCharSirName = mb_substr($sirName, -1);
    $lenSirName = mb_strlen($sirName);
    $abbreviatedSirName = $firstCharSirName . str_repeat('.', $lenSirName - 2) . $lastCharSirName;
    $encryptedSirName = urlencode(encrypt($abbreviatedSirName));

    return view('card', [
        'firstName' => $firstName,
        'firstNameEncrypted' => $encryptedFirstName,
        'sirName' => $sirName,
        'sirNameEncrypted' => $encryptedSirName,
        'class' => $user->roomnumber[0],
        'imgURL' => $user->carlicense[0],
        'uuid' => urlencode($uuid),
        'expiresAt' => $expiresAt,
        // 'birthday' => $birthday,
    ]);
})->middleware(['auth', 'verified'])->name('card');

Route::get('/verify/{token}/{firstName}/{sirName}', function () {
    try {
        $sirName = decrypt(urldecode(request()->sirName));
        $firstName = decrypt(urldecode(request()->firstName));
        $tokenFromUrl = urldecode(request()->token);

        $resp = Tokencontroller::verifyToken($tokenFromUrl);

        return view('verify', [
            'firstName' => $firstName,
            'sirName' => $sirName,
            'valid' => $resp === true,
            'resp' => $resp,
        ]);
    } catch (\Exception $e) {
        abort(500);
    }
})->name('verify');

require __DIR__ . '/auth.php';
