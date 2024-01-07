<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Absen</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-9pBMrDmxDZOu5Bu6eg1w2eGw8A1fXhP7YO05nd2TNsiNXI6cUzEd8w5iK6ZwKlsyoZ/YuizETl/Efgl2U5r+eg==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.7.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.7.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.7.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.icon8.com/vue-uikit/1.0.0/vue-uikit.css">
</head>
<body class="bg-gray-50 dark:bg-gray-700">
    <div id="header" class="p-4 bg-white dark:bg-gray-100 flex items-center justify-between shadow-lg">
        <div class="flex items-center w-full justify-between">
            <button id="toggleButton" onclick="toggleNavbar()" class="dark:text-2xl bg-transparent border-none mr-4">☰</button>
            <p class="font-semibold text-sm">Rekapitulasi <span>Keterlambatan</span></p>
            <div onclick="toggleDarkMode()" class="cursor-pointer text-xl text-gray-600 dark:text-gray-300">
                <i id="darkModeIcon" class="ri-moon-fill" style="color: #98FF98 ;"></i>
            </div>
        </div>
    </div>

    <div class="md:flex lg:flex grid items-center justify-center h-auto p-5 lg:px-10">
        <div id="content" class="bg-transparent grid grid-cols-12 gap-2 max-w-6xl">
            <div class="bg-transparent satu rounded-lg col-span-12 lg:col-span-7">
                <div class="p-5 lg:p-10">
                    <div class="pb-5">
                        <h2 class="text-xl font-semibold">Web <span style="color: #98FF98 ;">Rekapitulasi</span></h2>
                    </div>
                    <div class="">
                        <h1 class="text-4xl lg:text-6xl font-bold">
                            <span class="border-b border-black">Late</span><span class="border-b border-black" style="color: #98FF98 ;">Pedia</span>
                        </h1>
                    </div>
                    <div class="relative rounded-lg mx-auto" style="height: auto; width: 87.5vw; max-width: 600px;">
                        <div class="image-about z-10 rounded-xl relative">
                            <img src="{{ asset('assets/images/auth/mc.png') }}" alt="Chick Image" class="lg:w-85 sm:w-95 h-auto">
                        </div>
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="absolute top-0 left-0 w-full h-full z-1" height="100%">
                            <path fill="#98FF98" d="M42,-73.8C54.9,-65.4,66.1,-55,71,-42.4C75.9,-29.7,74.6,-14.9,70.8,-2.2C67.1,10.5,60.9,21.1,53.9,30.1C46.9,39.1,39.1,46.7,30,53.8C20.9,60.9,10.4,67.6,-2.5,71.9C-15.4,76.2,-30.8,78.1,-43.4,73C-56.1,67.9,-66,55.9,-70.4,42.6C-74.7,29.2,-73.4,14.6,-72.3,0.6C-71.2,-13.4,-70.4,-26.8,-63.7,-36C-57,-45.2,-44.5,-50.3,-32.9,-59.5C-21.3,-68.6,-10.7,-81.8,2,-85.2C14.6,-88.6,29.2,-82.2,42,-73.8Z" transform="translate(100 100)" />
                        </svg>
                    </div>
                </div>
            </div>
            <div id="content" class="bg-transparent rounded-lg col-span-12 lg:col-span-5">
                <div class="p-5 lg:p-10">
                    <div class="lg:py-10 lg:px-3">
                        <div class="p-2 rounded-lg">
                            <div class="text-center">
                                <h1 class="text-4xl lg:text-4xl font-semibold pb-4">Welcome<span class="">!</span></h1>
                                <p class="font-semibold text-gray-700 text-sm lg:text-md md:text-md">Selamat datang di <span class="detail text-black">Absen</span><span style="color: #98FF98;">Qu</span>. Silahkan login terlebih dahulu.</p>
                            </div>
                            <div class="w-auto">
                                <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto my-8">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="email" class="block text-sm font-medium" style="color: #98FF98 ;">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="bg-gray-400 mt-1 p-2 w-full border-b border-gray-300 focus:border-b focus:border-blue-500 outline-none @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="text-red-500 text-sm mt-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="block text-sm font-medium">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="bg-gray-400 mt-1 p-2 w-full border-b border-gray-300 focus:border-b focus:border-blue-500 outline-none @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="text-red-500 text-sm mt-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-0">
                                        <button type="submit" class="w-full p-2 rounded-md text-gray" style="background-color: #98FF98 ;">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


    <style>
        @media (max-width: 768px) {
            #navbar {
                left: 0;
                transition: left 0.3s ease-in-out;
            }

            #content {
                margin-left: 0;
            }

            #header {
                margin-left: 0;
            }

            #nav-bottom {
                margin-left: 0;
            }

            #footer {
                margin-left: 0;
            }

            .detail {
                margin-left: 0;
            }
        }

        body.dark {
            background-color: #090909;
            color: white;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .dark #navbar {
            background-color: #060606;
            color: white;
        }

        .dark #header {
            background-color: #060606;
            color: white;
        }

        .dark .detail {
            color: white;
        }

        .nav-1 {
            position: relative;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .nav-1::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            transition: width 0.3s ease-in-out;
            background-color: #98FF98; /* Pindahkan ini ke sini agar sesuai dengan gaya yang sudah Anda tetapkan */
        }

        .nav-1:hover {
            color: inherit; /* Jangan lupa tambahkan ini agar efek glow tidak mempengaruhi warna teks */
        }

        .nav-1:hover::before {
            width: 100%;
            box-shadow: 0 0 10px rgba(13, 133, 224, 0.7); /* Sesuaikan warna dan ukuran shadow glow */
        }

    </style>

    <script>

        function setDarkMode(isDarkMode) {
            const body = document.body;
            const darkModeIcon = document.getElementById('darkModeIcon');

            // Tetapkan class 'dark' pada body
            body.classList.toggle('dark', isDarkMode);

            // Perbarui ikon berdasarkan status mode gelap
            darkModeIcon.className = isDarkMode ? 'ri-sun-fill' : 'ri-moon-fill';

            // Simpan preferensi pengguna ke localStorage
            localStorage.setItem('darkMode', isDarkMode);
        }

        // Fungsi untuk mengambil status mode gelap dari localStorage
        function getDarkModePreference() {
            return localStorage.getItem('darkMode') === 'true';
        }

        // Fungsi untuk menangani perubahan mode gelap
        function toggleDarkMode() {
            const isDarkModeEnabled = getDarkModePreference();
            setDarkMode(!isDarkModeEnabled);
            setIconColor(!isDarkModeEnabled);
        }

        function setIconColor(isDarkMode) {
            const darkModeIcon = document.getElementById('darkModeIcon');
            darkModeIcon.style.color = isDarkMode ? 'yellow' : '#98FF98';
        }

        // Inisialisasi status mode gelap saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            setDarkMode(getDarkModePreference());
            setIconColor(getDarkModePreference());
        });
    </script>
</html>


