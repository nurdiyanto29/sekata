<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = ['time','hp' ,'tgl_perform', 'tipe_perform', 'user_id', 'tipe_id', 'alamat', 'jam', 'acara'];

    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
