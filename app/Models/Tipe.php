<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{

    protected $table ='tipes';
    protected $fillable = ['time', 'harga_sewa', 'tipe_perform','deskripsi'];


    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
    public function sewa()
    {
        return $this->hasMany(Sewa::class);
    }
}
