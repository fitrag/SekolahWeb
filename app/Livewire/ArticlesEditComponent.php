<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ArticlesEditComponent extends Component
{
    use WithFileUploads;

    public $article;
    public $title;
    public $content;
    public $image;
    public $is_published;
    public $oldImage;
    public $value;
    public $trixId;

    public function mount($id)
    {
        $this->article = Article::findOrFail($id);
        $this->title = $this->article->title;
        $this->content = $this->article->content;
        $this->is_published = $this->article->is_published;
        $this->oldImage = $this->article->image;
        $this->value = $this->content;
        $this->trixId = 'trix-' . uniqid();
    }

    public function updatedValue($value){
        $this->content = $value;
    }

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|max:2048',
        'is_published' => 'boolean',
    ];

    public function updateArticle()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'content' => $this->content,
            'is_published' => $this->is_published,
        ];

        if ($this->image) {
            // Hapus gambar lama jika ada
            if ($this->oldImage) {
                Storage::delete($this->oldImage);
            }

            // Simpan gambar baru
            $path = $this->image->store('articles', 'public');
            $data['image'] = $path;
        }

        $this->article->update($data);

        session()->flash('message', 'Artikel berhasil diperbarui.');

        return redirect()->route('articles');
    }

    public function render()
    {
        return view('livewire.articles-edit-component');
    }
}