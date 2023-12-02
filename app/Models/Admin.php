<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Admin extends Model implements AuthenticatableContract
{
    use HasFactory, Notifiable, Authenticatable;

    protected $table = 'admin';
    protected $primaryKey = 'person_id_person';
    public $incrementing = false;
}
