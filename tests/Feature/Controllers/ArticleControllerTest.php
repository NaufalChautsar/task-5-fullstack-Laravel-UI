<?php

namespace Tests\Feature\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
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

        // Response to route articles.index page
        $response = $this->get(route('articles.index'));

        // Assert must get status 200
        $response->assertStatus(200);
    }

    public function test_create()
    {
        $this->withoutExceptionHandling();

        // Create user factory
        $user = User::factory()->create();
        $this->actingAs($user);

        // Response to route articles.create page
        $response = $this->get(route('articles.create'));

        // Assert must get status 200
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $this->withoutExceptionHandling();

        // Create user factory
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create category factory
        $category = Category::factory()->create();

        // Response post to route articles.store 
        $response = $this->post(route('articles.store'), [
            'title' => $this->faker->title(),
            'content' => $this->faker->text(),
            'image' => $this->faker->imageUrl(200, 200),
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);

        // Assert must get status 302
        $response->assertStatus(302);

        $response->assertRedirect(route('articles.index'));
        $this->assertCount(1, Category::all());
    }

    public function test_show()
    {
        $this->withoutExceptionHandling();

        // Create user factory
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create category factory
        $category = Category::factory()->create();

        // Make article factory
        $article = Article::factory()->make([
            'title' => $this->faker->title(),
            'content' => $this->faker->text(),
            'image' => $this->faker->imageUrl(200, 200),
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);
        $user->articles()->save($article);

        // Response get to route articles.show and find article->$id
        $response = $this->get(route('articles.show', $article->id));

        // Assert must get status 200
        $response->assertStatus(200);
    }

    public function test_edit()
    {
        $this->withoutExceptionHandling();

        // Create user factory
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create category factory
        $category = Category::factory()->create();

        // Make article factory
        $article = Article::factory()->make([
            'title' => $this->faker->title(),
            'content' => $this->faker->text(),
            'image' => $this->faker->imageUrl(200, 200),
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);
        $user->articles()->save($article);

        // Response get to route articles.edit and find article->$id
        $response = $this->get(route('articles.edit', $article->id));

        // Assert must get status 200
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $this->withoutExceptionHandling();

        // Create user factory
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create category factory
        $category = Category::factory()->create();

        // Make article factory
        $article = Article::factory()->make([
            'title' => $this->faker->title(),
            'content' => $this->faker->text(),
            'image' => $this->faker->imageUrl(200, 200),
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);
        $user->articles()->save($article);

        // Response put to route articles.update and find article->$id
        $response = $this->put(route('articles.update', $article->id), [
            'title' => 'New Title',
            'content' => 'New Content',
            'image' => 'New Image',
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);

        // Assert must get status 302
        $response->assertStatus(302);
        $response->assertRedirect(route('articles.index'));

        // Equals 
        $this->assertEquals('New Title', Article::first()->title);
        $this->assertEquals('New Content', Article::first()->content);
        $this->assertEquals('New Image', Article::first()->image);
    }

    public function test_detele()
    {
        $this->withoutExceptionHandling();

        // Create user factory
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create category factory
        $category = Category::factory()->create();

        // Make article factory
        $article = Article::factory()->make([
            'title' => $this->faker->title(),
            'content' => $this->faker->text(),
            'image' => $this->faker->imageUrl(200, 200),
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);
        $user->articles()->save($article);

        // Response delete to route articles.destroy and find article->$id
        $response = $this->delete(route('articles.destroy', $article->id));

        // Assert must get status 302
        $response->assertStatus(302);
    }
}
