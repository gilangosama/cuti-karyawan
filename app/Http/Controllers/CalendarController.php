<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CalendarController extends Controller
{
    public function index()
    {
        return view('Callender'); // Pastikan view yang benar dipanggil
    }

    public function events(Request $request)
    {
        $events = Event::all(['id', 'title', 'start', 'end', 'description']);
        return response()->json($events);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'nullable|date|after_or_equal:start',
            'description' => 'nullable|string',
        ]);

        $event = new Event();
        $event->title = $data['title'];
        $event->start = $data['start'];
        $event->end = $data['end'];
        $event->description = $data['description'];
        $event->save();

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'nullable|date|after_or_equal:start',
            'description' => 'nullable|string',
        ]);

        $event = Event::find($id);
        $event->title = $data['title'];
        $event->start = $data['start'];
        $event->end = $data['end'];
        $event->description = $data['description'];
        $event->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return response()->json(['success' => true]);
    }
}
