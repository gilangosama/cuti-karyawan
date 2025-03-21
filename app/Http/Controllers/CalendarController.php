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
        $events = Event::all(['id', 'title', 'start', 'end']);
        return response()->json($events);
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->title = $request->input('title');
        $event->start = $request->input('start');
        $event->end = $request->input('end');
        $event->save();

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->title = $request->input('title');
        $event->start = $request->input('start');
        $event->end = $request->input('end');
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
