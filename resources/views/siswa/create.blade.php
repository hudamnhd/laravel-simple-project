@extends('layouts.master')
@section('title', 'Create Data')
@section('content')
    <form action='{{ url('siswa') }}' method='post'>
        @csrf
        <div class="bg-body my-3 rounded p-3 shadow-sm">
            <div class="row mb-3">
                <label for="nis" class="col-sm-2 col-form-label">nis</label>
                <div class="col-sm-10">
                    <input type="number" placeholder="123" class="rounded-md border px-3 py-2 focus:outline-none"
                        name='nis' id="nis" value="{{ Session::get('nis') }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" placeholder="Huda" class="rounded-md border px-3 py-2 focus:outline-none"
                        name='nama' id="nama" value="{{ Session::get('nama') }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <input type="text" placeholder="Teknik Listrik"
                        class="rounded-md border px-3 py-2 focus:outline-none" name='jurusan' id="jurusan"
                        value="{{ Session::get('jurusan') }}">
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
