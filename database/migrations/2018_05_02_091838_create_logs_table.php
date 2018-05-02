<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('logs', function (Blueprint $table) {
            $title=date('Y_m_d',time());
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('title',20)->default($title);
            $table->text('content');
            $table->integer('group_id')->unsigned()->index();
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
        Schema::dropIfExists('logs');
    }
}