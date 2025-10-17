<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controllermaster;
use Illuminate\Http\Request;
use DB;
use Session;

class DashboardobatController extends Controllermaster
{
    public function index()
    {   if (trim(Session::get('email')) == '' or $this->checkRouteAuth() == 2) {       $wallidx = rand(1, 7);
            $data = array(
                'wallidx' => $wallidx,
                'message' => 'Anda telah logout dari system.',
            );
            return view('login', $data);
        } else {       $data = array(
                'authmenu' => $this->getusermenu(),
                'company' => Session::get('compNama'),
                'logo' => Session::get('compLogo'),
                'detail' => Session::get('compDetail'),
                'name' => Session::get('name'),
                'namelong' => Session::get('email'),
                'tittle' => 'Dashboard',
                'page_tittle' => 'Biling Management',
                'page_active' => 'Dashboard'
            );

            return view('dashboardobat', $data)->with('data', $data);
        }
    }
}
