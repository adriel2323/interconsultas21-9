<?php

use Illuminate\Database\Seeder;

class EmergencyConsultingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*=======================Biopsias de internados=======================*/
        $table = "emergency_consultings";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, os, doctor, dni, name, created_by) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        for($i=0;$i<1000;$i++) {

            if($i < 999) {
                $query .= "('{$array[$i]->id}','2','{$array[$i]->doctor}','{$array[$i]->dni}','{$array[$i]->name}','{$array[$i]->created_by}'),\n";
            } else {
                $query .= "('{$array[$i]->id}','2','{$array[$i]->doctor}','{$array[$i]->dni}','{$array[$i]->name}','{$array[$i]->created_by}');\n";
            }

        }

        $query .= "INSERT INTO ".$table." (id, os, doctor, dni, name, created_by) VALUES \n";

        for($i=1000;$i<2000;$i++) {
            if($i < 1999) {
                $query .= "('{$array[$i]->id}','2','{$array[$i]->doctor}','{$array[$i]->dni}','{$array[$i]->name}','{$array[$i]->created_by}'),\n";
            } else {
                $query .= "('{$array[$i]->id}','2','{$array[$i]->doctor}','{$array[$i]->dni}','{$array[$i]->name}','{$array[$i]->created_by}');\n";
            }
        }

        $query .= "INSERT INTO ".$table." (id, os, doctor, dni, name, created_by) VALUES \n";

        for($i=2000;$i<3000;$i++) {
            if($i < 2999) {
                $query .= "('{$array[$i]->id}','2','{$array[$i]->doctor}','{$array[$i]->dni}','{$array[$i]->name}','{$array[$i]->created_by}'),\n";
            } else {
                $query .= "('{$array[$i]->id}','2','{$array[$i]->doctor}','{$array[$i]->dni}','{$array[$i]->name}','{$array[$i]->created_by}');\n";
            }
        }

        $query .= "INSERT INTO ".$table." (id, os, doctor, dni, name, created_by) VALUES \n";
        
        for($i=3000;$i<$count;$i++) {

            if($array[$i] != $array[$count-1]) {
                $query .= "('{$array[$i]->id}','2','{$array[$i]->doctor}','{$array[$i]->dni}','{$array[$i]->name}','{$array[$i]->created_by}'),\n";
            } else {
                $query .= "('{$array[$i]->id}','2','{$array[$i]->doctor}','{$array[$i]->dni}','{$array[$i]->name}','{$array[$i]->created_by}');\n";
            }

        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();
        /*======================================================*/
    }
}
