<div class="">
    <div class="flex justify-between items-center mb-4">
        <!-- Judul Halaman -->
        <h1 class="text-2xl font-bold">Daftar Banner</h1>

        <!-- Tombol Tambah Banner -->
        <a href="{{ route('banners.create') }}"
            class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Tambah Banner
        </a>
    </div>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <!-- Table -->
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <!-- Header -->
            <thead class="text-xs text-white uppercase bg-indigo-600">
                <tr>
                    <th scope="col" class="px-6 py-3">Judul</th>
                    <th scope="col" class="px-6 py-3">Gambar</th>
                    <th scope="col" class="px-6 py-3">Deskripsi</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <!-- Body -->
            <tbody>
                @foreach ($banners as $banner)
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 transition duration-200 ease-in-out">
                        <!-- Judul -->
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            @if ($editingId === $banner->id)
                                <!-- Input Form untuk Edit Judul -->
                                <input type="text" wire:model="editedTitle"
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="Masukkan judul baru">
                            @else
                                <!-- Teks Judul dengan Double Click -->
                                <span wire:dblclick="enableEdit({{ $banner->id }}, '{{ $banner->title }}', '{{ $banner->description }}')"
                                    class="cursor-pointer hover:text-indigo-600">
                                    {{ $banner->title ?? '-' }}
                                </span>
                            @endif
                        </td>
                        <!-- Gambar -->
                        <td class="px-6 py-4">
                            @if ($banner->image)
                                <img src="{{ asset('storage/' . $banner->image) }}" alt="Banner Image" class="h-16 w-16 object-cover rounded-md">
                            @else
                                <span class="text-gray-400">Tidak ada gambar</span>
                            @endif
                        </td>
                        <!-- Deskripsi -->
                        <td class="px-6 py-4">
                            @if ($editingId === $banner->id)
                                <!-- Input Form untuk Edit Deskripsi -->
                                <textarea wire:model="editedDescription"
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="Masukkan deskripsi baru"></textarea>
                            @else
                                <!-- Teks Deskripsi dengan Double Click -->
                                <span wire:dblclick="enableEdit({{ $banner->id }}, '{{ $banner->title }}', '{{ $banner->description }}')"
                                    class="cursor-pointer hover:text-indigo-600">
                                    {{ Str::limit($banner->description, 50) ?? '-' }}
                                </span>
                            @endif
                        </td>
                        <!-- Status -->
                        <td class="px-6 py-4">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" wire:click="toggleStatus({{ $banner->id }})"
                                    class="sr-only peer" {{ $banner->is_active ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                </div>
                            </label>
                        </td>
                        <!-- Aksi -->
                        <td class="px-6 py-4 space-x-2">
                            <!-- Save Button -->
                            @if ($editingId === $banner->id)
                                <button wire:click="saveChanges({{ $banner->id }})"
                                    class="inline-flex items-center px-3 py-2 bg-indigo-600 text-white text-xs font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                    Simpan
                                </button>
                            @endif

                            <!-- Delete Button -->
                            <button wire:click.prevent="delete({{ $banner->id }})"
                                class="inline-flex items-center px-3 py-2 bg-red-600 text-white text-xs font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>