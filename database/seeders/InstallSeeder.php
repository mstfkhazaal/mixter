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

class InstallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /// Roles
        $roleSuperUser = Defender::createRole('superuser');
        $roleAdmin = Defender::createRole('admin');
        $roleCustomer =  Defender::createRole('customer');
        $roleSupplier =  Defender::createRole('supplier');

        // Permissions
        $userIndex = Defender::createPermission('user.index', 'List all the users');
        $userCreate =  Defender::createPermission('user.create', 'Create Users');
        $userUpdate =  Defender::createPermission('user.update', 'Update Users');
        $userDestroy =  Defender::createPermission('user.destroy', 'Delete Users');

        // Create Super User
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' =>  'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $userSuper = User::find(1);
        //// Create Customers
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'customer',
            'email' =>  'customer@gmail.com',
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $userCustomer = User::find(2);
        //// Create Supplier
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'supplier',
            'email' =>  'supplier@gmail.com',
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $userSupplier = User::find(3);

        /// Attach Role
        $userSuper->attachRole($roleSuperUser);
        $userCustomer->attachRole($roleCustomer);
        $userSupplier->attachRole($roleSupplier);

        /// Attach Permission
        //Customers Permission
        $roleCustomer->attachPermission($userIndex);
        $roleCustomer->attachPermission($userCreate);
        $roleCustomer->attachPermission($userUpdate);
        $roleCustomer->attachPermission($userDestroy);
        //Supplier Permission
        $userSupplier->attachPermission($userIndex);
    }
}
