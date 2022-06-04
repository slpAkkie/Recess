<?php

use App\Models\BookingStatus;
use App\Models\Service;
use App\Models\User;
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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Service::class)->references('id')->on('services')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();;
            $table->date('date');
            $table->integer('total');
            $table->foreignIdFor(BookingStatus::class, 'status_id')->references('id')->on('booking_statuses')->cascadeOnUpdate()->cascadeOnDelete();;
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
        Schema::dropIfExists('bookings');
    }
};
