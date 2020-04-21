<?php

use App\Admin;
use App\Blacklist;
use App\CarPost;
use App\Comment;
use App\EstatePost;
use App\Post;
use App\PostMedia;
use App\Profile;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //$this->call(MemberShipSeeder::class);

        //$this->call(MemberShipDurationSeeder::class);


        //factory(User::class, 100)->create();
        //factory(Profile::class, 100)->create();

        //factory(Post::class, 100)->create();
        //factory(CarPost::class, 200)->create();
        //factory(EstatePost::class, 200)->create();
        
        //factory(PostMedia::class, 10)->create();

        //factory(Admin::class, 10)->create();

        //factory(Comment::class, 100)->create();

        //factory(Blacklist::class, 100)->create();
    }
}
