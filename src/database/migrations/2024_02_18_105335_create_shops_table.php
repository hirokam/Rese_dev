<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment('店舗代表者')->nullable()->constrained()->cascadeOnDelete();
            $table->string('shop_name')->nullable();
            $table->foreignId('area_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('genre_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('overview')->nullable();
            $table->string('file_name')->comment('店舗画像')->nullable();
            $table->string('file_path')->nullable();
            $table->string('picture_url')->nullable();
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
        Schema::dropIfExists('shops');
    }
}
