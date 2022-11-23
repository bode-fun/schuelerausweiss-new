<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RedirectTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function test_unauthorized_can_not_access_card()
    {
        $response = $this->get('/card');

        $response->assertStatus(302);
    }

    public function test_unauthorized_can_access_verify()
    {
        $response = $this->get('/verify/629392a1-6388-4468-9cd9-7bf4d37d824c/eyJpdiI6ImF5blhCM0pvcnViclduOHowVE5obHc9PSIsInZhbHVlIjoiUThkWmtpRysvaCtzU1J5NUlMOE1IQT09IiwibWFjIjoiOGE5ZmUyY2Q2N2Q1ZDUzYTFhZjhlNDZhNDEzYjE3YTE5YmZkN2IwZThjNjIyMWJjNjAxZDU3N2ZlM2VlNmFkZCIsInRhZyI6IiJ9/eyJpdiI6InFCa0JpanJDYWlSV1QzYThpNG95cEE9PSIsInZhbHVlIjoiUERSeGU3Z2Y3cFBzUkp4RVFRTjRrdz09IiwibWFjIjoiYmExNzNkNDIzMGQyNmExMjRmZmY4YzA4ZDNiY2IwZmM3ZmY0ODViMGEwZWI4ODlhNGZmMWRhNzMzMWRkMWMyOSIsInRhZyI6IiJ9');

        $response->assertStatus(200);
    }




}
