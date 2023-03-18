@extends('base.layout')
@section('title', 'AREA')
@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <x-navbar.navbar>
        <h5>SILAHKAN TAMBAHKAN DATA DI TABEL</h5>
        {{-- <x-form.form action="/area/simpan" method="post">
            <div class="row">
                <div class="col">
                    <x-select.select name="area_id" label="Pilih Area">
                        <option selected disabled></option>
                        @foreach ($area as $ar)
                        <option value="{{ $ar->id }}">{{ $ar->nama_area }}</option>
                        @endforeach
                    </x-select.select>
                    <x-select.select name="router_id" label="Pilih Router">
                        <option selected disabled></option>
                        @foreach ($router as $rt)
                        <option value="{{ $rt->id }}">{{ $rt->nama_router }}</option>
                        @endforeach
                    </x-select.select>

                    <x-inputan.inputan idfor="ip_address" name="ip_address" label="IP Address" value="" />
                    <x-inputan.inputan idfor="dhcp" name="dhcp" label="IP LAN" value="" />
                    <x-inputan.inputan idfor="ssid" name="ssid" label="SSID" value="" />
                    <x-inputan.inputan idfor="password" name="password" label="User Password" value="" />
                </div>
            </div>

            <hr class="mt-3">
            <div class="d-flex justify-content-end">
                <x-submit.submit />
            </div>

        </x-form.form> --}}
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
        <x-li.li link="/router" onclick="" label="Router" icon=" fas fa-pallet" />
        <hr>
        <li class="nav-header mb-2" style="background-color: gray">----SERVER----</li>
        <x-li.li link="/server" onclick="" label="Server" icon=" fas fa-server" />
        <x-li.li link="/pma" onclick="" label="Database" icon=" fas fa-database" />
        <hr>
        <li class="nav-header mb-2" style="background-color: gray">----AREA----</li>
        <x-li.li link="/area" onclick="active" label="Area" icon=" fas fa-arrow-rotate-left" />
        <x-li.li link="/unit" onclick="" label="Unit" icon=" fab fa-uniregistry" />
    </x-sidebar.sidebar>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <x-header.header judul="Data area" url="area" />

        <!-- Main content -->
        <section class="content">

            <!-- Content1 -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List Area</h4>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <x-modal.modal target="tambah" judul="Tambah Data" btn="TAMBAH BARU" btnclass="success">
                                    <x-form.form action="/area/simpan_area" method="post">
                                        <div class="row">
                                            <div class="col">
                                                <x-select.select name="unit_id" label="Pilih Unit">
                                                    <option selected disabled></option>
                                                    @foreach ($unit as $ar)
                                                    <option value="{{ $ar->id }}">{{ $ar->nama_unit }}</option>
                                                    @endforeach
                                                </x-select.select>
                                                <x-inputan.inputan idfor="nama_area" name="nama_area" label="Nama Area"
                                                    value="" />
                                            </div>
                                        </div>

                                        <hr class="mt-3">
                                        <div class="d-flex justify-content-end">
                                            <x-submit.submit />
                                        </div>

                                    </x-form.form>
                                </x-modal.modal>
                            </div>
                            <div class="card-body">
                                <x-table.table :headers="['UNIT','NAMA AREA','TERAKHIR UPDATE', 'PILIHAN']">
                                    @foreach ($area as $kom)
                                    <tr>
                                        <td>{{ $kom->unit->nama_unit }}</td>
                                        <td>{{ $kom->nama_area }}</td>
                                        <td>{{ \Carbon\Carbon::parse($kom->updated_at)->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                <x-modal.modal target="edit-{{ Crypt::encrypt($kom->id) }}"
                                                    judul="Edit Data area" btn="EDIT" btnclass="warning">
                                                    <x-form.form action="/area/update_area/{{ $kom->id }}"
                                                        method="post">
                                                        @method('put')
                                                        <div class="row">
                                                            <div class="col">
                                                                <x-select.select name="unit_id" label="Pilih Area">
                                                                    <option value="{{ $kom->unit_id }}">{{
                                                                        $kom->unit->nama_unit }}</option>
                                                                    @foreach ($unit as $ar)
                                                                    <option value="{{ $ar->id }}">{{ $ar->nama_unit }}
                                                                    </option>
                                                                    @endforeach
                                                                </x-select.select>
                                                                <x-inputan.inputan idfor="nama_area" name="nama_area"
                                                                    label="Nama Area" value="{{ $kom->nama_area }}" />

                                                            </div>
                                                        </div>

                                                        <hr class="mt-3">
                                                        <div class="d-flex justify-content-end">
                                                            <x-submit.submit />
                                                        </div>

                                                    </x-form.form>
                                                </x-modal.modal>

                                                <x-button.button href="/area/hapus_area/{{ Crypt::encrypt($kom->id) }}"
                                                    class="danger" caption="HAPUS" />
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </x-table.table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
</script>

@endsection
