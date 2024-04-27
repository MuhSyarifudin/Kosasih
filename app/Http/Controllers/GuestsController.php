<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GuestsController extends Controller
{
    public function index(Request $request)
    {
        $generalSettings = GeneralSetting::first();
        $search = $request->input('search');
        $guests = Tamu::where('nama_tamu', 'like', '%' . $search . '%')
            ->orWhere('email_tamu', 'like', '%' . $search . '%')
            ->paginate(3);
        return view('Back_End.pages.guest.index', compact('guests', 'generalSettings'));
    }

    public function create()
    {
        $generalSettings = GeneralSetting::first();
        return view('Back_End.pages.guest.add', compact('generalSettings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto_tamu' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust the allowed image types and size
            'nama_tamu' => 'required|string|max:255',
            'email_tamu' => 'required|email|max:255',
            'file_tamu' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'password_tamu' => 'required|string|min:6',
        ]);

        // Handle file uploads
        $foto_tamu = $request->file('foto_tamu');
        $foto_tamu_path = $foto_tamu->store('guest_photos', 'public');

        // Handle file upload
        $file_tamu = $request->file('file_tamu');
        $file_path = $file_tamu->store('guest_files');

        // Create guest
        $guest = new Tamu([
            'foto_tamu' => $foto_tamu_path,
            'nama_tamu' => $request->input('nama_tamu'),
            'email_tamu' => $request->input('email_tamu'),
            'file_tamu' => $file_path,
            'password_tamu' => bcrypt($request->input('password_tamu')),
        ]);

        $guest->save();
        // Log in the guest after registration
        Auth::login($guest);
        return redirect()->route('guest.index')->with('success', 'Guest added successfully.');
    }

    public function show($id)
    {
        $generalSettings = GeneralSetting::first();
        $guest = Tamu::find($id);

        if (!$guest) {
            return redirect()->route('guest.index')->with('error', 'Guest not found.');
        }

        return view('Back_End.pages.guest.show', compact('guest', 'generalSettings'));
    }

    public function edit($id)
    {
        $generalSettings = GeneralSetting::first();
        $guest = Tamu::find($id);

        if (!$guest) {
            return redirect()->route('guest.index')->with('error', 'Guest not found.');
        }

        return view('Back_End.pages.guest.edit', compact('guest', 'generalSettings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'foto_tamu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_tamu' => 'required|string|max:255',
            'email_tamu' => 'required|email|max:255',
            'file_tamu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file type and size as needed
            'password_tamu' => 'required|string|min:6',
        ]);

        // Find the guest by ID
        $guest = Tamu::findOrFail($id);

        // Handle file uploads if provided
        if ($request->hasFile('foto_tamu')) {
            // Delete existing foto_tamu
            if ($guest->foto_tamu) {
                Storage::disk('public')->delete($guest->foto_tamu);
            }

            // Upload new foto_tamu
            $foto_tamu = $request->file('foto_tamu');
            $foto_tamu_path = $foto_tamu->store('guest_avatars', 'public');
            $guest->foto_tamu = $foto_tamu_path;
        }

        // Handle file upload if a new file is provided
        if ($request->hasFile('file_tamu')) {
            // Delete the previous file (if any)
            // You may want to add more logic to handle file deletion based on your requirements
            if ($guest->file_tamu) {
                Storage::disk('public')->delete($guest->file_tamu);
            }

            // Upload the new file
            $file_tamu = $request->file('file_tamu');
            $file_tamu_path = $file_tamu->store('guest_files', 'public');
            $guest->file_tamu = $file_tamu_path;
        }

        // Update guest information
        $guest->nama_tamu = $request->input('nama_tamu');
        $guest->email_tamu = $request->input('email_tamu');
        $guest->password_tamu = bcrypt($request->input('password_tamu')); // Hash the password
        $guest->save();

        return redirect()->route('guest.index')->with('success', 'Guest updated successfully.');
    }

    public function destroy($id)
    {
        $guest = Tamu::find($id);

        if (!$guest) {
            return redirect()->route('guest.index')->with('error', 'Guest not found.');
        }

        $guest->delete();

        return redirect()->route('guest.index')->with('success', 'Guest deleted successfully.');
    }
}