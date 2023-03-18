@extends('base.layout')
@section('title', 'Data Email')
@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <x-navbar.navbar>
        <x-form.form action="/email/simpan" method="post">
            <div class="row">
                <div class="col">
                    <x-inputan.inputan idfor="email" name="email" label="EMAIL" value="" />
                    <x-inputan.inputan idfor="password" name="password" label="PASSWORD" value="" />
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
        <x-li.li link="/email" onclick="active" label="Email" icon=" fas fa-envelopes-bulk" />
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
        <x-header.header judul="Data Email" url="email" />

        <!-- Main content -->
        <section class="content">

            <!-- Content -->
            <x-card.card judul="List Email">
                <x-table.table :headers="['EMAIL','PASSWORD','TERAKHIR UPDATE', 'PILIHAN']">
                    @foreach ($email as $em)
                    <tr>
                        <td>{{ $em->email }}</td>
                        <td>{{ $em->password }}</td>
                        <td>{{ \Carbon\Carbon::parse($em->updated_at)->format('d/m/Y') }}</td>
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <x-modal.modal target="edit-{{ Crypt::encrypt($em->id) }}" judul="Edit Data Aplikasi" btn="EDIT" btnclass="warning">
                                    <x-form.form action="/email/update/{{ $em->id }}" method="post">
                                        @method('put')
                                        <div class="row">
                                            <div class="col">
                                                <x-inputan.inputan idfor="email" name="email" label="EMAIL"
                                                    value="{{ $em->email }}" />
                                                <x-inputan.inputan idfor="password" name="password" label="PASSWORD"
                                                    value="{{ $em->password }}" />
                                            </div>
                                        </div>

                                        <hr class="mt-3">
                                        <div class="d-flex justify-content-end">
                                            <x-submit.submit />
                                        </div>

                                    </x-form.form>
                                </x-modal.modal>

                                <x-button.button href="/email/hapus/{{ Crypt::encrypt($em->id) }}" class="danger"
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
