<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Anggota extends Model
{
protected $fillable = ['nama', 'email'];
public function kartuAnggota(): HasOne
{
return $this->hasOne(KartuAnggota::class, 'anggota_id');
}
}
