<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_copy_id');
            $table->string('status');
            $table->unsignedBigInteger('loan_request_id');
            $table->unsignedBigInteger('return_request_id');
            $table->timestamp('lend_at')->nullable();
            $table->timestamp('loan_expire_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('book_copy_id')->references('id')->on('book_copies');
            $table->foreign('loan_request_id')->references('id')->on('loan_requests');
            $table->foreign('return_request_id')->references('id')->on('return_requests');
            $table->softDeletes();
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
        Schema::dropIfExists('book_user');
    }
}
