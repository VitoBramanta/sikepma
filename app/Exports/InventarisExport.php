<?php

namespace App\Exports;

use App\Models\mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;


class MahasiswaExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        $mahasiswa = mahasiswa::whereHas('verifikasi', function ($query) {
            $query->where('status', 'Terverifikasi');
        })->get();
        if (count($mahasiswa) === 0) {
            abort(500);
        }
        return collect([
            $this->dataInventars($mahasiswa)
        ]);
    }
    public function headings(): array
    {
        return [
            'no',
            'Kode Barang',
            'Nama Barang',
            'Merk/Type',
            'Bahan',
            'Asal-Usul',
            'Tahun Perolehan',
            'Ukuran',
            'Satuan',
            'Kondisi',
            'Jumlah',
            'Harga',
            'Keterangan'
        ];
    }
    public function registerEvents(): array
    {

        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:W1';
                $event->sheet->setAllBorders('thin')->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            }
        ];
    }
    public function dataInventars($model)
    {
        foreach ($model as $key => $mahasiswa) {
            $data[$key]['no'] = $key + 1;
            $data[$key]['kode_barang'] = $mahasiswa->kode_barang;
            $data[$key]['nama_barang'] = $mahasiswa->nama_barang;
            $data[$key]['merk_type'] = $mahasiswa->merk_type;
            $data[$key]['bahan'] = $mahasiswa->bahan;
            $data[$key]['asalusul'] = $mahasiswa->asalusul;
            $data[$key]['tahun_perolehan'] = $mahasiswa->tahun_perolehan;
            $data[$key]['ukuran'] = $mahasiswa->ukuran;
            $data[$key]['satuan'] = $mahasiswa->satuan;
            $data[$key]['kondisi'] = $mahasiswa->kondisi;
            $data[$key]['jumlah'] = $mahasiswa->jumlah;
            $data[$key]['harga'] = $mahasiswa->harga;
            $data[$key]['keterangan'] = $mahasiswa->keterangan;
        }

        return $data;
    }
}
