<?php

namespace Tests\Feature;

use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_project_can_have_tasks()
    {
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);

        $this->post($project->path().'/tasks', ['body' => 'Test task']);

        $this->get($project->path())
            ->assertSee('Test task');
    }

    /** @test */
    public function a_task_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);

        $task = $project->addTask('test task');

        $attributes = [
            'body' => 'changed',
            'completed' => true,
        ];

        $this->patch($task->path(), $attributes);

        $this->assertDatabaseHas('tasks', $attributes);
    }

    /** @test */
    public function only_the_owner_of_a_project_may_update_a_task()
    {
        $this->signIn();

        $project = factory(Project::class)->create();

        $task = $project->addTask('test task');

        $attributes = [
            'body' => 'updated task',
        ];

        $this->patch($task->path(), $attributes)
            ->assertStatus(403);
        
        $this->assertDatabaseMissing('tasks', $attributes);
    }

    /** @test */
    public function only_the_owner_of_a_project_may_add_tasks()
    {
        $this->signIn();

        $project = factory(Project::class)->create();

        $this->post($project->path().'/tasks', ['body' => 'Test task'])
            ->assertStatus(403);
        
        $this->assertDatabaseMissing('tasks', ['body' => 'Test task']);
    }

    /** @test */
    public function a_test_requires_a_body()
    {
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id' => auth()->id()]);

        $task = factory('App\Task')->raw(['body' => '']);

        $this->post($project->path().'/tasks', $task)->assertSessionHasErrors('body');
    }
}
