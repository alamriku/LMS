<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDropForeignOnBookUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_user', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('book_copy_id')->references('id')->on('book_copies');
            $table->foreign('loan_request_id')->references('id')->on('loan_requests');
            $table->foreign('return_request_id')->references('id')->on('return_requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_user', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['book_copy_id']);
            $table->dropForeign(['loan_request_id']);
            $table->dropForeign(['return_request_id']);
        });
    }
}
