<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model {
    use HasFactory;

    protected $table = 'mechanic';
    protected $primaryKey = 'person_id_person';
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'person_id_person',
        'status',
        'specialty',
    ];

    public function getAllMechanics() {
        return DB::table($this->table)
            ->join('person', 'mechanic.person_id_person', '=', 'person.id_person')
            ->select('person.*', 'mechanic.specialty', 'mechanic.status')
            ->where('person.profile', '=', 'mechanic')
            ->get();
    }

    public function person() {
        return $this->belongsTo(Person::class, 'person_id_person');
    }
    
    public function deleteMechanic($personId) {
        $mechanic = self::where('person_id_person', $personId)->first();
    
        if ($mechanic) {
            return $mechanic->delete();
        }
    
        return false;
    }
    

    public static function editMechanic($personId, $data) {
        return self::where('person_id_person', $personId)->update($data);
    }


    public static function listMechanics() {
        return self::with('person')->get();
    }

    public function mechanicTeam() {
        return $this->hasOne(Mechanic::class, 'mechanic_person_id_person');
    }
}