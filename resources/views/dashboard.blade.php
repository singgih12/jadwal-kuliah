<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Jadwal Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold tracking-wide flex items-center gap-2">
                <i class="fa-solid fa-calendar-days text-white text-2xl"></i> Jadwal Kuliah
            </h1>
            <div class="flex items-center gap-4">
                <span class="bg-white/20 px-3 py-1 rounded-full text-sm">
                    👤 {{ auth()->user()->name }}
                </span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-10">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6">📌 Dashboard</h2>

        <!-- Cards Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Jadwal -->
            <a href="/jadwal"
               class="bg-white shadow-md rounded-2xl p-6 hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col items-center">
                <i class="fa-solid fa-calendar-check text-blue-600 text-4xl mb-3"></i>
                <h3 class="text-lg font-semibold mb-2">Lihat Jadwal</h3>
                <p class="text-gray-600 text-sm">Total: <strong>{{ $jumlahJadwal }}</strong> jadwal</p>
            </a>

            <!-- Kelas -->
            <a href="/kelas"
               class="bg-white shadow-md rounded-2xl p-6 hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col items-center">
                <i class="fa-solid fa-school text-green-500 text-4xl mb-3"></i>
                <h3 class="text-lg font-semibold mb-2">Kelola Kelas</h3>
                <p class="text-gray-600 text-sm">Total: <strong>{{ $jumlahKelas }}</strong> kelas</p>
            </a>

            <!-- Dosen -->
            <a href="/dosen"
               class="bg-white shadow-md rounded-2xl p-6 hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col items-center">
                <i class="fa-solid fa-user-tie text-purple-600 text-4xl mb-3"></i>
                <h3 class="text-lg font-semibold mb-2">Kelola Dosen</h3>
                <p class="text-gray-600 text-sm">Total: <strong>{{ $jumlahDosen }}</strong> dosen</p>
            </a>

            <!-- Mata Kuliah -->
            <a href="{{ route('mata_kuliah.index') }}"
               class="bg-white shadow-md rounded-2xl p-6 hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col items-center">
                <i class="fa-solid fa-book text-orange-500 text-4xl mb-3"></i>
                <h3 class="text-lg font-semibold mb-2">Mata Kuliah</h3>
                <p class="text-gray-600 text-sm">Total: <strong>{{ $jumlahMatkul }}</strong> matkul</p>
            </a>
        </div>

        <!-- Export PDF Section -->
        <div class="mt-10">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">📄 Export Jadwal ke PDF</h3>
            <p class="text-gray-600 text-sm mb-5">Pilih hari yang ingin kamu export:</p>

            @php
                $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach ($hariList as $hari)
                    <a href="{{ route('jadwal.exportPdf', $hari) }}"
                       class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-medium rounded-xl shadow-lg p-5 flex flex-col items-center hover:from-blue-600 hover:to-indigo-600 hover:shadow-2xl hover:-translate-y-1 transition duration-300">
                        <i class="fa-solid fa-file-pdf text-3xl mb-2"></i>
                        <span>Export {{ $hari }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </main>
</body>
</html>
