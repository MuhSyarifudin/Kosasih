<?php

namespace App\Http\Controllers;

use Tag;
use App\Models\Tags;
use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class TagsController extends Controller
{
    public function index(Request $request)
    {
        $generalSettings = GeneralSetting::first();
        $search = $request->input('search');
        $tags = Tags::where('nama_lokasi', 'like', '%' . $search . '%')
            ->orWhere('jarak', 'like', '%' . $search . '%')
            ->paginate(10);
        $homestays = Homestay::all();
        return view('Back_End.pages.tags.index', compact('tags', 'homestays', 'generalSettings'));
    }

    public function create()
    {
        $generalSettings = GeneralSetting::first();
        $homestays = Homestay::all();
        return view('Back_End.pages.tags.add', compact('homestays','generalSettings'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'homestay_id' => 'required|exists:homestay,id',
            'nama_lokasi' => 'required|string|max:255',
            'jarak' => 'required|numeric',
        ]);

        Tags::create($request->all());


        return redirect()->route('tag.index')->with('success', 'Tag created successfully.');
    }

    public function show($id)
    {
        $generalSettings = GeneralSetting::first();
        // Tampilkan detail tag
        $tag = Tags::findOrFail($id);
        return view('Back_End.pages.tags.show', compact('tag','generalSettings'));
    }

    public function edit($id)
    {
        $generalSettings = GeneralSetting::first();
        // Ambil data tag
        $tag = Tags::findOrFail($id);
        $homestays = Homestay::all();
        return view('Back_End.pages.tags.edit', compact('tag', 'homestays','generalSettings'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'homestay_id' => 'required|exists:homestay,id',
            'nama_lokasi' => 'required|string|max:255',
            'jarak' => 'required|numeric',
        ]);

        // Temukan tag yang akan diupdate
        $tag = Tags::findOrFail($id);

        // Update data tag
        $tag->update([
            'homestay_id' => $request->homestay_id,
            'nama_lokasi' => $request->nama_lokasi,
            'jarak' => $request->jarak,
        ]);

        return redirect()->route('tag.index')->with('success', 'Tag updated successfully.');
    }

    public function destroy($id)
    {
        // Temukan dan hapus tag
        $tag = Tags::findOrFail($id);
        $tag->delete();

        return redirect()->route('tag.index')->with('success', 'Tag deleted successfully.');
    }
}