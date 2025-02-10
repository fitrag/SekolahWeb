<header x-data="{ menuOpen: false, dropdownOpen: false }" class="bg-white text-dark shadow-md fixed top-0 left-0 right-0 shadow-lg z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-4">
            <!-- Logo -->
            <a href="{{ route('index') }}" wire:navigate.hover class="text-xl font-bold sm:text-2xl">
                @if($setting->logo)
                    <img src="{{ asset('storage/logos/' . $setting->logo) }}" alt="Logo" class="w-full max-w-[200px]">
                @else
                    {{ $setting->school_name }}
                @endif
            </a>

            <!-- Navigation Menu for Desktop -->
            <nav class="hidden md:flex space-x-4">
                <ul class="flex space-x-4 relative">
                    <!-- Static Menu Items -->
                    <li><a href="{{ route('index') }}" wire:navigate.hover class="hover:text-orange-500">Beranda</a></li>
                    <li><a href="" class="hover:text-orange-500">Profil</a></li>
                    <li><a href="" class="hover:text-orange-500">TU</a></li>
                    <li><a href="" class="hover:text-orange-500">Humas</a></li>
                    <!-- Dropdown Menu -->
                    <li x-data="{ isOpen: false }" class="relative">
                        <button 
                            @click="isOpen = !isOpen" 
                            @click.away="isOpen = false" 
                            class="hover:text-orange-500 flex items-center focus:outline-none"
                        >
                            Jurusan
                            <svg 
                                class="ml-1 w-4 h-4 transition-transform duration-300 transform" 
                                :class="{'rotate-180': isOpen}" 
                                xmlns="http://www.w3.org/2000/svg" 
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Dropdown Content -->
                        <ul 
                            x-show="isOpen" 
                            x-transition:enter="transition ease-out duration-200" 
                            x-transition:enter-start="opacity-0 scale-95" 
                            x-transition:enter-end="opacity-100 scale-100" 
                            x-transition:leave="transition ease-in duration-150" 
                            x-transition:leave-start="opacity-100 scale-100" 
                            x-transition:leave-end="opacity-0 scale-95" 
                            class="absolute top-full right-0 mt-2 bg-white shadow-lg rounded-lg py-2 w-64"
                        >
                            <li><a href="#" class="block px-4 py-2 hover:bg-orange-500 hover:text-white">Rekayasa Perangkat Lunak (RPL)</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-orange-500 hover:text-white">Teknik Bisnis Sepeda Motor (TBSM)</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-orange-500 hover:text-white">Desain Komunikasi Visual (DKV)</a></li>
                        </ul>
                    </li>
                    <li><a href="" class="hover:text-orange-500">Galeri</a></li>
                    <li><a href="" class="hover:text-orange-500">Prestasi</a></li>
                </ul>
            </nav>

            <!-- Hamburger Menu for Mobile -->
            <div class="md:hidden">
                <button 
                    @click="menuOpen = !menuOpen" 
                    class="text-gray-700 hover:text-orange-500 focus:outline-none"
                >
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        class="h-6 w-6" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div 
                x-show="menuOpen" 
                @click.away="menuOpen = false" 
                class="absolute top-full left-0 right-0 bg-white shadow-lg py-4 px-6 mt-1 md:hidden"
            >
                <ul class="space-y-2">
                    <li><a href="" class="block hover:text-orange-500">Beranda</a></li>
                    <li><a href="" class="block hover:text-orange-500">Profil</a></li>
                    <li><a href="" class="block hover:text-orange-500">TU</a></li>
                    <li><a href="" class="block hover:text-orange-500">Humas</a></li>
                    <li>
                        <button 
                            @click="dropdownOpen = !dropdownOpen" 
                            class="w-full text-left hover:text-orange-500 flex items-center justify-between"
                        >
                            Jurusan
                            <svg 
                                class="w-4 h-4 transition-transform duration-300 transform" 
                                :class="{'rotate-180': dropdownOpen}" 
                                xmlns="http://www.w3.org/2000/svg" 
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul 
                            x-show="dropdownOpen" 
                            class="pl-4 mt-2 space-y-2"
                        >
                            <li><a href="#" class="block hover:text-orange-500">Rekayasa Perangkat Lunak (RPL)</a></li>
                            <li><a href="#" class="block hover:text-orange-500">Teknik Bisnis Sepeda Motor (TBSM)</a></li>
                            <li><a href="#" class="block hover:text-orange-500">Desain Komunikasi Visual (DKV)</a></li>
                        </ul>
                    </li>
                    <li><a href="" class="block hover:text-orange-500">Galeri</a></li>
                    <li><a href="" class="block hover:text-orange-500">Prestasi</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>