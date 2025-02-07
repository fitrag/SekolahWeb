<div class="relative">
    <div class="carousel-container relative overflow-hidden">
        <div class="carousel-wrapper flex transition-transform duration-500" x-data="{ slideIndex: 0, banners: @entangle('banners') }">
            <!-- Loop melalui banners -->
            <template x-for="(banner, index) in banners" :key="banner.id">
                <div :class="index === slideIndex ? 'block' : 'hidden'" class="carousel-item w-full">
                    <div class="relative h-64 bg-cover bg-center" :style="'background-image: url(' + banner.image + ');'">
                        <div class="absolute inset-0 bg-black opacity-40"></div>
                        <div class="absolute inset-0 flex items-center justify-center text-center text-white">
                            <div>
                                <h2 class="text-3xl font-bold" x-text="banner.title"></h2> <!-- Gunakan Alpine.js x-text -->
                                <p class="mt-2" x-text="banner.description"></p> <!-- Gunakan Alpine.js x-text -->
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Navigasi -->
        <button @click="slideIndex = (slideIndex > 0 ? slideIndex - 1 : banners.length - 1)"
                class="absolute top-1/2 left-0 transform -translate-y-1/2 p-4 text-white bg-black bg-opacity-50 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button @click="slideIndex = (slideIndex < banners.length - 1 ? slideIndex + 1 : 0)"
                class="absolute top-1/2 right-0 transform -translate-y-1/2 p-4 text-white bg-black bg-opacity-50 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</div>
