<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannersIndexComponent extends Component
{
    public $banners;
    public $editingId = null; // ID banner yang sedang diedit
    public $editedTitle; // Judul baru untuk banner
    public $editedDescription; // Deskripsi baru untuk banner

    public function mount()
    {
        $this->banners = Banner::all();
    }

    // Fungsi untuk menghapus banner
    public function delete($id)
    {
        $banner = Banner::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($banner->image) {
            Storage::delete($banner->image);
        }

        // Hapus data banner dari database
        $banner->delete();

        // Refresh daftar banner
        $this->banners = Banner::all();

        // Tampilkan pesan sukses
        session()->flash('message', 'Banner berhasil dihapus.');
    }

    // Fungsi untuk memperbarui status banner
    public function toggleStatus($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->is_active = !$banner->is_active; // Toggle status
        $banner->save();

        // Refresh daftar banner
        $this->banners = Banner::all();

        // Tampilkan pesan sukses
        session()->flash('message', 'Status banner berhasil diperbarui.');
    }

    // Fungsi untuk mengaktifkan mode edit
    public function enableEdit($id, $title, $description)
    {
        $this->editingId = $id;
        $this->editedTitle = $title;
        $this->editedDescription = $description;
    }

    // Fungsi untuk menyimpan perubahan judul dan deskripsi
    public function saveChanges($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->title = $this->editedTitle;
        $banner->description = $this->editedDescription;
        $banner->save();

        // Matikan mode edit
        $this->editingId = null;

        // Refresh daftar banner
        $this->banners = Banner::all();

        // Tampilkan pesan sukses
        session()->flash('message', 'Banner berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.banners-index-component');
    }
}