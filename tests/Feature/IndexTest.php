<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_view_dont_see_text()
    {
        $view = $this->view('index');

        $view->assertSeeText('Привет, друг!');
    }
    public function test_index_header_is_missing()
    {
        $response = $this->get('index');

        $response->assertHeaderMissing("blabla");
    }
    public function test_index_is_okay()
    {
        $response = $this->get('index/why');

        $response->assertNotFound();
    }
    
}
