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
        Schema::create('nilais', function (Blueprint $table) {
            $table->foreignId("mahasiswa_id")->nullable()->index("fk_nilai_to_mahasiswa");
            $table->double('IPK')->nullable();
            $table->integer('SSKM')->nullable();
            $table->integer('TOEFL')->nullable();
            $table->integer('karya_tulis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
