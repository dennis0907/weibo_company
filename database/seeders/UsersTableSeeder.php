<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(100)->create();

        $user = User::find(1);
        $user->name = 'Dennis';
        $user->password = bcrypt('dennis123');
        $user->email = 'dennis@example.com';
        $user->is_admin = true;
        $user->save();
    }
}
