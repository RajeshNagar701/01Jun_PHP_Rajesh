<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();  // primary
			$table->string('name');
			$table->string('email');
			$table->string('username');
			$table->string('password');
			$table->string('gen');
			$table->string('lag');
			$table->bigInteger('mobile');
			$table->unsignedBigInteger('cid');
			$table->foreign('cid')->references('id')->on('countries');
			$table->enum('status',['Block','Unblock'])->default('Unblock');
            $table->timestamps(); // cteated_at / updated_at
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
};
