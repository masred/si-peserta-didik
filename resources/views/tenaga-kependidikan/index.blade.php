@extends('layouts.main')

@section('title', 'Tenaga Kependidikan')
@section('tenaga-kependidikan-menu', 'active')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Tenaga Kependidikan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <form
                            action="{{ route('tenaga-kependidikan.multiple-destroy') }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('tenaga-kependidikan.create') }}"
                               class="btn btn-primary btn-sm d-block float-right ml-2"><i
                                    class="fas fa-plus"></i> Tambah</a>
                            <button type="submit"
                                    title="Delete"
                                    class="btn btn-danger btn-sm d-inline btn-del d-inline-block float-right">
                                <i class="far fa-trash-alt"></i> Hapus
                            </button>
                            <table id="example1" class="table table-bordered dataTable dtr-inline table-striped"
                                   role="grid"
                                   aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc_disabled sorting_desc_disabled" class="sorting"
                                        tabindex="0" aria-controls="example1" rowspan="1" colspan="1" width="10px">
                                        <input type="checkbox" class="custom-checkbox" id="pilih_semua"
                                               name="pilih_semua">
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending"
                                        style="width: 50px">
                                        No
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Nama
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">NIP</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">JK</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Tempat Lahir</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Tanggal Lahir</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Agama</th>
                                    <th class="sorting sorting_asc_disabled sorting_desc_disabled" tabindex="0"
                                        aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending" style="width: 20px">
                                        Aksi
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tenaga_kependidikan as $tk)
                                    <tr role="row" class="odd">
                                        <td>
                                            <input type="checkbox" class="form-check"
                                                   name="id[]" value="{{ $tk->id }}">
                                        </td>
                                        <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                        <td>{{ $tk->nama }}</td>
                                        <td>{{ $tk->nip }}</td>
                                        <td>{{ $tk->jenis_kelamin }}</td>
                                        <td>{{ $tk->tempat_lahir }}</td>
                                        <td>{{ date('d-m-Y', strtotime($tk->tanggal_lahir)) }}</td>
                                        <td>{{ $tk->agama }}</td>
                                        <td>
                                            <div class="row justify-content-center">
                                                <div class="col d-flex justify-content-center">
                                                    <a href="{{ route('tenaga-kependidikan.show', $tk->id) }}"
                                                       class="btn btn-primary btn-sm"><i
                                                            class="far fa-eye"></i></a>
                                                    <a href="{{ route('tenaga-kependidikan.edit', $tk->id) }}"
                                                       class="btn btn-success btn-sm ml-2"><i
                                                            class="far fa-edit"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('script')
    <script>
        $("#pilih_semua").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        $(document).ready(function () {
            $('.btn-del').attr('disabled', true);
            $('input[type="checkbox"]').click(function () {
                if ($(this).prop('checked') === true) {
                    $('.btn-del').attr('disabled', false);
                } else {
                    $('.btn-del').attr('disabled', true);
                }
            });
        });
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
        @if(session('status'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        Toast.fire({
            icon: 'success',
            title: '{!! session('status') !!}'
        });
        @endif
        $('.btn-del').click(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Ingin menghapus data?',
                text: 'Data yang telah dihapus tidak dapat kembali lagi',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    $(this).parent().submit()
                }
            })
        });
    </script>
@endsection