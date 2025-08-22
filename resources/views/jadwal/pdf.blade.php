<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kuliah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* mirip bg-light */
            margin: 0; 
            padding: 40px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: center;
            vertical-align: middle;
        }

        thead th {
            background-color: #e9ecef;
            font-weight: 600;
        }

        .fw-semibold {
            font-weight: 600;
        }

        .fw-medium {
            font-weight: 500;
        }

        /* Stripe effect */
        tbody tr:nth-child(even) {
            background-color: #f1f3f5;
        }

        @media print {
    thead { display: table-header-group; } /* header selalu di atas halaman */
}
    </style>
</head>
<body>

    <h1>Jadwal Kuliah</h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Kelas</th>
                    <th>Jam</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
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
                                    <td rowspan="{{ $totalHari }}" class="fw-semibold">
                                        {{ $hari }}
                                    </td>
                                    @php $firstHari = false; @endphp
                                @endif

                                {{-- Kolom Kelas (merge) --}}
                                @if ($firstKelas)
                                    <td rowspan="{{ $totalKelas }}" class="fw-medium">
                                        {{ $kelas }}
                                    </td>
                                    @php $firstKelas = false; @endphp
                                @endif

                                {{-- Detail jadwal --}}
                                <td>{{ $j['jam'] }}</td>
                                <td>{{ $j['matkul'] }}</td>
                                <td>{{ $j['dosen'] }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
