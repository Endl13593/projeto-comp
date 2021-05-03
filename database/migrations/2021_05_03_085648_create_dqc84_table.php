<?php

use App\Models\Dqc84;
use App\Models\DqcModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDqc84Table extends Migration
{
    private $table;
    private $tableDqcModel;

    public function __construct()
    {
        $this->table = (new Dqc84())->getTable();
        $this->tableDqcModel = (new DqcModel())->getTable();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model');
            $table->foreign('model')
                ->references('id')
                ->on($this->tableDqcModel)
                ->onDelete('CASCADE');
            $table->string('fat_part_no', 15)->unique();
            $table->integer('total_location');
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
        Schema::dropIfExists($this->table);
    }
}
