<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>
        @vite('resources/css/app.css')
    
    </head>
    <body>
    @auth
    <div class="min-h-screen flex bg-gray-100" x-data="{ isOpen: true, activeMenu: 'dashboard' }">
    <!-- Sidebar -->
        <livewire-sidebar/>
        <div class="flex w-full flex-col">
            
        <header class="bg-white py-4 text-dark shadow-md">
            <!-- Sidebar (Toggle Button) -->
            <div class="px-4">
                <div class="flex items-center justify-between">
                    <!-- Toggle Button -->
                    <button @click="isOpen = !isOpen" class="p-2 text-white bg-indigo-600 hover:bg-indigo-500 rounded-full">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Nama Pengguna -->
                    @auth
                        <div class="flex items-center space-x-4">
                            <span class="text-gray-700 font-medium">Halo, {{ auth()->user()->name }}</span>
                            <a href=""
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="text-indigo-600 hover:text-indigo-800 font-medium">
                                Logout
                            </a>
                            <form id="logout-form" action="" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    @else
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                                Register
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </header>

        <!-- Main Content -->
            <div class="flex-1 p-8">
            <!-- Main Content Goes Here -->
                {{ $slot }}
            </div>
        </div>  
    </div>  
    @endauth
    @guest
    {{ $slot }}
    @endguest
    @vite('resources/js/app.js')
  </body>
</html>
