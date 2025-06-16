<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrossel com Login</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Swiper.js CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Swiper.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body class="bg-gray-900 text-white h-screen overflow-hidden">

    <!-- Carrossel -->
    <div class="swiper mySwiper h-[calc(100vh-80px)]">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="./images/banner-01.jpg" class="w-full h-full object-cover" />
            </div>
            <div class="swiper-slide">
                <img src="./images/banner-02.jpg" class="w-full h-full object-cover" />
            </div>
            <div class="swiper-slide">
                <img src="./images/banner-03.jpg" class="w-full h-full object-cover" />
            </div>
        </div>
    </div>

    <!-- Botão fixo -->
    <div class="fixed bottom-0 w-full p-4 bg-black bg-opacity-70 text-center z-50">
        <button
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full text-lg shadow-lg w-full"
            onclick="window.location.href='./admin'">
            Entrar no Sistema
        </button>
    </div>

    <!-- Swiper Init -->
    <script>
        const swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
        });
    </script>
</body>

</html>
