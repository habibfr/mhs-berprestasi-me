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
        Schema::create('klasifikasi_karya_tulis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kriteria_id')->nullable()->index('fk_klasifikasi_karya_tulis_to_kriteria');
            $table->string('klasifikasi', 50);
            $table->double('nilai');
            $table->timestamps();
        });

        Schema::table('klasifikasi_karya_tulis', function (Blueprint $table) {
            $table->foreign('kriteria_id', 'fk_klasifikasi_karya_tulis_to_kriteria')
                ->references('id')
                ->on('kriterias')
                ->onUpdate('cascade')
                ->onDelete('cascade');
              // You can adjust the onDelete behavior based on your requirements
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasifikasi_karya_tulis');

        Schema::table('klasifikasi_karya_tulis', function (Blueprint $table) {
            $table->dropForeign("fk_klasifikasi_karya_tulis_to_kriteria");
        });  
    }
};
