<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            'Blogging',
            'Freelancing',
            'How to Succeed'
        ];

        //App\Tag::truncate();  //brise sve tagove

        foreach($values as $value){
            App\Tag::create([
                'name'=>$value
            ]);
        }                          //kreiramo za svaki clan gore od niza po tag

        App\Post::all()->each(function(App\Post $post){
            $randIds = \App\Tag::inRandomOrder()->select('id')->take(2)->pluck('id');
            $post->tags()->attach($randIds);
            //za svaki post atacuje po 2 random izabrana taga
        });
    }
}
