<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageNotebooksTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_cannot_manage_notebooks()
    {
        $notebook = factory('App\Notebook')->create();

        $this->get('/notebooks')->assertRedirect('/login');
        $this->post('/notebooks', $notebook->toArray())->assertRedirect('/login');
        $this->get($notebook->path())->assertRedirect('/login');
    }

    /** @test */
    public function a_user_can_create_a_notebook()
    {
        $this->signIn();

        $attributes = [
            'title'       => $this->faker->word,
            'description' => $this->faker->sentence,
        ];

        $this->post('/notebooks', $attributes);

        $notebook = Notebook::where($attributes)->first();

        $this->assertDatabaseHas('notebooks', $attributes);

        $this->get($notebook->path())
            ->assertSeeText($attributes['title']);
    }
}
