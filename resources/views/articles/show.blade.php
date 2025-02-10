@extends('layouts.app')

@section('content')
<x-header />
<div class="py-6 px-10 bg-white rounded-lg shadow-md mt-[100px]">
    <div class="grid lg:grid-cols-[2fr_1fr] gap-10">
        <div class="">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">{{ $article->title }}</h1>
                <div class="text-slate-400 mt-3"><i class="fa-solid fa-user-alt me-1"></i> Admin <i class="fa-solid fa-clock me-1 ms-2"></i> {{ $article->created_at->diffForHumans() }}</div>
            </div>    
                
                @if ($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                class="mt-4 w-full object-cover rounded-md">
                @endif
                
                <div class="mt-4 text-gray-700">
                    {!! $article->content !!}
                </div>
        </div>
    </div>
</div>
@endsection