<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_contacts_see_view()
    {
        $view = $this->view('contacts', ['message' => 'Круто']);

        $view->assertSee('Круто');
    }
    public function test_contacts_headers()
    {
        $response = $this->get(route('contacts'));
        $response->assertViewHas('widget', false);
    }
}
