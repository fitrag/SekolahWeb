<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Banner;
use Livewire\WithFileUploads; // Tambahkan trait untuk file upload
use Illuminate\Support\Facades\Storage;

class BannersCreateComponent extends Component
{
    use WithFileUploads; // Gunakan trait untuk mengaktifkan fitur file upload

    public $title;
    public $image; // Properti untuk menyimpan file gambar
    public $description;
    public $is_active = true;

    // Aturan validasi untuk form
    protected $rules = [
        'title' => 'nullable|string|max:255',
        'image' => 'nullable|image|max:2048', // Gambar maksimal 2MB
        'description' => 'nullable|string',
        'is_active' => 'boolean',
    ];

    // Fungsi untuk membuat banner baru
    public function createBanner()
    {
        // Validasi input
        $this->validate();

        // Persiapkan data untuk disimpan
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'is_active' => $this->is_active,
        ];

        // Jika ada gambar yang diunggah, simpan ke storage dan tambahkan path ke data
        if ($this->image) {
            $path = $this->image->store('banners', 'public'); // Simpan gambar ke folder "banners" di disk "public"
            $data['image'] = $path;
        }

        // Simpan data ke database
        Banner::create($data);

        // Tampilkan pesan sukses
        session()->flash('message', 'Banner berhasil ditambahkan.');

        // Redirect ke halaman daftar banner
        return redirect()->route('banners', );
    }

    public function render()
    {
        return view('livewire.banners-create-component');
    }
}