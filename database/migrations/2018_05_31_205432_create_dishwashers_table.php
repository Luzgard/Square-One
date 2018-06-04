<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishwashersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishwashers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->double('price', 8, 2);
            $table->text('image');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dishwashers', function(Blueprint $table) {
            $table->dropForeign('dishwashers_user_id_foreign');
        });
        Schema::dropIfExists('dishwashers');
    }
}
