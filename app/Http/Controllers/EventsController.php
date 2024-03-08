<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Categorie;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

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
         $events = Events::where('organizer_id', $userId)->with('categorie')->paginate(10);
         $categories = Categorie::all();

         return view('event.home', compact('events', 'categories'));
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

    // public function search(Request $request)

    // {

    //     $keyword = $request->input('title_s');
    //     $events = Events::where('title', 'like', '%' . $keyword . '%')->paginate(10);

    //     return view('event.searchResult',['events'=>$events]);
    // }
// }

public function search(Request $request){
    // dd($request);
    $keyword = $request->input('keyword');

    $events = Events::when($keyword, function ($query) use ($keyword) {
        return $query->where('title', 'like', '%' . $keyword . '%');
    })->paginate(3);


    if ($request->ajax()) {
        return view('event.pagination', compact('events'))->render();
    }

    return view('event.index', compact('events'));
}
}
