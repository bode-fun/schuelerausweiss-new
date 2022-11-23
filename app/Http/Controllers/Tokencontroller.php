<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Http\Request;

class Tokencontroller extends Controller
{
    //

    static function createToken()
    {
        $uuid = \Illuminate\Support\Str::uuid();
        $token = Token::create([
            'uuid' => $uuid,
        ]);

        return $token;
    }

    static function verifyToken($uuid, $validFor = null)
    {
        is_null($validFor) ? $validFor = (int) $_ENV['TOKEN_EXPIRATION_MINUTES'] : $validFor = $validFor;


        $token = Token::query()->where('uuid', $uuid)->get()->first();

        if ($token != null) {
            // Check the time of the token
            $createdAt = $token->created_at;
            $expiresAt = $createdAt->addMinutes($validFor);

            $token->delete();

            if (now()->greaterThan($expiresAt)) {
                return 'Token ist abgelaufen. Bitte Token neu anfordern.';
            }
        } else {
            return 'Token bereits verwendet oder nicht vorhanden. Bitte Token neu anfordern.';
        }

        return true;
    }
}
