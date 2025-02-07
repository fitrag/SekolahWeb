<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-blue-700">
    <div class="w-full max-w-md p-8 space-y-8 bg-white shadow-lg rounded-xl">
        <!-- Header -->
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-blue-600">Login</h1>
            <p class="mt-2 text-sm text-gray-500">Masukkan email dan password Anda untuk masuk ke akun Anda.</p>
        </div>
        <!-- Error Message -->
        @if (session()->has('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg relative">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        <!-- Form -->
        <form wire:submit.prevent="login" class="space-y-6">
            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" wire:model="email"
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out"
                    placeholder="contoh@email.com" required
                    wire:loading.attr="disabled">
            </div>
            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" wire:model="password"
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out"
                    placeholder="********" required
                    wire:loading.attr="disabled">
            </div>
            <!-- Remember Me and Forgot Password -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" wire:model="remember"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                        wire:loading.attr="disabled">
                    <label for="remember" class="ml-2 text-sm text-gray-700">Remember me</label>
                </div>
                <div class="text-sm">
                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Forgot your password?</a>
                </div>
            </div>
            <!-- Submit Button with Loading State -->
            <button type="submit"
                class="w-full py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200 ease-in-out transform hover:scale-105 relative"
                wire:loading.attr="disabled">
                
                <!-- Normal State -->
                <span wire:loading.remove wire:target="login">
                    Login
                </span>
                
                <!-- Loading State -->
                <span wire:loading.flex wire:target="login" class="inline-flex items-center justify-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Processing...
                </span>
            </button>
        </form>
        <!-- Register Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" wire:navigate prefetch class="font-medium text-blue-600 hover:text-blue-500 transition duration-150 ease-in-out">Daftar disini</a>
            </p>
        </div>
    </div>
</div>