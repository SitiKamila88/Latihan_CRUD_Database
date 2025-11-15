@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Tambah Pacar</h4>

        <form action="{{ route('pacar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama_pacar" class="form-label">Nama Pacar</label>
                <input type="text" name="nama_pacar" id="nama_pacar" class="form-control" value="{{ old('nama_pacar') }}">
                @error('nama_pacar')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="asal" class="form-label">asal</label>
                <input type="string" name="asal" id="asal" class="form-control" value="{{ old('asal') }}">
                @error('asal')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
                @error('foto')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('pacar.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
