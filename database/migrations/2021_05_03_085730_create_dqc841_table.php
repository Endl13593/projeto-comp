<?php

use App\Models\Dqc84;
use App\Models\Dqc841;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDqc841Table extends Migration
{
    private $table;
    private $tableDqc84;

    public function __construct()
    {
        $this->table = (new Dqc841())->getTable();
        $this->tableDqc84 = (new Dqc84())->getTable();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dqc841', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fat_part_no');
            $table->foreign('fat_part_no')
                ->references('id')
                ->on($this->tableDqc84)
                ->onDelete('CASCADE');
            $table->string('parts_no', 15)->unique()->index('parts_no');
            $table->integer('unt_usg');
            $table->longText('description');
            $table->longText('ref_designator')->nullable();
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
        Schema::dropIfExists('dqc841');
    }
}
