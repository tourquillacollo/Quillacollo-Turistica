<?php

use TUSIMO\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'Usuario';
        $role_employee->description = 'Un User';
        $role_employee->save();
        $role_manager = new Role();
        $role_manager->name = 'Director';
        $role_manager->description = 'A director User';
        $role_manager->save();
        $role_admin = new Role();
        $role_admin->name = 'Administrador';
        $role_admin->description = 'Un administrador del sistema';
        $role_admin->save();
    }
}
