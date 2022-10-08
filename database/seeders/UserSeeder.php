<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use Defender;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' =>  'admin@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $roleAdmin = Defender::createRole('admin');

        // The first parameter is the permission name
        // The second is the "friendly" version of the name. (usually for you to show it in your application).
        $permission =  Defender::createPermission('user.create', 'Create Users');

        // You can assign permission directly to a user.
        $user = User::find(1);
        $user->attachPermission($permission);

        // or you can add the user to a group and that group has the power to rule create users.
        $roleAdmin->attachPermission($permission);

        // Now this user is in the Administrators group.
        $user->attachRole($roleAdmin);
    }
}
