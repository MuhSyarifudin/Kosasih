<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class RegionController extends Controller
{
    public function index(Request $request)
    {
        $generalSettings = GeneralSetting::first();
        $search = $request->input('search');

        $regionsQuery = Region::query();

        if ($search) {
            $regionsQuery->where('kota', 'like', '%' . $search . '%')
                ->orWhere('provinsi', 'like', '%' . $search . '%');
        }

        $regions = $regionsQuery->paginate(3);

        return view('Back_End.pages.region.index', compact('regions','generalSettings'));
    }

    public function create()
    {
        $generalSettings = GeneralSetting::first();
        return view('Back_End.pages.region.add', compact('generalSettings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kota' => 'required',
            'provinsi' => 'required',
        ]);

        Region::create($request->all());

        return redirect()->route('region.index')->with('success', 'Region berhasil ditambahkan.');
    }

    public function edit(Region $region)
    {
        $generalSettings = GeneralSetting::first();
        return view('Back_End.pages.region.edit', compact('region', 'generalSettings'));
    }

    public function update(Request $request, Region $region)
    {
        $request->validate([
            'kota' => 'required',
            'provinsi' => 'required',
        ]);

        $region->update($request->all());

        return redirect()->route('region.index')->with('success', 'Region berhasil diperbarui.');
    }

    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->route('region.index')->with('success', 'Region berhasil dihapus.');
    }
}