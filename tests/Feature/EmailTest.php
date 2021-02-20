<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
     
        $response = $this->json('post', '/api/send', [
            'email_address' =>'test@gmail.com',
            'subject' => 'Example subject',
            'body' =>'Example test body',
            'attachment' =>'attachment.pdf'
        ]);
        $response->assertStatus(200);
    }
}
