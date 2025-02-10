<div class="lg:p-6 py-7 bg-white">
    <h2 class="text-2xl font-bold text-gray-800 text-center lg:text-left mb-6 border-b py-4 border-gray-200"><i class="fa-solid fa-newspaper me-2"></i> Berita & Informasi Terbaru</h2>
    @if ($articles->isEmpty())
        <div class="text-center text-gray-500 py-4">
            Belum ada artikel yang tersedia.
        </div>
    @else
        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:gap-6 gap-4">
            @foreach ($articles as $article)
                <div class="group bg-white p-4 rounded-lg shadow-md transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                    <!-- Gambar Artikel -->
                    <div class="relative overflow-hidden rounded-md">
                        @if ($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                                class="w-full h-48 object-cover rounded-md transition-transform duration-300 group-hover:scale-105">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded-md">
                                <span class="text-gray-500">Tidak ada gambar</span>
                            </div>
                        @endif
                    </div>

                    <!-- Judul Artikel -->
                    <h3 class="mt-4 text-lg font-semibold text-indigo-700 group-hover:text-indigo-900 transition-colors duration-300">
                        <a href="{{ route('articles.show', $article->id) }}" wire:navigate.hover>{{ $article->title }}</a>
                    </h3>

                    <!-- Konten Singkat -->
                    <p class="mt-2 text-gray-700 line-clamp-3">
                        {{ strip_tags(Str::limit($article->content, 150)) }}
                    </p>

                    <!-- Tombol Baca Selengkapnya -->
                    <a href="{{ route('articles.show', $article->id) }}" wire:navigate.hover
                        class="inline-flex items-center mt-4 text-indigo-600 hover:text-indigo-800 font-medium transition-colors duration-300">
                        Baca Selengkapnya
                        <svg class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>