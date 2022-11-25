<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClimaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'clima';

    /**
     * Run the migrations.
     * @table clima
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idclima');
            $table->string('humedad', 45)->nullable();
            $table->string('temperatura', 45)->nullable();
            $table->bigInteger('ciudad_id')->nullable()->unsigned();
            $table->date('fechaconsulta')->nullable();

            $table->index(["ciudad_id"], 'ciudad_id_idx');


            $table->foreign('ciudad_id', 'ciudad_id_idx')
                ->references('idciudad')->on('ciudad')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
