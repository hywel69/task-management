<?php

namespace App\Http\Controllers\Combo\Master;

use App\Http\Controllers\Controllercombo;
use App\Models\Master\Status;

class CombostatusController extends Controllercombo
{
   public function __construct()
   {
      $this->model = new Status();
      $this->combodata = array(
         'id' => 'statusId',
         'kode' => 'statusId',
         'nama' => 'statusNm',
      );
   }
}
