<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Comment;
use App\User;
use App\Post;
use App\Mail\CommentReceived;
use Illuminate\Support\Facades\Mail;

class MailTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCommentReceivedValid()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create(['author_id' => $user->id]);

        Mail::fake();  //pravi nam lazni mail

        $this->actingAs($user)->post('/posts/' . $post->id . '/comments',
        ['text' => 'thisi is dbhvhdbvhiaqbdijvnbiquben', 'author' => 'some']
        );

        Mail::assertSent(CommentReceived::class, function($mail) use ($post) {
            return $mail->post->id === $post->id;
        });
    }//proverava da li je mail poslat 
}
