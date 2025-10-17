<?php

namespace App\Http\Controllers\Combo\Master;

use App\Http\Controllers\Controllercombo;
use App\Models\Master\Divisi;

class CombodivisiController extends Controllercombo
{
   public function __construct()
   {
      $this->model = new Divisi();
      $this->combodata = array(
         'id' => 'divisiId',
         'kode' => 'divisiId',
         'nama' => 'divisiNm',
      );
   }
}
