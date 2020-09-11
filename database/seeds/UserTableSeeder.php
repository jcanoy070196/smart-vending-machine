<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where("name", "admin")->first();
        $role_technician  = Role::where("name", "technician")->first();
        $admin = new User();
        $admin->name = "Administrator";
        $admin->email = "admin@admin.com";
        $admin->password = bcrypt("123456789");
        $admin->save();
        $admin->roles()->attach($role_admin);
        $technician = new User();
        $technician->name = "Technician";
        $technician->email = "tech@tech.com";
        $technician->password = bcrypt("123456789");
        $technician->save();
        $technician->roles()->attach($role_technician);
    }
}
