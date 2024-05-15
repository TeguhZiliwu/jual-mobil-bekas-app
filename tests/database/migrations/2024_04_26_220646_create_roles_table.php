<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('code', 20)->unique('code');
            $table->string('name', 50);
            $table->string('description', 200);
            $table->string('remark', 500)->nullable();
            $table->string('created_by', 50);
            $table->timestamps();
            $table->string('updated_by', 50)->nullable();
            $table->bit('is_active', 1)->default(b'1');
            
            $table->unique(['name', 'is_active'], 'name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
