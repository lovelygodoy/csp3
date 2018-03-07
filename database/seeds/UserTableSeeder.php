<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
  public function run()
  {
    $role_regular = Role::where("name", "regular")->first();
    $role_admin  = Role::where("name", "admin")->first();
    $regular = new User();
    $regular->name = "regular";
    $regular->email = "regular@example.com";
    $regular->password = bcrypt("secret");
    $regular->save();
    $regular->roles()->attach($role_regular);


    $admin = new User();
    $admin->name = "admin";
    $admin->email = "admin@example.com";
    $admin->password = bcrypt("secret");
    $admin->save();
    $admin->roles()->attach($role_admin);
  }
}