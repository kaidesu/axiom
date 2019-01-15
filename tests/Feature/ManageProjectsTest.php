<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_cannot_manage_projects()
    {
        $project = factory('App\Project')->create();

        $this->get('/projects')->assertRedirect('/login');
        $this->get('/projects/create')->assertRedirect('/login');
        $this->post('/projects', $project->toArray())->assertRedirect('/login');
        $this->get($project->path())->assertRedirect('/login');
    }

    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $this->get('/projects/create')->assertStatus(200);

        $project = [
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];

        $this->post('/projects', $project);

        $this->assertDatabaseHas('projects', $project);

        $this->get('/projects')->assertSee($project['title']);
    }

    /** @test */
    public function a_user_can_view_their_project()
    {
        $this->signIn();
        
        $this->withoutExceptionHandling();

        $project = factory('App\Project')->create(['owner_id' => auth()->id()]);

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    /** @test */
    public function an_authenticated_user_cannot_view_projects_of_others()
    {
        $this->signIn();

        $project = factory('App\Project')->create();

        $this->get($project->path())->assertStatus(403);
    }

    /** @test */
    public function a_project_requires_a_title()
    {
        $this->signIn();
        
        $project = factory('App\Project')->raw(['title' => '']);

        $this->post('/projects', $project)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {
        $this->signIn();

        $project = factory('App\Project')->raw(['description' => '']);

        $this->post('/projects', $project)->assertSessionHasErrors('description');
    }
}
