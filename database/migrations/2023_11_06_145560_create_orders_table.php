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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('customer_name', 25);
            $table->dateTime('order_in');
            $table->dateTime('order_out');
            $table->dateTime('order_take');
            $table->float('total_weight');
            $table->float('total_price');
            $table->enum('status', ['Dalam antrian', 'Belum dicuci', 'Sedang dicuci', 'Sudah dicuci', 'Belum disetrika', 'Sedang disetrika', 'Sudah disetrika', 'Sedang dipacking', 'Selesai','Sudah diambil'])->default('Dalam antrian');
            $table->foreignId('service_id')->constrained();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('cashier_id')->nullable();
            $table->unsignedBigInteger('ironer_id')->nullable();
            $table->unsignedBigInteger('packer_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('cashier_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('ironer_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('packer_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('member_id')->nullable()->constrained();
            $table->foreignId('log_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
