<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArrayFormatterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testAPIFilterNoInputFieldTest() {
        $response = $this->json('POST', '/api/filter', ['input123' => [1,3,5,8,15,17]]);

        $response
            ->assertStatus(200)
            ->assertJson([
                "error" => "Post must contain a field named \"input\""
            ]);
    }

    public function testAPIFilterInputFieldNotArrayTest() {
        $response = $this->json('POST', '/api/filter', ['input' => "asdasdsaasd"]);

        $response
            ->assertStatus(200)
            ->assertJson([
                "error" => "Input field must be an array"
            ]);
    }

    public function testAPIFilterInputNotContainValueMoreThanMaxTest() {
        $response = $this->json('POST', '/api/filter', ['input' => [1,3,5,8,15,17, config('api.array_max')+1]]);

        $response
            ->assertStatus(200)
            ->assertJson([
                "error" => "Input array may not contain numbers bigger than 20"
            ]);
    }

    public function testAPIFilterSuccessTest() {
        $response = $this->json('POST', '/api/filter', ['input' => [1,3,5,8,15,17]]);

        $response
            ->assertStatus(200)
            ->assertJson([
                "result" => "2,4,6-7,9-14,16,18-20"
            ]);
    }
}
