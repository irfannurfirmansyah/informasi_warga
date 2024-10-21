@extends('layouts.app')

@section('content')
    <p class="text-center large-text">Surat Domisilir</p>

    <div class="form-container">
    <form>
        @csrf
        
        <div class="form-group">
            <label for="alamat">Alamat yang Dikontrak:</label>
            <input type="text" id="alamat" name="alamat" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="waktu_menetap">Waktu Menetap:</label><br>
            <input type="checkbox" id="selamanya" name="waktu_menetap[]" value="selamanya" onclick="toggleCheckbox('selamanya')">
            <label for="selamanya">Selamanya</label><br>
            
            <div class="checkbox-container">
                <input type="checkbox" id="terbatas" name="waktu_menetap[]" value="terbatas" onclick="toggleCheckbox('terbatas')" onchange="toggleTerlampirForm()">
                <label for="terbatas">Terbatas</label>
                <div id="terbatas-form" class="form-group" style="display: none;">
                    <label for="waktu_terbatas">Durasi Waktu Terbatas:</label>
                    <input type="text" id="waktu_terbatas" name="waktu_terbatas" class="form-control" placeholder="Masukkan durasi waktu terbatas">
                </div>
            </div>

            <small>Pilih salah satu atau keduanya jika berlaku untuk waktu yang berbeda.</small>
        </div>

        <div class="form-group">
            <label for="alasan_kontrak">Alasan Kontrak:</label>
            <textarea id="alasan_kontrak" name="alasan_kontrak" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
    </div>

    <script>
        function toggleCheckbox(selected) {
            var selamanyaCheckbox = document.getElementById('selamanya');
            var terbatasCheckbox = document.getElementById('terbatas');
            
            if (selected === 'selamanya') {
                if (selamanyaCheckbox.checked) {
                    terbatasCheckbox.disabled = true;
                    terbatasCheckbox.checked = false; 
                } else {
                    terbatasCheckbox.disabled = false;
                }
            } else if (selected === 'terbatas') {
                if (terbatasCheckbox.checked) {
                    selamanyaCheckbox.disabled = true;
                    selamanyaCheckbox.checked = false; 
                } else {
                    selamanyaCheckbox.disabled = false;
                }
            }
        }

        function toggleTerlampirForm() {
            var terbatasCheckbox = document.getElementById('terbatas');
            var terbatasForm = document.getElementById('terbatas-form');
            
            if (terbatasCheckbox.checked) {
                terbatasForm.style.display = 'block';
            } else {
                terbatasForm.style.display = 'none';
            }
        }
    </script>

    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #F6F4F0;
            border-radius: 10px;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        #terbatas-form {
            display: none;
            margin-left: 20px;
            width: 250px;
        }

        .large-text {
            font-size: 23px;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .checkbox-container {
                flex-direction: column;
                align-items: flex-start;
            }
            #terbatas-form {
                margin-left: 0;
                margin-top: 10px;
            }
        }
    </style>
@endsection
