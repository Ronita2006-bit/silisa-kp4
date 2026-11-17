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
        Schema::create('jenis_limbah', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->string('satuan', 20)->default('ton');
            $table->decimal('persen_acuan', 5, 2);
            $table->decimal('kapasitas', 12, 2);
            $table->decimal('harga_default', 15, 2)->nullable();
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_limbah');
    }
};