<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'ciudad';

    /**
     * Run the migrations.
     * @table ciudad
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('idciudad');
            $table->string('nombre', 45)->nullable();
            $table->string('latitud', 45)->nullable();
            $table->string('longitud', 45)->nullable();
            $table->integer('idpais')->nullable()->unsigned();
            
            $table->index(["idpais"], 'idpais_idx');
      
          
            $table->foreign('idpais', 'idpais_idx')
                ->references('idpais')->on('pais')
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
