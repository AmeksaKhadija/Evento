<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Events::paginate(3);
        return view('event.dashAdmin',compact('events'));
    }

    public function accepted($eventId){
        $event=Events::find($eventId);
        $event->status='accepted';
        $event->save();
        return redirect('dashAdmin');

    }


    public function statistic()
    {
        $userNumber = User::count();
        $eventNumber = Events::count();
        return view('event.statistic', compact('userNumber', 'eventNumber'));
    }
}
