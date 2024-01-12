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
        Schema::create('karya_tulis', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah');
            $table->foreignId('mahasiswa_id')->nullable()->index('fk_karya_tulis_to_mahasiswa');
            $table->foreignId('kriteria_id')->nullable()->index('fk_karya_tulis_to_kriteria');
            $table->foreignId('klasifikasi_karya_tulis_id')->nullable()->index('fk_karya_tulis_to_klasifikasi_karya_tulis');
            $table->timestamps();
        });

        Schema::table('karya_tulis', function (Blueprint $table) {
            $table->foreign('mahasiswa_id', 'fk_karya_tulis_to_mahasiswa')
                ->references('id')
                ->on('mahasiswas')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('kriteria_id', 'fk_karya_tulis_to_kriteria')
                ->references('id')
                ->on('kriterias')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('klasifikasi_karya_tulis_id', 'fk_karya_tulis_to_klasifikasi_karya_tulis')
                ->references('id')
                ->on('klasifikasi_karya_tulis')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karya_tulis');

        Schema::table('karya_tulis', function (Blueprint $table) {
            $table->dropForeign("fk_karya_tulis_to_mahasiswa");
        }); 
        
        Schema::table('karya_tulis', function (Blueprint $table) {
            $table->dropForeign("fk_karya_tulis_to_kriteria");
        }); 

        Schema::table('karya_tulis', function (Blueprint $table) {
            $table->dropForeign("fk_karya_tulis_to_klasifikasi_karya_tulis");
        }); 
    }
};
