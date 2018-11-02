<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Post;
use App\Comment;
use App\Tag;

class DatabaseTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPostsTableValid() //testiramo da li je nakon kreiranja post stvarno kreiran u bazi
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create(['author_id' => $user->id]);
//da li u bazi postoji title sa id od ovog posta
        $this->assertDatabaseHas('posts', [
            'title' => $post->title
        ]);
        
    }

    public function testCommentsTableValid(){
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create(['author_id' => $user->id]);

        $post->comments()
        ->saveMany(factory(
            Comment::class , 10     //kreiramo 10 komentara
        )->make());

        $this->assertEquals(10, $post->comments()->count()); //proveravam da li ima 10 komentara
    }

    public function testTagsTableValid(){  //proveravam da li sam zakacila tagove na post
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create(['author_id' => $user->id]);
      
        $post->tags()
        ->saveMany(factory(
            Tag::class , 10     //kreiramo 10 komentara
        )->make());

        $this->assertEquals(10, $post->tags()->count());

    }
    public function testTagsTabValid(){ //proveravam da li sam kreirala tag
        
        $tag = factory(Tag::class)->create();
        $this->assertDatabaseHas('tags', [
            'name' => $tag->name
        ]);
        
    }

}
