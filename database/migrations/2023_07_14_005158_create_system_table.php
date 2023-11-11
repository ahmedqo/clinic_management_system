<?php

use App\Functions\Core;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system', function (Blueprint $table) {
            $table->id();
            $table->string('work_days')->default('monday,tuesday,wednesday,thursday,friday');
            $table->time('work_start')->default('08:00:00');
            $table->time('work_end')->default('18:00:00');
            $table->time('break_start')->default('12:00:00');
            $table->time('break_end')->default('14:00:00');
            $table->string('currency')->default('$');
            $table->integer('slot')->default(30);
            $table->float('cost', 15, 5)->default(100);
            $table->enum('report', Core::report())->default('week');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system');
    }
}
