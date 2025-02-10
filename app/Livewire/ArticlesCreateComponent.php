<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ArticlesCreateComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $content;
    public $image;
    public $is_published = false;

    public $value;
    public $trixId;
    public $photos = [];

    
    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|max:15048', // Maksimal 2MB
        'is_published' => 'boolean',
    ];

    public function mount($value = ''){
        $this->value = $value;
        $this->trixId = 'trix-' . uniqid();
    }

    public function updatedValue($value){
        $this->content = $value;
    }

    public function completeUpload(string $uploadedUrl, string $trixUploadCompletedEvent){

        foreach($this->photos as $photo){
            if($photo->getFilename() == $uploadedUrl) {
                // store in the public/photos location
                $newFilename = $photo->store('public/photos');

                // get the public URL of the newly uploaded file
                $url = Storage::url($newFilename);

                $this->dispatch($trixUploadCompletedEvent, [
                    'url' => $url,
                    'href' => $url,
                ]);
            }
        }
    }
    
    public function createArticle()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'content' => $this->content,
            'is_published' => $this->is_published,
        ];

        if ($this->image) {
            $path = $this->image->store('articles', 'public');
            $data['image'] = $path;
        }

        Article::create($data);

        session()->flash('message', 'Artikel berhasil ditambahkan.');

        return redirect()->route('articles');
    }

    public function render()
    {
        return view('livewire.articles-create-component');
    }
}