<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'client';

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'rg',
        'address',
        'phone',
    ];

    //  public function carro(){
    //     return $this->hasOne(Carro::class, 'cliente_id_cliente');
    // }
}