<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\KetersediaanKamarHomestay;

class KetersediaanHomestayController extends Controller
{
    public function index()
    {
        $generalSettings = GeneralSetting::first();
        $availabilitys = KetersediaanKamarHomestay::all();
        return view('Back_End.pages.ketersediaan_homestay.index', compact('generalSettings', 'availabilitys'));
    }

    public function create()
    {
        $generalSettings = GeneralSetting::first();
        $rooms = Rooms::all(); // Ganti dengan model dan query yang sesuai
        $homestays = Homestay::all(); // Ganti dengan model dan query yang sesuai
        // Tampilkan halaman form tambah homestay
        return view('Back_End.pages.ketersediaan_homestay.add', compact('rooms', 'homestays', 'generalSettings'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'homestay_id' => 'required|exists:homestay,id',
            'tanggal' => 'required|date',
            'tersedia' => 'required|in:Available,Unavailable', // Sesuaikan dengan pilihan yang sesuai
        ]);

        // Simpan homestay availability baru ke dalam database
        KetersediaanKamarHomestay::create([
            'room_id' => $request->input('room_id'),
            'homestay_id' => $request->input('homestay_id'),
            'tanggal' => $request->input('tanggal'),
            'tersedia' => $request->input('tersedia'),
        ]);

        return redirect()->route('availability-homestay.index')->with('success', 'Homestay availability berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil homestay availability berdasarkan ID
        $generalSettings = GeneralSetting::first();
        $availability = KetersediaanKamarHomestay::findOrFail($id);
        $rooms = Rooms::all(); // Ganti dengan model dan query yang sesuai
        $homestays = Homestay::all(); // Ganti dengan model dan query yang sesuai

        // Tampilkan halaman form edit homestay
        return view('Back_End.pages.ketersediaan_homestay.edit', compact('availability','rooms', 'homestays', 'generalSettings'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'homestay_id' => 'required|exists:homestay,id',
            'tanggal' => 'required|date',
            'tersedia' => 'required|in:Available,Unavailable', // Sesuaikan dengan pilihan yang sesuai
        ]);

        // Update homestay availability berdasarkan ID
        $availability = KetersediaanKamarHomestay::findOrFail($id);
        $availability->update([
            'room_id' => $request->input('room_id'),
            'homestay_id' => $request->input('homestay_id'),
            'tanggal' => $request->input('tanggal'),
            'tersedia' => $request->input('tersedia'),
        ]);

        return redirect()->route('availability-homestay.index')->with('success', 'Homestay availability berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus homestay availability berdasarkan ID
        $availability = KetersediaanKamarHomestay::findOrFail($id);
        $availability->delete();

        return redirect()->route('availability-homestay.index')->with('success', 'Homestay availability berhasil dihapus.');
    }
}
