@extends('base.layout')
@section('title', 'T A S K')
@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <x-navbar.navbar>
        <x-form.form action="/task/simpan" method="post">
            <div class="row">
                <div class="col">
                    <div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal" required name="tanggal">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group row mb-3">
                            <label for="tanggal" class="col-sm-2 col-form-label">Area</label>
                            <div class="col-sm-10">
                                <select name="area_id" id="area_id" class="form-control" required>
                                    <option value selected disabled></option>
                                    @foreach ($area as $ar)
                                    <option value="{{ $ar->id }}">{{ $ar->nama_area }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="mt-2" style="background-color: green">

                    <x-text.text label="Problem" idfor="problem" name="problem"></x-text.text>
                    <x-text.text label="Solving" idfor="solving" name="solving"></x-text.text>

                    <hr class="mt-2" style="background-color: green">

                    <div>
                        <div class="form-group row">
                            <label for="mulai" class="col-sm-2 col-form-label">Mulai</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" id="mulai" required name="mulai">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group row">
                            <label for="selesai" class="col-sm-2 col-form-label">Selesai</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" id="selesai" required name="selesai">
                            </div>
                        </div>
                    </div>
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
        <x-li.li link="/task" onclick="active" label="Task" icon=" fas fa-check" />
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
        <x-header.header judul="TASK" url="task" />

        <!-- Main content -->
        <section class="content">

            <!-- Content -->
            <x-card.card judul="Laporan">
                <x-table.table
                    :headers="['TANGGAL', 'AREA', 'PROBLEM', 'SOLVING', 'MULAI','SELESAI', 'DURASI', 'PILIHAN']">
                    @foreach ($task as $t)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($t->tanggal)->format('d/m/Y') }}</td>
                        <td>{{ $t->area->nama_area }}</td>
                        <td>{{ $t->problem }}</td>
                        <td>{{ $t->solving }}</td>
                        <td>{{ $t->mulai }}</td>
                        <td>{{ $t->selesai }}</td>
                        <td>
                            @php
                            $mulai = new DateTime( $t->mulai );
                            $selesai = new DateTime( $t->selesai );
                            $interval = date_diff($mulai, $selesai);
                            @endphp

                            {{ $interval->format('%h jam %i menit') }}

                        </td>
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <x-modal.modal target="edit-{{ Crypt::encrypt($t->id) }}" judul="Edit Data task" btn="EDIT" btnclass="warning">
                                    <x-form.form action="/task/update/{{ $t->id }}" method="post">
                                        @method('put')
                                        <div class="row">
                                            <div class="col">
                                                <div>
                                                    <div class="form-group row">
                                                        <label for="tanggal"
                                                            class="col-sm-2 col-form-label">Tanggal</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control" id="tanggal"
                                                                required value="{{ $t->tanggal }}" name="tanggal">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="form-group row mb-3">
                                                        <label for="tanggal"
                                                            class="col-sm-2 col-form-label">Area</label>
                                                        <div class="col-sm-10">
                                                            <select name="area_id" id="area_id" class="form-control"
                                                                required>
                                                                <option value="{{ $t->area->id }}">{{
                                                                    $t->area->nama_area }}</option>
                                                                @foreach ($area as $ar)
                                                                <option value="{{ $ar->id }}">{{ $ar->nama_area }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr class="mt-2" style="background-color: green">

                                                <x-text.text label="Problem" idfor="problem" name="problem">{{
                                                    $t->problem }}</x-text.text>
                                                <x-text.text label="Solving" idfor="solving" name="solving">{{
                                                    $t->solving }}</x-text.text>

                                                <hr class="mt-2" style="background-color: green">

                                                <div>
                                                    <div class="form-group row">
                                                        <label for="mulai" class="col-sm-2 col-form-label">Mulai</label>
                                                        <div class="col-sm-10">
                                                            <input type="time" class="form-control" id="mulai" required
                                                                value="{{ $t->mulai }}" name="mulai">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="form-group row">
                                                        <label for="selesai"
                                                            class="col-sm-2 col-form-label">Selesai</label>
                                                        <div class="col-sm-10">
                                                            <input type="time" class="form-control" id="selesai"
                                                                required value="{{ $t->selesai }}" name="selesai">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <hr class="mt-3">
                                        <div class="d-flex justify-content-end">
                                            <x-submit.submit />
                                        </div>

                                    </x-form.form>
                                </x-modal.modal>

                                <x-button.button href="/task/hapus/{{ Crypt::encrypt($t->id) }}" class="danger"
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
