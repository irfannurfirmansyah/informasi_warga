@extends('layouts.app') 

@section('content')
    <h1>Data Rumah</h1>
    <p>Ini adalah Halaman Data Rumah.</p>

    <!-- Filter Options -->
    <div>
        <span style="cursor: pointer;" onclick="filterTable('A')">Block A</span> |
        <span style="cursor: pointer;" onclick="filterTable('D')">Block D</span> |
        <span style="cursor: pointer;" onclick="filterTable('Warga')">Warga</span> |
        <span style="cursor: pointer;" onclick="filterTable('Ngontrak')">Ngontrak</span> |
        <span style="cursor: pointer;" onclick="resetFilter()">Reset Filter</span>
    </div>

    <div style="max-height: 400px; overflow-y: scroll;">
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
            <thead style="position: sticky; top: 0; background-color: white; z-index: 10;">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah Penghuni</th>
                    <th>Alamat Rumah</th>
                    <th>Keterangan Rumah</th>
                </tr>
            </thead>
            <tbody id="dataBody">
                @php
                    $dataRumah = [
                        ['nama' => 'Agus', 'jumlahPenghuni' => 2, 'alamat' => 'A1', 'noRumah' => 34, 'status' => 'Warga'],
                        ['nama' => 'Budi', 'jumlahPenghuni' => 3, 'alamat' => 'A2', 'noRumah' => 12, 'status' => 'Warga'],
                        ['nama' => 'Citra', 'jumlahPenghuni' => 1, 'alamat' => 'A3', 'noRumah' => 27, 'status' => 'Ngontrak'],
                        ['nama' => 'Dewi', 'jumlahPenghuni' => 4, 'alamat' => 'D1', 'noRumah' => 45, 'status' => 'Warga'],
                        ['nama' => 'Eko', 'jumlahPenghuni' => 5, 'alamat' => 'A4', 'noRumah' => 19, 'status' => 'Warga'],
                        ['nama' => 'Fajar', 'jumlahPenghuni' => 2, 'alamat' => 'D2', 'noRumah' => 3, 'status' => 'Warga'],
                        ['nama' => 'Gita', 'jumlahPenghuni' => 3, 'alamat' => 'A5', 'noRumah' => 28, 'status' => 'Ngontrak'],
                        ['nama' => 'Hendra', 'jumlahPenghuni' => 4, 'alamat' => 'A6', 'noRumah' => 40, 'status' => 'Warga'],
                        ['nama' => 'Indra', 'jumlahPenghuni' => 2, 'alamat' => 'A7', 'noRumah' => 5, 'status' => 'Warga'],
                        ['nama' => 'Jokowi', 'jumlahPenghuni' => 1, 'alamat' => 'A8', 'noRumah' => 21, 'status' => 'Ngontrak'],
                        ['nama' => 'Kirana', 'jumlahPenghuni' => 5, 'alamat' => 'A1', 'noRumah' => 50, 'status' => 'Warga'],
                        ['nama' => 'Lestari', 'jumlahPenghuni' => 3, 'alamat' => 'A2', 'noRumah' => 37, 'status' => 'Warga'],
                        ['nama' => 'Mira', 'jumlahPenghuni' => 4, 'alamat' => 'A3', 'noRumah' => 8, 'status' => 'Ngontrak'],
                        ['nama' => 'Nina', 'jumlahPenghuni' => 2, 'alamat' => 'D4', 'noRumah' => 14, 'status' => 'Warga'],
                        ['nama' => 'Omar', 'jumlahPenghuni' => 1, 'alamat' => 'A2', 'noRumah' => 44, 'status' => 'Ngontrak'],
                        ['nama' => 'Putra', 'jumlahPenghuni' => 2, 'alamat' => 'A3', 'noRumah' => 23, 'status' => 'Warga'],
                        ['nama' => 'Qory', 'jumlahPenghuni' => 3, 'alamat' => 'A4', 'noRumah' => 6, 'status' => 'Warga'],
                        ['nama' => 'Rian', 'jumlahPenghuni' => 4, 'alamat' => 'A5', 'noRumah' => 39, 'status' => 'Ngontrak'],
                        ['nama' => 'Sari', 'jumlahPenghuni' => 5, 'alamat' => 'A6', 'noRumah' => 10, 'status' => 'Warga'],
                        ['nama' => 'Taufik', 'jumlahPenghuni' => 1, 'alamat' => 'A7', 'noRumah' => 30, 'status' => 'Warga'],
                        ['nama' => 'Umar', 'jumlahPenghuni' => 2, 'alamat' => 'A8', 'noRumah' => 49, 'status' => 'Ngontrak'],
                        ['nama' => 'Vina', 'jumlahPenghuni' => 3, 'alamat' => 'D1', 'noRumah' => 15, 'status' => 'Warga'],
                        ['nama' => 'Wawan', 'jumlahPenghuni' => 5, 'alamat' => 'A2', 'noRumah' => 4, 'status' => 'Warga'],
                        ['nama' => 'Xenia', 'jumlahPenghuni' => 2, 'alamat' => 'A3', 'noRumah' => 29, 'status' => 'Ngontrak'],
                        ['nama' => 'Yuda', 'jumlahPenghuni' => 1, 'alamat' => 'A4', 'noRumah' => 20, 'status' => 'Warga'],
                        ['nama' => 'Zaki', 'jumlahPenghuni' => 4, 'alamat' => 'D2', 'noRumah' => 2, 'status' => 'Warga'],
                        ['nama' => 'Anton', 'jumlahPenghuni' => 5, 'alamat' => 'A5', 'noRumah' => 33, 'status' => 'Ngontrak'],
                        ['nama' => 'Beny', 'jumlahPenghuni' => 2, 'alamat' => 'A6', 'noRumah' => 25, 'status' => 'Warga'],
                        ['nama' => 'Cindy', 'jumlahPenghuni' => 3, 'alamat' => 'A7', 'noRumah' => 16, 'status' => 'Warga'],
                        ['nama' => 'Dimas', 'jumlahPenghuni' => 4, 'alamat' => 'A8', 'noRumah' => 1, 'status' => 'Ngontrak'],
                        ['nama' => 'Elisa', 'jumlahPenghuni' => 5, 'alamat' => 'A1', 'noRumah' => 41, 'status' => 'Warga'],
                        ['nama' => 'Farah', 'jumlahPenghuni' => 1, 'alamat' => 'D1', 'noRumah' => 11, 'status' => 'Warga'],
                        ['nama' => 'Galuh', 'jumlahPenghuni' => 2, 'alamat' => 'D2', 'noRumah' => 46, 'status' => 'Ngontrak'],
                        ['nama' => 'Halim', 'jumlahPenghuni' => 3, 'alamat' => 'D3', 'noRumah' => 32, 'status' => 'Warga'],
                        ['nama' => 'Irfan', 'jumlahPenghuni' => 4, 'alamat' => 'A4', 'noRumah' => 22, 'status' => 'Warga'],
                        ['nama' => 'Jihan', 'jumlahPenghuni' => 5, 'alamat' => 'A5', 'noRumah' => 36, 'status' => 'Ngontrak'],
                        ['nama' => 'Kevin', 'jumlahPenghuni' => 1, 'alamat' => 'A6', 'noRumah' => 24, 'status' => 'Warga'],
                        ['nama' => 'Lina', 'jumlahPenghuni' => 2, 'alamat' => 'A7', 'noRumah' => 7, 'status' => 'Warga'],
                        ['nama' => 'Maya', 'jumlahPenghuni' => 3, 'alamat' => 'A8', 'noRumah' => 47, 'status' => 'Ngontrak'],
                        ['nama' => 'Nanda', 'jumlahPenghuni' => 4, 'alamat' => 'D1', 'noRumah' => 9, 'status' => 'Warga'],
                        ['nama' => 'Oki', 'jumlahPenghuni' => 5, 'alamat' => 'A1', 'noRumah' => 42, 'status' => 'Warga'],
                        ['nama' => 'Pram', 'jumlahPenghuni' => 1, 'alamat' => 'A2', 'noRumah' => 38, 'status' => 'Ngontrak'],
                        ['nama' => 'Qisya', 'jumlahPenghuni' => 2, 'alamat' => 'A3', 'noRumah' => 13, 'status' => 'Warga'],
                        ['nama' => 'Ravi', 'jumlahPenghuni' => 3, 'alamat' => 'A4', 'noRumah' => 31, 'status' => 'Warga'],
                        ['nama' => 'Sinta', 'jumlahPenghuni' => 4, 'alamat' => 'A5', 'noRumah' => 18, 'status' => 'Ngontrak'],
                        ['nama' => 'Tina', 'jumlahPenghuni' => 5, 'alamat' => 'A6', 'noRumah' => 35, 'status' => 'Warga'],
                        ['nama' => 'Uli', 'jumlahPenghuni' => 1, 'alamat' => 'A7', 'noRumah' => 17, 'status' => 'Warga'],
                        ['nama' => 'Vivi', 'jumlahPenghuni' => 2, 'alamat' => 'A8', 'noRumah' => 26, 'status' => 'Ngontrak'],
                        ['nama' => 'Wira', 'jumlahPenghuni' => 3, 'alamat' => 'D1', 'noRumah' => 8, 'status' => 'Warga'],
                        ['nama' => 'Xena', 'jumlahPenghuni' => 4, 'alamat' => 'D2', 'noRumah' => 45, 'status' => 'Warga'],
                        ['nama' => 'Yani', 'jumlahPenghuni' => 5, 'alamat' => 'D3', 'noRumah' => 3, 'status' => 'Ngontrak'],
                        ['nama' => 'Zara', 'jumlahPenghuni' => 1, 'alamat' => 'D4', 'noRumah' => 30, 'status' => 'Warga'],
                        ['nama' => 'Aditya', 'jumlahPenghuni' => 2, 'alamat' => 'D1', 'noRumah' => 52, 'status' => 'Warga'],
                        ['nama' => 'Bella', 'jumlahPenghuni' => 3, 'alamat' => 'D2', 'noRumah' => 53, 'status' => 'Ngontrak'],
                        ['nama' => 'Cesar', 'jumlahPenghuni' => 4, 'alamat' => 'D3', 'noRumah' => 54, 'status' => 'Warga'],
                        ['nama' => 'Diana', 'jumlahPenghuni' => 5, 'alamat' => 'D4', 'noRumah' => 55, 'status' => 'Warga'],
                        ['nama' => 'Evan', 'jumlahPenghuni' => 1, 'alamat' => 'D1', 'noRumah' => 56, 'status' => 'Ngontrak'],
                        ['nama' => 'Fahmi', 'jumlahPenghuni' => 2, 'alamat' => 'D2', 'noRumah' => 57, 'status' => 'Warga'],
                        ['nama' => 'Gerry', 'jumlahPenghuni' => 3, 'alamat' => 'D3', 'noRumah' => 58, 'status' => 'Warga'],
                        ['nama' => 'Hilda', 'jumlahPenghuni' => 4, 'alamat' => 'D4', 'noRumah' => 59, 'status' => 'Ngontrak'],
                        ['nama' => 'Ilham', 'jumlahPenghuni' => 5, 'alamat' => 'D1', 'noRumah' => 60, 'status' => 'Warga'],
                        ['nama' => 'Jasmine', 'jumlahPenghuni' => 1, 'alamat' => 'D2', 'noRumah' => 61, 'status' => 'Warga'],
                        ['nama' => 'Kevin', 'jumlahPenghuni' => 2, 'alamat' => 'D3', 'noRumah' => 62, 'status' => 'Ngontrak'],
                        ['nama' => 'Laila', 'jumlahPenghuni' => 3, 'alamat' => 'D4', 'noRumah' => 63, 'status' => 'Warga'],
                        ['nama' => 'Milan', 'jumlahPenghuni' => 4, 'alamat' => 'D1', 'noRumah' => 64, 'status' => 'Warga'],
                        ['nama' => 'Nina', 'jumlahPenghuni' => 5, 'alamat' => 'D2', 'noRumah' => 65, 'status' => 'Ngontrak'],
                        ['nama' => 'Omar', 'jumlahPenghuni' => 1, 'alamat' => 'D3', 'noRumah' => 66, 'status' => 'Warga'],
                        ['nama' => 'Pasha', 'jumlahPenghuni' => 2, 'alamat' => 'D4', 'noRumah' => 67, 'status' => 'Warga'],
                        ['nama' => 'Qomar', 'jumlahPenghuni' => 3, 'alamat' => 'D1', 'noRumah' => 68, 'status' => 'Ngontrak'],
                        ['nama' => 'Rani', 'jumlahPenghuni' => 4, 'alamat' => 'D2', 'noRumah' => 69, 'status' => 'Warga'],
                        ['nama' => 'Sandi', 'jumlahPenghuni' => 5, 'alamat' => 'D3', 'noRumah' => 70, 'status' => 'Warga'],
                        ['nama' => 'Tara', 'jumlahPenghuni' => 1, 'alamat' => 'D4', 'noRumah' => 71, 'status' => 'Ngontrak'],
                        ['nama' => 'Ulfah', 'jumlahPenghuni' => 2, 'alamat' => 'D1', 'noRumah' => 72, 'status' => 'Warga'],
                        ['nama' => 'Vira', 'jumlahPenghuni' => 3, 'alamat' => 'D2', 'noRumah' => 73, 'status' => 'Warga'],
                        ['nama' => 'Wasi', 'jumlahPenghuni' => 4, 'alamat' => 'D3', 'noRumah' => 74, 'status' => 'Ngontrak'],
                        ['nama' => 'Xander', 'jumlahPenghuni' => 5, 'alamat' => 'D4', 'noRumah' => 75, 'status' => 'Warga'],
                        ['nama' => 'Yani', 'jumlahPenghuni' => 1, 'alamat' => 'D1', 'noRumah' => 76, 'status' => 'Warga'],
                        ['nama' => 'Zara', 'jumlahPenghuni' => 2, 'alamat' => 'D2', 'noRumah' => 77, 'status' => 'Ngontrak'],
                        ['nama' => 'Aira', 'jumlahPenghuni' => 3, 'alamat' => 'D3', 'noRumah' => 78, 'status' => 'Warga'],
                        ['nama' => 'Bima', 'jumlahPenghuni' => 4, 'alamat' => 'D4', 'noRumah' => 79, 'status' => 'Warga'],
                        ['nama' => 'Cinta', 'jumlahPenghuni' => 5, 'alamat' => 'D1', 'noRumah' => 80, 'status' => 'Ngontrak'],
                        ['nama' => 'Dito', 'jumlahPenghuni' => 1, 'alamat' => 'D2', 'noRumah' => 81, 'status' => 'Warga'],
                        ['nama' => 'Elda', 'jumlahPenghuni' => 2, 'alamat' => 'D3', 'noRumah' => 82, 'status' => 'Warga'],
                        ['nama' => 'Fera', 'jumlahPenghuni' => 3, 'alamat' => 'D4', 'noRumah' => 83, 'status' => 'Ngontrak'],
                        ['nama' => 'Gita', 'jumlahPenghuni' => 4, 'alamat' => 'D1', 'noRumah' => 84, 'status' => 'Warga'],
                        ['nama' => 'Hani', 'jumlahPenghuni' => 5, 'alamat' => 'D2', 'noRumah' => 85, 'status' => 'Warga'],
                        ['nama' => 'Iya', 'jumlahPenghuni' => 1, 'alamat' => 'D3', 'noRumah' => 86, 'status' => 'Ngontrak'],
                        ['nama' => 'Jaya', 'jumlahPenghuni' => 2, 'alamat' => 'D4', 'noRumah' => 87, 'status' => 'Warga'],
                        ['nama' => 'Kimi', 'jumlahPenghuni' => 3, 'alamat' => 'D1', 'noRumah' => 88, 'status' => 'Warga'],
                        ['nama' => 'Lima', 'jumlahPenghuni' => 4, 'alamat' => 'D2', 'noRumah' => 89, 'status' => 'Ngontrak'],
                        ['nama' => 'Muti', 'jumlahPenghuni' => 5, 'alamat' => 'D3', 'noRumah' => 90, 'status' => 'Warga'],
                        ['nama' => 'Nila', 'jumlahPenghuni' => 1, 'alamat' => 'D4', 'noRumah' => 91, 'status' => 'Warga'],
                        ['nama' => 'Opik', 'jumlahPenghuni' => 2, 'alamat' => 'D1', 'noRumah' => 92, 'status' => 'Ngontrak'],
                        ['nama' => 'Pia', 'jumlahPenghuni' => 3, 'alamat' => 'D2', 'noRumah' => 93, 'status' => 'Warga'],
                        ['nama' => 'Qita', 'jumlahPenghuni' => 4, 'alamat' => 'D3', 'noRumah' => 94, 'status' => 'Warga'],
                        ['nama' => 'Rosa', 'jumlahPenghuni' => 5, 'alamat' => 'D4', 'noRumah' => 95, 'status' => 'Ngontrak'],
                        ['nama' => 'Sisi', 'jumlahPenghuni' => 1, 'alamat' => 'D1', 'noRumah' => 96, 'status' => 'Warga'],
                        ['nama' => 'Titi', 'jumlahPenghuni' => 2, 'alamat' => 'D2', 'noRumah' => 97, 'status' => 'Warga'],
                        ['nama' => 'Umi', 'jumlahPenghuni' => 3, 'alamat' => 'D3', 'noRumah' => 98, 'status' => 'Ngontrak'],
                        ['nama' => 'Vivi', 'jumlahPenghuni' => 4, 'alamat' => 'D4', 'noRumah' => 99, 'status' => 'Warga']
                    ];
                @endphp
                @foreach ($dataRumah as $index => $rumah)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $rumah['nama'] }}</td>
                        <td>{{ $rumah['jumlahPenghuni'] }} penghuni</td>
                        <td>{{ $rumah['alamat'] }}, No {{ $rumah['noRumah'] }}</td>
                        <td>{{ $rumah['status'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function filterTable(filter) {
            const rows = document.querySelectorAll('#dataBody tr');
            rows.forEach(row => {
                const alamat = row.cells[3].textContent; 
                const status = row.cells[4].textContent; 

                if (alamat.includes(filter) || status.includes(filter)) {
                    row.style.display = ''; 
                } else {
                    row.style.display = 'none'; 
                }
            });
        }

        function resetFilter() {
            const rows = document.querySelectorAll('#dataBody tr');
            rows.forEach(row => {
                row.style.display = '';
            });
        }
    </script>
@endsection