<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Product::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(Product::TITLE);
            $table->float(Product::PRICE);
            $table->string(Product::IMG);
            $table->string(Product::LINK);

            $table->unique(Product::UNIQUE_KEYS, Product::TABLE . '_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Product::TABLE);
    }
};
