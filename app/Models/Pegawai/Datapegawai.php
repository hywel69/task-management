<?php

namespace App\Models\Pegawai;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapegawai extends Model
{
    use HasFactory;
    protected $table = 'mspegawai';
    protected $primaryKey = 'pegawaiId';
   

    protected $fillable = ['compId','pegawaiNip','pegawaiNm','pegawaiDivisiId'];
}
