@extends('layouts.app')

@section('content')
<x-header />
<div class="py-6 px-10 bg-white rounded-lg shadow-md mt-[100px]">
    <div class="grid lg:grid-cols-[2fr_1fr] gap-10">
        <div class="">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $article->title }}</h1>
            
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