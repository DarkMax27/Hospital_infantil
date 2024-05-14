<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->integer('edad');
            $table->string('sexo')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('ciudad_origen')->nullable();
            $table->date('fecha_inscripcion')->nullable();
            $table->unsignedBigInteger('hospital_id');
            $table->string('nombre_del_tutor')->nullable();
            $table->string('telefono_del_tutor')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('hospital_id')->references('id')->on('hospitales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
