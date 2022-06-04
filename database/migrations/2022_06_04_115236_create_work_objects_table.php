<?php

use App\Models\Work;
use App\Models\WorkObjectType;
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
        Schema::create('work_objects', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Work::class)->references('id')->on('works')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('path');
            $table->foreignIdFor(WorkObjectType::class, 'type_id')->references('id')->on('work_object_types')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('work_objects');
    }
};
