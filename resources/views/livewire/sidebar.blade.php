<div :class="isOpen ? 'w-68' : 'w-0'" class="bg-gray-800 text-white transition-all duration-300 ease-in-out overflow-hidden shadow-lg">
    <div class="border-b border-gray-700 font-semibold text-center py-7">
        <h1 class="font-bold">{{ $schoolName }}</h1> <!-- Menampilkan Nama Sekolah -->
    </div>
        
    <!-- Navigation Links -->
    <nav>
        <ul class="space-y-2 px-4 py-4">
            <!-- Dashboard Menu -->
            <li>
                <a href="{{ route('dashboard') }}" 
                    wire:current.class="bg-gray-600"
                    wire:navigate prefetch
                    @click="activeMenu = 'dashboard'"
                    class="flex items-center p-2 text-base font-normal  rounded-lg transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="size-7"><path fill="currentColor" fill-opacity="0.3" d="M5 14.059c0-1.01 0-1.514.222-1.945.221-.43.632-.724 1.453-1.31l4.163-2.974c.56-.4.842-.601 1.162-.601.32 0 .601.2 1.162.601l4.163 2.974c.821.586 1.232.88 1.453 1.31.222.43.222.935.222 1.945V19c0 .943 0 1.414-.293 1.707C18.414 21 17.943 21 17 21H7c-.943 0-1.414 0-1.707-.293C5 20.414 5 19.943 5 19v-4.94Z"></path><path fill="currentColor" d="M3 12.387c0 .267 0 .4.084.441.084.041.19-.04.4-.204l7.288-5.669c.59-.459.885-.688 1.228-.688.343 0 .638.23 1.228.688l7.288 5.669c.21.163.316.245.4.204.084-.04.084-.174.084-.441v-.409c0-.48 0-.72-.102-.928-.101-.208-.291-.355-.67-.65l-7-5.445c-.59-.459-.885-.688-1.228-.688-.343 0-.638.23-1.228.688l-7 5.445c-.379.295-.569.442-.67.65-.102.208-.102.448-.102.928v.409Z"></path><path fill="currentColor" d="M11.5 15.5h1A1.5 1.5 0 0 1 14 17v3.5h-4V17a1.5 1.5 0 0 1 1.5-1.5Z"></path><path fill="currentColor" d="M17.5 5h-1a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5Z"></path></svg>
                    <span :class="isOpen ? 'ml-3' : 'hidden'">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" 
                    wire:current.class="bg-gray-600"
                    wire:navigate prefetch
                    @click="activeMenu = 'dashboard'"
                    class="flex items-center p-2 text-base font-normal  rounded-lg transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" class="size-7"><path fill="currentColor" fill-opacity="0.8" d="M20 3.5H5.5c-.31 0-.61.15-.8.4l-1.5 2c-.49.66-.02 1.6.8 1.6h14.5c.31 0 .61-.15.8-.4l1.5-2c.49-.66.02-1.6-.8-1.6Z"></path><path fill="currentColor" d="M4 10h14.5c.31 0 .61.15.8.4l1.5 2c.49.66.02 1.6-.8 1.6H5.5c-.31 0-.61-.15-.8-.4l-1.5-2c-.49-.66-.02-1.6.8-1.6Z" fill-opacity="0.4"></path><path fill="currentColor" fill-opacity="0.8" d="M20 16.5H5.5c-.31 0-.61.15-.8.4l-1.5 2c-.49.66-.02 1.6.8 1.6h14.5c.31 0 .61-.15.8-.4l1.5-2c.49-.66.02-1.6-.8-1.6Z"></path></svg>
                    <span :class="isOpen ? 'ml-3' : 'hidden'">Artikel</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" 
                    wire:current.class="bg-gray-600"
                    wire:navigate prefetch
                    @click="activeMenu = 'dashboard'"
                    class="flex items-center p-2 text-base font-normal  rounded-lg transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" class="size-6"><path fill="currentColor" d="M15 2H9C7.34 2 6 3.34 6 5v14c0 1.66 1.34 3 3 3h6c1.66 0 3-1.34 3-3V5c0-1.66-1.34-3-3-3Z" opacity="0.4"></path><path fill="currentColor" d="M18.67 5.33h-.34c-.12 0-.23 0-.35.01.01.05.02.1.02.16v13c0 .06-.01.11-.02.16.11.01.22.01.35.01h.34c2.66 0 3.33-.67 3.33-3.34V8.67c0-2.67-.67-3.34-3.33-3.34ZM6 18.5v-13c0-.06.01-.11.02-.16-.12-.01-.23-.01-.35-.01h-.34C2.67 5.33 2 6 2 8.67v6.66c0 2.67.67 3.34 3.33 3.34h.34c.12 0 .23 0 .35-.01A.777.777 0 0 1 6 18.5Z"></path></svg>
                    <span :class="isOpen ? 'ml-3' : 'hidden'">Banner</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings') }}" 
                    wire:current.class="bg-gray-600"
                    wire:navigate prefetch
                    @click="activeMenu = 'settings'"
                    class="flex items-center p-2 text-base font-normal rounded-lg transition duration-200">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="size-7"><path fill-opacity="0.3" fill="currentColor" d="M2 12.947v-1.771c0-1.047.85-1.913 1.899-1.913 1.81 0 2.549-1.288 1.64-2.868a1.919 1.919 0 0 1 .699-2.607l1.729-.996c.79-.474 1.81-.192 2.279.603l.11.192c.9 1.58 2.379 1.58 3.288 0l.11-.192c.47-.795 1.49-1.077 2.279-.603l1.73.996a1.92 1.92 0 0 1 .699 2.607c-.91 1.58-.17 2.868 1.639 2.868 1.04 0 1.899.856 1.899 1.912v1.772c0 1.047-.85 1.912-1.9 1.912-1.808 0-2.548 1.288-1.638 2.869.52.915.21 2.083-.7 2.606l-1.729.997c-.79.473-1.81.191-2.279-.604l-.11-.191c-.9-1.58-2.379-1.58-3.288 0l-.11.19c-.47.796-1.49 1.078-2.279.605l-1.73-.997a1.919 1.919 0 0 1-.699-2.606c.91-1.58.17-2.869-1.639-2.869A1.911 1.911 0 0 1 2 12.947Z"></path><path fill="currentColor" d="M11.995 15.332c1.794 0 3.248-1.464 3.248-3.27 0-1.807-1.454-3.272-3.248-3.272-1.794 0-3.248 1.465-3.248 3.271 0 1.807 1.454 3.271 3.248 3.271Z"></path></svg>
                    <span :class="isOpen ? 'ml-3' : 'hidden'">Pengaturan</span>
                </a>
            </li>
        </ul>
    </nav>
</div>