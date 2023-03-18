@extends('base.layout')
@section('title', 'DASHBOARD')
@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <!-- Button trigger modal -->
                {{-- <a type="button" class="nav-link active" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data
                </a> --}}
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->

            <!-- Messages Dropdown Menu -->
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="btn btn-block" type="submit"><span class="badge badge-danger right">LOGOUT <i
                            class="fas fa-arrow-right-from-bracket"></i></span></button>
            </form>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <x-sidebar.sidebar>
        <x-li.li link="/" onclick="active" label="Dashboard" icon=" fas fa-house" />
        <x-li.li link="/task" onclick="" label="Task" icon=" fas fa-check" />
        <x-li.li link="/aplikasi" onclick="" label="Aplikasi" icon=" fas fa-robot" />
        <x-li.li link="/email" onclick="" label="Email" icon=" fas fa-envelopes-bulk" />
        <x-li.li link="/komputer" onclick="" label="Komputer" icon=" fas fa-computer" />
        <hr>
        <li class="nav-header mb-2" style="background-color: gray">----INTERNET----</li>
        <x-li.li link="/wifi" onclick="" label="Wifi" icon=" fas fa-wifi" />
        <x-li.li link="/router" onclick="" label="Router" icon=" fas fa-pallet" />
        <hr>
        <li class="nav-header mb-2" style="background-color: gray">----SERVER----</li>
        <x-li.li link="/server" onclick="" label="Server" icon=" fas fa-server" />
        <x-li.li link="/pma" onclick="" label="Database" icon=" fas fa-database" />
        <hr>
        <li class="nav-header mb-2" style="background-color: gray">----AREA----</li>
        <x-li.li link="/area" onclick="" label="Area" icon=" fas fa-arrow-rotate-left" />
        <x-li.li link="/unit" onclick="" label="Unit" icon=" fab fa-uniregistry" />
    </x-sidebar.sidebar>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-header.header judul="Dashboard" url="" />

        <!-- Main content -->
        <section class="content">

            <!-- Content -->
            <x-card.card judul="List Aplikasi">
                <div class="jumbotron">
                    <h1 class="display-4">Selamat Datang !! di Unit TI</h1>
                    <p class="lead"></p>
                    <hr class="my-4">
                    <p><b>cakra.rsreksawaluya.id</b> | arsip data UNIT TI </p>
                    <p class="lead">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Fitur Aplikasi
                        </button>
                    </p>
                </div>
            </x-card.card>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <x-footer.footer />

</div>
<!-- ./wrapper -->

{{-- <script>
    $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
</script> --}}




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fitur Aplikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-unstyled">
                    <li>Aplikasi ini dibuat dengan :
                      <ul>
                        <li>Laravel v{{ Illuminate\Foundation\Application::VERSION }}</li>
                        <li>(PHP v{{ PHP_VERSION }})</li>
                        <ul>
                            <li>Front End :</li>
                            <ul>
                                <li>Laravel -ui with auth</li>
                                <li>X-Views Blade Component</li>
                                <li>HTML 5</li>
                                <li>JS Datatables button</li>
                                <li>JS Date Picker</li>
                                <li>Bootstrap v4.6 (Admin LTE.)</li>
                                <li>core-JS</li>
                                <li>Axios</li>
                                <li>JQuery</li>
                                <li>Font Awesome v6.1</li>
                                <li>Google Font API</li>
                            </ul>
                        </ul>
                      </ul>
                    </li>
                    <li>Modul program :
                        <ul>
                            <li>Dashboard</li>
                            <li>Data Laporan Perbaikan (Task)</li>
                            <li>Data Aplikasi</li>
                            <li>Data Email</li>
                            <li>Data Komputer</li>
                            <li>Data Wifi</li>
                            <li>Data Router</li>
                            <li>Data Server</li>
                            <li>Data Database</li>
                            <li>Data Area</li>
                            <li>Data Unit</li>
                        </ul>
                    </li>
                    <li>Tahun Pembuatan :
                        <ul>
                            <li>Desember 2022</li>
                        </ul>
                    </li>
                    <li>Launching at :
                        <ul>
                            <li>Maret 2023</li>
                        </ul>
                    </li>
                  </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
