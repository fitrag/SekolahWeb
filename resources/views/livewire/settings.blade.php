<div>
    <div class="bg-white p-5 rounded-lg border border-gray-200">
        <!-- Menampilkan pesan jika pengaturan berhasil disimpan -->
        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="saveSettings" class="space-y-6">
            <!-- School Name -->
            <div>
                <label for="school_name" class="block text-sm font-medium text-gray-700">Nama Sekolah</label>
                <input type="text" id="school_name" wire:model="school_name"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Nama Sekolah" required
                    wire:loading.attr="disabled">
                @error('school_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea id="address" wire:model="address" rows="4"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Alamat Sekolah" required
                    wire:loading.attr="disabled"></textarea>
                @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Logo -->
            <div>
                <label for="logo" class="block text-sm font-medium text-gray-700">Logo Sekolah</label>
                <input type="file" id="logo" wire:model="logo"
                    class="mt-1 block w-full text-sm text-gray-700 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-md file:text-sm file:bg-indigo-50 hover:file:bg-indigo-100"
                    wire:loading.attr="disabled">
                @if ($logo)
                    <div class="mt-2 text-sm text-gray-600">Pratinjau Logo:</div>
                    <img src="{{ $logo->temporaryUrl() }}" alt="Logo Preview" class="mt-2 w-32 h-32 object-cover">
                @endif
                @error('logo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Save Button with Loading State -->
            <div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    wire:loading.attr="disabled">

                    <!-- Normal State -->
                    <span wire:loading.remove wire:target="saveSettings">
                        Simpan Pengaturan
                    </span>

                    <!-- Loading State -->
                    <span wire:loading.flex wire:target="saveSettings" class="inline-flex items-center justify-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Processing...
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>