<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;
use Illuminate\Support\Facades\File;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = mahasiswa::all();
        return view('mahasiswa.index')->with('datas', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,png'
        ]);

        $foto_file = $request->file('foto');
        $foto_ektensi = $foto_file->extension();
        $foto_nama = date('ymdhis'). '.' . $foto_ektensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data = [
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'prodi' => $request->input('prodi'),
            'foto' => $foto_nama
        ];

        mahasiswa::create($data);

        return redirect('mahasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = mahasiswa::where('id', $id)->first();
        return view('mahasiswa.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = mahasiswa::where('id', $id)->first();
        return view('mahasiswa.update')->with('data', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'prodi' => 'required'
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'prodi' => $request->input('prodi')
        ];

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'required|mimes:jpeg,jpg,png'
            ]);

            $foto_file = $request->file('foto');
            $foto_ektensi = $foto_file->extension();
            $foto_nama = date('ymdhis'). '.' . $foto_ektensi;
            $foto_file->move(public_path('foto'), $foto_nama);

            $data = mahasiswa::where('id', $id)->first();
            File::delete(public_path('foto').'/'.$data->foto);

            $data = [
                'foto' => $foto_nama
            ];
        }

        mahasiswa::where('id', $id)->update($data);
        return redirect('mahasiswa');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = mahasiswa::where('id', $id)->first();
        File::delete(public_path('foto').'/'.$data->foto);
        mahasiswa::where('id', $id)->delete();
        return redirect('mahasiswa');
    }
}
