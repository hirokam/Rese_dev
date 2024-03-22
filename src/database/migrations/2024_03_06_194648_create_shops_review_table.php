<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops_review', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->default(0)->constrained()->cascadeOnDelete();
            $table->foreignId('shop_id')->default(0)->constrained()->cascadeOnDelete();
            $table->integer('stars')->default(0)->comment('星');
            $table->text('comment')->comment('コメント');
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
        Schema::dropIfExists('shops_review');
    }
}
