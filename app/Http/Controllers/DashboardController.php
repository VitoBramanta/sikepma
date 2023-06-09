<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
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
            'jumlahkp' => mahasiswa::where(['jenis' => 'KP'])->count(), 'jumlahmagang' => mahasiswa::where(['jenis' => 'Magang'])->count(), 'jumlahbelumselesaikp' => mahasiswa::where(['jenis' => 'KP'])->where(['status' => 'Belum Selesai'])->count(), 'jumlahbelumselesaimagang' => mahasiswa::where(['jenis' => 'Magang'])->where(['status' => 'Belum Selesai'])->count(), 'jumlahselesaikp' => mahasiswa::where(['jenis' => 'KP'])->where(['status' => 'Selesai'])->count(), 'jumlahselesaimagang' => mahasiswa::where(['jenis' => 'Magang'])->where(['status' => 'Selesai'])->count(),
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
