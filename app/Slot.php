<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $table = 'slot';
    protected $fillable = [
        'id',
        'slot'
    ];

    public function appointments(){
        return $this->hasMany('App\Appointments');
    }


    public function getAllFreeFroDate($date){
        return $this
        ->whereNotExists(function($query) use ($date) 
            {
                $query->select(DB::raw(1))
                      ->from('appointments')
                      ->where('appointments.date','=',$date)
                      ->whereRaw('appointments.slot_id = slot.id');
            })
        ->select('slot.slot')
        ->get()
        ->toArray();
    }

    public function getSlotByTime($time){
        return $this->where('slot', $time)
        ->first();
    }
}
