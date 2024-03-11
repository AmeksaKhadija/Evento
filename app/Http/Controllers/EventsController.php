<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Categorie;
use App\Models\Reservation;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
         $userId = Auth::id();
         $events = Events::where('organizer_id', $userId)->with('categorie')->paginate(3);

         $categories = Categorie::all();

         return view('event.index', compact('events', 'categories'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagePath = null;

        $user_id = auth()->user()->id; //renvoie 1
    if ($request->hasFile('image_path')) {
        $imagePath = $request->file('image_path')->store('images', 'public');
    }
    $event = new Events();

        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->location =$request->location;
        $event->nb_place =$request->nb_place;
        $event->image_path = $imagePath;
        $event->organizer_id =$user_id;
        $event->categorie_id = $request->categorie_id;
        $event->status = 'rejected';
        $event->type=$request->type;
        $event->save();

    return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function show(Events $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $events = Events::findOrfail($id);

        return view('event.editEvent',compact('events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventsRequest  $request
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Events::findOrFail($id);
        $user_id = auth()->user()->id;
        if ($request->hasFile('image_path')) {
            if ($event->image_path) {
                Storage::disk('public')->delete($event->image_path);
            }
            $imagePath = $request->file('image_path')->store('images', 'public');
            $event->image_path = $imagePath;
        }

        $event->update([
           'title' => $request->title,
           'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'nb_place' => $request->nb_place,
        ]);


        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $event = Events::findOrFail($id);

        if (auth()->user()->id !== $event->organizer_id) {
            return redirect('/home')->with('error', 'Vous n\'êtes pas autorisé à supprimer ce post.');
        }

        $event->delete();

        return redirect('/home')->with('success', 'Post supprimé avec succès.');
    }


    public function details($id)
    {
        $events = Events::find($id);

        return view('event.detail', compact('events'));
    }

    // search
    public function search($search)
        {
            if ($search == "AllEventSearch") {
                $events = Events::all();
            } else {
                $events = Events::where('title', 'like', '%' . $search . '%')->get();
            }
            return view('event.pagination', compact('events'));
        }


    // filtrage
    public function filterByCategory(Request $request)
    {
        $userId = Auth::id();
        $categoryId = $request->input('category_id');

        $events = Events::where('organizer_id', $userId)
                        ->whereHas('categorie', function ($query) use ($categoryId) {
                            $query->where('id', $categoryId);
                        })
                        ->with('categorie')
                        ->paginate(3);

        $categories = Categorie::all();

        return view('event.index', compact('events', 'categories'));
    }



    public function validateTicket(){
        $userId=Auth::user()->id;
        $reservations = DB::table('reservations')
        ->join('events', 'reservations.event_id', '=', 'events.id')
        ->join('users', 'reservations.user_id', '=', 'users.id')
        ->where('events.organizer_id', '=', $userId)
        ->where('reservations.status', 'LIKE', 'pending')
        ->select('reservations.*', 'events.image_path as image', 'events.title as event_title', 'users.name as user_name','users.email as user_email')
        ->get();
        return view('event.validateTicket',compact('reservations'));

    }

    public function approvedTicket($idReservation){
        $reservation=Reservation::find($idReservation);
        $reservation->status='approved';
        $reservation->save();
        return redirect('/validateTicket');

    }

    public function RejecteTicket($idReservation){
        $reservation=Reservation::find($idReservation);
        $reservation->status='rejected';
        $reservation->save();
        return redirect('/validateTicket');

    }

}
