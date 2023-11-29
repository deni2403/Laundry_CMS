<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
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
            'events' => Event::latest()->paginate(8),
        ]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:events',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'body' => 'required',
            'user_id' => 'nullable',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('event-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        Event::create($validatedData);
        return redirect('/admin/events')->with('success', 'Event Berhasil Ditambahkan!');
    }

    public function show(Event $event)
    {
        return view('admin.show', [
            'event' => $event,
        ]);
    }

    public function edit(Event $event)
    {
        return view('admin.edit', [
            'event' => $event,
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // 'nullable
            'body' => 'required',
        ];

        if ($request->slug != $event->slug) {
            $rules['slug'] = 'required|unique:events';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('event-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        Event::where('id', $event->id)
            ->update($validatedData);
        return redirect('/admin/events')->with('success', 'Event Berhasil Diperbarui!');
    }

    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::delete($event->image);
        }
        Event::destroy($event->id);
        return redirect('/admin/events')->with('success', 'Event Telah Dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Event::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
