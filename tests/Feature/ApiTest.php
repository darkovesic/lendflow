<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');
        $response->assertStatus(404);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_endpoint_will_return_ok()
    {
        $response = $this->get('/api/1/nyt/best-sellers');
        $response->assertStatus(200);
    }

    public function test_endpoint_any_params_will_return_ok()
    {
        $response = $this->get('/api/1/nyt/best-sellers?author=test&isbn[]=1111111111');
        $response->assertStatus(200);
    }

    public function test_endpoint_isbn_not_valid_will_not_process_content()
    {
        $response = $this->get('/api/1/nyt/best-sellers?author=test&isbn[]=11111111');
        $response->assertStatus(302);
    }

    public function test_endpoint_will_make_succesfull_call()
    {
        $response = $this->get('/api/1/nyt/best-sellers?author=test&isbn[]=9780446579933');
        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => "OK",
            ]);
    }
}
