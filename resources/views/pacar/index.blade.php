@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold">Daftar Pacarku</h4>
    <a href="{{ route('pacar.create') }}" class="btn btn-primary shadow-sm">+ Tambah Pacar</a>
</div>

<table class="table table-hover align-middle shadow-sm rounded-3 overflow-hidden">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Pacar</th>
            <th>Foto</th>
            <th>Asal</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($pacar as $item)
        <tr>
            <td class="fw-bold">{{ $loop->iteration }}</td>

            <td>{{ $item->nama_pacar }}</td>

            <td>
                @if($item->foto)
                    <img src="{{ asset('storage/'.$item->foto) }}" width="80" style="border-radius: 8px; object-fit: cover;">
                @else
                    <span class="text-muted fst-italic">Tidak ada</span>
                @endif
            </td>

            <td>{{ $item->asal }}</td>

            <td>
                <a href="{{ route('pacar.edit', $item->id) }}" 
                   class="btn btn-warning btn-sm shadow-sm me-1">
                    Edit
                </a>

                <form action="{{ route('pacar.destroy', $item->id) }}" 
                      method="POST" 
                      class="d-inline"
                      onsubmit="return confirm('Yakin mau hapus?')">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm shadow-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
