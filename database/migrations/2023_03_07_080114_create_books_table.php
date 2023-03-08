<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable(); // could be empty
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->string('title');
            $table->string('isbn')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('publish_year')->nullable();
            $table->unsignedBigInteger('number_of_pages');
            $table->unsignedBigInteger('number_of_copies');
            $table->decimal('price', 8, 2); // 8 max digits 2 digits after ,00
            $table->string('cover_image'); // image path
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null'); // on deleting the category the book category_id will be set to null
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('set null'); // on deleting the publisher the book publisher_id will be set to null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
