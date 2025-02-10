<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ArticlesHomepageComponent extends Component
{
    public $articles; // Properti untuk menyimpan daftar artikel

    public function mount()
    {
        // Ambil artikel yang dipublikasikan dan urutkan berdasarkan tanggal terbaru
        $this->articles = Article::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(5) // Ambil 5 artikel terbaru
            ->get();
    }

    public function render()
    {
        return view('livewire.articles-homepage-component');
    }
}