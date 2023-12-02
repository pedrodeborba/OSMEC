<?php

// app/Models/Person.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Person extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'person';

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
    ];

    protected $hidden = [
        'password',
    ];
}
