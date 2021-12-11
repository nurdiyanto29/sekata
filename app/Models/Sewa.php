<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    protected $fillable = ['time', 'tgl_perform', 'tipe_perform', 'tgl_kosong'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }
  
}
