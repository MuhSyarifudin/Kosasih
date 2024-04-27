<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $generalSettings = GeneralSetting::first();
        $search = $request->input('search');
        $events = Events::with(['homestay'])
            ->whereHas('homestay', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })
            ->orWhere('nama_event', 'like', '%' . $search . '%')
            ->orWhere('tanggal_mulai', 'like', '%' . $search . '%')
            ->orWhere('tanggal_selesai', 'like', '%' . $search . '%')
            ->orWhere('deskripsi', 'like', '%' . $search . '%')
            ->paginate(4);
        return view('Back_End.pages.events.index', compact('events', 'generalSettings')); // Ganti nama view jika diperlukan
    }

    public function create()
    {
        $generalSettings = GeneralSetting::first();
        $homestays = Homestay::all();
        return view('Back_End.pages.events.add', compact('homestays','generalSettings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'homestay_id' => 'required|exists:homestay,id',
            'nama_event' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'required|string',
            'gambar_event' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle image upload
            $imagePath = $request->file('gambar_event')->store('event_images', 'public');

        // Simpan data event ke database
        Events::create([
            'homestay_id' => $request->homestay_id,
            'nama_event' => $request->nama_event,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'deskripsi' => $request->deskripsi,
            'gambar_event' => $imagePath,
    ]);

        return redirect()->route('event.index')->with('success', 'Event has been created successfully.');
    }

    public function edit($id)
    {
        $generalSettings = GeneralSetting::first();
        $event = Events::find($id);

        if (!$event) {
            return redirect()->route('event.index')->with('error', 'Event not found.');
        }

        $homestays = Homestay::all();

        return view('Back_End.pages.events.edit', compact('event', 'homestays','generalSettings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'homestay_id' => 'required|exists:homestay,id',
            'nama_event' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'required|string',
            'gambar_event' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event = Events::find($id);

        if (!$event) {
            return redirect()->route('event.index')->with('error', 'Event not found.');
        }

        $event->update($request->all());


    // Handle image update if a new image is provided
    if ($request->hasFile('gambar_event')) {
        // Delete the old image
        Storage::disk('public')->delete($event->gambar_event);

        // Upload the new image
        $newImagePath = $request->file('gambar_event')->store('event_images', 'public');
        $event->update(['gambar_event' => $newImagePath]);
    }

        return redirect()->route('event.index')->with('success', 'Event has been updated successfully.');
    }

    public function show($id)
    {
        $generalSettings = GeneralSetting::first();
        $event = Events::find($id);

        if (!$event) {
            return redirect()->route('event.index')->with('error', 'Event not found.');
        }

        return view('Back_End.pages.events.show', compact('event','generalSettings'));
    }

    public function destroy($id)
    {
        $event = Events::find($id);

        if (!$event) {
            return redirect()->route('event.index')->with('error', 'Event not found.');
        }

        $event->delete();

        return redirect()->route('event.index')->with('success', 'Event has been deleted successfully.');
    }
}
