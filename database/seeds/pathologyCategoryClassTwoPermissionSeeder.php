<?php

use Illuminate\Database\Seeder;

class pathologyCategoryClassTwoPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassTwo.view", "guard_name" => "web"]);
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassTwo.create", "guard_name" => "web"]);
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassTwo.edit", "guard_name" => "web"]);
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassTwo.delete", "guard_name" => "web"]);
    }
}
