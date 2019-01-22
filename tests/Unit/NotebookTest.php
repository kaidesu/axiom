<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotebookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $notebook = factory('App\Notebook')->create();

        $this->assertEquals("/notebooks/{$notebook->id}", $notebook->path());
    }
}
