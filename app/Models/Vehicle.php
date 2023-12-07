<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\clientModel;
class Vehicle extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'vehicle';
    protected $primaryKey = 'id_vehicle';
    protected $guarded = [];

    protected $fillable = [
        'name',
        'color',
        'license_plate',
        'model',
        'mileage',
        'client_id_client',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id_client', 'id_client');
    }

    public function getAll()
    {
        return self::with('client')->get();
    }

    public function clientForCpf($cpfclient)
    {
        $client = Client::where('cpf', $cpfclient)->first();

        if ($client) {
            $this->client_id_client = $client->id_client;
            $this->save();
        }
    }
}