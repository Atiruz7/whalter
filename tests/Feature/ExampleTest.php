<?php

namespace Tests\Feature;

<<<<<<< HEAD
use Illuminate\Foundation\Testing\RefreshDatabase;
=======
// use Illuminate\Foundation\Testing\RefreshDatabase;
>>>>>>> f5e469399bb72d8bbc56798a0209324f59c1ffbc
use Tests\TestCase;

class ExampleTest extends TestCase
{
<<<<<<< HEAD
    use RefreshDatabase;

=======
>>>>>>> f5e469399bb72d8bbc56798a0209324f59c1ffbc
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
