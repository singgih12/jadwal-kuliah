<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Jadwal Akademik</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary: #2f29a0ff;
            --primary-dark: #4338ca;
            --secondary: #f43f5e;
            --dark: #1e293b;
            --light: #f8fafc;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            transition: all 0.3s ease;
        }

        .dark body {
            background-color: var(--dark);
            color: var(--light);
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .dark .card {
            background: #334155;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--primary);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .hero-image {
            height: 400px;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/eabbf689-3f6c-4d7e-ac04-4495e4eb8ada.png');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dark .hero-image {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://placehold.co/1920x1080');
        }
    </style>

<!-- yield css -->
    @yield('css')
</head>
<body class="min-h-screen flex flex-col">
    <div class="hero-image">
        <div class="text-center text-white">
            <h1 class="text-5xl font-bold mb-4">Manajemen Jadwal Akademik</h1>
            <p class="text-xl opacity-90">Kelola jadwal dan sumber daya universitas Anda secara efisien</p>
        </div>
    </div>

    <header class="bg-white shadow-sm sticky top-0 z-10 dark:bg-slate-800">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div>
                <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/8aa93b2c-1518-47ed-8d35-dba454f091a6.png" alt="Logo Universitas" class="h-10 w-10">
            </div>
            <nav class="hidden md:flex space-x-8">
                        <a href="{{ route('jadwal.index') }}" class="nav-link text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 font-semibold">Jadwal</a>
                <a href="{{ route('dosen.index') }}" class="nav-link text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 font-semibold">Dosen</a>
                <a href="{{ route('mata_kuliah.index') }}" class="nav-link text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 font-semibold">Mata Kuliah</a>
                <a href="{{ route('kelas.index') }}" class="nav-link text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 font-semibold">Kelas</a>
                <a href="{{ route('dashboard') }}" class="nav-link text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 font-semibold">Dashboard</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-sm">
                        Logout
                    </button>
                </form>
            </nav>

            <div class="flex items-center space-x-4">
                <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700">
                    <span id="theme-icon" class="text-gray-700 dark:text-gray-300">☀️</span>
                </button>
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-slate-800 shadow-md">
            <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('jadwal.index') }}" class="nav-link font-medium text-white hover:text-blue-400">Jadwal</a>
                    <a href="{{ route('dosen.index') }}" class="nav-link font-medium text-white hover:text-green-400">Dosen</a>
                    <a href="{{ route('mata_kuliah.index') }}" class="nav-link font-medium text-white hover:text-purple-400">Mata Kuliah</a>
                    <a href="{{ route('kelas.index') }}" class="nav-link font-medium text-white hover:text-pink-400">Kelas</a>
            </nav>
        </div>
    </header>

    @yield('content')

    <!-- Konten lainnya akan diterjemahkan dengan cara yang sama jika kamu lanjutkan -->

</body>
</html>
