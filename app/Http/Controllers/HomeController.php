<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;


class HomeController extends Controller
{
    public function index()
    {
        $events = Events::where('status','accepted')->get();
        return view('event.index',compact('events'));
    }
}
