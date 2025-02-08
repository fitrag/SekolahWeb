<?php

// app/Http/Livewire/BannerSlider.php

namespace App\Livewire;

use App\Models\Banner;
use Livewire\Component;

class BannerSlider extends Component
{
    public $banners;

    public function mount()
    {
        $this->banners = Banner::where('is_active', true)->get();
    }

    public function render()
    {
        $this->banners = Banner::where('is_active', true)->get();
        return view('livewire.banner-slider',
            [
                'banners' => $this->banners
            ]
        );
    }
}


