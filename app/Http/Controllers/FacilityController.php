<?php

namespace App\Http\Controllers;

use App\Models\Homestay;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index(Request $request)
    {
        $generalSettings = GeneralSetting::first();
        $generalSettings = GeneralSetting::first();
        $search = $request->input('search');
        $query = Fasilitas::query();

        if ($search) {
            $query->where('nama_fasilitas', 'like', '%' . $search . '%')
                ->orWhere('deskripsi', 'like', '%' . $search . '%')
                ->orWhere('homestay_id', 'like', '%' . $search . '%');
        }

        $fasilitas = $query->paginate(3);
        return view('Back_End.pages.facility.index', compact('fasilitas', 'generalSettings'));
    }

    public function create()
    {
        $generalSettings = GeneralSetting::first();
        $homestays = Homestay::all();
        return view('Back_End.pages.facility.add', compact('homestays', 'generalSettings'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'gambar_fasilitas' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust the max size as needed
            'jumlah' => 'required|numeric',
            'nama_fasilitas' => 'required',
            'deskripsi' => 'required',
            'homestay_id' => 'required|exists:homestay,id',
        ]);

        // Upload image
        $gambarPath = $request->file('gambar_fasilitas')->store('fasilitas_images', 'public');

        // Simpan data fasilitas baru ke dalam database
        Fasilitas::create([
            'gambar_fasilitas' => $gambarPath,
            'icon' => $request->input('icon'),
            'jumlah' => $request->input('jumlah'),
            'nama_fasilitas' => $request->input('nama_fasilitas'),
            'deskripsi' => $request->input('deskripsi'),
            'homestay_id' => $request->input('homestay_id'),
        ]);

        return redirect()->route('facility.index')->with('success', 'Fasilitas telah ditambahkan.');
    }

    public function show($id)
    {
        $generalSettings = GeneralSetting::first();
        $facility = Fasilitas::find($id);

        if (!$facility) {
            return redirect()->route('facility.index')->with('error', 'Fasilitas tidak ditemukan.');
        }

        return view('Back_End.pages.facility.show', compact('facility', 'generalSettings'));
    }

    public function edit($id)
    {
        $generalSettings = GeneralSetting::first();
        $facility = Fasilitas::find($id);
        $homestays = Homestay::all();

        if (!$facility) {
            return redirect()->route('facility.index', compact('generalSettings'))->with('error', 'Fasilitas tidak ditemukan.');
        }

        return view('Back_End.pages.facility.edit', compact('facility', 'homestays', 'generalSettings'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'gambar_fasilitas' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust the max size as needed
            'jumlah' => 'required|numeric',
            'nama_fasilitas' => 'required',
            'deskripsi' => 'required',
            'homestay_id' => 'required|exists:homestay,id',
        ]);

        $fasilitas = Fasilitas::find($id);

        if (!$fasilitas) {
            return redirect()->route('facility.index')->with('error', 'Fasilitas tidak ditemukan.');
        }

        $fasilitas->update([
            'jumlah' => $request->input('jumlah'),
            'nama_fasilitas' => $request->input('nama_fasilitas'),
            'deskripsi' => $request->input('deskripsi'),
            'homestay_id' => $request->input('homestay_id'),
        ]);

        // Handle image upload
        if ($request->hasFile('gambar_fasilitas')) {
            // Delete the previous image if it exists
            if ($fasilitas->gambar_fasilitas) {
                Storage::disk('public')->delete($fasilitas->gambar_fasilitas);
            }

            // Upload the new image
            $gambarPath = $request->file('gambar_fasilitas')->store('fasilitas_images', 'public');
            $fasilitas->update(['gambar_fasilitas' => $gambarPath]);
        }

        return redirect()->route('facility.index')->with('success', 'Fasilitas telah diperbarui.');
    }

    public function destroy($id)
    {
        $fasilitas = Fasilitas::find($id);

        if (!$fasilitas) {
            return redirect()->route('facility.index')->with('error', 'Fasilitas tidak ditemukan.');
        }

        $fasilitas->delete();

        return redirect()->route('facility.index')->with('success', 'Fasilitas telah dihapus.');
    }
}
