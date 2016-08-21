<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TODO: Add foreign kays to the relationshipt table.

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->text('comment');
            $table->timestamps();
        });

        Schema::create('comments_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requests_id');
            $table->integer('comments_id');

            // Not necessarly needed because it's a relation table.
            // $table->timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
        Schema::drop('comments_requests');
    }
}
