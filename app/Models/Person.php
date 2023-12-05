<?php

// app/Models/Person.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Person extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;
    protected $table = 'person';

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
        'rg',
        'cpf',
        'phone'
    ];

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }

    public function admin(){
        return $this->hasOne(Admin::class, 'pessoa_id_pessoa');
    }

    public function funcionario(){
        return $this->hasOne(Mechanic::class, 'pessoa_id_pessoa');
    }
}
