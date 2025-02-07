<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-blue-700">
    <div class="w-full max-w-md p-8 space-y-8 bg-white shadow-lg rounded-xl my-5">
        <!-- Header -->
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-blue-600">Register</h1>
            <p class="mt-2 text-sm text-gray-500">Buat akun baru untuk mulai menggunakan layanan kami.</p>
        </div>
        <!-- Form -->
        <form wire:submit.prevent="register" class="space-y-6">
            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="name" wire:model="name"
                    class="mt-1 block w-full px-4 py-3 border @error('name') border-red-500 @enderror border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out"
                    required
                    wire:loading.attr="disabled">
                @error('name')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" wire:model="email"
                    class="mt-1 block w-full px-4 py-3 border @error('email') border-red-500 @enderror border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out"
                    required
                    wire:loading.attr="disabled">
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" wire:model="password"
                    class="mt-1 block w-full px-4 py-3 border @error('password') border-red-500 @enderror border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out"
                    required
                    wire:loading.attr="disabled">
                @error('password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <!-- Password Confirmation Field -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" wire:model="password_confirmation"
                    class="mt-1 block w-full px-4 py-3 border @error('password_confirmation') border-red-500 @enderror border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out"
                    required
                    wire:loading.attr="disabled">
                @error('password_confirmation')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <!-- Submit Button with Loading State -->
            <button type="submit"
                class="w-full py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200 ease-in-out transform hover:scale-105 relative"
                wire:loading.attr="disabled">
                
                <!-- Normal State -->
                <span wire:loading.remove wire:target="register">
                    Register
                </span>
                
                <!-- Loading State -->
                <span wire:loading.flex wire:target="register" class="inline-flex items-center justify-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Processing...
                </span>
            </button>
        </form>
        <!-- Login Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" wire:navigate prefetch class="font-medium text-blue-600 hover:text-blue-500 transition duration-150 ease-in-out">Login disini</a>
            </p>
        </div>
    </div>
</div>