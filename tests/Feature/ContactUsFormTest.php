<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactUsFormTest extends TestCase
{    
    use RefreshDatabase;

    /** @test */
    public function request_should_redirect()
    {
        $response = $this->json('POST', '/postcontact', [
        'full_name' => "Steve",
        'email' => "myemail@em.com",
        'phone' => "8285558283",
        'comments' => "This is a Test"
            ]);

        //a pass tells us its working
        $response->assertStatus(302); //redirect()->back()
    }


    /** @test */
    public function request_should_fail_with_no_full_name()
    {
        $response = $this->json('POST', '/postcontact', [
        'email' => "myemail@em.com",
        'phone' => "8285558283",
        'comments' => "This is a Test"
            ]);

        $response->assertStatus(422); //(HTTP) 422 Unprocessable Entity

        $response->assertJsonValidationErrors('full_name');
    }

    /** @test */
    public function request_should_fail_with_no_email()
    {
        $response = $this->json('POST', '/postcontact', [
        'full_name' => "Steve",
        'phone' => "8285558283",
        'comments' => "This is a Test"
            ]);

        $response->assertStatus(422); //(HTTP) 422 Unprocessable Entity

        $response->assertJsonValidationErrors('email');
    }

    /** @test */
    public function request_should_fail_with_no_comments()
    {
        $response = $this->json('POST', '/postcontact', [
        'full_name' => "Steve",
        'email' => "myemail@em.com",
        'phone' => "8285558283"
            ]);

        $response->assertStatus(422); //(HTTP) 422 Unprocessable Entity

        $response->assertJsonValidationErrors('comments');
    }
}