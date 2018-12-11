<?php
use TUSIMO\User;
use TUSIMO\Role;
use Illuminate\Support\Facades\Hash;
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
        $role_user = Role::where('name', 'Usuario')->first();
        $role_manager  = Role::where('name', 'Director')->first();
        $role_admin  = Role::where('name', 'Administrador')->first();
        $user = new User();
        $user->name = 'Danis';
        $user->email = 'rfloresalba@gmail.com';
        $user->password = Hash::make('123456');
        $user->save();
        $user->roles()->attach($role_user);
        $manager = new User();
        $manager->name = 'David';
        $manager->email = 'vichazovico@gmail.com';
        $manager->password = Hash::make('123456');
        $manager->save();
        $manager->roles()->attach($role_manager);
        $admin = new User();
        $admin->name = 'Ronald';
        $admin->email = 'rfloresalba@gmail.com';
        $admin->password = Hash::make('123456');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
