<?php

namespace Tests\Unit;

use App\Http\Controllers\Tokencontroller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TokenTest extends TestCase
{

    use RefreshDatabase;


    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_valid_for_a_certain_amount()
    {
        $token = Tokencontroller::createToken();

        sleep(5);

        $resp = Tokencontroller::verifyToken($token->uuid, 1);

        $this->assertTrue($resp);
    }

    public function test_token_is_one_time_only() {

        $token = Tokencontroller::createToken();

        $resp = Tokencontroller::verifyToken($token->uuid, 1);

        $this->assertTrue($resp == true);

        $respNew = Tokencontroller::verifyToken($token->uuid, 1);

        $this->assertFalse($respNew);
    }

    public function test_token_is_unique() {
        $token = Tokencontroller::createToken();
        $token2 = Tokencontroller::createToken();

        $this->assertNotEquals($token->uuid, $token2->uuid);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function token_is_only_valid_for_a_certain_amount()
    {
        $token = Tokencontroller::createToken();

        sleep(61);

        $resp = Tokencontroller::verifyToken($token->uuid, 1);

        $this->assertFalse($resp);
    }
}
