<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $generalSettings = GeneralSetting::first();
        $search = $request->input('search');
        $galleries = Gallery::with(['homestay'])
        ->whereHas('homestay', function ($query) use ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        })
        ->orWhere('nama', 'like', '%' . $search . '%')
        ->orWhere('url', 'like', '%' . $search . '%')
        ->paginate(3);
        return view('Back_End.pages.gallery.index', compact('galleries','generalSettings'));
    }

    public function create()
    {
        $generalSettings = GeneralSetting::first();
        $homestays = Homestay::all();
        return view('Back_End.pages.gallery.add', compact('homestays','generalSettings'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'homestay_id' => 'required|exists:homestay,id',
            'nama' => 'required|string|max:255',
            'url' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Gambar dengan ekstensi tertentu dan ukuran maksimum 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan gambar ke direktori penyimpanan
        $imagePath = $request->file('url')->store('gallery', 'public');

        // Simpan data ke database
        Gallery::create([
            'homestay_id' => $request->homestay_id,
            'nama' => $request->nama,
            'url' => $imagePath, // Simpan path gambar
        ]);


        return redirect()->route('gallery.index')->with('success', 'Gallery item has been created successfully.');
    }

    public function show($id)
    {
        $generalSettings = GeneralSetting::first();
        // Tampilkan detail galeri
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return redirect()->route('gallery.index')->with('error', 'Gallery item not found.');
        }

        return view('Back_End.pages.gallery.show', compact('gallery', 'generalSettings'));
    }

    public function edit($id)
    {
        $generalSettings = GeneralSetting::first();
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return redirect()->route('gallery.index')
                ->with('error', 'Gallery not found.');
        }

        $homestays = Homestay::all();

        return view('Back_End.pages.gallery.edit', compact('gallery', 'homestays','generalSettings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'homestay_id' => 'required',
            'nama' => 'required|string|max:255',
            'url' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Anda dapat menyesuaikan tipe gambar dan ukuran maksimumnya
        ]);

        $gallery = Gallery::find($id);

        if (!$gallery) {
            return redirect()->route('gallery.index')
                ->with('error', 'Gallery not found.');
        }

        $gallery->homestay_id = $request->homestay_id;
        $gallery->nama = $request->nama;

        // Cek apakah ada file gambar yang diupload
        if ($request->hasFile('url')) {
            // Hapus gambar lama jika ada
            if (Storage::disk('public')->exists($gallery->url)) {
                Storage::disk('public')->delete($gallery->url);
            }

            // Simpan gambar yang baru diupload
            $path = $request->file('url')->store('gallery', 'public');
            $gallery->url = $path;
        }

        $gallery->save();

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return redirect()->route('gallery.index')
                ->with('error', 'Gallery not found.');
        }

        // Hapus gambar dari penyimpanan
        if (Storage::disk('public')->exists($gallery->url)) {
            Storage::disk('public')->delete($gallery->url);
        }

        $gallery->delete();

        return redirect()->route('gallery.index')
            ->with('success', 'Gallery deleted successfully.');
    }
}
