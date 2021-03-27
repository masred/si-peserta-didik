<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('jurusan.index', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'kode_jurusan' => ['required', 'unique:jurusan', 'min:3'],
            'nama_jurusan' => ['required']
        ];
        $customMessages = [
            'required' => ':attribute harus diisi!',
            'unique' => ':attribute tidak tersedia',
            'min' => ':attribute minimal :min huruf',
        ];
        $request->validate($rules, $customMessages);
        Jurusan::create($request->all());

        return redirect('/jurusan')->with('status', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Jurusan $jurusanModel
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusanModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Jurusan $jurusanModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Jurusan $jurusanModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $rules = [
            'kode_jurusan' => ['required', 'min:3', Rule::unique('jurusan')->ignore($jurusan->kode_jurusan,'kode_jurusan')],
            'nama_jurusan' => ['required']
        ];
        $customMessages = [
            'required' => ':attribute jurusan harus diisi!',
            'unique' => ':attribute tidak tersedia',
            'min' => ':attribute minimal :min huruf',
        ];

        $request->validate($rules, $customMessages);
        Jurusan::find($jurusan->kode_jurusan)->update($request->all());

        return redirect('/jurusan')->with('status', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Jurusan $jurusanModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        Jurusan::destroy($jurusan->kode_jurusan);
        return redirect('/jurusan')->with('status', 'data berhasil dihapus.');
    }
}
