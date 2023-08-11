@extends('layouts.master')
@section('title', 'View Data')
@section('content')

    <div class="container rounded pt-4 shadow-sm">
        {{--  Message --}}
        @include('components.message')
        <header>
            <div class="mx-auto py-4">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div class="text-center sm:text-left">
                        <h1 class="text-2xl font-bold capitalize text-gray-900 sm:text-3xl">
                            Welcome Back, {{ Auth::user()->name }} </h1>
                        <p class="mt-1.5 text-sm text-gray-500">
                            Anda login sebagai <span class="font-semibold capitalize">{{ Auth::user()->role }}</span> 🎉
                        </p>
                    </div>
                    <div class="mt-4 flex flex-col gap-4 sm:mt-0 sm:flex-row sm:items-center">
                        <a href='/siswa/create'
                            class="inline-flex items-center justify-center gap-1.5 rounded-lg border border-gray-200 px-5 py-3 text-gray-500 transition hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:ring">
                            <span class="text-sm font-medium"> Tambah Data </span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class="block rounded-lg bg-slate-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring"
                                type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <!-- FORM PENCARIAN -->
        <div class="mb-4 pb-3">
            <form class="d-flex" action="{{ url('siswa') }}" method="get">
                <input class="rounded-lg px-4 py-2" type="search" name="keyword" value="{{ Request::get('keyword') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="rounded-lg bg-blue-500 px-4 py-2 font-medium text-white" type="submit">Cari</button>
            </form>
        </div>
        <!-- TABLE -->
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="w-full table-fixed divide-y-2 divide-gray-200 bg-white">
                <thead class="text-left">
                    <tr>
                        <th class="w-[100px] whitespace-nowrap px-4 py-2 font-medium text-gray-900">No</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">NIS</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Jurusan </th>
                        <th class="w-[200px] px-4 py-2 font-medium text-gray-900">Aksi </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php $i = $data->firstItem(); ?>
                    @foreach ($data as $item)
                        <tr class="hover:bg-slate-50">
                            <td class="w-[80px] whitespace-nowrap px-4 py-2 text-gray-700">{{ $i }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $item->nis }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $item->nama }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $item->jurusan }}</td>
                            <td class="px-4 py-2 text-sm">
                                <button onclick="window.location='{{ url('siswa/' . $item->nis . '/edit') }}'"
                                    class="rounded-lg bg-blue-500 p-2 text-white focus:border-blue-300 focus:outline-none focus:ring">
                                    <svg class="feather feather-edit" fill="none" height="20" width="20"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </button>

                                <form onsubmit="return confirm('Yakin akan menghapus')" class="inline"
                                    action="{{ url('siswa/' . $item->nis) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-lg bg-red-500 p-2 font-medium text-white"><svg
                                            xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg></button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>

        </div>
        {{ $data->withQueryString()->links() }}
    </div>
@endsection
