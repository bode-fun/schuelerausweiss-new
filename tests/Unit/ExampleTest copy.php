<?php

namespace Tests\Unit;

use App\Http\Controllers\Tokencontroller;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function token_is_only_valid_for_a_certain_ammount()
    {
        $token = Tokencontroller::createToken();

        sleep(120);

        $resp = Tokencontroller::verifyToken($token->uuid, 1);

        $this->assertTrue()

    }
}
