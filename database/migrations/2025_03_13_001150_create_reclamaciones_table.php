<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reclamaciones', function (Blueprint $table) {
            $table->id('id_reclamacion');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->enum('documento', ['DNI', 'RUC', 'CE', 'PTP', 'OTROS...'])->comment('Tipo de documento de identidad');
            $table->string('numeroDocumento', 15);
            $table->string('email', 191);
            $table->string('celular', 15);
            $table->string('direccion', 250);
            $table->string('distrito', 250);
            $table->string('ciudad', 250);
            $table->enum('tipoReclamo', ['QUEJA', 'RECLAMO'])->default('RECLAMO');
            $table->string('servicioContratado', 200);
            $table->text('reclamoPerson');
            $table->boolean('checkReclamoForm')->default(false);
            $table->boolean('aceptaPoliticaPrivacidad')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamaciones');
    }
};
