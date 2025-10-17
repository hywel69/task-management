<?php

namespace App\Http\Controllers\Master;


use App\Models\Master\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controllermaster;

use Session;

class StatusController extends Controllermaster
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

   public function __construct()
   {

      $this->model = new Status();
      $this->primaryKey = 'statusId';
      $this->mainroute = 'status';
      $this->mandatory = array(
         'compId' => 'required',
         'statusNm' => 'required',
      );

      $this->grid = array(
         array(
            'label' => 'NAMA STATUS',
            'field' => 'statusNm',
            'type' => 'text',
            'width' => ''
         ),
      

      );
      $this->form = array(
         array(
            'label' => 'NAMA STATUS',
            'field' => 'statusNm',
            'col' => 12,
            'type' => 'text',
            'placeholder' => 'Masukan Status',
            'keterangan' => '* Wajib Diisi'
         ) ,
      
      );

   }

   public function index()
   {
      if (trim(Session::get('email')) == '' or $this->checkRouteAuth() == 2) {
         $wallidx = rand(1, 7);
         $data = array(
            'wallidx' => $wallidx,
            'message' => 'Anda telah logout dari system.',
         );
         return view('login', $data);
      } else {

         $compId = Session::get('compId');
         $compNama = Session::get('compNama');
         $search = !empty($_GET['search']) ? $_GET['search'] : '';
         if ($search == '') {
            $listdata = $this->model
               // ->latest()
               ->where('compId', '=', $compId)
               ->orderBy('statusId','ASC')
               ->paginate(15);
         } else {
            $listdata = $this->model
               ->where(function($q) use($search){
                  $q->where('statusNm', 'like', '%' . $search . '%');
               })
               ->where('compId', '=', $compId)
               ->orderBy('statusKd','ASC')
               ->paginate(15);
         }

         $data = array(
            'authmenu' => $this->getusermenu(),
            'company' => Session::get('compNama'),
            'logo' => Session::get('compLogo'),
            'detail' => Session::get('compDetail'),
            'name' => Session::get('name'),
            'namelong' => Session::get('email'),
            'page_tittle' => 'Master',
            'page_active' => 'Master Status',
            'grid' => $this->grid,
            'form' => $this->form,
            'listdata' => $listdata,
            'primaryKey' => $this->primaryKey,
            'mainroute' => $this->mainroute,
            'compId' => $compId,
            'search' => $search,
            'code' => 0,
         );

         return view('Master.index', $data)->with('data', $data);
      }
   }
   
}
