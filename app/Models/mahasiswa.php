<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table='mahasiswa';
    protected $fillable = ['nama', 'nim', 'jurusan'];
}
