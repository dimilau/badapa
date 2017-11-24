<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('offences', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('approved')->default(0);
            $table->string('company_worked');
            $table->string('offence_type');
            $table->text('description');
            $table->uuid('offender_id');
            $table->integer('user_id')->unsigned();
            $table->timestamps();            
        });

        Schema::table('offences', function (Blueprint $table) {
            $table->foreign('offender_id')
                ->references('id')->on('offenders')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offences');
    }
}
