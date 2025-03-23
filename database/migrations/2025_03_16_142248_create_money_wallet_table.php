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
        Schema::create('money_wallet', function (Blueprint $table) {
            $table->foreignId('user_id')->primary()->constrained('users');
            $table->bigInteger(column: 'amount', autoIncrement: false);
            $table->string(column: 'currency', length: 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('money_wallet');
    }
};
