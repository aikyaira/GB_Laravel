<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_categories_see_dont_have_categories()
    {
        $view = $this->view('categories.index', [
            'categories' => []
        ]);

        $view->assertSeeText('Нет категорий!');
    }
}
