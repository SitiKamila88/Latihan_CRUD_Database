@extends('layouts.app')

@section('content')

<h2 class="title mb-4">Edit Pacar</h2>

<form action="{{ route('pacar.update', $pacar->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama Pacar</label>
        <input type="text" name="nama_pacar" class="form-control shadow-sm"
               value="{{ old('nama_pacar', $pacar->nama_pacar) }}">
        @error('nama_pacar') 
            <small class="text-danger">{{ $message }}</small> 
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Asal</label>
        <input type="text" name="asal" class="form-control shadow-sm"
               value="{{ old('asal', $pacar->asal) }}">
        @error('asal') 
            <small class="text-danger">{{ $message }}</small> 
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label d-block">Foto</label>

        @if($pacar->foto)
            <img src="{{ asset('storage/'.$pacar->foto) }}" 
                 width="120" 
                 class="mb-3 rounded shadow-sm border">
        @endif

        <input type="file" name="foto" class="form-control shadow-sm">
        @error('foto') 
            <small class="text-danger">{{ $message }}</small> 
        @enderror
    </div>

    <div class="d-flex justify-content-between mt-4">
        <button class="btn btn-success px-4">Update</button>
        <a href="{{ route('pacar.index') }}" class="btn btn-secondary px-4">Kembali</a>
    </div>

</form>

@endsection
