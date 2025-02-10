<div class="p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Artikel</h1>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="updateArticle" class="space-y-6">
        <!-- Judul -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" id="title" wire:model="title"
                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400"
                placeholder="Masukkan judul artikel" required>
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div wire:ignore>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trix@1.3.1/dist/trix.css">
            <label for="content" class="block text-sm font-medium text-gray-700">Konten</label>
            <input id="{{ $trixId }}" type="hidden" wire:model="content" value="{{ $value }}">
            <trix-editor wire:ignore input="{{ $trixId }}"></trix-editor>
            @error('content')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <script src="https://cdn.jsdelivr.net/npm/trix@1.3.1/dist/trix.js"></script>
            <script>
                var trixEditor = document.getElementById("{{ $trixId }}")

                addEventListener("trix-blur", function(event) {
                    @this.set('value', trixEditor.getAttribute('value'))
                })
            </script>
        </div>

        <!-- Gambar -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
            <input type="file" id="image" wire:model="image"
                class="mt-1 block w-full text-sm text-gray-700 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:text-sm file:bg-indigo-50 hover:file:bg-indigo-100">
            @if ($image)
                <div class="mt-2 text-sm text-gray-600">Pratinjau Gambar:</div>
                <img src="{{ $image->temporaryUrl() }}" alt="Image Preview" class="mt-2 h-32 w-32 object-cover rounded-md border border-gray-200">
            @elseif ($article->image)
                <div class="mt-2 text-sm text-gray-600">Gambar Saat Ini:</div>
                <img src="{{ asset('storage/' . $article->image) }}" alt="Current Image" class="mt-2 h-32 w-32 object-cover rounded-md border border-gray-200">
            @endif
            @error('image')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Status Publikasi -->
        <div>
            <label for="is_published" class="flex items-center space-x-2 text-sm font-medium text-gray-700">
                <input type="checkbox" id="is_published" wire:model="is_published"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                <span>Dipublikasikan?</span>
            </label>
            @error('is_published')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-between">
            <a href="{{ route('articles') }}"
            wire:navigate
                class="inline-flex items-center px-4 py-3 bg-gray-200 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-200 ease-in-out">
                Kembali
            </a>
            <button type="submit"
                class="inline-flex items-center px-4 py-3 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200 ease-in-out">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>