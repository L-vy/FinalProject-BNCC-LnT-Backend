<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('cover_image')->nullable();
            $table->integer('stock');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('publisher');
            $table->integer('number_of_page');
            $table->timestamps();
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
