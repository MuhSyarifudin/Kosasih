<?php

namespace App\Http\Controllers;


use App\Models\Region;
use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class HomestayController extends Controller
{

    public function index(Request $request)
    {
        $generalSettings = GeneralSetting::first();
        $search = $request->input('search');

        $homestaysQuery = Homestay::query();

        if ($search) {
            $homestaysQuery->where('nama', 'like', '%' . $search . '%')
                ->orWhere('alamat', 'like', '%' . $search . '%')
                ->orWhere('deskripsi', 'like', '%' . $search . '%');
        }

        $homestays = $homestaysQuery->paginate(3);

        return view('Back_End.pages.homestay.index', compact('homestays', 'generalSettings'));
    }

    public function create()
    {
        $generalSettings = GeneralSetting::first();
        $regions = Region::all();
        return view('Back_End.pages.homestay.add', compact('generalSettings', 'regions'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'harga_per_malam' => 'required|numeric',
           'region_id' => 'required|exists:region,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan
        ]);

        // Ambil ID kota berdasarkan nama kota dari form
        $kotaId = Region::where('kota', $request->input('kota'))->value('id');

        // Simpan data homestay baru ke dalam database
        $homestay = new Homestay();
        $homestay->nama = $request->input('nama');
        $homestay->deskripsi = $request->input('deskripsi');
        $homestay->alamat = $request->input('alamat');
        $homestay->harga_per_malam = $request->input('harga_per_malam');
        $homestay->region_id = $request->input('region_id');

        // Upload dan simpan gambar
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public', $imageName);
            $homestay->gambar = $imageName;
        }

        $homestay->save();

        return redirect()->route('homestay.index')->with('success', 'Homestay telah ditambahkan.');
    }

    public function show($id)
    {
        $homestay = Homestay::findOrFail($id);
        $generalSettings = GeneralSetting::first();
        $regions = Region::all();

        return view('Back_End.pages.homestay.show', compact('homestay', 'generalSettings','regions'));
    }

    public function edit($id)
    {
        $homestay = Homestay::find($id);
        $generalSettings = GeneralSetting::first();
        $regions = Region::all();
        return view('Back_End.pages.homestay.edit', compact('homestay', 'generalSettings','regions'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'region_id' => 'required|exists:region,id',
            'harga_per_malam' => 'required|numeric',
        ]);

        $homestay = Homestay::find($id);
        $homestay->nama = $request->input('nama');
        $homestay->deskripsi = $request->input('deskripsi');
        $homestay->alamat = $request->input('alamat');
        $homestay->harga_per_malam = $request->input('harga_per_malam');
        $homestay->region_id = $request->input('region_id');

        // Upload dan simpan gambar jika ada perubahan
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public', $imageName);
            $homestay->gambar = $imageName;
        }

        $homestay->save();

        return redirect()->route('homestay.index')->with('success', 'Homestay telah diperbarui.');
    }

    public function destroy($id)
    {
        try {
            // Temukan homestay berdasarkan ID
            $homestay = Homestay::findOrFail($id);

            // Hapus homestay (akan di-mark sebagai deleted)
            $homestay->delete();

            return redirect()->route('homestay.index')->with('success', 'Homestay telah dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('homestay.index')->with('error', 'Gagal menghapus homestay: ' . $e->getMessage());
        }
    }
}
