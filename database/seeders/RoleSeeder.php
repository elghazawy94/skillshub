<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'superadmin',
            'is_admin' => true
        ]);
        Role::create([
            'name' => 'admin' ,
            'is_admin' => true
        ]);
        Role::create([
            'name' => 'student' ,
            'is_admin' => false
        ]);
    }
}
