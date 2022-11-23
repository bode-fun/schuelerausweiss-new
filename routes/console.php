<?php

use App\Models\Token;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command(
    'tokens:delete',
    function () {
        $this->info('Deleting expired tokens');
        Token::query()->where('created_at', '<', now()->addMinutes((int) $_ENV['TOKEN_EXPIRATION_MINUTES']))->delete();
    }
)->purpose('Delete expired tokens');
