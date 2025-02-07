<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SchoolSetting;

class Settings extends Component
{
    use WithFileUploads;

    public $school_name;
    public $address;
    public $logo;
    public $old_logo;

    public function mount()
    {
        // Mengambil data pengaturan sekolah dari database
        $settings = SchoolSetting::first();

        $this->school_name = $settings->school_name ?? '';
        $this->address = $settings->address ?? '';
        $this->old_logo = $settings->logo ?? '';
    }

    public function saveSettings()
    {
        $this->validate([
            'school_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'logo' => 'nullable|image|max:1024', // 1MB max
        ]);

        $settings = SchoolSetting::firstOrNew([]);
        $settings->school_name = $this->school_name;
        $settings->address = $this->address;

        if ($this->logo) {
            // Menghapus logo lama jika ada
            if ($this->old_logo) {
                unlink(public_path('storage/logos/' . $this->old_logo));
            }

            // Simpan logo baru
            $logoName = $this->logo->getClientOriginalName();
            $this->logo->storeAs('public/logos', $logoName);
            $settings->logo = $logoName;
        }

        $settings->save();

        session()->flash('message', 'Pengaturan berhasil disimpan!');
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
