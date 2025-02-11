<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-4">
        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Kolom 1: Logo & Deskripsi -->
            <div class="col-span-1">
                <h2 class="text-xl font-bold text-orange-500 mb-4">SMKN 1 Way Pengubuan</h2>
                <p class="text-gray-400 text-sm">
                    SMKN 1 Way Pengubuan adalah sekolah kejuruan terkemuka yang berfokus pada pengembangan keterampilan siswa di berbagai bidang industri.
                </p>
                <div class="mt-6 flex space-x-4">
                    <!-- Media Sosial -->
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Kolom 2: Navigasi -->
            <div class="col-span-1">
                <h3 class="text-lg font-semibold text-gray-300 mb-4">Navigasi</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#" class="hover:text-white transition duration-300">Beranda</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Jurusan</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Guru</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Artikel</a></li>
                    <li><a href="#" class="hover:text-white transition duration-300">Kontak</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Kontak -->
            <div class="col-span-1">
                <h3 class="text-lg font-semibold text-gray-300 mb-4">Kontak Kami</h3>
                <p class="text-gray-400 text-sm">
                    <i class="fas fa-map-marker-alt mr-2"></i> Jl. Raya Way Pengubuan No. 123, Lampung
                </p>
                <p class="text-gray-400 text-sm">
                    <i class="fas fa-phone-alt mr-2"></i> +62 123 456 789
                </p>
                <p class="text-gray-400 text-sm">
                    <i class="fas fa-envelope mr-2"></i> info@smkn1waypengubuan.sch.id
                </p>
            </div>

            <!-- Kolom 4: Newsletter -->
            <div class="col-span-1">
                <h3 class="text-lg font-semibold text-gray-300 mb-4">Langganan Berita</h3>
                <p class="text-gray-400 text-sm mb-4">
                    Daftarkan email Anda untuk mendapatkan informasi terbaru dari kami.
                </p>
                <form class="flex">
                    <input type="email" placeholder="Masukkan email Anda"
                        class="w-full px-4 py-2 rounded-l-md bg-gray-800 text-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500">
                    <button type="submit"
                        class="px-4 py-2 bg-orange-500 text-white rounded-r-md hover:bg-orange-600 transition duration-300">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Garis Pemisah -->
        <hr class="border-gray-700 my-8">

        <!-- Hak Cipta -->
        <div class="text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} SMKN 1 Way Pengubuan. All rights reserved.
        </div>
    </div>
</footer>