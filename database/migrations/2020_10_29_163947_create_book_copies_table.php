<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\BookCopy;
class CreateBookCopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_copies', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->unsignedBigInteger('book_id');
            $table->string('edition');
            $table->string('condition')->default(BookCopy::NEW_CONDITION);
            $table->text('description');
            $table->timestamp('published_date');
            $table->boolean('is_available')->default(true);
            $table->unsignedBigInteger('added_by');
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('added_by')->references('id')->on('users');
            $table->softDeletes('deleted_at', 0);
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
        Schema::table('book_copies', function (Blueprint $table) {
            $table->dropForeign(['book_id']);
            $table->dropForeign(['added_by']);
        });
        Schema::dropIfExists('book_copies');
    }
}
