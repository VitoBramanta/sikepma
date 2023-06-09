<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d M Y, H:i:s') . " WIB";
    }
    public function setTanggalMasukAttribute($value)
    {
        $this->attributes['tanggal_masuk'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setTanggalSelesaiAttribute($value)
    {
        $this->attributes['tanggal_selesai'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function getTanggalMasukAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }
    public function getTanggalSelesaiAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }
}
