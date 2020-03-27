<?php

use Illuminate\Database\Seeder;

class DbToDbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $query = "SET IDENTITY_INSERT Hospital_extension.dbo.rooms ON;
                INSERT INTO Hospital_extension.dbo.rooms (id, name)
                VALUES (0, 'prueba');
                SET IDENTITY_INSERT Hospital_extension.dbo.rooms OFF;";

        DB::insert($query);

        DB::commit();

        /*=======================Servicios=======================*/

        $table = "services";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, name) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->id}', '{$value->name}'),\n";
            } else {
                $query .= "('{$value->id}', '{$value->name}');\n";
            }


        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();
        /*======================================================*/

        /*=======================Usuarios=======================*/
        $table = "users";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO users (id, name, email, password, telegram_id) VALUES \n";

        $users = DB::connection('mysql')->table($table)->get();

        $count = count($users);

        foreach($users as $user) {
            if($user->id == 1) {

            } else {
                if($user != $users[$count-1]) {
                    $query .= "('{$user->id}', '{$user->name}', '{$user->email}', '{$user->password}', '{$user->telegram_id}'),\n";
                } else {
                    $query .= "('{$user->id}', '{$user->name}', '{$user->email}', '{$user->password}', '{$user->telegram_id}');\n";
                }
            }

        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();

        /*======================================================*/

        /*=======================Médicos=======================*/
        $table = "doctors";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, cuit, service_id, phone, address, malpractice_ensurance, name, email) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->id}','{$value->cuit}','{$value->service_id}','{$value->phone}','{$value->address}','{$value->malpractice_ensurance}','{$value->name}','{$value->email}'),\n";
            } else {
                $query .= "('{$value->id}','{$value->cuit}','{$value->service_id}','{$value->phone}','{$value->address}','{$value->malpractice_ensurance}','{$value->name}','{$value->email}');\n";
            }
        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();
        /*======================================================*/

        /*=======================Tipos de biopsias=======================*/

        $table = "biopsies_types";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, name) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->id}','{$value->name}'),\n";
            } else {
                $query .= "('{$value->id}','{$value->name}');\n";            }


        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();

        /*======================================================*/

        /*=======================Biopsias de internados=======================*/
        $table = "os";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, name) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->id}','{$value->name}'),\n";
            } else {
                $query .= "('{$value->id}','{$value->name}');\n";            }


        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();
        /*=======================Biopsias de internados=======================*/

        /*=======================Biopsias de ambulatorios=======================*/

        $table = "consulting_room_biopsies";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, patient_document, patient_name, biopsy_type, doctor, os, delivery_date, autorized_order, patologist) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {

            if($value != $array[$count-1]) {
                $query .= "('{$value->id}','{$value->patient_document}','{$value->patient_name}','{$value->biopsy_type}','{$value->doctor}','{$value->os}','{$value->delivery_date}','{$value->autorized_order}','{$value->patologist}'),\n";
            } else {
                $query .= "('{$value->id}','{$value->patient_document}','{$value->patient_name}','{$value->biopsy_type}','{$value->doctor}','{$value->os}','{$value->delivery_date}','{$value->autorized_order}','{$value->patologist}');\n";
            }

        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();

        /*======================================================*/

        /*=======================Habitaciones=======================*/

        $table = "rooms";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, name) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->id}','{$value->name}'),\n";
            } else {
                $query .= "('{$value->id}','{$value->name}');\n";
            }


        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();

        /*======================================================*/

        /*=======================Interconsultas=======================*/

        $table = "interconsulting";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, requester_id, requested_service_id, requested_doctor_id, status_id, room_id, observations, patient_name) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->id}','{$value->requester_id}','{$value->requested_service_id}','{$value->requested_doctor_id}','{$value->status_id}','{$value->room_id}','{$value->observations}','{$value->patient_name}'),\n";
            } else {
                $query .= "('{$value->id}','{$value->requester_id}','{$value->requested_service_id}','{$value->requested_doctor_id}','{$value->status_id}','{$value->room_id}','{$value->observations}','{$value->patient_name}');\n";
            }


        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();

        /*======================================================*/

        /*=======================Recibos de contaduría=======================*/

        $table = "receipts";

        $query = "INSERT INTO ".$table." (number, amount, company, comments, receipt_date) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->number}','{$value->amount}','{$value->company}','{$value->comments}','{$value->receipt_date}'),\n";
            } else {
                $query .= "('{$value->number}','{$value->amount}','{$value->company}','{$value->comments}','{$value->receipt_date}');\n";
            }
        }

        DB::insert($query);

        DB::commit();

        /*======================================================*/

        /*=======================Eventos de Cirugía=======================*/

        $table = "surgery_events";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, title, start_date, end_date, resource_id, status_id) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);
        $anterior = 0;
        foreach($array as $value) {

            $start_date = \Carbon\Carbon::parse($value->start_date)->format('Y-m-d');
            $end_date = \Carbon\Carbon::parse($value->end_date)->format('Y-m-d');
            $start_date .= "T";
            $end_date .= "T";
            $start_date .= \Carbon\Carbon::parse($value->start_date)->format('H:i:s');
            $end_date .= \Carbon\Carbon::parse($value->end_date)->format('H:i:s');

            if($value != $array[$count-1]) {
                $query .= "('{$value->id}','{$value->title}','{$start_date}','{$end_date}','{$value->resource_id}','{$value->status_id}'),\n";
            } else {
                $query .= "('{$value->id}','{$value->title}','{$start_date}','{$end_date}','{$value->resource_id}','{$value->status_id}');\n";
            }
        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();

        /*======================================================*/

        /*=======================Tipos de cirugía=======================*/

        $table = "surgery_types";

        $query = "INSERT INTO ".$table." (description) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->description}'),\n";
            } else {
                $query .= "('{$value->description}');\n";
            }
        }

        DB::insert($query);

        DB::commit();

        /*======================================================*/

        /*=======================Datos de cirugía=======================*/

        $table = "surgery_event_data";

        $query = "INSERT INTO ".$table." (surgery_event_id, room_id, os, patient_document, patient_name, surgery_type_id, biopsy, comments, surgeon_id, transitory_check_in, local_anesthesia, sedation, x_ray_specialist_needed, origin_room_id) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);



        foreach($array as $value) {

            $origin_room_id = '0';
            $room_id = '0';

            if(!is_null($value->origin_room_id))
                $origin_room_id = $value->origin_room_id;

            if(!is_null($value->room_id))
                $room_id = $value->room_id;

            if($value != $array[$count-1]) {
                if($origin_room_id == 'NULL' && $room_id != 'NULL')
                    $query .= "('{$value->surgery_event_id}','{$room_id}','{$value->os}','{$value->patient_document}','{$value->patient_name}','{$value->surgery_type_id}','{$value->biopsy}','{$value->comments}','{$value->surgeon_id}','{$value->transitory_check_in}','{$value->local_anesthesia}','{$value->sedation}','{$value->x_ray_specialist_needed}',{$origin_room_id}),\n";
                else if($room_id == 'NULL' && $origin_room_id != 'NULL')
                    $query .= "('{$value->surgery_event_id}',{$room_id},'{$value->os}','{$value->patient_document}','{$value->patient_name}','{$value->surgery_type_id}','{$value->biopsy}','{$value->comments}','{$value->surgeon_id}','{$value->transitory_check_in}','{$value->local_anesthesia}','{$value->sedation}','{$value->x_ray_specialist_needed}','{$origin_room_id}'),\n";
                else if($room_id == 'NULL' && $origin_room_id == 'NULL')
                    $query .= "('{$value->surgery_event_id}',{$room_id},'{$value->os}','{$value->patient_document}','{$value->patient_name}','{$value->surgery_type_id}','{$value->biopsy}','{$value->comments}','{$value->surgeon_id}','{$value->transitory_check_in}','{$value->local_anesthesia}','{$value->sedation}','{$value->x_ray_specialist_needed}',{$origin_room_id}),\n";
                else
                    $query .= "('{$value->surgery_event_id}','{$room_id}','{$value->os}','{$value->patient_document}','{$value->patient_name}','{$value->surgery_type_id}','{$value->biopsy}','{$value->comments}','{$value->surgeon_id}','{$value->transitory_check_in}','{$value->local_anesthesia}','{$value->sedation}','{$value->x_ray_specialist_needed}','{$origin_room_id}'),\n";
            } else {

                $query .= "('{$value->surgery_event_id}','{$room_id}','{$value->os}','{$value->patient_document}','{$value->patient_name}','{$value->surgery_type_id}','{$value->biopsy}','{$value->comments}','{$value->surgeon_id}','{$value->transitory_check_in}','{$value->local_anesthesia}','{$value->sedation}','{$value->x_ray_specialist_needed}','{$origin_room_id}');\n";

            }
        }

        Log::info($query);

        DB::insert($query);

        DB::commit();

        /*======================================================*/

        /*=======================Médicos participantes de la cirugía=======================*/

        $table = "surgery_doctor_participation";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, surgery_event_id, doctor_id) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->id}','{$value->surgery_event_id}','{$value->doctor_id}'),\n";
            } else {
                $query .= "('{$value->id}','{$value->surgery_event_id}','{$value->doctor_id}');\n";
            }
        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();

        /*======================================================*/

        /*=======================Anestesistas participantes de la cirugía=======================*/

        $table = "surgery_event_anesthesist_participation";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, surgery_event_id, doctor_id) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->id}','{$value->surgery_event_id}','{$value->doctor_id}'),\n";
            } else {
                $query .= "('{$value->id}','{$value->surgery_event_id}','{$value->doctor_id}');\n";
            }
        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();

        /*======================================================*/

        /*=======================Enfermeras participantes de la cirugía=======================*/

        $table = "nurses_surgery_participation";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, surgery_event_id, doctor_id) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->id}','{$value->surgery_event_id}','{$value->doctor_id}'),\n";
            } else {
                $query .= "('{$value->id}','{$value->surgery_event_id}','{$value->doctor_id}');\n";
            }
        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();

        /*======================================================*/

        /*=======================Instrumentistas participantes de la cirugía=======================*/

        $table = "instrumentists_surgery_participation";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, surgery_event_id, doctor_id) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->id}','{$value->surgery_event_id}','{$value->doctor_id}'),\n";
            } else {
                $query .= "('{$value->id}','{$value->surgery_event_id}','{$value->doctor_id}');\n";
            }
        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();

        /*======================================================*/

        /*=======================Especialistas de RX participantes de la cirugía=======================*/

        $table = "rx_specialists_surgery_participation";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, surgery_event_id, doctor_id) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->id}','{$value->surgery_event_id}','{$value->doctor_id}'),\n";
            } else {
                $query .= "('{$value->id}','{$value->surgery_event_id}','{$value->doctor_id}');\n";
            }
        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();

        /*======================================================*/

        /*=======================Curriculums de página web=======================*/

        $table = "web_curriculums";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, name, dni, email, phone, cv_url) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->id}','{$value->name}','{$value->dni}','{$value->email}','{$value->phone}','{$value->cv_url}'),\n";
            } else {
                $query .= "('{$value->id}','{$value->name}','{$value->dni}','{$value->email}','{$value->phone}','{$value->cv_url}');\n";
            }
        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();

        /*======================================================*/

        /*=======================Noticias web=======================*/

        $table = "web_news";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, image_url, title, short_description, extended_description) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->id}','{$value->image_url}','{$value->title}','{$value->short_description}','{$value->extended_description}'),\n";
            } else {
                $query .= "('{$value->id}','{$value->image_url}','{$value->title}','{$value->short_description}','{$value->extended_description}');\n";

            }
        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();

        /*======================================================*/



    }
}
