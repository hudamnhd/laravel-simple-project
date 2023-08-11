@extends('layouts.master')
@section('title', 'Edit Data')
@section('content')
    <form action='{{ url('siswa/' . $data->nis) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 rounded p-3">
            <div class="row mb-3">
                <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='nis' id="nis" value="{{ $data->nis }}"
                        disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama" value="{{ $data->nama }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='jurusan' id="jurusan" value="{{ $data->jurusan }}">
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ url('siswa') }}"
                    class="rounded-lg bg-slate-500 px-4 py-2 text-sm font-medium text-white">Batal</a>
                <button type="submit" class="rounded-lg bg-blue-500 px-4 py-2 text-sm font-medium text-white"
                    name="submit">
                    SIMPAN
                </button>
            </div>
        </div>
    </form>
@endsection
