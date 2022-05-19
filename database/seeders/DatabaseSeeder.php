<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // Category::truncate();
        // Post::truncate();
        $user = User::factory()->create([
            'name'=> 'John Doe'
        ]);

        Post::factory(5)->create([
            'user_id'=> $user->id
        ]);

        /*$user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);
        
        $hobbies = Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $personal->id,
            'slug'=> 'my-first-post', 
            'title'=> 'My first post', 
            'excerpt'=> 'Duis aliquip dolore id cillum labore aliquip amet aute elit.', 
            'body'=> '<p>Ullamco eu qui minim laboris. Officia culpa exercitation commodo nisi ad sint mollit ipsum. Nisi duis eiusmod fugiat est eu magna. Adipisicing commodo adipisicing Lorem adipisicing nostrud exercitation id. Aliquip aute quis velit occaecat esse dolor laborum irure ad incididunt commodo commodo. Nisi officia nulla esse elit Lorem aliqua laborum aliquip sunt eu magna minim. Sit enim reprehenderit ipsum ea sit ea consequat deserunt culpa.</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $work->id,
            'slug'=> 'my-second-post', 
            'title'=> 'My second post', 
            'excerpt'=> 'Reprehenderit quis cupidatat mollit voluptate consectetur sit fugiat anim.', 
            'body'=> '<p>Id aliqua adipisicing excepteur pariatur irure aute cupidatat sunt exercitation eiusmod cupidatat ex cupidatat ut. Quis ullamco Lorem excepteur laborum mollit. Labore qui pariatur sit labore velit ipsum ipsum. Sint incididunt adipisicing culpa et velit elit anim anim occaecat deserunt. Aliquip laborum deserunt aliqua Lorem aliqua veniam consequat id magna.</p>'
        ]);*/


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
