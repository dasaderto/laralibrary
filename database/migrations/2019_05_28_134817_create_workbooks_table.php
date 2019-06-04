<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workbooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author');
            $table->string('publishing');
            $table->integer('need');
            $table->string('subject');
            $table->year('dateadd');
            $table->integer('class');
            $table->year('life');
            $table->integer('amount');
            $table->timestamps();

            /**
             * Таблица для заказа книг, учитывается необходимое количество, год публикации,
             * и сколько лет ее можно использовать
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workbooks');
    }
}
