<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $generalSettings = GeneralSetting::first();
        $search = $request->input('search');
        $staff = Staff::where('id', 'like', '%' . $search . '%')
            ->orWhere('nama', 'like', '%' . $search . '%')
            ->orWhere('jabatan', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('telepon', 'like', '%' . $search . '%')
            ->orWhereHas('homestay', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })
            ->paginate(3);
        return view('Back_End.pages.staff.index', compact('staff', 'generalSettings'));
    }

    public function create()
    {
        $generalSettings = GeneralSetting::first();
        $homestays = Homestay::all();
        return view('Back_End.pages.staff.add', compact('homestays','generalSettings'));
    }

    public function store(Request $request)
    {
        // Validasi data dari formulir
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|unique:staff',
            'telepon' => 'required|string|max:20',
            'homestay_id' => 'required|exists:homestay,id',

        ]);

        // Menyimpan data staff baru ke database
        Staff::create($request->all());

        // Redirect ke halaman daftar staff dengan pesan sukses
        return redirect()->route('staff.index')->with('success', 'Staff has been added successfully.');
    }

    public function show($id)
    {
        $generalSettings = GeneralSetting::first();
        $staff = Staff::findOrFail($id);
        return view('Back_End.pages.staff.show', compact('staff','generalSettings'));
    }

    public function edit($id)
    {
        $generalSettings = GeneralSetting::first();
        $staff = Staff::findOrFail($id);
        $homestays = Homestay::all();
        return view('Back_End.pages.staff.edit', compact('staff', 'homestays','generalSettings'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required|string',
            'homestay_id' => 'required|exists:homestay,id',
        ]);

        $staff = Staff::findOrFail($id);
        $staff->update($request->all());

        return redirect()->route('staff.index')
            ->with('success', 'Staff record updated successfully.');
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->route('staff.index')
            ->with('success', 'Staff record deleted successfully.');
    }
}
