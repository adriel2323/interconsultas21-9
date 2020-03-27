<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* //ABM Usuarios
        Permission::create(["name" => "users.view", "guard_name" => "web"]);
        Permission::create(["name" => "users.create", "guard_name" => "web"]);
        Permission::create(["name" => "users.edit", "guard_name" => "web"]);
        Permission::create(["name" => "users.delete", "guard_name" => "web"]);

        //ABM Roles
        Permission::create(["name" => "roles.view", "guard_name" => "web"]);
        Permission::create(["name" => "roles.create", "guard_name" => "web"]);
        Permission::create(["name" => "roles.edit", "guard_name" => "web"]);
        Permission::create(["name" => "roles.delete", "guard_name" => "web"]);

        //ABM Servicios
        Permission::create(["name" => "services.view", "guard_name" => "web"]);
        Permission::create(["name" => "services.create", "guard_name" => "web"]);
        Permission::create(["name" => "services.edit", "guard_name" => "web"]);
        Permission::create(["name" => "services.delete", "guard_name" => "web"]);

        //ABM Obras Sociales
        Permission::create(["name" => "os.view", "guard_name" => "web"]);
        Permission::create(["name" => "os.create", "guard_name" => "web"]);
        Permission::create(["name" => "os.edit", "guard_name" => "web"]);
        Permission::create(["name" => "os.delete", "guard_name" => "web"]);

        //ABM Tipos de Biopsias
        Permission::create(["name" => "biopsyTypes.view", "guard_name" => "web"]);
        Permission::create(["name" => "biopsyTypes.create", "guard_name" => "web"]);
        Permission::create(["name" => "biopsyTypes.edit", "guard_name" => "web"]);
        Permission::create(["name" => "biopsyTypes.delete", "guard_name" => "web"]);

        //ABM Biopias de Internados
        Permission::create(["name" => "internshipBiopsies.view", "guard_name" => "web"]);
        Permission::create(["name" => "internshipBiopsies.create", "guard_name" => "web"]);
        Permission::create(["name" => "internshipBiopsies.edit", "guard_name" => "web"]);
        Permission::create(["name" => "internshipBiopsies.delete", "guard_name" => "web"]);

        //ABM Biopias de Consultorios
        Permission::create(["name" => "consultingRoomBiopsies.view", "guard_name" => "web"]);
        Permission::create(["name" => "consultingRoomBiopsies.create", "guard_name" => "web"]);
        Permission::create(["name" => "consultingRoomBiopsies.edit", "guard_name" => "web"]);
        Permission::create(["name" => "consultingRoomBiopsies.delete", "guard_name" => "web"]);

        //ABM Consultas de Guardia
        Permission::create(["name" => "emergencyConsultings.view", "guard_name" => "web"]);
        Permission::create(["name" => "emergencyConsultings.create", "guard_name" => "web"]);
        Permission::create(["name" => "emergencyConsultings.edit", "guard_name" => "web"]);
        Permission::create(["name" => "emergencyConsultings.delete", "guard_name" => "web"]);

        //ABM Interconsultas
        Permission::create(["name" => "interconsulting.view", "guard_name" => "web"]);
        Permission::create(["name" => "interconsulting.changeStatus", "guard_name" => "web"]);
        Permission::create(["name" => "interconsulting.create", "guard_name" => "web"]);
        Permission::create(["name" => "interconsulting.edit", "guard_name" => "web"]);
        Permission::create(["name" => "interconsulting.delete", "guard_name" => "web"]);

        //ABM Médicos
        Permission::create(["name" => "doctors.view", "guard_name" => "web"]);
        Permission::create(["name" => "doctors.create", "guard_name" => "web"]);
        Permission::create(["name" => "doctors.edit", "guard_name" => "web"]);
        Permission::create(["name" => "doctors.delete", "guard_name" => "web"]);

        //Ver Reportes
        Permission::create(["name" => "reports.view", "guard_name" => "web"]);

        //Recibos de contaduría
        Permission::create(["name" => "accounting.receipts.view", "guard_name" => "web"]);
        Permission::create(["name" => "accounting.receipts.delete", "guard_name" => "web"]);
        Permission::create(["name" => "accounting.receipts.create", "guard_name" => "web"]);
        Permission::create(["name" => "accounting.receipts.edit", "guard_name" => "web"]);

        //ABM Eventos de Cirugia
        Permission::create(["name" => "surgery.view", "guard_name" => "web"]);
        Permission::create(["name" => "surgery.changeStatus", "guard_name" => "web"]);
        Permission::create(["name" => "surgery.create", "guard_name" => "web"]);
        Permission::create(["name" => "surgery.edit", "guard_name" => "web"]);
        Permission::create(["name" => "surgery.delete", "guard_name" => "web"]);

        //ABM Tipos de Cirugia
        Permission::create(["name" => "surgeryType.view", "guard_name" => "web"]);
        Permission::create(["name" => "surgeryType.create", "guard_name" => "web"]);
        Permission::create(["name" => "surgeryType.edit", "guard_name" => "web"]);
        Permission::create(["name" => "surgeryType.delete", "guard_name" => "web"]);

        //ABM Compañías de ART
        Permission::create(["name" => "insuranceCompanies.view", "guard_name" => "web"]);
        Permission::create(["name" => "insuranceCompanies.create", "guard_name" => "web"]);
        Permission::create(["name" => "insuranceCompanies.edit", "guard_name" => "web"]);
        Permission::create(["name" => "insuranceCompanies.delete", "guard_name" => "web"]);

        //ABM Ortopedias
        Permission::create(["name" => "orthopedics.view", "guard_name" => "web"]);
        Permission::create(["name" => "orthopedics.create", "guard_name" => "web"]);
        Permission::create(["name" => "orthopedics.edit", "guard_name" => "web"]);
        Permission::create(["name" => "orthopedics.delete", "guard_name" => "web"]);

        //ABM de Novedades Web
        Permission::create(["name" => "webNews.view", "guard_name" => "web"]);
        Permission::create(["name" => "webNews.create", "guard_name" => "web"]);
        Permission::create(["name" => "webNews.edit", "guard_name" => "web"]);
        Permission::create(["name" => "webNews.delete", "guard_name" => "web"]);*/

        $table = "permissions";

        $query = "SET IDENTITY_INSERT ".$table." ON;\n";

        $query .= "INSERT INTO ".$table." (id, name, guard_name) VALUES \n";

        $array = DB::connection('mysql')->table($table)->get();

        $count = count($array);

        foreach($array as $value) {
            if($value != $array[$count-1]) {
                $query .= "('{$value->id}', '{$value->name}', '{$value->guard_name}'),\n";
            } else {
                $query .= "('{$value->id}', '{$value->name}', '{$value->guard_name}');\n";
            }


        }

        $query .= "SET IDENTITY_INSERT ".$table." OFF;";

        DB::insert($query);

        DB::commit();













    }
}
