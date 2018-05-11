<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupHeadToEmailGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('email_group', function (Blueprint $table) {
            $path=config('app.url').'/'.'uploads/images/_default.jpg';
            $table->string('group_head')->nullable()->default($path);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('email_group', function (Blueprint $table) {
            //
            $table->dropColumn('group_head');
        });
    }
}
