<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tires', function (Blueprint $table) {
            if (!Schema::hasColumn('tires', 'tire_code')) {
                $table->string('tire_code')->nullable();
            }
            if (!Schema::hasColumn('tires', 'brand')) {
                $table->string('brand')->nullable();
            }
            if (!Schema::hasColumn('tires', 'size')) {
                $table->string('size')->nullable();
            }
            if (!Schema::hasColumn('tires', 'status')) {
                $table->string('status')->default('stock');
            }
            if (!Schema::hasColumn('tires', 'quantity')) {
                $table->integer('quantity')->default(0);
            }
            if (!Schema::hasColumn('tires', 'location')) {
                $table->string('location')->nullable();
            }
            if (!Schema::hasColumn('tires', 'running_km')) {
                $table->integer('running_km')->default(0);
            }
            if (!Schema::hasColumn('tires', 'running_hours')) {
                $table->integer('running_hours')->default(0);
            }
        });

        Schema::table('vehicles', function (Blueprint $table) {
            if (!Schema::hasColumn('vehicles', 'unit_code')) {
                $table->string('unit_code')->nullable();
            }
            if (!Schema::hasColumn('vehicles', 'type')) {
                $table->string('type')->nullable();
            }
            if (!Schema::hasColumn('vehicles', 'plate_number')) {
                $table->string('plate_number')->nullable();
            }
        });

        Schema::table('suppliers', function (Blueprint $table) {
            if (!Schema::hasColumn('suppliers', 'name')) {
                $table->string('name')->nullable();
            }
            if (!Schema::hasColumn('suppliers', 'phone')) {
                $table->string('phone')->nullable();
            }
            if (!Schema::hasColumn('suppliers', 'email')) {
                $table->string('email')->nullable();
            }
            if (!Schema::hasColumn('suppliers', 'address')) {
                $table->text('address')->nullable();
            }
        });

        Schema::table('maintenances', function (Blueprint $table) {
            if (!Schema::hasColumn('maintenances', 'tire_id')) {
                $table->unsignedBigInteger('tire_id')->nullable();
            }
            if (!Schema::hasColumn('maintenances', 'maintenance_date')) {
                $table->date('maintenance_date')->nullable();
            }
            if (!Schema::hasColumn('maintenances', 'description')) {
                $table->text('description')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('tires', function (Blueprint $table) {
            $table->dropColumn(['tire_code', 'brand', 'size', 'status', 'quantity', 'location', 'running_km', 'running_hours']);
        });

        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn(['unit_code', 'type', 'plate_number']);
        });

        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropColumn(['name', 'phone', 'email', 'address']);
        });

        Schema::table('maintenances', function (Blueprint $table) {
            $table->dropColumn(['tire_id', 'maintenance_date', 'description']);
        });
    }
};
