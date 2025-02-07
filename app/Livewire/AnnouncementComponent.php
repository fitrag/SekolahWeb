<?php

namespace App\Livewire;

use Livewire\Component;

class AnnouncementComponent extends Component
{
    public $announcements = [];

    public function mount()
    {
        // Contoh data statis
        $this->announcements = [
            ['title' => 'Pengumuman 1', 'content' => 'Ini adalah pengumuman pertama.'],
            ['title' => 'Pengumuman 2', 'content' => 'Ini adalah pengumuman kedua.'],
        ];
    }

    public function render()
    {
        return view('livewire.announcement-component');
    }
}
