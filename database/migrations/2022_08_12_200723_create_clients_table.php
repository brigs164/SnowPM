<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Address');
            $table->string('City');
            $table->string('Phone');
            $table->decimal('Rate', 16, 2);
            $table->decimal('Credit', 16, 2)->nullable();
            $table->integer('Status')->default(1);
            $table->timestamps();
        });

        DB::statement('ALTER TABLE clients CHANGE id id INT(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
