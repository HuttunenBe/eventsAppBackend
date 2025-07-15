<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventData;

class EventController extends Controller
{
    public function index()
    {
        return EventData::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:420',
            'long_description' => 'nullable|string|max:2000',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'price' => 'required|numeric',
            'image' => 'nullable|string',
        ]);

        $eventData = EventData::create($validated);
        return response()->json($eventData, 201);
    }

    public function show($id)
    {
        return EventData::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $eventData = EventData::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:420',
            'long_description' => 'nullable|string|max:2000',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'price' => 'required|numeric',
            'image' => 'nullable|string',
        ]);

        $eventData->update($validated);
        return response()->json($eventData);
    }

    public function destroy($id)
    {
        $eventData = EventData::findOrFail($id);
        $eventData->delete();
        return response()->json(null, 204);
    }
}
