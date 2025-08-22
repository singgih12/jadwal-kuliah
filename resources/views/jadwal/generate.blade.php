<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kuliah</title>
    <!-- Tambahkan Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">📅 Jadwal Kuliah</h1>

        <table class="table-auto w-full border-collapse border">
            <thead class="bg-gray-400">
                <tr>
                    <th class="border px-3 py-2">Hari</th>
                    <th class="border px-3 py-2">Kelas</th>
                    <th class="border px-3 py-2">Jam</th>
                    <th class="border px-3 py-2">Mata Kuliah</th>
                    <th class="border px-3 py-2">Dosen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $hari => $kelasList)
                    @php
                        $totalHari = collect($kelasList)->flatten(1)->count();
                        $firstHari = true;
                    @endphp

                    @foreach ($kelasList as $kelas => $items)
                        @php
                            $totalKelas = count($items);
                            $firstKelas = true;
                        @endphp

                        @foreach ($items as $i => $j)
                            <tr>
                                {{-- Kolom Hari (merge) --}}
                                @if ($firstHari && $loop->first)
                                    <td class="border px-3 py-2 text-center font-semibold" rowspan="{{ $totalHari }}">
                                        {{ $hari }}
                                    </td>
                                    @php $firstHari = false; @endphp
                                @endif

                                {{-- Kolom Kelas (merge) --}}
                                @if ($firstKelas)
                                    <td class="border px-3 py-2 text-center font-medium" rowspan="{{ $totalKelas }}">
                                        {{ $kelas }}
                                    </td>
                                    @php $firstKelas = false; @endphp
                                @endif

                                {{-- Detail jadwal --}}
                                <td class="border px-3 py-2">{{ $j['jam'] }}</td>
                                <td class="border px-3 py-2">{{ $j['matkul'] }}</td>
                                <td class="border px-3 py-2">{{ $j['dosen'] }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
