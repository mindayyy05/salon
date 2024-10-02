<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Customer who booked
            $table->foreignId('service_id')->constrained()->onDelete('cascade'); // Service booked
            $table->foreignId('stylist_id')->constrained()->onDelete('cascade'); // Stylist for the appointment
            $table->dateTime('appointment_time'); // Date and time of the appointment
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending'); // Status of the appointment
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
