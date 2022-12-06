<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_product',255)->nullable();
            $table->string('image_product',255)->nullable();
            $table->string('price_product',255)->nullable();
            $table->text('desc_sort_product')->nullable();
            $table->text('desc_product')->nullable();
            $table->tinyInteger('status')->comment('ProductStatusEnum')->index();
            $table->foreignId('id_category')->constrained('categories');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
