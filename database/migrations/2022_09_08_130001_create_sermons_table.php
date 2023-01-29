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
        Schema::create('sermons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sermon_category_id')->constrained('sermon_categories')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description');
            $table->string('file');
            $table->string('youtube')->nullable();
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
        Schema::dropIfExists('sermons');
    }
};
