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
        Schema::create('blog_heads', function (Blueprint $table) {
            $table->id('id_blog_head');
            $table->string('titulo',30);
            $table->string('texto_frase',50);
            $table->string('texto_descripcion',100);
            $table->text('public_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_heads');
    }
};
