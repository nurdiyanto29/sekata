<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = ['time', 'bukti_bayar',];


    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function tipe()
    {
        return $this->belongsTo(Tipe::class,'tipe_id', 'id');
    }

}
