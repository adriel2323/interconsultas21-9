<?php

use Illuminate\Database\Seeder;

class pathologyCategoryClassOnePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassOne.view", "guard_name" => "web"]);
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassOne.create", "guard_name" => "web"]);
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassOne.edit", "guard_name" => "web"]);
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassOne.delete", "guard_name" => "web"]);
    }
}
