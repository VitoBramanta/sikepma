<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'jumlahmagang' => mahasiswa::where(['jenis' => 'Magang'])->count(), 'jumlahbelumselesaimagang' => mahasiswa::where(['jenis' => 'Magang'])->where(['status' => 'Belum Selesai'])->count(), 'jumlahselesaimagang' => mahasiswa::where(['jenis' => 'Magang'])->where(['status' => 'Selesai'])->count(),
        ];
        //dd($data);
        return view('dashboard.dashboard', $data);
    }
    public function data()
    {
        $data = [];
        // dd($data['dataMahasiswa']);
        // $dataMahasiswa = mahasiswa::all();

        return view('dashboard.tables', $data);
    }
}
