<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Post;

class PostsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexValid()
    {
        $response = $this->get('/posts');
        $response->assertStatus(200);
        
        //$this->assertTrue(true);
    }
    public function testCreateValid() //pravimo novog usera ispitujemo da li ima gresaka
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/posts/create'); //ponasa se kao user sa ovim actingAs
        $response->assertStatus(200);       
    }
    public function testCreateInvalid(){
        $response = $this->get('/posts/create');
        $response->assertStatus(302);
    }
    public function testShowValid(){
        $user = factory(User::class)->create();       
        $post = factory(Post::class)->create(['author_id' => $user->id]);
        $response = $this->actingAs($user)->get('/posts/' . $post->id);
        $response->assertStatus(200); 
       
    }
    public function testShowInvalid(){
        $user = factory(User::class)->create();       
        $post = factory(Post::class)->create(['author_id' => $user->id]);
        $response = $this->actingAs($user)->get('/posts/' . 999999999);
        $response->assertStatus(404); 
       
    }
}
