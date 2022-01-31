<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Post;
use App\Models\User;
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
        // User::factory(10)->create();
        Post::factory(10)->create();
        AdminUser::factory(1)->create([
            "email" => "fbb@gmail.com",
            "password" => bcrypt(111)
        ]);
    }
}
