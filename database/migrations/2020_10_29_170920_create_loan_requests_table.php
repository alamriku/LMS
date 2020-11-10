<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\LoanRequest;
class CreateLoanRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('status')->default(LoanRequest::Pending);
            $table->unsignedBigInteger('status_changed_by');
            $table->string('reason');
            $table->timestamp('status_change_date');
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status_changed_by')->references('id')->on('users');
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
        Schema::table('loan_requests', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['status_changed_by']);
        });
        Schema::dropIfExists('loan_requests');
    }
}
