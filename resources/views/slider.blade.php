<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Slider</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="flex items-center justify-center h-screen bg-gray-900 text-white">

    <div class="w-3/4 relative" id="sliderContainer">
        <div id="slider">
            @foreach($media as $index => $item)
                @if($item->type == 'image')
                    <img class="slide w-full h-96 object-cover hidden" src="{{ asset($item->file_path) }}" alt="{{ $item->title }}">
                @else
                    <video autoplay loop class="slide w-full h-96 hidden" controls>
                        <source src="{{ asset($item->file_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endif
            @endforeach
        </div>

        <!-- Controls -->
        <button onclick="prevSlide()" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-gray-800 p-2">⬅️</button>
        <button onclick="nextSlide()" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gray-800 p-2">➡️</button>
        <button onclick="toggleFullscreen()" class="absolute bottom-4 right-4 bg-gray-800 p-2">🔍 Fullscreen</button>
    </div>

    <script>
        let slides = document.querySelectorAll('.slide');
        let currentIndex = 0;
        let intervalTime = {{ $settings->slider_interval }}; // Database-driven interval
        let slideInterval;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.add('hidden'));
            slides[index].classList.remove('hidden');
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(currentIndex);
        }

        function toggleFullscreen() {
            let slider = document.getElementById('sliderContainer');
            if (!document.fullscreenElement) {
                slider.requestFullscreen().catch(err => console.log(err));
            } else {
                document.exitFullscreen();
            }
        }

        function startAutoSlide() {
            slideInterval = setInterval(nextSlide, intervalTime);
        }

        showSlide(currentIndex);
        startAutoSlide();
    </script>

</body>
</html>
