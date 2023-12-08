<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'service_order';

    protected $primaryKey = 'id_service_order';

    protected $fillable = [
        'entry_date',
        'exit_date',
        'defect',
        'solution',
        'work_price',
        'total',
        'status',
        'vehicle_id_vehicle_fk',
        'client_id_client_fk',
        'mechanic_team_id_mechanic_team'
    ];

    public function parts()
    {
        return $this->belongsToMany(Part::class, 'part_service_order', 'service_order_id_service_order', 'part_id_part');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id_vehicle_fk');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id_client_fk');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'mechanic_team_id_mechanic_team');
    }
}
