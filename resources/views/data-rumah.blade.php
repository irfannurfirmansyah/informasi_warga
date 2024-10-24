@extends('layouts.app')

@section('content')

<!-- Image Section -->
<div style="text-align: center; margin-bottom: 10px;">
    <img src="{{ asset('images/border-block.jpg') }}" alt="Border Block" style="width: 100%; max-width: 630px;">
</div>

<!-- Filter Section -->
<div style="display: flex; gap: 10px; margin-bottom: 20px; justify-content: center; width: 50%; margin: 0 auto;">
    <div style="border: 1px solid #ccc; padding: 10px; width: 100%;">
        <span style="cursor: pointer;" onclick="setStatusFilter('A')">Block A</span>
        <div class="active-line status-line" id="lineBlockA" style="display: none; height: 3px; background-color: #0090D0; margin-top: 5px;"></div>
        <div>
            <span style="cursor: pointer;" onclick="setStatusFilter('D')">Block D</span>
        </div>
        <div class="active-line status-line" id="lineBlockD" style="display: none; height: 3px; background-color: #0090D0; margin-top: 5px;"></div>
    </div>

    <div style="border: 1px solid #ccc; padding: 10px; width: 100%;">
        <span style="cursor: pointer;" onclick="setStatusFilter('Warga')">Warga</span>
        <div class="active-line status-line" id="lineWarga" style="display: none; height: 3px; background-color: #0090D0; margin-top: 5px;"></div>
        <div>
            <span style="cursor: pointer;" onclick="setStatusFilter('Ngontrak')">Ngontrak</span>
        </div>
        <div class="active-line status-line" id="lineNgontrak" style="display: none; height: 3px; background-color: #0090D0; margin-top: 5px;"></div>
    </div>

    <div style="border: 1px solid #ccc; padding: 10px; width: 100%;">
        <span style="cursor: pointer;" onclick="setYearFilter(2024)">Tahun 2024</span>
        <div class="active-line year-line" id="line2024" style="display: none; height: 3px; background-color: #0090D0; margin-top: 5px;"></div>
        <div>
            <span style="cursor: pointer;" onclick="setYearFilter(2023)">Tahun 2023</span>
        </div>
        <div class="active-line year-line" id="line2023" style="display: none; height: 3px; background-color: #0090D0; margin-top: 5px;"></div>
        <div>
            <span style="cursor: pointer;" onclick="setYearFilter(2022)">Tahun 2022</span>
        </div>
        <div class="active-line year-line" id="line2022" style="display: none; height: 3px; background-color: #0090D0; margin-top: 5px;"></div>
    </div>

    <div style="border: 1px solid #ccc; padding: 10px; width: 100%;">
        <span style="cursor: pointer;" onclick="resetFilters()">Reset Filter</span>
    </div>
</div>

<!-- Info Text -->
<div id="infoText" style="font-size: 20px; margin-bottom: 10px; text-align: center;"></div>

