<?php

use App\Models\Order;
use App\Models\User;
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
            $table->foreignIdFor(User::class)->constrained();

            $table->string('receiver_name');
            $table->string('receiver_phone')->unique();
            $table->string('receiver_address');
            $table->double('total_price', 15,2);
            
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->default(Order::UNPAID);
            $table->string('order_status')->default(Order::STATUS_PENDING);

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