<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Reservation;

use Illuminate\Support\Facades\Auth;



class TicketController extends Controller
{


    public function generate($eventId){
        $event=Events::find($eventId);
        $eventid=$event->id;
        $userid = Auth::user()->id;

        $reservation = new Reservation();
        $reservation->user_id = $userid;
        $reservation->event_id=$eventid;

        if($event->type=='automatic'){
            $reservation->status='approved';
            $reservation->save();
            return view('success', compact('userid','event'));
        }else{
            $reservation->status='pending';
            $reservation->save();
            return redirect('/index')->with('status','votre reservation est enregistré, Merci attendre la validation organisateur');;

        }



    }
}
