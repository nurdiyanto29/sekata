<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{


    protected $fillable = ['title', 'amount', 'time', 'type'];


public function categori()
{
    return $this-> belongsTo(Categori::class, 'categori_id');
}

}
