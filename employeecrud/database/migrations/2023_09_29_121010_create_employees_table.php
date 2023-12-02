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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('email');
            $table->date('date_of_birth')->default(now());
			$table->bigInteger('phone');
			$table->string('password');
			$table->string('gender');
		    $table->string('department');
			$table->string('salary');
			$table->string('lag');
		    $table->string('file');
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
        Schema::dropIfExists('employees');
    }
};
