<?php

namespace App\Http\Controllers\Combo\Master;

use App\Http\Controllers\Controllercombo;
use App\Models\User;

class CombouserController extends Controllercombo
{
   public function __construct()
   {
      $this->model = new User();
      $this->combodata = array(
         'id' => 'id',
         'kode' => 'id',
         'nama' => 'name',
      );
   }
}
