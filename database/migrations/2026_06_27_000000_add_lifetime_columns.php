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
        Schema::table('lifetimes', function (Blueprint $table) {
            if (!Schema::hasColumn('lifetimes', 'tire_id')) {
                $table->foreignId('tire_id')->nullable()->constrained('tires')->cascadeOnDelete();
            }

            if (!Schema::hasColumn('lifetimes', 'hm_install')) {
                $table->integer('hm_install')->default(0);
            }

            if (!Schema::hasColumn('lifetimes', 'hm_current')) {
                $table->integer('hm_current')->default(0);
            }

            if (!Schema::hasColumn('lifetimes', 'km_install')) {
                $table->integer('km_install')->default(0);
            }

            if (!Schema::hasColumn('lifetimes', 'km_current')) {
                $table->integer('km_current')->default(0);
            }

            if (!Schema::hasColumn('lifetimes', 'max_lifetime_hm')) {
                $table->integer('max_lifetime_hm')->default(10000);
            }

            if (!Schema::hasColumn('lifetimes', 'max_lifetime_km')) {
                $table->integer('max_lifetime_km')->default(300000);
            }

            if (!Schema::hasColumn('lifetimes', 'average_hm_per_day')) {
                $table->decimal('average_hm_per_day', 8, 2)->default(0);
            }

            if (!Schema::hasColumn('lifetimes', 'status')) {
                $table->string('status')->default('GOOD');
            }

            if (!Schema::hasColumn('lifetimes', 'estimated_scrap_date')) {
                $table->date('estimated_scrap_date')->nullable();
            }

            if (!Schema::hasColumn('lifetimes', 'notes')) {
                $table->text('notes')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lifetimes', function (Blueprint $table) {
            $table->dropConstrainedForeignId('tire_id');
            $table->dropColumn(['hm_install', 'hm_current', 'km_install', 'km_current', 'max_lifetime_hm', 'max_lifetime_km', 'average_hm_per_day', 'status', 'estimated_scrap_date', 'notes']);
        });
    }
};
