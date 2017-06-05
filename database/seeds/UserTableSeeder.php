<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('qwerty'),
            'role_id' => 1,
            'is_active' => 1

        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('qwerty'),
            'role_id' => 2,
            'is_active' => 1
        ]);
    }
}
