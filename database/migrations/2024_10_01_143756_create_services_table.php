<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Link to categories table
            $table->string('name'); // Service name (e.g., Haircut, Manicure)
            $table->decimal('price', 8, 2); // Service price
            $table->string('duration'); // Duration of the service (e.g., 30 mins)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}

