<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homepage_avaliable()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_one_news_avaliable()
    {
        $id = mt_rand(1, 10);
        $response = $this->get('/news/' . $id);

        $response->assertStatus(200);
    }

    public function test_form_redirection()
    {
        $response = $this->post('/contacts/store');

        $response->assertRedirect('/');
    }

    public function test_admin_news_avaliable()
    {
        $response = $this->get('/admin/news');

        $response->assertSuccessful();
    }

    public function test_admin_categories_view()
    {
        $response = $this->get('/categories');

        $response->assertViewIs('category.index');
    }
}
