<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hymns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('singer_id')->constrained('singers')->onDelete('cascade');
            $table->foreignId('hymn_category_id')->constrained('hymn_categories')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('thumbnail');
            $table->string('mp3');
            $table->longText('body');
            $table->boolean('status')->default(true);
            $table->integer('order')->default(1);
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
        Schema::dropIfExists('hymns');
    }
};