<!-- Data Table Section -->
<div style="max-height: 400px; overflow-y: scroll; width: 50%; margin: 0 auto;">
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
                        ['nama' => 'Agus', 'jumlahPenghuni' => 2, 'alamat' => 'A1', 'noRumah' => 34, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Budi', 'jumlahPenghuni' => 3, 'alamat' => 'A2', 'noRumah' => 12, 'status' => 'Warga', 'tahunMenetap' => '2020'],
                        ['nama' => 'Citra', 'jumlahPenghuni' => 1, 'alamat' => 'A3', 'noRumah' => 27, 'status' => 'Ngontrak', 'tahunMenetap' => '2021'],
                        ['nama' => 'Dewi', 'jumlahPenghuni' => 4, 'alamat' => 'D1', 'noRumah' => 45, 'status' => 'Warga', 'tahunMenetap' => '2019'],
                        ['nama' => 'Eko', 'jumlahPenghuni' => 5, 'alamat' => 'A4', 'noRumah' => 19, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Fajar', 'jumlahPenghuni' => 2, 'alamat' => 'D2', 'noRumah' => 3, 'status' => 'Warga', 'tahunMenetap' => '2020'],
                        ['nama' => 'Gita', 'jumlahPenghuni' => 3, 'alamat' => 'A5', 'noRumah' => 28, 'status' => 'Ngontrak', 'tahunMenetap' => '2021'],
                        ['nama' => 'Hendra', 'jumlahPenghuni' => 4, 'alamat' => 'A6', 'noRumah' => 40, 'status' => 'Warga', 'tahunMenetap' => '2021'],
                        ['nama' => 'Indra', 'jumlahPenghuni' => 2, 'alamat' => 'A7', 'noRumah' => 5, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Joko', 'jumlahPenghuni' => 1, 'alamat' => 'A8', 'noRumah' => 21, 'status' => 'Ngontrak', 'tahunMenetap' => '2020'],
                        ['nama' => 'Kirana', 'jumlahPenghuni' => 5, 'alamat' => 'A1', 'noRumah' => 50, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Lestari', 'jumlahPenghuni' => 3, 'alamat' => 'A2', 'noRumah' => 37, 'status' => 'Warga', 'tahunMenetap' => '2021'],
                        ['nama' => 'Mira', 'jumlahPenghuni' => 4, 'alamat' => 'A3', 'noRumah' => 8, 'status' => 'Ngontrak', 'tahunMenetap' => '2021'],
                        ['nama' => 'Nina', 'jumlahPenghuni' => 2, 'alamat' => 'D4', 'noRumah' => 14, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Omar', 'jumlahPenghuni' => 1, 'alamat' => 'A2', 'noRumah' => 44, 'status' => 'Ngontrak', 'tahunMenetap' => '2023'],
                        ['nama' => 'Putra', 'jumlahPenghuni' => 2, 'alamat' => 'A3', 'noRumah' => 23, 'status' => 'Warga', 'tahunMenetap' => '2020'],
                        ['nama' => 'Qory', 'jumlahPenghuni' => 3, 'alamat' => 'A4', 'noRumah' => 6, 'status' => 'Warga', 'tahunMenetap' => '2021'],
                        ['nama' => 'Rian', 'jumlahPenghuni' => 4, 'alamat' => 'A5', 'noRumah' => 39, 'status' => 'Ngontrak', 'tahunMenetap' => '2022'],
                        ['nama' => 'Saripati', 'jumlahPenghuni' => 5, 'alamat' => 'A6', 'noRumah' => 10, 'status' => 'Warga', 'tahunMenetap' => '2019'],
                        ['nama' => 'Taufik', 'jumlahPenghuni' => 1, 'alamat' => 'A7', 'noRumah' => 30, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Umar', 'jumlahPenghuni' => 2, 'alamat' => 'A8', 'noRumah' => 49, 'status' => 'Ngontrak', 'tahunMenetap' => '2020'],
                        ['nama' => 'Vina', 'jumlahPenghuni' => 3, 'alamat' => 'D1', 'noRumah' => 15, 'status' => 'Warga', 'tahunMenetap' => '2021'],
                        ['nama' => 'Wawan', 'jumlahPenghuni' => 5, 'alamat' => 'A2', 'noRumah' => 4, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Xenia', 'jumlahPenghuni' => 2, 'alamat' => 'A3', 'noRumah' => 29, 'status' => 'Ngontrak', 'tahunMenetap' => '2023'],
                        ['nama' => 'Yuda', 'jumlahPenghuni' => 1, 'alamat' => 'A4', 'noRumah' => 20, 'status' => 'Warga', 'tahunMenetap' => '2021'],
                        ['nama' => 'Zaki', 'jumlahPenghuni' => 4, 'alamat' => 'D2', 'noRumah' => 2, 'status' => 'Warga', 'tahunMenetap' => '2020'],
                        ['nama' => 'Antonim', 'jumlahPenghuni' => 5, 'alamat' => 'A5', 'noRumah' => 33, 'status' => 'Ngontrak', 'tahunMenetap' => '2022'],
                        ['nama' => 'Beny', 'jumlahPenghuni' => 2, 'alamat' => 'A6', 'noRumah' => 25, 'status' => 'Warga', 'tahunMenetap' => '2021'],
                        ['nama' => 'Cindy', 'jumlahPenghuni' => 3, 'alamat' => 'A7', 'noRumah' => 16, 'status' => 'Warga', 'tahunMenetap' => '2020'],
                        ['nama' => 'Dimasak', 'jumlahPenghuni' => 4, 'alamat' => 'A8', 'noRumah' => 1, 'status' => 'Ngontrak', 'tahunMenetap' => '2022'],
                        ['nama' => 'Elisa', 'jumlahPenghuni' => 5, 'alamat' => 'A1', 'noRumah' => 41, 'status' => 'Warga', 'tahunMenetap' => '2019'],
                        ['nama' => 'Farah', 'jumlahPenghuni' => 1, 'alamat' => 'D1', 'noRumah' => 11, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Galuh', 'jumlahPenghuni' => 2, 'alamat' => 'D2', 'noRumah' => 46, 'status' => 'Ngontrak', 'tahunMenetap' => '2023'],
                        ['nama' => 'Halim', 'jumlahPenghuni' => 3, 'alamat' => 'D3', 'noRumah' => 32, 'status' => 'Warga', 'tahunMenetap' => '2020'],
                        ['nama' => 'Irfan', 'jumlahPenghuni' => 4, 'alamat' => 'A4', 'noRumah' => 22, 'status' => 'Warga', 'tahunMenetap' => '2019'],
                        ['nama' => 'Jihan', 'jumlahPenghuni' => 5, 'alamat' => 'A5', 'noRumah' => 36, 'status' => 'Ngontrak', 'tahunMenetap' => '2021'],
                        ['nama' => 'Khusnul', 'jumlahPenghuni' => 2, 'alamat' => 'A6', 'noRumah' => 26, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Lutfi', 'jumlahPenghuni' => 1, 'alamat' => 'A7', 'noRumah' => 42, 'status' => 'Ngontrak', 'tahunMenetap' => '2020'],
                        ['nama' => 'Muhammad', 'jumlahPenghuni' => 4, 'alamat' => 'A8', 'noRumah' => 7, 'status' => 'Warga', 'tahunMenetap' => '2021'],
                        ['nama' => 'Nadya', 'jumlahPenghuni' => 5, 'alamat' => 'A1', 'noRumah' => 38, 'status' => 'Warga', 'tahunMenetap' => '2019'],
                        ['nama' => 'Oki', 'jumlahPenghuni' => 1, 'alamat' => 'A2', 'noRumah' => 35, 'status' => 'Ngontrak', 'tahunMenetap' => '2022'],
                        ['nama' => 'Putu', 'jumlahPenghuni' => 3, 'alamat' => 'A3', 'noRumah' => 13, 'status' => 'Warga', 'tahunMenetap' => '2021'],
                        ['nama' => 'Rizki', 'jumlahPenghuni' => 2, 'alamat' => 'A4', 'noRumah' => 24, 'status' => 'Ngontrak', 'tahunMenetap' => '2023'],
                        ['nama' => 'Siti', 'jumlahPenghuni' => 4, 'alamat' => 'A5', 'noRumah' => 47, 'status' => 'Warga', 'tahunMenetap' => '2020'],
                        ['nama' => 'Tina', 'jumlahPenghuni' => 5, 'alamat' => 'D1', 'noRumah' => 17, 'status' => 'Warga', 'tahunMenetap' => '2019'],
                        ['nama' => 'Uli', 'jumlahPenghuni' => 2, 'alamat' => 'D2', 'noRumah' => 9, 'status' => 'Ngontrak', 'tahunMenetap' => '2021'],
                        ['nama' => 'Vicky', 'jumlahPenghuni' => 1, 'alamat' => 'D3', 'noRumah' => 34, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Wira', 'jumlahPenghuni' => 3, 'alamat' => 'A8', 'noRumah' => 18, 'status' => 'Warga', 'tahunMenetap' => '2021'],
                        ['nama' => 'Xander', 'jumlahPenghuni' => 4, 'alamat' => 'A7', 'noRumah' => 43, 'status' => 'Ngontrak', 'tahunMenetap' => '2020'],
                        ['nama' => 'Yosi', 'jumlahPenghuni' => 5, 'alamat' => 'D1', 'noRumah' => 31, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Zahara', 'jumlahPenghuni' => 2, 'alamat' => 'D2', 'noRumah' => 48, 'status' => 'Ngontrak', 'tahunMenetap' => '2023'],
                        ['nama' => 'Diana', 'jumlahPenghuni' => 5, 'alamat' => 'D4', 'noRumah' => 55, 'status' => 'Warga', 'tahunMenetap' => '2021'],
                        ['nama' => 'Evan', 'jumlahPenghuni' => 1, 'alamat' => 'D1', 'noRumah' => 56, 'status' => 'Ngontrak', 'tahunMenetap' => '2023'],
                        ['nama' => 'Fahmi', 'jumlahPenghuni' => 2, 'alamat' => 'D2', 'noRumah' => 57, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Gerry', 'jumlahPenghuni' => 3, 'alamat' => 'D3', 'noRumah' => 58, 'status' => 'Warga', 'tahunMenetap' => '2021'],
                        ['nama' => 'Hilda', 'jumlahPenghuni' => 4, 'alamat' => 'D4', 'noRumah' => 59, 'status' => 'Ngontrak', 'tahunMenetap' => '2024'],
                        ['nama' => 'Ilham', 'jumlahPenghuni' => 5, 'alamat' => 'D1', 'noRumah' => 60, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Jasmine', 'jumlahPenghuni' => 1, 'alamat' => 'D2', 'noRumah' => 61, 'status' => 'Warga', 'tahunMenetap' => '2023'],
                        ['nama' => 'Kevin', 'jumlahPenghuni' => 2, 'alamat' => 'D3', 'noRumah' => 62, 'status' => 'Ngontrak', 'tahunMenetap' => '2021'],
                        ['nama' => 'Laila', 'jumlahPenghuni' => 3, 'alamat' => 'D4', 'noRumah' => 63, 'status' => 'Warga', 'tahunMenetap' => '2024'],
                        ['nama' => 'Milan', 'jumlahPenghuni' => 4, 'alamat' => 'D1', 'noRumah' => 64, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Nina', 'jumlahPenghuni' => 5, 'alamat' => 'D2', 'noRumah' => 65, 'status' => 'Ngontrak', 'tahunMenetap' => '2023'],
                        ['nama' => 'Omar', 'jumlahPenghuni' => 1, 'alamat' => 'D3', 'noRumah' => 66, 'status' => 'Warga', 'tahunMenetap' => '2021'],
                        ['nama' => 'Pasha', 'jumlahPenghuni' => 2, 'alamat' => 'D4', 'noRumah' => 67, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Qomar', 'jumlahPenghuni' => 3, 'alamat' => 'D1', 'noRumah' => 68, 'status' => 'Ngontrak', 'tahunMenetap' => '2024'],
                        ['nama' => 'Rani', 'jumlahPenghuni' => 4, 'alamat' => 'D2', 'noRumah' => 69, 'status' => 'Warga', 'tahunMenetap' => '2021'],
                        ['nama' => 'Sandi', 'jumlahPenghuni' => 5, 'alamat' => 'D3', 'noRumah' => 70, 'status' => 'Warga', 'tahunMenetap' => '2023'],
                        ['nama' => 'Tara', 'jumlahPenghuni' => 1, 'alamat' => 'D4', 'noRumah' => 71, 'status' => 'Ngontrak', 'tahunMenetap' => '2022'],
                        ['nama' => 'Ulfah', 'jumlahPenghuni' => 2, 'alamat' => 'D1', 'noRumah' => 72, 'status' => 'Warga', 'tahunMenetap' => '2024'],
                        ['nama' => 'Vira', 'jumlahPenghuni' => 3, 'alamat' => 'D2', 'noRumah' => 73, 'status' => 'Warga', 'tahunMenetap' => '2023'],
                        ['nama' => 'Wasi', 'jumlahPenghuni' => 4, 'alamat' => 'D3', 'noRumah' => 74, 'status' => 'Ngontrak', 'tahunMenetap' => '2021'],
                        ['nama' => 'Xander', 'jumlahPenghuni' => 5, 'alamat' => 'D4', 'noRumah' => 75, 'status' => 'Warga', 'tahunMenetap' => '2024'],
                        ['nama' => 'Yani', 'jumlahPenghuni' => 1, 'alamat' => 'D1', 'noRumah' => 76, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Zara', 'jumlahPenghuni' => 2, 'alamat' => 'D2', 'noRumah' => 77, 'status' => 'Ngontrak', 'tahunMenetap' => '2023'],
                        ['nama' => 'Aira', 'jumlahPenghuni' => 3, 'alamat' => 'D3', 'noRumah' => 78, 'status' => 'Warga', 'tahunMenetap' => '2024'],
                        ['nama' => 'Bima', 'jumlahPenghuni' => 4, 'alamat' => 'D4', 'noRumah' => 79, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Cinta', 'jumlahPenghuni' => 5, 'alamat' => 'D1', 'noRumah' => 80, 'status' => 'Ngontrak', 'tahunMenetap' => '2023'],
                        ['nama' => 'Dito', 'jumlahPenghuni' => 1, 'alamat' => 'D2', 'noRumah' => 81, 'status' => 'Warga', 'tahunMenetap' => '2024'],
                        ['nama' => 'Elda', 'jumlahPenghuni' => 2, 'alamat' => 'D3', 'noRumah' => 82, 'status' => 'Warga', 'tahunMenetap' => '2023'],
                        ['nama' => 'Fera', 'jumlahPenghuni' => 3, 'alamat' => 'D4', 'noRumah' => 83, 'status' => 'Ngontrak', 'tahunMenetap' => '2021'],
                        ['nama' => 'Gita', 'jumlahPenghuni' => 4, 'alamat' => 'D1', 'noRumah' => 84, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Hani', 'jumlahPenghuni' => 5, 'alamat' => 'D2', 'noRumah' => 85, 'status' => 'Warga', 'tahunMenetap' => '2023'],
                        ['nama' => 'Iya', 'jumlahPenghuni' => 1, 'alamat' => 'D3', 'noRumah' => 86, 'status' => 'Ngontrak', 'tahunMenetap' => '2024'],
                        ['nama' => 'Jaya', 'jumlahPenghuni' => 2, 'alamat' => 'D4', 'noRumah' => 87, 'status' => 'Warga', 'tahunMenetap' => '2021'],
                        ['nama' => 'Kimi', 'jumlahPenghuni' => 3, 'alamat' => 'D1', 'noRumah' => 88, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Lima', 'jumlahPenghuni' => 4, 'alamat' => 'D2', 'noRumah' => 89, 'status' => 'Ngontrak', 'tahunMenetap' => '2024'],
                        ['nama' => 'Muti', 'jumlahPenghuni' => 5, 'alamat' => 'D3', 'noRumah' => 90, 'status' => 'Warga', 'tahunMenetap' => '2023'],
                        ['nama' => 'Nila', 'jumlahPenghuni' => 1, 'alamat' => 'D4', 'noRumah' => 91, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Opik', 'jumlahPenghuni' => 2, 'alamat' => 'D1', 'noRumah' => 92, 'status' => 'Ngontrak', 'tahunMenetap' => '2024'],
                        ['nama' => 'Pia', 'jumlahPenghuni' => 3, 'alamat' => 'D2', 'noRumah' => 93, 'status' => 'Warga', 'tahunMenetap' => '2023'],
                        ['nama' => 'Qita', 'jumlahPenghuni' => 4, 'alamat' => 'D3', 'noRumah' => 94, 'status' => 'Warga', 'tahunMenetap' => '2022'],
                        ['nama' => 'Rosa', 'jumlahPenghuni' => 5, 'alamat' => 'D4', 'noRumah' => 95, 'status' => 'Ngontrak', 'tahunMenetap' => '2023'],
                        ['nama' => 'Sisi', 'jumlahPenghuni' => 1, 'alamat' => 'D1', 'noRumah' => 96, 'status' => 'Warga', 'tahunMenetap' => '2021'],
                        ['nama' => 'Titi', 'jumlahPenghuni' => 2, 'alamat' => 'D2', 'noRumah' => 97, 'status' => 'Warga', 'tahunMenetap' => '2023'],
                        ['nama' => 'Umi', 'jumlahPenghuni' => 3, 'alamat' => 'D3', 'noRumah' => 98, 'status' => 'Ngontrak', 'tahunMenetap' => '2022'],
                        ['nama' => 'Vivi', 'jumlahPenghuni' => 4, 'alamat' => 'D4', 'noRumah' => 99, 'status' => 'Warga', 'tahunMenetap' => '2023'],
                        ['nama' => 'Wira', 'jumlahPenghuni' => 5, 'alamat' => 'D1', 'noRumah' => 100, 'status' => 'Warga', 'tahunMenetap' => '2024']
                    ];
            @endphp
            @foreach ($dataRumah as $index => $rumah)
                <tr data-tahun="{{ $rumah['tahunMenetap'] }}" data-status="{{ $rumah['status'] }}" data-alamat="{{ $rumah['alamat'] }}">
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
    let activeYearFilter = null;
    let activeStatusFilter = null;

    // Inisialisasi infoText saat pertama kali halaman dimuat
    window.onload = function() {
        document.getElementById('infoText').textContent = "Semua data ditampilkan.";
    };

    function setStatusFilter(status) {
        activeStatusFilter = status;
        applyFilters();
        highlightActiveStatus(status);
    }

    function setYearFilter(year) {
        activeYearFilter = year;
        applyFilters();
        highlightActiveYear(year);
    }

    function applyFilters() {
        const rows = document.querySelectorAll('#dataBody tr');
        let filteredData = [];
        let blockInfo = ''; // Untuk menyimpan informasi blok
        let statusInfo = ''; // Untuk menyimpan status

        rows.forEach(row => {
            const tahun = parseInt(row.getAttribute('data-tahun'));
            const status = row.getAttribute('data-status');
            const alamat = row.getAttribute('data-alamat');

            let showRow = true;

            if (activeStatusFilter) {
                showRow = (status.includes(activeStatusFilter) || alamat.includes(activeStatusFilter));
            }
            
            if (activeYearFilter && showRow) {
                showRow = (tahun === activeYearFilter);
            }

            if (showRow) {
                row.style.display = '';
                filteredData.push({ tahun, status, alamat, jumlah: row.cells[2].textContent.split(' ')[0] });
                blockInfo = alamat; // Update dengan alamat dari data yang sesuai filter
                statusInfo = status; // Update dengan status dari data yang sesuai filter
            } else {
                row.style.display = 'none';
            }
        });

        updateInfoText(filteredData, blockInfo, statusInfo);
    }

    function highlightActiveStatus(status) {
        document.querySelectorAll('.status-line').forEach(line => line.style.display = 'none');

        if (status === 'A') {
            document.getElementById('lineBlockA').style.display = 'block';
        } else if (status === 'D') {
            document.getElementById('lineBlockD').style.display = 'block';
        } else if (status === 'Warga') {
            document.getElementById('lineWarga').style.display = 'block';
        } else if (status === 'Ngontrak') {
            document.getElementById('lineNgontrak').style.display = 'block';
        }
    }

    function highlightActiveYear(year) {
        document.querySelectorAll('.year-line').forEach(line => line.style.display = 'none');
        
        if (year === 2024) {
            document.getElementById('line2024').style.display = 'block';
        } else if (year === 2023) {
            document.getElementById('line2023').style.display = 'block';
        } else if (year === 2022) {
            document.getElementById('line2022').style.display = 'block';
        }
    }

    function resetFilters() {
        activeYearFilter = null;
        activeStatusFilter = null;
        applyFilters();

        document.querySelectorAll('.active-line').forEach(line => line.style.display = 'none');

        // Perbarui infoText dengan teks default saat filter direset
        document.getElementById('infoText').textContent = "Semua data ditampilkan.";
    }

    function updateInfoText(filteredData, blockInfo, statusInfo) {
        let infoText = 'Menampilkan ' + filteredData.length + ' data.';
        if (filteredData.length > 0) {
            let totalPenghuni = filteredData.reduce((sum, item) => sum + parseInt(item.jumlah), 0);
            infoText = `${filteredData[0].tahun} Pesona Bali, Block ${blockInfo}, ${statusInfo}`;
        }
        document.getElementById('infoText').textContent = infoText;
    }
</script>

@endsection
