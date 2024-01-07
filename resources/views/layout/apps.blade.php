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
</head>
<body class="bg-gray-50 dark:bg-gray-700">

    <!-- Navbar -->
    <div id="navbar" class="fixed top-0 left-[-270px] bg-white dark:bg-gray-800 overflow-x-hidden transition duration-500 ease-in-out pt-0 dark:text-white w-64 h-full z-10 shadow-2xl">
        <div class="flex items-center pt-6 pb-10 mx-4 px-4 justify-between">
            <a href="" class="font-semibold text-3xl"><span class="">Telat</span><span style="color: #98FF98;">Pedia</span></a>
        </div>

        <div onclick="toggleNavbar()" class="nav-1 flex items-center py-3 mx-4 px-4 rounded-lg transition duration-300 ease-in-out hover:scale-105 cursor-pointer">
            <i class="ri-layout-grid-fill text-2xl dark:text-white"></i>
            <a href="{{ route('dashboard') }}" class="ml-4 text-decoration-none dark:text-white font-semibold">Dashboard</a>
        </div>

        <div class="nav-1 flex items-center py-3 mx-4 px-4 rounded-lg transition duration-300 ease-in-out hover:scale-105" id="navbarToggle">
            <div class="flex w-full items-center" style="color: #4c4c4c;">
                <i class="ri-contacts-book-2-fill text-2xl dark:text-white"></i>
                <span class="text-[15px] ml-4 dark:text-white font-semibold">Data Master</span>
            </div>
        </div>

        @if (Auth::check())
            @if (Auth::user()->role == "admin")
                <!-- Sidebar menu for admin -->
                <div class="text-left text-sm mt-2 w-4/5 mx-auto pl-10" id="submenu">
                    <ul>
                        <li class="nav-1  flex rounded-lg transition duration-300 ease-in-out hover:scale-105 p-3 text-md items-center gap-2">
                            <i class="ri-git-repository-fill text-2xl dark:text-white"></i>
                            <a href="{{ route('data.rombel.page') }}" class= dark:text-white">Data Rombel</a>
                        </li>
                        <li class="nav-1 flex rounded-lg transition duration-300 ease-in-out hover:scale-105 p-3 text-md items-center gap-2">
                            <i class="ri-git-repository-fill text-2xl dark:text-white"></i>
                            <a href="{{ route('data.rayon.page') }}" class= dark:text-white">Data Rayon</a>
                        </li>
                        <li class="nav-1 flex rounded-lg transition duration-300 ease-in-out hover:scale-105 p-3 text-md items-center gap-2">
                            <i class="ri-git-repository-fill text-2xl dark:text-white"></i>
                            <a href="{{ route('data.siswa.page') }}" class= dark:text-white">Data Siswa</a>
                        </li>
                        <li class="nav-1 flex rounded-lg transition duration-300 ease-in-out hover:scale-105 p-3 text-md items-center gap-2">
                            <i class="ri-git-repository-fill text-2xl dark:text-white"></i>
                            <a href="{{ route('data.user.page') }}" class= dark:text-white">Data User</a>
                        </li>
                    </ul>
                </div>

                <div onclick="toggleNavbar()" class="nav-1 flex items-center py-3 mx-4 px-4 rounded-lg transition duration-300 ease-in-out hover:scale-105 cursor-pointer">
                    <i class="ri-bookmark-fill text-2xl dark:text-white"></i>
                    <a href="{{ route('data.keterlambatan.page') }}" class="ml-4 text-decoration-none dark:text-white font-semibold">Data Keterlambatan</a>
                </div>
            @endif

            @if (Auth::user()->role == "ps")
                <!-- Sidebar menu for PS and Admin -->
                <div class="text-left text-sm mt-2 w-4/5 mx-auto pl-10" id="submenu">
                    <ul>
                        <!-- Additional menu items accessible to PS and Admin -->
                        <li class="nav-1 flex rounded-lg transition duration-300 ease-in-out hover:scale-105 p-3 text-md items-center gap-2">
                            <i class="ri-git-repository-fill text-2xl dark:text-white"></i>
                            <a href="{{ route('data.siswa.page') }}" class= "dark:text-white">Data Siswa</a>
                        </li>
                    </ul>
                </div>

                <div onclick="toggleNavbar()" class="nav-1 flex items-center py-3 mx-4 px-4 rounded-lg transition duration-300 ease-in-out hover:scale-105 cursor-pointer">
                    <i class="ri-bookmark-fill text-2xl dark:text-white"></i>
                    <a href="{{ route('data.keterlambatan.page') }}" class="ml-4 text-decoration-none dark:text-white">Data Keterlambatan</a>
                </div>
            @endif

            <!-- Common section for both PS and Admin -->
            <div id="nav-bottom" class="bg-gray-200 absolute w-full bottom-0 p-3 flex items-center justify-between shadow-2xl">
                <div class="justify-start flex items-center">
                    <p class= "font-semibold">{{ Auth::user()->name }}</p>
                </div>
                <div class="justify-end flex items-center">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        <div class="justify-end">
                            <button type="submit" class="dark:bg-gray-600 shadow-2xl p-2 rounded-lg text-white" style="background-color: #4e4e4e;">Logout</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>

    <!-- Toggle Button -->
    <div id="header" class="ml-64 p-5 bg-white dark:bg-gray-100 flex items-center justify-between z-20 shadow-lg">
        <div class="text-right font-semibold">{{ Auth::user()->name }}</div>
        <div class="flex items-center gap-3">
            <div onclick="toggleDarkMode()" class="cursor-pointer text-xl text-gray-600 dark:text-gray-300">
                <i id="darkModeIcon" class="ri-moon-fill" style="color: #98FF98;"></i>
            </div>

            <button id="toggleButton" onclick="toggleNavbar()" class="dark:text-white text-2xl bg-transparent border-none mr-4">☰</button>
        </div>
    </div>

    <!-- Content Section -->
    <div id="content" class="ml-64 p-8">
        @yield('content')
    </div>

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
        }

        body.dark {
            background-color: #090909;
            color: white;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .dark #navbar {
            background-color: #060606;
            color: white;
            box-shadow: 0 4px 6px -1px rgba(169, 169, 169, 0.6), 0 2px 4px -1px rgba(169, 169, 169, 0.1);
        }

        .dark #header {
            background-color: #060606;
            color: white;
            box-shadow: 0 4px 6px -1px rgba(169, 169, 169, 0.2), 0 2px 4px -1px rgba(169, 169, 169, 0.06);
        }

        .dark #nav-bottom {
            background-color: #090909;
            color: white;
            box-shadow: 0 4px 6px -1px rgba(169, 169, 169, 1), 4px 4px 4px 4px rgba(169, 169, 169, 0.5);
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
            background-color: #98FF98;
        }

        .nav-1:hover {
            color: inherit;
        }

        .nav-1:hover::before {
            width: 100%;
            box-shadow: 0 0 10px #98FF98;

    </style>

    <script>
        function toggleNavbar() {
            const navbar = document.getElementById('navbar');
            const content = document.getElementById('content');
            const header = document.getElementById('header');

            if (navbar.style.left === '-270px') {
                // Sidebar sedang tertutup, buka sidebar
                navbar.style.left = '0';
                content.classList.remove('ml-0');
                content.classList.add('ml-64');
                header.classList.remove('ml-0');
                header.classList.add('ml-64');
            } else {
                // Sidebar sedang terbuka, tutup sidebar
                navbar.style.left = '-270px';
                content.classList.remove('ml-64');
                content.classList.add('ml-0');
                header.classList.remove('ml-64');
                header.classList.add('ml-0');
            }
        }

        const navbarToggle = document.getElementById('navbarToggle');
        const submenu = document.getElementById('submenu');

        navbarToggle.addEventListener('click', () => {
            if (submenu.style.display === 'none') {
                submenu.style.display = 'block';
            } else {
                submenu.style.display = 'none';
            }
        });

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
            darkModeIcon.style.color = isDarkMode ? 'yellow' : '#0766AD';
        }

        // Inisialisasi status mode gelap saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            setDarkMode(getDarkModePreference());
            setIconColor(getDarkModePreference());
        });
    </script>

</body>
</html>
