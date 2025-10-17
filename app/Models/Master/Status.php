<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'msstatus';
    protected $primaryKey = 'statusId';
   

    protected $fillable = ['compId','statusNm'];
}
