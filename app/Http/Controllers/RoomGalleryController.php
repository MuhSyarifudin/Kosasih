<?php

namespace App\Http\Controllers;

use App\Models\RoomGallery;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Storage;

class RoomGalleryController extends Controller
{
    public function index()
    {
        $generalSettings = GeneralSetting::first();
        $roomGalleries = RoomGallery::paginate(10);;

        return view('Back_End.pages.roomGallery.index', compact('roomGalleries', 'generalSettings'));
    }

    public function create()
    {
        $generalSettings = GeneralSetting::first();
        return view('Back_End.pages.roomGallery.add', compact('generalSettings'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Upload gambar
        $imagePath = $request->file('main_image')->store('room_gallery', 'public');

        // Simpan data ke database
        RoomGallery::create([
            'main_image' => $imagePath,
        ]);

        return redirect()->route('roomGallery.index')->with('success', 'Room Gallery added successfully.');
    }

    public function edit(RoomGallery $roomGallery)
    {
        $generalSettings = GeneralSetting::first();
        return view('Back_End.pages.roomGallery.edit', compact('roomGallery', 'generalSettings'));
    }

    public function update(Request $request, RoomGallery $roomGallery)
    {
        // Validasi input
        $request->validate([
            'main_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika ada file gambar baru, upload dan hapus yang lama
        if ($request->hasFile('main_image')) {
            Storage::disk('public')->delete($roomGallery->main_image);

            $imagePath = $request->file('main_image')->store('room_gallery', 'public');
            $roomGallery->update(['main_image' => $imagePath]);
        }

        return redirect()->route('roomGallery.index')->with('success', 'Room Gallery updated successfully.');
    }

    public function destroy(RoomGallery $roomGallery)
    {
        // Hapus gambar dari storage
        Storage::disk('public')->delete($roomGallery->main_image);

        // Hapus data dari database
        $roomGallery->delete();

        return redirect()->route('roomGallery.index')->with('success', 'Room Gallery deleted successfully.');
    }
}
