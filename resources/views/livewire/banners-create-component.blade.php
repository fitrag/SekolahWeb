<div class="p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Banner Baru</h1>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="createBanner" class="space-y-6">
        <!-- Judul -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" id="title" wire:model="title"
                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400"
                placeholder="Masukkan judul banner">
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Gambar -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
            <input type="file" id="image" wire:model="image"
                class="mt-1 block w-full text-sm text-gray-700 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:text-sm file:bg-indigo-50 hover:file:bg-indigo-100 file:cursor-pointer">
            @if ($image)
                <div class="mt-2 text-sm text-gray-600">Pratinjau Gambar:</div>
                <img src="{{ $image->temporaryUrl() }}" alt="Image Preview" class="mt-2 h-32 w-32 object-cover rounded-md border border-gray-200">
            @endif
            @error('image')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea id="description" wire:model="description" rows="4"
                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 resize-none"
                placeholder="Masukkan deskripsi banner"></textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Status Aktif -->
        <div>
            <label for="is_active" class="flex items-center space-x-2 text-sm font-medium text-gray-700">
                <input type="checkbox" id="is_active" wire:model="is_active"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                <span>Aktif?</span>
            </label>
            @error('is_active')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tombol Simpan -->
        <div>
            <button type="submit"
                class="w-full py-3 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200 ease-in-out">
                Tambah Banner
            </button>
        </div>
    </form>
</div>