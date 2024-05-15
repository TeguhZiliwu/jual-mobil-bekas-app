<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_access', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('code', 20)->unique('code');
            $table->string('role_code', 20);
            $table->string('menu_code', 20);
            $table->bit('is_read', 1)->default(b'0');
            $table->bit('is_write', 1)->default(b'0');
            $table->bit('is_download', 1)->default(b'0');
            $table->bit('is_view_deleted_data', 1)->default(b'0');
            $table->string('created_by', 50);
            $table->timestamps();
            $table->string('updated_by', 50)->nullable();
            $table->bit('is_active', 1)->default(b'1');
            
            $table->unique(['role_code', 'menu_code', 'is_active'], 'role_code');
            $table->foreign('role_code', 'roles_access_ibfk_1')->references('code')->on('roles');
            $table->foreign('menu_code', 'roles_access_ibfk_2')->references('code')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_access');
    }
}
