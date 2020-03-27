<?php

use Illuminate\Database\Seeder;

class ModelHasRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*=======================Rol de cada usuario=======================*/

         $table = "model_has_roles";

         $query = "INSERT INTO ".$table." (role_id, model_type, model_id) VALUES \n";

         $array = DB::connection('mysql')->table($table)->get();

         $count = count($array);

         foreach($array as $value) {
             if($value != $array[$count-1]) {
                 $query .= "('{$value->role_id}','{$value->model_type}','{$value->model_id}'),\n";
             } else {
                 $query .= "('{$value->role_id}','{$value->model_type}','{$value->model_id}');\n";

             }
         }

         DB::insert($query);

         DB::commit();

         /*======================================================*/
    }
}
