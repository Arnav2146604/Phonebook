<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname',50);
            $table->string('lname',50)->nullable();
            // $table->string('phone',50);
            $table->string('email',100)->nullable();
            $table->string('company',50)->nullable();
            $table->string('address',100)->nullable();
            $table->string('link',150)->nullable();
            $table->date('bday')->nullable();
            $table->string('notes',100)->nullable();
       
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
        Schema::dropIfExists('contacts');
    }
}
