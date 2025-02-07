<?php

namespace App\Livewire;

use App\Models\SchoolSetting;
use Livewire\Component;

class Sidebar extends Component
{
    public $schoolName;

    public function mount()
    {
        // Ambil nama sekolah dari database
        $this->schoolName = SchoolSetting::first()->school_name ?? 'Nama Sekolah Tidak Tersedia';
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
