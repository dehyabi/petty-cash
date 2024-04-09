<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Petty Cash Management</title> 
        <link href="{{ asset('css') }}/main.css" rel="stylesheet" />       
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <style>
            #dataTable_filter input {
            border: 1px solid grey;
            outline: none;
            border-radius: 2px;
        }
        </style>
        
           <div class="container-fluid"> 

           <div class="row">
            <div class="col left-side">
            <div class="sidebar-wrapper">

        
@php

$pathLokasi = $_SERVER['REQUEST_URI'];
$pathLokasi = preg_replace('/[^a-zA-Z_-]/s','',$pathLokasi);

if ($pathLokasi === 'add-city' || $pathLokasi === 'add-area' || $pathLokasi === 'add-site' || $pathLokasi === 'master-lokasi' || $pathLokasi === 'daftar-outlet' || $pathLokasi === 'all-city' || $pathLokasi === 'all-area' || $pathLokasi === 'all-site' || $pathLokasi === 'all-outlet' || $pathLokasi === 'add-outlet' || $pathLokasi === 'edit-outlet' || $pathLokasi === 'confirm-delete-outlet' || $pathLokasi === 'edit-city' || $pathLokasi === 'confirm-delete-city' || $pathLokasi === 'edit-area' || $pathLokasi === 'confirm-delete-area') {
    $pathLokasi = 'active';
}

$pathUser = $_SERVER['REQUEST_URI'];
$pathUser = ltrim($pathUser, '/'); 
if ($pathUser === 'add-user' || $pathUser === 'add-group-user' || $pathUser === 'all-user' || $pathUser === 'all-group-user') {
    $pathUser = 'active';
}

$pathPettyCash = $_SERVER['REQUEST_URI'];
$pathPettyCash = ltrim($pathPettyCash, '/'); 
if ($pathPettyCash === 'add-petty-cash' || $pathPettyCash === 'add-group-petty-cash' || $pathPettyCash === 'all-group-petty-cash' || $pathPettyCash === 'all-petty-cash') {
    $pathPettyCash = 'active';
}


$pathJenisPembelian = $_SERVER['REQUEST_URI'];
$pathJenisPembelian = ltrim($pathJenisPembelian, '/'); 
if ($pathJenisPembelian === 'add-jenis-pembelian') {
    $pathJenisPembelian = 'active';
}

$pathTransaksi = $_SERVER['REQUEST_URI'];
$pathTransaksi = ltrim($pathTransaksi, '/'); 
if ($pathTransaksi === 'add-transaksi') {
    $pathTransaksi = 'active';
}

@endphp

<nav>
<div class="list-group list-group-flush mt-4">
    <a
    href="{{ route('menu.dashboard') }}"
    class="list-group-item list-group-item-action py-3 ripple"
    aria-current="true"
    >
    <i class="fasx fas fa-th-large"></i><span> Dashboard</span>
    </a>
    <a href="{{ route('all.transaksi') }}" class="list-group-item list-group-item-action py-3 {{ $pathTransaksi }}">
    <i class="fasx fas fa-shopping-cart"></i><span> Transaksi</span>
    </a>
    <a href="{{ route('menu.laporan') }}" class="list-group-item list-group-item-action py-3">
    <i class="fasx fas fa-chart-bar"></i><span> Laporan</span>
    </a>
    <a href="{{ route('menu.petty.cash') }}" class="list-group-item list-group-item-action py-3 {{ $pathPettyCash }}">
    <i class="fasx fas fa-wallet"></i><span> Petty Cash</span>
    </a>
    <a href="{{ route('menu.user') }}" class="list-group-item list-group-item-action py-3 {{ $pathUser }}"
    ><i class="fasx fas fa-user"></i><span> Data User</span></a
    >
    <a href="{{ route('menu.lokasi') }}" class="list-group-item list-group-item-action py-3 {{ $pathLokasi }}"
    ><i class="fasx fas fa-store"></i><span> Lokasi Outlet</span></a
    >
    <a href="{{ route('all.jenis.pembelian') }}" class="list-group-item list-group-item-action py-3 {{ $pathJenisPembelian }}"
    ><i class="fasx fas fa-layer-group"></i><span> Jenis Pembelian</span></a
    >
</nav>
</div>
</div>

<div class="col right-side">
<div class="text-center">
    <h4 class="my-3">Petty Cash Management</h4>
    </div>
    <div>
    @yield('content')  
    </div>  
</div>
</div>    
</div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

        <script src="{{ asset('js') }}/main.js"></script>

        @yield('script')

        <script>
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 3000);
        </script>
    </body>
</html>