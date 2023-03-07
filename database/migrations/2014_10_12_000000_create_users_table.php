<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('usu_id');
            $table->string('usu_nombre');
            $table->string('usu_apellido');
            $table->string('usu_identificacion');
            $table->string('usu_celular');
            $table->string('usu_email');
            $table->boolean('usu_estado')->default(true);
            $table->string('usu_password');
            $table->unsignedBigInteger('usu_planta_id')->nullable();
            $table->unsignedBigInteger('usu_proveedor_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        User::create([
            'usu_nombre' => 'Admin',
            'usu_apellido' => 'Admin',
            'usu_identificacion' => '12345678-9',
            'usu_celular' => 123456789,
            'usu_email' => 'admin@aeurus.cl',
            'usu_password' => '12345678'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
