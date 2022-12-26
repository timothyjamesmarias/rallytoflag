<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return inertia('Events/Index', [
        'events' => Event::query()
          ->when(request('search'), function ($query) {
            $query
              ->where('title', 'like', '%' . request('search') . '%')
              ->orWhere('location', 'like', '%' . request('search') . '%');
          })
          ->addSelect(['image' => EventImage::select('path')
            ->whereColumn('event_id', 'events.id')
            ->limit(1)
          ])
          ->orderBy('created_at', 'desc')
          ->paginate(9)
          ->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (Auth::check()){
        return inertia('Events/Create');
      }
      else {
        return redirect(route('login'));
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
      $fields = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'location' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after:start_date',
        'url' => 'nullable|url',
        'start_time' => 'nullable',
        'images' => 'nullable|array|max:6',
        'images.*' => 'nullable|file|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
      ]);

      $event = Event::create([
        'title' => $request->title,
        'description' => $request->description,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'user_id' => Auth::user()->id,
        'location' => $request->location,
        'url' => $request->url,
        'start_time' => $request->start_time,
      ]);

      if ($request->hasFile('images')) {
        $images = $request->file('images');
        foreach ($images as $image) {
          $path = $image->store('images', 'public');
          EventImage::create([
            'path' => $path,
            'event_id' => $event->id,
          ]);
        }
      }

      return redirect()->route('event.show', $event);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
      return inertia('Events/Show', [
        'event' => Event::findOrFail($event->id),
        'images' => EventImage::where('event_id', $event->id)->get(),
      ],
      );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
      if (Auth::check() && Auth::user()->id == $event->user_id){
        return inertia('Events/Edit', [
          'event' => Event::findOrFail($event->id),
          'images' => EventImage::where('event_id', $event->id)->get(),
        ]);
      }
      else {
        return redirect(route('login'));
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
      $fields = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'location' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after:start_date',
        'url' => 'nullable|url',
        'start_time' => 'nullable',
        'images' => 'nullable|array|max:6',
        'images.*' => 'nullable|file|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
      ]);

      $event->update([
        'title' => $request->title,
        'description' => $request->description,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'user_id' => Auth::user()->id,
        'location' => $request->location,
        'url' => $request->url,
        'start_time' => $request->start_time,
      ]);

      if ($request->hasFile('images')) {
        // Delete old images
        EventImage::where('event_id', $event->id)->delete();

        // Add new images
        $images = $request->file('images');
        foreach ($images as $image) {
          $path = $image->store('images', 'public');
          EventImage::create([
            'path' => $path,
            'event_id' => $event->id,
          ]);
        }
      }

      return redirect()->route('event.show', $event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
      Event::destroy($event);
      return response('Event Deleted', 204);
    }
}
