<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Slot;
use App\Appointments;

class AppointmentsController extends Controller
{

    private $Appointment;
    private $Slot;

    public function __construct(Appointments $appointment, Slot $slot){
        $this->Appointment = $appointment;
        $this->Slot = $slot;
    }

    /*
        Check free slot for date
    */
    public function showFreeSlots($token,$date,$param){

        if($token!=env('TOKEN')){
            return "false";
        }

        if($param=="free"){
            $result = array_column($this->Slot->getAllFreeFroDate($date),'slot');
            return Array('slots'=>$result);
        }

        if($param=="all"){
            return Array('slots'=>array_column($this->Slot->all('slot')->toArray(),'slot'));
        }

        return "error";
        
    }

    /*
        Schedule a time
    */
    public function markit($token,$date,$time,$patient){

        if($token!=env('TOKEN')){
            return false;
        }

        $slot = $this->Slot->getSlotByTime($time);

        if(!$this->Appointment->hasAppointment($date,$time)&&$slot->id){
            return '{appointmentId:'.$this->Appointment->saveAppointment($date,$patient,$slot->id).'}';
        }

        return '{error: “Unable to reserve the appointment”}';

    }

    /*
        Delete appointments
    */
    public function deleteAppointment($token,$appointmentId){

        if($token!=env('TOKEN')){
          return false;
        }

        if($this->Appointment->deleteById($appointmentId)){
            return '{success}';
        }

        return '{error: “Unable to reserve the appointment”}'; 
    }

}
