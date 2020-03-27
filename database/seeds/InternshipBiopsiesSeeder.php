<?php

use Illuminate\Database\Seeder;

class InternshipBiopsiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*=======================Biopsias de internados=======================*/
            $table = "internship_biopsies";

            $query = "SET IDENTITY_INSERT ".$table." ON;\n";

            $query .= "INSERT INTO ".$table." (id, patient_document, patient_name, biopsy_type_id, doctor_id, os_id, delivery_date, autorized_order, patologist_id) VALUES \n";

            $array = DB::connection('mysql')->table($table)->get();

            $count = count($array);

            for($i=0;$i<1000;$i++) {
                if($i < 999) {
                    $query .= "('{$array[$i]->id}','{$array[$i]->patient_document}','{$array[$i]->patient_name}','{$array[$i]->biopsy_type_id}','{$array[$i]->doctor_id}','{$array[$i]->os_id}','{$array[$i]->delivery_date}','{$array[$i]->autorized_order}','{$array[$i]->patologist_id}'),\n";
                } else {
                    $query .= "('{$array[$i]->id}','{$array[$i]->patient_document}','{$array[$i]->patient_name}','{$array[$i]->biopsy_type_id}','{$array[$i]->doctor_id}','{$array[$i]->os_id}','{$array[$i]->delivery_date}','{$array[$i]->autorized_order}','{$array[$i]->patologist_id}');\n";
                }
            }

            $query .= "INSERT INTO ".$table." (id, patient_document, patient_name, biopsy_type_id, doctor_id, os_id, delivery_date, autorized_order, patologist_id) VALUES \n";


            for($i=1000;$i<2000;$i++) {
                    if($i < 1999) {
                        $query .= "('{$array[$i]->id}','{$array[$i]->patient_document}','{$array[$i]->patient_name}','{$array[$i]->biopsy_type_id}','{$array[$i]->doctor_id}','{$array[$i]->os_id}','{$array[$i]->delivery_date}','{$array[$i]->autorized_order}','{$array[$i]->patologist_id}'),\n";
                    } else {
                        $query .= "('{$array[$i]->id}','{$array[$i]->patient_document}','{$array[$i]->patient_name}','{$array[$i]->biopsy_type_id}','{$array[$i]->doctor_id}','{$array[$i]->os_id}','{$array[$i]->delivery_date}','{$array[$i]->autorized_order}','{$array[$i]->patologist_id}');\n";
                    }
                }

            $query .= "INSERT INTO ".$table." (id, patient_document, patient_name, biopsy_type_id, doctor_id, os_id, delivery_date, autorized_order, patologist_id) VALUES \n";

        for($i=2000;$i<3000;$i++) {
            if($i < 2999) {
                $query .= "('{$array[$i]->id}','{$array[$i]->patient_document}','{$array[$i]->patient_name}','{$array[$i]->biopsy_type_id}','{$array[$i]->doctor_id}','{$array[$i]->os_id}','{$array[$i]->delivery_date}','{$array[$i]->autorized_order}','{$array[$i]->patologist_id}'),\n";
            } else {
                $query .= "('{$array[$i]->id}','{$array[$i]->patient_document}','{$array[$i]->patient_name}','{$array[$i]->biopsy_type_id}','{$array[$i]->doctor_id}','{$array[$i]->os_id}','{$array[$i]->delivery_date}','{$array[$i]->autorized_order}','{$array[$i]->patologist_id}');\n";
            }
        }

        $query .= "INSERT INTO ".$table." (id, patient_document, patient_name, biopsy_type_id, doctor_id, os_id, delivery_date, autorized_order, patologist_id) VALUES \n";


        for($i=3000;$i<$count;$i++) {

                    if($array[$i] != $array[$count-1]) {
                        $query .= "('{$array[$i]->id}','{$array[$i]->patient_document}','{$array[$i]->patient_name}','{$array[$i]->biopsy_type_id}','{$array[$i]->doctor_id}','{$array[$i]->os_id}','{$array[$i]->delivery_date}','{$array[$i]->autorized_order}','{$array[$i]->patologist_id}'),\n";
                    } else {
                        $query .= "('{$array[$i]->id}','{$array[$i]->patient_document}','{$array[$i]->patient_name}','{$array[$i]->biopsy_type_id}','{$array[$i]->doctor_id}','{$array[$i]->os_id}','{$array[$i]->delivery_date}','{$array[$i]->autorized_order}','{$array[$i]->patologist_id}');\n";
                    }

                }

            $query .= "SET IDENTITY_INSERT ".$table." OFF;";

            Log::info($query);

            DB::insert($query);

            DB::commit();

          /*======================================================*/
    }
}
