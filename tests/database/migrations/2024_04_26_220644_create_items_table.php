<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('code', 20)->unique('code');
            $table->string('name', 100);
            $table->string('description', 100);
            $table->string('item_type_code', 20);
            $table->string('barcode', 100)->nullable();
            $table->string('photo', 100)->nullable();
            $table->string('unit_of_measurement_code', 20);
            $table->decimal('capital_price', 18, 3);
            $table->decimal('price', 18, 3);
            $table->string('discount_type', 20)->nullable();
            $table->decimal('discount', 18, 3)->nullable();
            $table->string('remark', 500)->nullable();
            $table->string('created_by', 50);
            $table->timestamps();
            $table->string('updated_by', 50)->nullable();
            $table->bit('is_active', 1)->default(b'1');
            
            $table->unique(['name', 'item_type_code', 'is_active'], 'name');
            $table->foreign('item_type_code', 'items_ibfk_1')->references('code')->on('item_types');
            $table->foreign('unit_of_measurement_code', 'items_ibfk_2')->references('code')->on('units_of_measurement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
