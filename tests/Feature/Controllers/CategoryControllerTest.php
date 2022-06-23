<?php

namespace Tests\Feature\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Notifications\Notification;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $this->withoutExceptionHandling();
        // Create user factory
        $user = User::factory()->create();
        $this->actingAs($user);

        // Response to route categories.index page
        $response = $this->get(route('categories.index'));

        // Assert must get status 200
        $response->assertStatus(200);
    }

    public function test_create()
    {
        $this->withoutExceptionHandling();
        // Create user factory
        $user = User::factory()->create();
        $this->actingAs($user);

        // Response to route categories.create page
        $response = $this->get(route('categories.create'));

        // Assert must get status 200
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $this->withoutExceptionHandling();
        // Create user factory
        $user = User::factory()->create();
        $this->actingAs($user);

        // Response to route categories.store page
        $response = $this->post(route('categories.store'), [
            'name' => 'Sports',
            'user_id' => $user->id
        ]);

        // Assert must get status 302 adn redirect to categories.index
        $response->assertStatus(302);
        $response->assertRedirect(route('categories.index'));

        $this->assertCount(1, Category::all());
    }

    public function test_show()
    {
        $this->withoutExceptionHandling();
        // Create user factory
        $user = User::factory()->create();
        $this->actingAs($user);

        // Make cateogry factory
        $category = Category::factory()->make([
            'name' => 'Sports',
            'user_id' => $user->id
        ]);
        $user->categories()->save($category);

        // Response get to route categories.show and find category->$id
        $response = $this->get(route('categories.show', $category->id));

        // Assert must get status 200
        $response->assertStatus(200);
    }

    public function test_edit()
    {
        $this->withoutExceptionHandling();
        // Create user factory
        $user = User::factory()->create();
        $this->actingAs($user);

        // Make category factory
        $category = Category::factory()->make([
            'name' => 'Sports',
            'user_id' => $user->id
        ]);
        $user->categories()->save($category);

        // Response get to route categories.edit and find category->$id
        $response = $this->get(route('categories.edit', $category->id));

        // Assert must get status 200
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $this->withoutExceptionHandling();
        // Create user factory
        $user = User::factory()->create();
        $this->actingAs($user);

        // Make category factory
        $category = Category::factory()->make([
            'name' => 'Sports',
            'user_id' => $user->id
        ]);
        $user->categories()->save($category);

        // Response put to route categories.update and find category->$id
        $response = $this->put(route('categories.update', $category->id), [
            'name' => 'Politic',
            'user_id' => $user->id
        ]);

        // Assert must get status 302
        $response->assertStatus(302);
        $response->assertRedirect(route('categories.index'));

        $this->assertEquals('Politic', Category::first()->name);
    }

    public function test_detele()
    {
        $this->withoutExceptionHandling();
        // Create user factory
        $user = User::factory()->create();
        $this->actingAs($user);

        // Make category factory
        $category = Category::factory()->make([
            'name' => 'Sports',
            'user_id' => $user->id
        ]);
        $user->categories()->save($category);

        // Response delete to route categories.destroy and find category->$id
        $response = $this->delete(route('categories.destroy', $category->id));

        // Assert must get status 302
        $response->assertStatus(302);
    }
}
