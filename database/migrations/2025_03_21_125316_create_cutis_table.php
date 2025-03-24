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
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('no_registrasi');
            $table->enum('jenis_cuti', ['tahunan', 'sakit', 'melahirkan']);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('total_days');
            $table->string('address');
            $table->string('doctor_letter')->nullable();
            $table->string('supporting_letter')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->unsignedBigInteger('approval1_id')->nullable();
            $table->unsignedBigInteger('approval2_id')->nullable();
            $table->unsignedBigInteger('hrd_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('approval1_id')->references('id')->on('users');
            $table->foreign('approval2_id')->references('id')->on('users');
            $table->foreign('hrd_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
