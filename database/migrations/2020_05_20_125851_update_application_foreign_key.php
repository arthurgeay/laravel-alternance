<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateApplicationForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function($table) {
            $table->dropForeign(['contact_id']);
            $table->foreign('contact_id')
                ->references('id')->on('contacts')
                ->onDelete('cascade')
                ->change();
        });

        Schema::table('applications', function($table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
