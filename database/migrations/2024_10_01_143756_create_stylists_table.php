<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStylistsTable extends Migration
{
    public function up()
    {
        Schema::create('stylists', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Stylist's name
            $table->text('bio')->nullable(); // Stylist's bio
            $table->timestamps();
        });

        // Pivot table for many-to-many relationship between stylists and categories
        Schema::create('category_stylist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('stylist_id')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_stylist');
        Schema::dropIfExists('stylists');
    }
}
