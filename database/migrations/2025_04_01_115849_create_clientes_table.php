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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable(false);
            $table->string('nome', 80)->nullable(false);
            $table->string('endereco', 80)->nullable(false);
            $table->string('telefone', 15)->nullable(false);
            $table->string('cpf', 15)->nullable(false)->unique(true);
            $table->string('email', 50)->nullable(false);
            $table->string('password', 20)->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
