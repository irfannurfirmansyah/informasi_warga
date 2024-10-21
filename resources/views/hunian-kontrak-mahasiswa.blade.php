@extends('layouts.app')

@section('content')
        <p class="text-center large-text">Hunian Kontrak Mahasiswa</p>

    <div class="form-container">
    <form >
        @csrf
        <div class="form-group">
            <label for="nisn">NISN</label>
            <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" required>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="blok_rumah">Blok Rumah</label>
                <input type="text" class="form-control" id="blok_rumah" name="blok_rumah" placeholder="Masukkan blok rumah" required>
            </div>
            <div class="col-md-6">
                <label for="nomor_rumah">Nomor Rumah</label>
                <input type="text" class="form-control" id="nomor_rumah" name="nomor_rumah" placeholder="Masukkan nomor rumah" required>
            </div>
        </div>

        <div class="form-group">
            <label for="nama_sekolah">Nama Sekolah/Universitas</label>
            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" placeholder="Masukkan nama sekolah atau universitas" required>
        </div>

        <div class="form-group">
            <label for="alamat_sekolah">Alamat Sekolah/Universitas</label>
            <input type="text" class="form-control" id="alamat_sekolah" name="alamat_sekolah" placeholder="Masukkan alamat sekolah atau universitas" required>
        </div>

        <div class="form-group">
            <label for="alasan_mengontrak">Alasan Mengontrak</label>
            <textarea class="form-control" id="alasan_mengontrak" name="alasan_mengontrak" rows="3" placeholder="Tuliskan alasan Anda mengontrak" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
    </div>
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #F6F4F0;
            border-radius: 10px;
        }

        .large-text {
            font-size: 23px;
            font-weight: bold;
        }
    </style>
@endsection
