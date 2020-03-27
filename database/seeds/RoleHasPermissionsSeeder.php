<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*=======================Permisos de cada rol=======================*/

        $table = "role_has_permissions";

        $query = "INSERT INTO ".$table." (permission_id, role_id) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->permission_id}','{$value->role_id}'),\n";
            } else {
                $query .= "('{$value->permission_id}','{$value->role_id}');\n";

            }
        }

        DB::insert($query);

        DB::commit();

        /*======================================================*/
    }
}
