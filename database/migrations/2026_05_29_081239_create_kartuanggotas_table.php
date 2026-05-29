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
Schema::create('kartu_anggotas', function (Blueprint $table) {
$table->id();
$table->string('nomor_kartu')->unique();
$table->date('tanggal_aktivasi');
// Menghubungkan ke tabel anggotas dengan foreign key cascade delete
$table->foreignId('anggota_id')->constrained('anggotas')-
>onDelete('cascade');
$table->timestamps();
});
}

};