<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    use HasFactory;

    protected $table = 'mechanic';
    protected $primaryKey = 'person_id_person';
    public $incrementing = false;

    protected $fillable = [
        'status',
        'specialty',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id_person');
    }
}