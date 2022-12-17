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
      //querying occurs in /Http/Livewire/EventGrid.php
      return view('events.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (Auth::check()){
        return view('events.create');
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
        'title' => 'required',
        'description' => 'required',
        'location' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'url' => 'nullable|url',
        //'images' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $event = Event::create([
        'title' => $request->title,
        'description' => $request->description,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'user_id' => Auth::user()->id,
        'location' => $request->location,
        'url' => $request->url,
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
      return view('events.show', [
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
      return view('events.edit', [
        'event' => Event::findOrFail($event->id)
      ],
      );
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
        'title' => 'required',
        'description' => 'required',
        'location' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'url' => 'nullable|url',
      ]);

      $event->update([
        'title' => $request->title,
        'description' => $request->description,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'user_id' => Auth::user()->id,
        'location' => $request->location,
        'url' => $request->url,
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
