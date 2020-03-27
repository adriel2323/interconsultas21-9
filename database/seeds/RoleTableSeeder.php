<?php

use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Creo los roles principales*/
        /*Role::create(['name' => 'ENFERMERA CIRUGÍA']);
        Role::create(['name' => 'MÉDICO']);
        Role::create(['name' => 'FACTURACIÓN']);
        $role = Role::create(['name' => 'ADMINISTRADOR']);

        /*Al rol de administrador le concedo todos los permisos*/
        /*$role->syncPermissions(\Spatie\Permission\Models\Permission::all());
        $user = \App\User::find(1);
        $user->syncRoles("ADMINISTRADOR");

        Role::create(['name' => 'Guardia']);
        Role::create(['name' => 'ADMINISTRACIÓN PAMI']);
        Role::create(['name' => 'ENFERMERIA']);
        Role::create(['name' => 'ADMINISTRATIVOS']);
        Role::create(['name' => 'INTERNACIÓN']);
        Role::create(['name' => 'CDI']);
        Role::create(['name' => 'CONTADURÍA']);
        Role::create(['name' => 'RECEPCIÓN']);
        Role::create(['name' => 'ENCARGADA CIRUGÍA']);
        Role::create(['name' => 'TÉCNICO DE RAYOS']);*/

        $table = "roles";

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

        $user = \App\User::find(1);

        $user->syncRoles("ADMINISTRADOR");
    }
}
