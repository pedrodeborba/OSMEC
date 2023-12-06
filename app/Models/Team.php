<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mechanic;

class Team extends Model {
    use HasFactory;

    protected $table = 'mechanic_team';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'function',
        'mechanics',
        'mechanic_person_id_person',
    ];

    public function mechanic() {
        return $this->belongsTo(Mechanic::class, 'mechanic_person_id_person', 'person_id_person');
    }

    public function getAll() {
        return self::with('mechanic')->get();
    }
}