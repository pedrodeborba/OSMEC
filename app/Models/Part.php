<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    public $timestamps = false; 

    protected $table = 'part';

    protected $primaryKey = 'id_part';

    protected $fillable = [
        'name',
        'description',
        'manufacturer',
        'quantity',
        'cost',
        'manufacture_year',
    ];

    // public function serviceOrders()
    // {
    //     return $this->belongsToMany(ServiceOrder::class, 'part_id_part_fk', 'service_order_id_service_order_fk');
    // }
}