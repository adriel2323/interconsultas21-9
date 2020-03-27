<?php

use Illuminate\Database\Seeder;

class pathologyCategoryClassThreePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassThree.view", "guard_name" => "web"]);
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassThree.create", "guard_name" => "web"]);
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassThree.edit", "guard_name" => "web"]);
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassThree.delete", "guard_name" => "web"]);
    }
}
