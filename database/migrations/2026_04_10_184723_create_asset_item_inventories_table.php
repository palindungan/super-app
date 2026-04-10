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
        Schema::create('asset_item_inventories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('location_id')->nullable();
            $table->foreignId('asset_item_id')->nullable();

            $table->date('purchase_date')->nullable();
            $table->decimal('purchase_price', 15, 2)->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->decimal('asset_value', 15, 2)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_item_inventories');
    }
};
