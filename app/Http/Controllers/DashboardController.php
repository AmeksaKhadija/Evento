<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Events::all();
        return view('event.dashAdmin',compact('events'));
    }

    public function accepted($eventId){
        $event=Events::find($eventId);
        $event->status='accepted';
        $event->save();
        return redirect('dashAdmin');

    }

    
}
