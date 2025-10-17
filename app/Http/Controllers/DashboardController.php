<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controllermaster;
use Illuminate\Http\Request;
use DB;
use Session;

class DashboardController extends Controllermaster //Controller 
{
    public function index(){
        
        if(trim(Session::get('email'))=='' or $this->checkRouteAuth()==2){
            $wallidx=rand(1,7);
            $data = array(
                'wallidx' => $wallidx,
                'message' => 'Anda telah logout dari system.',
            ); 
            return view('login',$data);        
        }else{           // $tonase = DB::table('v_kapal_tonase')->get();
              
                // $kecamatan_diagnosa = DB::table('v_bbm')->get();

                // $bbm = DB::table('v_bbm')->get();
                // $kub= DB::table('v_anggota_kub')->get();
                // $alattangkap= DB::table('v_alattangkap')->get();
                // $usianelayan= DB::table('v_usianelayan')->get();
               


                $listumur=array();
                // foreach ($umur as $key => $val) {
                //     $kode=$val->no;
                //     $ket =$val->ket;
                //     $umurdiag=$this->getUmurDiagnosa($kode);

                //     $listumur[]=array(
                //                     "ket"=>$ket,
                //                     "diagnosa"=>!empty($umurdiag->diagnosa)?$umurdiag->diagnosa:'',
                //                     "jumlah"=>!empty($umurdiag->jumlah)?number_format($umurdiag->jumlah):0,
                //                 );
                // }


                // $bbmResult=array();
                // foreach ($bbm as $key => $val) {
                //     $kode=$val->kode;
                //     $jumlah =$val->jumlah;
                //     // $nama=$this->getKecNama($kode);
                //     $nama=$val->nama;
                //     // $kecdiag=$this->getKecDiag($kode);
                //     $bbmResult[]=array(
                //                     "kode"=>$kode,
                //                     "nama"=>$nama,
                //                     "jumlah"=>$jumlah,
                //                     "diagnosa"=>!empty($kecdiag->nama)?$kecdiag->nama:'',
                //                     "maxjum"=>!empty($kecdiag->jumlah)?number_format($kecdiag->jumlah):0,
                //                 );
                // }
                $data = array(
                        'authmenu'=>$this->getusermenu(),
                        'company' => Session::get('compNama'),
                        'logo' => Session::get('compLogo'),
                        'detail' => Session::get('compDetail'),
                        'name' => Session::get('name'),
                        'namelong' => Session::get('email'),
                        'tittle'=>'Dashboard',
                        'page_tittle'=> 'Biling Management',
                        'page_active'=>'Dashboard',
                        // 'tonase' => json_encode($tonase),
                        // 'diagnosa2' => $diagnosa,
                        // 'bbm' => json_encode($bbmResult),
                        // 'kub' => json_encode($kub),
                        // 'alattangkap' => json_encode($alattangkap),
                        // 'usianelayan' => json_encode($usianelayan),
                        
                        // 'listkecamatan' => $bbmResult,
                        // 'kecamatan_diagnosa' => json_encode($kecamatan_diagnosa),
                        // 'gender' => json_encode($gender),
                        // 'listumur' => $listumur,
                        // 'umurdiagnosa' => json_encode($umur_diagnosa)
                        );
                return view('dashboard',$data)->with('data', $data);
        }
    }
    public function getUmurDiagnosa($kode){
            $umur = DB::table('view_umur_diagnosa')
                        ->where('no','=',$kode)
                        ->orderby('jumlah','desc')
                        ->limit(1)
                        ->get();

            if(count($umur)>0){
                return $umur[0];
            }else{
                return '';                
            }

    }

    public function getKecDiag($kode){
            $kecdiag = DB::table('view_kecamatan_diagnosa')
                        ->where('rawatKec','=',$kode)
                        ->orderby('jumlah','desc')
                        ->limit(1)
                        ->get();

            if(count($kecdiag)>0){
                return $kecdiag[0];
            }else{
                return '';                
            }        
    }

    public function getKecNama($kode){
            $kecamatan = DB::table('mskec')
                        ->where('kecKode','=',$kode)
                        ->get();

            if(count($kecamatan)>0){
                return $kecamatan[0]->kecNama;
            }else{
                return '';                
            }
    }

}
