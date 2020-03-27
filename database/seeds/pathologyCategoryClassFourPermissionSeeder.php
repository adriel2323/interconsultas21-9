<?php

use Illuminate\Database\Seeder;

class pathologyCategoryClassFourPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassFour.view", "guard_name" => "web"]);
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassFour.create", "guard_name" => "web"]);
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassFour.edit", "guard_name" => "web"]);
        \Spatie\Permission\Models\Permission::create(["name" => "pathologyCategoryClassFour.delete", "guard_name" => "web"]);
    }
}
