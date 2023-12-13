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
        Schema::table('rankings', function (Blueprint $table) {
            $table->foreign('mahasiswa_id', 'fk_ranking_to_mahasiswa')
                ->references('id')
                ->on('mahasiswas')
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
        Schema::table('rankings', function (Blueprint $table) {
            $table->dropForeign('fk_ranking_to_mahasiswa');
        });
    }
};
