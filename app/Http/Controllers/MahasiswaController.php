<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;

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
            'prodi' => 'required'
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'prodi' => $request->input('prodi')
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

        mahasiswa::where('id', $id)->update($data);
        return redirect('mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        mahasiswa::where('id', $id)->delete();
        return redirect('mahasiswa');
    }
}
