<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\Homestay;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $generalSettings = GeneralSetting::first();
        $search = $request->input('search');
        $rooms = Rooms::with('homestay','mainImage')
            ->where('nama', 'like', '%' . $search . '%')
            ->orWhere('deskripsi', 'like', '%' . $search . '%')
            ->paginate(3);
        return view('Back_End.pages.room.index', compact('rooms', 'generalSettings'));
    }

    public function create()
    {
        $generalSettings = GeneralSetting::first();
        $homestays = Homestay::all();
        $fasilitas = Fasilitas::all();
        return view('Back_End.pages.room.add', compact('homestays', 'generalSettings', 'fasilitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'homestay_id' => 'required|exists:homestay,id',
            'nama' => 'required',
            'kapasitas' => 'required|integer',
            'harga_per_malam' => 'required|numeric',
            'deskripsi' => 'required',
            'fasilitas' => 'required|exists:fasilitas,id',
            // 'main_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust mime types and size as needed

        ]);

        Rooms::create([
            'homestay_id' => $request->input('homestay_id'),
            'nama' => $request->input('nama'),
            'kapasitas' => $request->input('kapasitas'),
            'harga_per_malam' => $request->input('harga_per_malam'),
            'fasilitas_id' => $request->input('fasilitas'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('room.index')->with('success', 'Room added successfully.');
    }

    public function show($id)
    {
        $generalSettings = GeneralSetting::first();
        $room = Rooms::find($id);

        if (!$room) {
            return redirect()->route('room.index')->with('error', 'Room not found.');
        }

        return view('Back_End.pages.room.show', compact('room', 'generalSettings'));
    }

    public function edit($id)
    {
        $generalSettings = GeneralSetting::first();
        $room = Rooms::find($id);
        $homestays = Homestay::all();
        $fasilitas = Fasilitas::all();


        if (!$room) {
            return redirect()->route('room.index')->with('error', 'Room not found.');
        }

        return view('Back_End.pages.room.edit', compact('room', 'homestays', 'generalSettings','fasilitas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'homestay_id' => 'required|exists:homestay,id',
            'nama' => 'required',
            'kapasitas' => 'required|integer',
            'harga_per_malam' => 'required|numeric',
            'deskripsi' => 'required',
            'fasilitas_id' => 'required|exists:fasilitas,id',
        ]);

        $room = Rooms::find($id);

        if (!$room) {
            return redirect()->route('room.index')->with('error', 'Room not found.');
        }

        $room->update([
            'homestay_id' => $request->input('homestay_id'),
            'nama' => $request->input('nama'),
            'kapasitas' => $request->input('kapasitas'),
            'harga_per_malam' => $request->input('harga_per_malam'),
            'fasilitas_id' => $request->input('fasilitas_id'),
            'deskripsi' => $request->input('deskripsi'),

        ]);

        return redirect()->route('room.index')->with('success', 'Room updated successfully.');
    }

    public function destroy($id)
    {
        $room = Rooms::find($id);

        if (!$room) {
            return redirect()->route('room.index')->with('error', 'Room not found.');
        }

        $room->delete();

        return redirect()->route('room.index')->with('success', 'Room deleted successfully.');
    }
}