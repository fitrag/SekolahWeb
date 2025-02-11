@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<style>
    .owl-dots{
        position: absolute;
        bottom: 10vh;
        background:rgba(255,255,255,.2);
        left:0;
        right:0;
        margin:auto;
        width:20vw;
        display:flex;
        align-items:center;
        justify-content:center;
        padding:10px;
        border-radius:50px;
    }
    .owl-nav{
        height:0;
        width: 0;
        margin-top:0 !important
    }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> -->
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            animateOut: 'fadeOut',
            items: 1, // Show one item at a time
            loop: true, // Infinite loop
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true, // Pause on hover
            navText: [
                "<i class='fas fa-chevron-left text-2xl text-white bg-black/40 p-4 hover:bg-opacity-100 transition absolute lg:top-[35vh] top-[20vh] left-5'></i>", // Left arrow icon
                "<i class='fas fa-chevron-right text-2xl text-white bg-black/40 p-4 hover:bg-opacity-100 transition absolute lg:top-[35vh] top-[20vh] right-5'></i>" // Right arrow icon
            ]
        });
    });
</script>
@endpush

@section('content')
<x-header/>
<div class="owl-carousel owl-theme owl-loaded relative z-0 mt-[65px] border-b-4 border-orange-500" wire:ignore>
    @foreach ($banners as $banner)
    <div class="relative h-100 lg:h-[600px] overflow-hidden shadow-lg">
        <!-- Background Image -->
        <div 
            class="absolute inset-0 bg-cover bg-center" 
            style="background-image: url('{{ asset('storage/' . $banner->image) }}')"
        >
            <!-- Gradient Overlay -->
            @if($banner->title || $banner->description)
                <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black opacity-95"></div>
            @endif
        </div>

        <!-- Content -->
        <div class="absolute inset-0 flex items-center justify-center p-8">
            <div class="text-center text-white">
                <h1 class="lg:text-4xl text-lg font-bold text-shadow-md lg:mx-25">{{ $banner->title }}</h1>
                <p class="mt-4 text-sm lg:text-lg font-medium text-shadow-sm lg:w-1/2 lg:m-auto">{{ $banner->description }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

<x-contact/>
<x-sambutan/>
<x-jurusan/>

<!-- Komponen Artikel -->
<div class="grid lg:grid-cols-[2fr_1fr]">
    <div class="px-4">

        @livewire('articles-homepage-component')
    </div>
</div>

@endsection