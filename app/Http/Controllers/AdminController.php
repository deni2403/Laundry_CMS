<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Event;

class AdminController extends Controller
{
    public function dashboard()
    {

        return view('admin.dashboard', [
            'title' => 'All Events',
            'events' => Event::latest()->paginate(6),
        ]);
    }

    public function showEvent(Event $event)
    {
        return view('admin.detail', [
            'event' => $event,
        ]);
    }

    public function index()
    {
        return view('admin.index', [
            'title' => 'Manage Event',
            'events' => Event::all()->sortDesc(),
        ]);
    }

    public function create()
    {
        return view('admin.create', [
            'title' => 'Create Event',
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:events',
            'body' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Event::create($validatedData);
        return redirect('/admin/events')->with('success', 'New Event has been added!');
    }

    public function show(Event $event)
    {
        // return view('admin.show', [
        //     'event' => $event,
        // ]);

        return $event;
    }

    public function edit(Event $event)
    {
        return view('admin.edit', [
            'title' => 'Update Event',
            'event' => $event,
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $rules = [
            'title' => 'required|max:255',
            'body' => 'required',
        ];

        if($request->slug != $event->slug){
            $rules['slug'] = 'required|unique:events';
        }

        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;

        Event::where('id', $event->id)
            ->update($validatedData);
        return redirect('/admin/events')->with('success', 'Event has been updated!');
    }

    public function destroy(Event $event)
    {
        Event::destroy($event->id);
        return redirect('/admin/events')->with('success', 'Event has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Event::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
