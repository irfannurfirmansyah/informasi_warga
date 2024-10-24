@extends('layouts.app')

@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    body {
        background-color: #eaeaea;
        overflow-y: auto;
    }

    .additional-block {
        height: 230px;
    }

    .container {
        width: 6500px;
        height: 30%;
        padding: 0;
        transform: scale(0.99); 
        margin-left: -22px;
        margin-top: -52px;
    }

    #slide {
        width: max-content;
        margin-top: 50px;
    }

    .item {
        width: 200px;
        height: 300px;
        background-position: 50% 50%;
        display: inline-block;
        transition: 0.5s;
        background-size: cover;
        position: absolute;
        z-index: 1;
        top: 50%;
        transform: translate(0, -50%);
        border-radius: 20px;
        box-shadow: 0 30px 50px #505050;
    }

    .item:nth-child(1),
    .item:nth-child(2) {
        left: 0;
        top: 0;
        transform: translate(0, 0);
        border-radius: 0;
        width: 100%;
        height: 100%;
        box-shadow: none;
    }

    .item:nth-child(3) {
        left: 45%;
    }

    .item:nth-child(4) {
        left: calc(45% + 220px);
    }

    .item:nth-child(5) {
        left: calc(45% + 440px);
    }

    .item:nth-child(n+6) {
        left: calc(45% + 660px);
        opacity: 0;
    }

    .item .content {
        position: absolute;
        top: 50%;
        left: 100px;
        width: 300px;
        text-align: left;
        padding: 0;
        color: #000000;
        transform: translate(0, -50%);
        display: none;
        font-family: system-ui;
    }

    .item:nth-child(2) .content {
        display: block;
        z-index: 11111;
    }

    .item .name {
        font-size: 40px;
        font-weight: bold;
        opacity: 0;
        animation: showcontent 1s ease-in-out 1 forwards;
    }

    .item .des {
        margin: 20px 0;
        opacity: 0;
        animation: showcontent 1s ease-in-out 0.3s 1 forwards;
    }

    .item button {
        padding: 10px 20px;
        border: none;
        opacity: 0;
        animation: showcontent 1s ease-in-out 0.6s 1 forwards;
    }

    @keyframes showcontent {
        from {
            opacity: 0;
            transform: translate(0, 100px);
            filter: blur(33px);
        }
        to {
            opacity: 1;
            transform: translate(0, 0);
            filter: blur(0);
        }
    }

    .buttons {
        position: absolute;
        bottom: 30px;
        z-index: 222222;
        text-align: center;
        width: 100%;
    }

    .buttons button {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 1px solid #555;
        transition: 0.5s;
    }

    .buttons button:hover {
        background-color: #bac383;
    }

    .dashboard-card {
        background-color: white;
        padding: 20px;
        border: 1px solid black;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
    }

    .chart-container {
        position: relative; 
        height: 400px;
        width: 100%;
    }

    .table-container {
        overflow-x: auto;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="dashboard-card">
                <h4>Order Categories</h4>
                <div class="chart-container">
                    <canvas id="orderPieChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="dashboard-card">
                <h4>Orders Per Month</h4>
                <div class="chart-container">
                    <canvas id="ordersColumnChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="dashboard-card">
                <h4>Monthly Sales</h4>
                <div class="chart-container">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 d-flex flex-column">
            <div class="dashboard-card mb-3 additional-block">
            </div>
            <div class="dashboard-card additional-block">
            </div>
        </div>
        <div class="dashboard-card mt-3">
            <div class="row">
                <div class="col-3">
                    <div class="dashboard-card" style="background-color: #343257; color: white;">
                        <h5>Dajukan</h5>
                        <h1>14</h1>
                    </div>
                </div>
                <div class="col-3">
                    <div class="dashboard-card" style="background-color: #BDCAD0; color: white;">
                        <h5>Diproses</h5>
                        <h1>3</h1>
                    </div>
                </div>
                <div class="col-3">
                    <div class="dashboard-card" style="background-color: #7EA7BD; color: white;">
                        <h5>Disetujui</h5>
                        <h1>7</h1>
                    </div>
                </div>
                <div class="col-3">
                    <div class="dashboard-card" style="background-color: #6B8FB3; color: white;">
                        <h5>Ditolak.</h5>
                        <h1>4</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div id="slide">
        @foreach(range(1, 6) as $i)
        <div class="item" style="background-image: url('{{ asset("images/$i.jpg") }}');">
            <div class="content">
                <div class="name">Perumahan Pesona Bali 2024 {{ $i }}</div>
                <div class="des">Carilah tempat tinggalmu sesuai preferensi mu! {{ $i }}</div>
                <a href="#"><button target="_blank">See more</button></a>
                <a href="#"><button>back to home page</button></a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="buttons">
        <button id="prev"><i class="fa-solid fa-angle-left"><</i></button>
        <button id="next"><i class="fa-solid fa-angle-right">></i></button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart.js setup
    const salesData = [8971, 14323, 15702, 16838, 17934, 7615, 2067, 5243, 3702, 17113, 8038, 9980];
    const orderData = [30, 40, 20, 5, 5];
    const ordersData = [5480, 3271, 5135, 14850, 15172, 4092, 15480, 2374, 15246, 15246, 15246, 18254];

    new Chart(document.getElementById('salesChart'), {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Sales',
                data: salesData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    new Chart(document.getElementById('orderPieChart'), {
        type: 'pie',
        data: {
            labels: ['Pakaian', 'Elektronik', 'Peralatan Rumah Tangga', 'Aksesoris', 'Makanan'],
            datasets: [{
                label: '# of Votes',
                data: orderData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        }
    });

    new Chart(document.getElementById('ordersColumnChart'), {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Orders',
                data: ordersData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        }
    });
    
    document.getElementById('next').onclick = function() {
        let lists = document.querySelectorAll('.item');
        document.getElementById('slide').appendChild(lists[0]);
    }

    document.getElementById('prev').onclick = function() {
        let lists = document.querySelectorAll('.item');
        document.getElementById('slide').prepend(lists[lists.length - 1]);
    }
</script>
@endsection
