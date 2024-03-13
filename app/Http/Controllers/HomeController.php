<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    public function index()
    {
        $categories=Categorie::all();
        $events = Events::where('status','accepted')->get();
        return view('event.index',compact('events', 'categories'));
    }

    public function statisticOrg()
    {
        $userId =Auth::user()->id;
        $myEvents = Events::where('organizer_id',$userId)->count();
        $eventRejected = Events::count();
        return view('event.statisticOrg', compact('myEvents', 'eventRejected'));
    }


}
