@extends('layouts.app')

@section('content')
        <p class="text-center large-text">Surat Pemasangan Infrastruktur</p>

    <div class="form-container">
        <form>
            @csrf

          
            <div class="form-group">
                <label for="jenis_pemasangan">Jenis Pemasangan</label>
                <select id="jenis_pemasangan" name="jenis_pemasangan" class="form-control" required>
                    <option value="">Pilih Jenis Pemasangan</option>
                    <option value="wifi">Wifi</option>
                    <option value="kanopi">Kanopi</option>
                    <option value="pagar_kawat">Pagar Kawat</option>
                </select>
            </div>

            
            <div class="form-group">
                <label for="waktu_pemasangan">Waktu Pemasangan</label>
                <div class="form-row">
                    
                    <div class="col-md-4">
                        <select id="bulan" name="bulan" class="form-control" required>
                            <option value="">Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>

                    
                    <div class="col-md-4">
                        <input type="number" id="tanggal" name="tanggal" class="form-control" placeholder="tanggal" min="1" max="31" required>
                    </div>

                    
                    <div class="col-md-4">
                        <input type="time" id="jam" name="jam" class="form-control" required>
                    </div>
                </div>
            </div>

           
            <div class="form-group">
                <label for="alasan">Alasan Pemasangan</label>
                <textarea id="alasan" name="alasan" class="form-control" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <style>
        .large-text {
            font-size: 23px;
            font-weight: bold;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #F6F4F0;
            border-radius: 10px;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
        }

        .form-row .col-md-4 {
            flex: 0 0 32%; 
        }
    </style>
@endsection
