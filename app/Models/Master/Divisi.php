<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $table = 'msdivisi';
    protected $primaryKey = 'divisiId';
   

    protected $fillable = ['compId','divisiNm'];
}
