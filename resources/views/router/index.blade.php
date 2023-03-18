@extends('base.layout')
@section('title', 'Data Router Internet')
@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <x-navbar.navbar>
        <x-form.form action="/router/simpan" method="post">
            <div class="row">
                <div class="col">
                    <x-inputan.inputan idfor="nama_router" name="nama_router" label="Nama router" value="" />
                    <x-inputan.inputan idfor="ip_address" name="ip_address" label="IP Address" value="" />
                    <x-inputan.inputan idfor="user_login" name="user_login" label="User Login" value="" />
                    <x-inputan.inputan idfor="password" name="password" label="User Password" value="" />
                    <x-inputan.inputan idfor="ssid_default" name="ssid_default" label="SSID Default" value="" />
                    <x-inputan.inputan idfor="ssid_password" name="ssid_password" label="SSID Password" value="" />
                </div>
            </div>

            <hr class="mt-3">
            <div class="d-flex justify-content-end">
                <x-submit.submit />
            </div>

        </x-form.form>
    </x-navbar.navbar>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <x-sidebar.sidebar>
        <x-li.li link="/" onclick="" label="Dashboard" icon=" fas fa-house" />
        <x-li.li link="/task" onclick="" label="Task" icon=" fas fa-check" />
        <x-li.li link="/aplikasi" onclick="" label="Aplikasi" icon=" fas fa-robot" />
        <x-li.li link="/email" onclick="" label="Email" icon=" fas fa-envelopes-bulk" />
        <x-li.li link="/komputer" onclick="" label="Komputer" icon=" fas fa-computer" />
        <hr>
        <li class="nav-header mb-2" style="background-color: gray">----INTERNET----</li>
        <x-li.li link="/wifi" onclick="" label="Wifi" icon=" fas fa-wifi" />
        <x-li.li link="/router" onclick="active" label="Router" icon=" fas fa-pallet" />
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
        <x-header.header judul="Data router" url="router" />

        <!-- Main content -->
        <section class="content">

            <!-- Content -->
            <x-card.card judul="List router">
                <x-table.table
                    :headers="['NAMA ROUTER', 'IP ADDRESS','USER LOGIN','PASSWORD','SSID DEFAULT','SSID PASSWORD','TERAKHIR UPDATE','PILIHAN']">
                    @foreach ($router as $kom)
                    <tr>
                        <td>{{ $kom->nama_router }}</td>
                        <td>{{ $kom->ip_address }}</td>
                        <td>{{ $kom->user_login }}</td>
                        <td>{{ $kom->password }}</td>
                        <td>{{ $kom->ssid_default }}</td>
                        <td>{{ $kom->ssid_password }}</td>
                        <td>{{ \Carbon\Carbon::parse($kom->updated_at)->format('d/m/Y') }}</td>
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <x-modal.modal target="edit-{{ Crypt::encrypt($kom->id) }}" judul="Edit Data router" btn="EDIT" btnclass="warning">
                                    <x-form.form action="/router/update/{{ $kom->id }}" method="post">
                                        @method('put')
                                        <div class="row">
                                            <div class="col">
                                                <x-inputan.inputan idfor="nama_router" name="nama_router"
                                                    label="Nama router" value="{{ $kom->nama_router }}" />
                                                <x-inputan.inputan idfor="ip_address" name="ip_address"
                                                    label="IP Address" value="{{ $kom->ip_address }}" />
                                                <x-inputan.inputan idfor="user_login" name="user_login"
                                                    label="User Login" value="{{ $kom->user_login }}" />
                                                <x-inputan.inputan idfor="password" name="password"
                                                    label="User Password" value="{{ $kom->password }}" />
                                                <x-inputan.inputan idfor="ssid_default" name="ssid_default"
                                                    label="SSID Default" value="{{ $kom->ssid_default }}" />
                                                <x-inputan.inputan idfor="ssid_password" name="ssid_password"
                                                    label="SSID Password" value="{{ $kom->ssid_password }}" />
                                            </div>
                                        </div>

                                        <hr class="mt-3">
                                        <div class="d-flex justify-content-end">
                                            <x-submit.submit />
                                        </div>

                                    </x-form.form>
                                </x-modal.modal>

                                <x-button.button href="/router/hapus/{{ Crypt::encrypt($kom->id) }}" class="danger"
                                    caption="HAPUS" />
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </x-table.table>
            </x-card.card>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <x-footer.footer />

</div>
<!-- ./wrapper -->

<script>
    $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
</script>

@endsection
