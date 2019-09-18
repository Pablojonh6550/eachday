<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatasComsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datas_coms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dia')->nullable();
            $table->integer('mes')->nullable();
            $table->text('data_comemorativa');
            $table->char('prioridade',1);
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
        Schema::dropIfExists('datas_coms');
    }
}
