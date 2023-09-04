<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([
            'name' => 'Faez',
            'email' => 'bacarzoubeirfaez@gmail.com',
            'password' => bcrypt('J@guar2017*'),
        ]);
        $admin->markEmailAsVerified();
        $admin->assignRole('admin');
    }
}
