<?php

namespace App\Http\Controllers;

use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\LayananTambahan;
use App\Models\Rooms;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $generalSettings = GeneralSetting::first();
        $search = $request->input('search');
        $services = LayananTambahan::with(['homestay'])
            ->whereHas('homestay', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })
            ->orWhere('nama', 'like', '%' . $search . '%')
            ->orWhere('deskripsi', 'like', '%' . $search . '%')
            ->orWhere('harga', 'like', '%' . $search . '%')
            ->paginate(5);
        return view('Back_End.pages.service.index', compact('services', 'generalSettings'));
    }

    public function create()
    {
        $generalSettings = GeneralSetting::first();
        $homestays = Homestay::all();
        return view('Back_End.pages.service.add', compact('homestays','generalSettings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'homestay_id' => 'required|exists:homestay,id',
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);

        LayananTambahan::create([
            'homestay_id' => $request->input('homestay_id'),
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
        ]);

        return redirect()->route('service.index')->with('success', 'Service added successfully.');
    }

    public function show($id)
    {
        $generalSettings = GeneralSetting::first();
        $service = LayananTambahan::find($id);

        if (!$service) {
            return redirect()->route('service.index')->with('error', 'Service not found.');
        }

        return view('Back_End.pages.service.show', compact('service','generalSettings'));
    }

    public function edit($id)
    {
        $generalSettings = GeneralSetting::first();
        $service = LayananTambahan::find($id);
        $homestays = Homestay::all();

        if (!$service) {
            return redirect()->route('service.index')->with('error', 'Service not found.');
        }

        return view('Back_End.pages.service.edit', compact('service', 'homestays','generalSettings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'homestay_id' => 'required|exists:homestay,id',
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);


        $service = LayananTambahan::find($id);

        if (!$service) {
            return redirect()->route('service.index')->with('error', 'Service not found.');
        }

        $service->update([
            'homestay_id' => $request->input('homestay_id'),
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
        ]);

        return redirect()->route('service.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = LayananTambahan::find($id);

        if (!$service) {
            return redirect()->route('service.index')->with('error', 'Service not found.');
        }

        $service->delete();

        return redirect()->route('service.index')->with('success', 'Service deleted successfully.');
    }
}