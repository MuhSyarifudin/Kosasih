<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $generalSettings = GeneralSetting::first();
        $settings = Setting::first(); // Mengambil data pengaturan umum pertama
        $maintenance = Maintenance::first(); // Jika belum ada, Anda harus membuatnya terlebih dahulu

        return view('Back_End.pages.setting.index', compact('generalSettings', 'settings', 'maintenance'));
    }
    // Menyimpan perubahan pengaturan umum
    public function update(Request $request, $id)
    {
        $generalSetting = GeneralSetting::findOrFail($id);

        $request->validate([
            'site_title' => 'required|string|max:255',
            'site_about' => 'required|string',
        ]);

        $generalSetting->update([
            'site_title' => $request->input('site_title'),
            'site_about' => $request->input('site_about'),
        ]);

        return redirect()->route('setting.index')->with('success', 'Pengaturan umum telah diperbarui.');
    }

    // Menyimpan pengaturan yang diperbarui
    public function settingupdate(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'phone' => 'required|string',
            'whatsapp' => 'required|string',
            'email' => 'required|email',
            'twitter' => 'required|string',
            'facebook' => 'required|string',
            'instagram' => 'required|string',
            'googleMaps' => 'required|string',
            'location' => 'required|string',
        ]);

        // Simpan pengaturan yang diperbarui ke dalam database

        $settings = Setting::first();
        $settings->update([
            'phone' => $request->input('phone'),
            'whatsapp' => $request->input('whatsapp'),
            'email' => $request->input('email'),
            'twitter' => $request->input('twitter'),
            'facebook' => $request->input('facebook'),
            'instagram' => $request->input('instagram'),
            'google_maps_url' => $request->input('googleMaps'),
            'location' => $request->input('location'),
        ]);

        // Redirect kembali ke halaman pengaturan dengan pesan sukses
        return redirect()->route('setting.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }

    public function toggleShutdown()
{

    $maintenance = Maintenance::first(); // Jika belum ada, Anda harus membuatnya terlebih dahulu

    if ($maintenance) {
        $maintenance->update(['is_shutdown' => !$maintenance->is_shutdown]);
    } else {
        Maintenance::create(['is_shutdown' => true]); // Membuat entri baru jika belum ada
    }

    return redirect()->route('setting.index')->with('success', 'Mode Shutdown telah diperbarui.');
}

}