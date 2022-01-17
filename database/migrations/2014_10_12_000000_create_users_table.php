<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cpf',14)->unique();
            $table->string('cnpj',25)->nullable();
            $table->string('tituloeleitor',200)->nullable();
            $table->string('telefone',400)->nullable();
            $table->string('cep',300)->nullable();;
            $table->string('logradouro',500)->nullable();
            $table->string('complemento',500)->nullable();
            $table->string('bairro',500)->nullable();
            $table->string('localidade',500)->nullable();
            $table->string('uf',2)->nullable();
            $table->string('tipo',200);
            $table->string('regiao',200)->nullable();
            $table->string('cnes',200)->nullable();
            $table->string('modalidade',200)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
