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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('plate_number')->unique();        // رقم اللوحة
            $table->string('chassis_number')->unique();     // رقم الهيكل
            $table->string('owner_name');                   // اسم المالك
            $table->string('owner_nationality')->nullable();// جنسية المالك
            $table->string('qr_code')->unique();   
            // العلاقة مع المحطات
            $table->foreignId('station_id')
                  ->nullable()
                  ->constrained('stations')
                  ->nullOnDelete();
             // هذه العلاقة تعني: كل سيارة يمكن أن تكون مرتبطة بمحطة واحدة فقط أو لا شيء
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
