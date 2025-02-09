<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ArticlesIndexComponent extends Component
{
    public $articles;
    public $search = ''; // Properti untuk menyimpan kata kunci pencarian
    

    public function mount()
    {
        $this->articles = Article::all();
    }

    // Fungsi untuk memuat artikel berdasarkan pencarian
    public function updatedSearch()
    {
        $this->articles = Article::where('title', 'like', '%' . $this->search . '%')->get();
    }

    public function delete($id)
    {
        $article = Article::findOrFail($id);

        // Hapus gambar jika ada
        if ($article->image) {
            Storage::delete($article->image);
        }

        $article->delete();

        // Refresh daftar artikel
        $this->articles = Article::all();

        session()->flash('message', 'Artikel berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.articles-index-component');
    }
}