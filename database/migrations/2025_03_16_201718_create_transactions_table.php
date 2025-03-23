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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payer_id')->constrained('money_wallet', 'user_id');
            $table->foreignId('payee_id')->constrained('money_wallet', 'user_id');
            $table->bigInteger(column: 'amount', autoIncrement: false);
            $table->string(column: 'currency', length: 3);
            $table->string(column: 'inconsistency')->nullable();
            $table->enum('status', ['pending', 'completed', 'canceled']);
            $table->timestamp(column: 'completed_at')->nullable();
            $table->timestamp(column: 'canceled_at')->nullable();
            $table->timestamp(column: 'pending_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
