<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable1 extends Migration{
    public function up(){
			Schema::create('tarifas', function (Blueprint $table) {
				$table->increments('id');
				$table->string('nombre_tarifa');
				$table->integer('tipo_tarifa');
				$table->decimal('precio',10,2);
				$table->timestamp('created_at');
			});
			Schema::create('clinicas', function (Blueprint $table) {
			  $table->increments('id');
				$table->string('razon_social');
				$table->integer('ruc');
				$table->string('direccion');
				$table->string('telefono');
				$table->string('celular');
				$table->string('correo');
				$table->integer('tarifas_id')->unsigned();
				$table->foreign('tarifas_id')->references('id')->on('tarifas');
			  $table->timestamp('created_at');
			});
			Schema::create('clinicas_users', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('clinicas_id')->unsigned();
				$table->foreign('clinicas_id')->references('id')->on('clinicas');
				$table->integer('users_id')->unsigned();
				$table->foreign('users_id')->references('id')->on('users');
				$table->timestamp('created_at');
			});
			Schema::create('permisos', function (Blueprint $table) {
				$table->increments('id');
				$table->string('tipo_permiso');
				$table->integer('tarifas_id')->unsigned();
				$table->foreign('tarifas_id')->references('id')->on('tarifas');
				$table->string('permiso');
				$table->integer('estado');
				$table->timestamp('created_at');
			});

    }
    public function down(){

    }
}
