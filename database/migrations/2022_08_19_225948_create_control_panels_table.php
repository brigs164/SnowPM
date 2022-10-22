<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_panels', function (Blueprint $table) {
            $table->id();
            $table->integer('Year1');
            $table->integer('Year2');
            $table->timestamps();
        });

        DB::table('control_panels')->insert(
            array(
                ['Year1' => '2022', 'Year2' => '2023'],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control_panels');
    }
}
