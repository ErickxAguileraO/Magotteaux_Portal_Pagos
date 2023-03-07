<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InsertRecordToPermissionsAndRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create all permissions
        $permissions = [
            ['name' => 'usuarios', 'module' => 'Usuarios'],
            ['name' => 'log-de-cargas', 'module' => 'Log de cargas'],
            ['name' => 'pagos', 'module' => 'Pagos'],
            ['name' => 'proveedores', 'module' => 'Proveedores'],
        ];

        // $methods = ['index', 'create', 'edit', 'delete'];

        $name_permissions = [];

        foreach ($permissions as $permission) {

            //en caso de que se requiera crear permisos por cada ruta
            //descomentar este codigo
            /* foreach ($methods as $method) {

                $name_permissions[] = $permission['name'] . '.' . $method;

                Permission::firstOrCreate([
                    'name' => $permission['name'] . '.' . $method,
                    'module' => $permission['module']
                ]);
            } */

            $name_permissions[] = $permission['name'];

            Permission::firstOrCreate([
                'name' => $permission['name'],
                'module' => $permission['module']
            ]);
        }

        //Create rol finanza
        Role::firstOrCreate(['name' => 'Finanza']);

        //Create rol tesorero
        Role::firstOrCreate(['name' => 'Tesorero']);

        //Create rol proveedor
        Role::firstOrCreate(['name' => 'Proveedor']);

        //Create rol gerente
        Role::firstOrCreate(['name' => 'Gerente']);

        //Create rol admin
        Role::firstOrCreate(['name' => 'Administrador']);

        //Asignacion de rol administrador
        User::find(1)->assignRole('Administrador')->givePermissionTo($name_permissions);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $usuario = User::find(1);

        $permissions = $usuario->getPermissionNames();

        $usuario->removeRole('Administrador')->revokePermissionTo($permissions);
    }
}
