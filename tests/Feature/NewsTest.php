<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNewsAvailable()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }

	public function testNewsShow()
	{
		$response = $this->get(route('news.show', ['id' => mt_rand(1, 10)]));

		$response->assertStatus(200);
	}

	public function testNewsAdminAvailable()
	{
		$response = $this->get(route('admin.news.index'));

		$response->assertStatus(200);
	}

	public function testNewsCreateAdminAvailable()
	{
		$response = $this->get(route('admin.news.create'));

		$response->assertStatus(200);
	}

	public function testNewsAdminCreated()
	{
		$responseData = [
        '*' => [
            "_token" => 'some text',
			'title' => 'Some title',
			'author' => 'Admin',
			'status' => 'DRAFT',
			'description' => 'Some text'
		]];
		$response = $this->post(route('admin.news.store'), $responseData);

		$response->assertJson($responseData);
		$response->assertStatus(200);
	}

    public function testCategoryAdminCreated()
    {

        $responseData = [
             '*' => [
                "_token" => 'some text',
                'title' => 'Some title',
                'description' => 'Some text'
            ]
        ];

        $response = $this->postJson(route('admin.category.store'), $responseData);

        $response->assertJson($responseData);
        $response->assertStatus(200);
    }

    public function testValueRendered()
    {
        $view = $this->view('admin.index', ['name' => 'администратор']);

        $view->assertSee('администратор');
    }

    public function testComponents()
    {
        $view = $this->blade(
            '<x-alert type="danger" :message="$error"></x-alert>',
            ['message' => 'The title field is required.']
        );

        $view->assertSee('The title field is required.');
    }

    public function testNewsJsonPath()
    {
        $response = $this->postJson(route('admin.news.store'),['author' => 'РИА Новости']);
        $response
        ->assertJsonPath('1.author','РИА Новости');
    }

    public function testCategoryJsonStructure()
    {
        $response = $this->get(route('admin.category.store'));
        $response->assertJsonStructure([
            '*' => [
                "_token" => 'some text',
                'title' => 'Some title',
                'description' => 'Some text'
            ]
        ]);
    }

}
