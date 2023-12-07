<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model {
    use HasFactory;
    public $timestamps = false;
    protected $table = 'client';
    protected $primaryKey = 'id_client';

    protected $guarded = [];

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'rg',
        'address',
        'phone',
    ];

    public function key() {
        return 'id_client';
    }

    public function vehicle() {
        return $this->hasOne(Vehicle::class, 'client_id_client');
    }
}