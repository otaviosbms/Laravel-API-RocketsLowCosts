<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foguete extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'status',
        'imagem',
        'custo',
        'motor_tipo',
        'motor_ver'
    ];

    
    protected $casts = [
        'status' => 'boolean',
    ];

    public function lancamento(){
        return $this->hasOne(Lancamento::class);
    }

}
