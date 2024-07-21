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
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->foreignId('province_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->string('subdistrict');
            $table->string('weight');
            $table->string('courier');
            $table->decimal('shipping_cost', 10, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //

            Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn(['province_id', 'city_id', 'shipping_cost', 'subdistrict', 'weight', 'courier']);
            });
        });
    }
};
