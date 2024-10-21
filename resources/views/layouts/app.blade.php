<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Sidebar Navigation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            overflow: hidden;
        }
        .hidden-sidebar {
            display: none;
        }
        .sidebar {
            width: 250px;
            height: 1940px;
            background-color: #004267;
            color: white;
            padding-top: 100px;
        }
        .content-full-width {
            width: 100%;
        }
        .rotate {
            transition: transform 0.3s ease; 
        }
        
        .dropdown-item {
            position: relative;
        }

        .dropdown-item::after {
            content: '';
            position: absolute;
            left: 20%;
            bottom: 0;
            width: 0;
            height: 1px;
            background-color: #FFDC23;
            transition: all 0.4s ease;
            transform: translateX(-50%) scaleX(0);
            transform-origin: center; 
        }

        .dropdown-item:hover::after {
            width: 100%;
            transform: translateX(-50%) scaleX(1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #004267; color: white;">
        <div class="container-fluid" style="background-color: #004267; color: white;">
            <a class="navbar-brand" href="#" style="color: white; margin-left: 70px;">Sidebar</a> 
            <div class="d-flex align-items-center">
                <div class="position-relative me-3" >
                    <i class="bi bi-bell" style="font-size: 1.5rem; color: white;" ></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
                </div>
                <div class="dropdown">
                    <a href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://via.placeholder.com/40" class="rounded-circle" alt="User Photo" style="width: 40px; height: 40px;">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="d-flex">
        <div id="sidebar" class="sidebar">
            <ul class="nav flex-column p-2">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="masterDataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Master Data
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="prizinanPersuratanDropdown">
                        <li><a class="dropdown-item" href="{{ route('data-warga') }}">Data Warga</a></li>
                        <li><a class="dropdown-item" href="{{ route('data-rumah') }}">Data Rumah</a></li>                    
                    </ul>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="masterDataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Perizinan/Persuratan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="prizinanPersuratanDropdown">
                        <li><a class="dropdown-item" href="{{ route('surat-domisili') }}">Surat Domisili</a></li>
                        <li><a class="dropdown-item" href="{{ route('surat-pemasangan-infrastruktur') }}">Surat Pemasangan Infrastruktur</a></li>
                        <li><a class="dropdown-item" href="{{ route('hunian-kontrak-mahasiswa') }}">Hunian Kontrak Mahasiswa</a></li>
                        <li><a class="dropdown-item" href="{{ route('approval') }}">Approval</a></li>
                    </ul>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('laporan-keuangan') }}">Laporan Keuangan</a>
                </li>
                <li><hr class="dropdown-divider"></li>
            </ul>
        </div>

        <div id="content" class="flex-grow-1 p-3">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let rotation = 0;
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            var content = document.getElementById('content');
            var button = document.getElementById('toggleSidebar');

            if (sidebar.style.display === 'none') {
                sidebar.style.display = 'block';
                content.classList.remove('content-full-width');
            } else {
                sidebar.style.display = 'none';
                content.classList.add('content-full-width');
            }

            rotation += 90; 
            button.style.transform = 'rotate(' + rotation + 'deg)'; 
        });
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</body>
</html>
