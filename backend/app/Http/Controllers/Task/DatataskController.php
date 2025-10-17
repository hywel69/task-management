<?php

namespace App\Http\Controllers\Task;


use App\Models\Pegawai\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controllermaster;

use Session;

class DatataskController extends Controllermaster
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

   public function __construct()
   {

      $this->model = new Task();
      $this->primaryKey = 'task_id';
      $this->mainroute = 'datatask';
      $this->mandatory = array(
         'compId' => 'required',
         'title' => 'required',
      );

      $this->grid = array(
         array(
            'label' => 'TANGGAL',
            'field' => 'deadline',
            'type' => 'text',
            'width' => ''
         ),
         array(
            'label' => 'NAMA',
            'field' => 'name',
            'type' => 'text',
            'width' => ''
         ),
         array(
            'label' => 'TITLE',
            'field' => 'title',
            'type' => 'text',
            'width' => ''
         ),
         array(
            'label' => 'STATUS',
            'field' => 'statusNm',
            'type' => 'text',
            'width' => ''
         ),
      

      );
      $this->form = array(
         array(
            'label' => 'USER',
            'field' => 'user_id',
            'type' => 'autocomplete',
            'url' => 'combouser',
            'col' => 12,
            'text' => 1,           
            'default' => 'Pilih User',
            'keterangan' => '* Wajib Diisi'
         ),
         array(
         'label' => 'Title',
         'field' => 'title',
         'col' => 12,
         'type' => 'text',
         'placeholder' => 'Masukan Judul',
         'keterangan' => '* Wajib Diisi'
         ),
         array(
         'label' => 'Description',
         'field' => 'description',
         'col' => 12,
         'type' => 'textarea',
         'placeholder' => 'Masukan Deskripsi',
         'keterangan' => ''
         ),
         array(
            'label' => 'STATUS',
            'field' => 'status',
            'type' => 'autocomplete',
            'url' => 'combostatus',
            'col' => 12,
            'text' => 1,           
            'default' => 'Pilih Status',
            'keterangan' => '* Wajib Diisi'
         ),
         array(
         'label' => 'Deadline',
         'field' => 'deadline',
         'col' => 12,
         'type' => 'date',
         'placeholder' => 'Pilih Tanggal Deadline',
         'keterangan' => ''
         ),
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
               ->leftjoin('users', 'id', '=', 'user_id')
               ->leftjoin('msstatus', 'statusId', '=', 'status')
               // ->latest()
               ->where($this->model->getTable().'.compId', '=', $compId)
               ->orderBy('task_id','ASC')
               ->paginate(15);
         } else {
            $listdata = $this->model
               ->leftjoin('users', 'id', '=', 'user_id')
               ->leftjoin('msstatus', 'statusId', '=', 'status')
               ->where(function($q) use($search){
                  $q->where('title', 'like', '%' . $search . '%');
               })
               ->where($this->model->getTable().'.compId', '=', $compId)
               ->orderBy('task_id','ASC')
               ->paginate(15);
         }

         $data = array(
            'authmenu' => $this->getusermenu(),
            'company' => Session::get('compNama'),
            'logo' => Session::get('compLogo'),
            'detail' => Session::get('compDetail'),
            'name' => Session::get('name'),
            'namelong' => Session::get('email'),
            'page_tittle' => 'Task',
            'page_active' => 'Input Data',
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
