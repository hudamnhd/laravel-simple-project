<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request) // Pastikan tipe parameter adalah Request
    {
        $itemPerPage = 5;
        $keyword = $request->keyword;
        if (strlen($keyword)) {
            $data = siswa::where('nis', 'like', "%$keyword%")
                ->orWhere('nama', 'like', "%$keyword%")
                ->orWhere('jurusan', 'like', "%$keyword%")
                ->paginate($itemPerPage);
        } else {
            $data = siswa::orderBy('nis', 'desc')->paginate($itemPerPage);
        }
        return view('siswa.index')->with('data', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $user = Auth::user();
        if ($user->role !== 'guru') {
            return redirect()->to('siswa')->with('error', 'Anda tidak di izinkan mengakses menu Tambah Data');
        }
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nis', $request->nis);
        Session::flash('nama', $request->nama);
        Session::flash('jurusan', $request->jurusan);
        $request->validate([
            'nis' => 'required|numeric|unique:siswa,nis',
            'nama' => 'required',
            'jurusan' => 'required',

        ], [
            'nis.required' => 'NIS wajid diisi',
            'nis.numeric' => 'NIS wajid angka',
            'nis.unique' => 'NIS sudah terdaftar',
            'nama.required' => 'Nama wajid diisi',
            'jurusan.required' => 'Jurusan wajid diisi',

        ]);

        $data = [
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
        ];

        siswa::create($data);

        return redirect()->to('siswa')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user = Auth::user();
        if ($user->role !== 'guru') {
            return redirect()->to('siswa')->with('error', 'Anda tidak di izinkan mengakses menu Edit Data');
        }

        $data = siswa::where('nis', $id)->first();
        return view('siswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
                 'nama' => 'required',
                 'jurusan' => 'required',
             ], [
                 'nama.required' => 'Nama wajid diisi',
                 'jurusan.required' => 'Jurusan wajid diisi',
             ]);

        $data = [
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
        ];

        siswa::where('nis', $id)->update($data);

        return redirect()->to('siswa')->with('success', 'Data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        if ($user->role !== 'guru') {
            return redirect()->to('siswa')->with('error', 'Anda tidak di izinkan mengakses menu Hapus Data');
        }

        siswa::where('nis', $id)->delete();

        return redirect()->to('siswa')->with('success', 'Data berhasil dihapus');
    }
}
