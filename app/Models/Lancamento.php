<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'lucro',
    ];

   
    public function foguete()
    {
        return $this->belongsTo(Foguete::class);
    }



}
