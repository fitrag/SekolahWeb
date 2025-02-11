@extends('layouts.app')

@section('content')
<x-header />
<div class="py-6 px-10 bg-white mt-[100px]">
    <!-- Breadcrumb -->
    <nav class="mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-sm text-gray-500">
            <li>
                <a href="{{ route('index') }}" class="hover:text-orange-600 transition duration-300">
                    Beranda
                </a>
            </li>
            <li>
                <span class="mx-2">/</span>
            </li>
            <li>
                <a href="{{ route('articles') }}" class="hover:text-orange-600 transition duration-300">
                    Artikel
                </a>
            </li>
            <li>
                <span class="mx-2">/</span>
            </li>
            <li class="text-gray-800 font-medium">
                {{ Str::limit($article->title, 150) }}
            </li>
        </ol>
    </nav>

    <!-- Konten Utama -->
    <div class="grid lg:grid-cols-[2fr_1fr] gap-10 mb-10">
        <!-- Kolom Kiri: Detail Artikel -->
        <div class="">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">{{ $article->title }}</h1>
                <div class="text-slate-400 mt-3">
                    <i class="fa-solid fa-user-alt me-1"></i> Admin 
                    <i class="fa-solid fa-clock me-1 ms-2"></i> {{ $article->created_at->diffForHumans() }}
                </div>
            </div>    
                
            @if ($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                    class="mt-4 w-full object-cover rounded-md">
            @endif
                
            <div class="mt-4 text-gray-700">
                {!! $article->content !!}
            </div>

            <!-- Bagian Komentar -->
            <div class="mt-8">
                

                <!-- Formulir Tambah Komentar -->
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Tambah Komentar</h3>
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="mb-4">
                            <label for="body" class="block text-sm font-medium text-gray-700">Komentar</label>
                            <textarea id="body" name="body" rows="3"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 placeholder-gray-400"
                                placeholder="Tulis komentar Anda..."></textarea>
                            @error('body')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-orange-600 text-white text-sm font-medium rounded-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition duration-300 ease-in-out">
                            Kirim Komentar
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Artikel Terkait -->
        <div class="hidden lg:block">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Artikel Terkait</h3>
            <ul class="space-y-4">
                @foreach ($relatedArticles as $relatedArticle)
                    <li>
                        <a href="{{ route('articles.show', $relatedArticle->id) }}" wire:navigate.hover
                            class="block hover:text-orange-600 transition duration-300">
                            <div class="flex items-center space-x-3">
                                <!-- Gambar Thumbnail (Opsional) -->
                                @if ($relatedArticle->image)
                                    <img src="{{ asset('storage/' . $relatedArticle->image) }}" alt="{{ $relatedArticle->title }}"
                                        class="w-16 h-16 object-cover rounded-md">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 flex items-center justify-center rounded-md">
                                        <span class="text-gray-500">Tidak ada gambar</span>
                                    </div>
                                @endif
                                <!-- Judul Artikel -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-800 line-clamp-2">
                                        {{ $relatedArticle->title }}
                                    </h4>
                                    <p class="text-xs text-gray-500">{{ $relatedArticle->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection