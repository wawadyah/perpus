<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as faker;


class UserSeeder extends Seeder
{

    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        $faker = faker::create();
        User::insert(
            [
                'username' => 'admin',
                'slug' => 'admin',
                'address' => 'tamanan',
                'phone' => $faker->phoneNumber(),
                'password' => '$2y$10$ZAvo9SX2nK1tKJ/2w78zxuDsFuSsqn46cRQ1QdFa.DYWdyBCNculG',
                'role_id' => 1,
            ]
            );

        User::factory()->count(29)->create();
    }
}
