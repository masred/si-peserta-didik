@extends('layout.main')

@section('title', 'Tambah Jurusan')

@section('content')
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card card-lightblue">
                <div class="card-header">
                    <h3 class="card-title">Form Jurusan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('jurusan.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode_jurusan">Kode Jurusan</label>
                            <input type="text" class="form-control @error('kode_jurusan') is-invalid @enderror" id="kode_jurusan" placeholder="Masukan kode jurusan" name="kode_jurusan" required>
                            @error('kode_jurusan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_jurusan">Nama Jurusan</label>
                            <input type="text" class="form-control @error('nama_jurusan') is-invalid @enderror" id="nama_jurusan" placeholder="Masukan nama jurusan" name="nama_jurusan" required>
                            @error('nama_jurusan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection