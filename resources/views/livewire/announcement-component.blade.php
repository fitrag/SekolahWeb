<div>
    <h1 class="text-2xl font-bold mb-4">Pengumuman</h1>
    <div class="space-y-4">
        @foreach ($announcements as $announcement)
            <div class="p-4 bg-white shadow rounded">
                <h2 class="font-semibold">{{ $announcement['title'] }}</h2>
                <p class="text-gray-600">{{ $announcement['content'] }}</p>
            </div>
        @endforeach
    </div>
</div>