<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use App\Models\mahasiswa;
use App\Models\Ruangan;
use App\Models\Verifikasi;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
// use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;








class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'dataMahasiswa' => mahasiswa::get()
        ];

        // dd($data['dataMahasiswa']);
        // $dataMahasiswa = mahasiswa::all();

        return view('mahasiswa.tables', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [];

        return view('mahasiswa.formmahasiswa', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedata = $request->validate([
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'jurusan' => 'required',
            'asal_instansi' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_selesai' => 'required',
            'status' => 'required',
        ]);

        // dd($request->tanggal_masuk);
        $mahasiswa = mahasiswa::create($validatedata);

        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil dimasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(mahasiswa $mahasiswa)
    {
        //
        $data = [

            'mahasiswa' => $mahasiswa,

        ];

        return view('mahasiswa.detailmahasiswa', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(mahasiswa $mahasiswa)
    {
        $data = [
            'mahasiswa' => $mahasiswa,
        ];

        return view('mahasiswa.editmahasiswa', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        //
        $validatedata = $request->validate([
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'jurusan' => 'required',
            'asal_instansi' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_selesai' => 'required',
            'status' => 'required',
        ]);

        $mahasiswa->update($validatedata);




        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        //

        $mahasiswa->delete();



        return redirect()->route('mahasiswa.index')->with('delete', 'Data Berhasil dihapus');
    }
}
