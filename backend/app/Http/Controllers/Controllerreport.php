<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Master\Subrincianobjek;
use Validator;
use Session;
use App\Models\Rolemenu;
use App\Models\Menu;
use DB;
class Controllerreport extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function getusermenu()
    {   $compId = Session::get('compId');
        $role = Session::get('role');

        $menu = new Menu();
        $level1 = $menu
            ->leftjoin('role_menu', 'role_menu.rmMenuId', '=', 'menu.menuId')
            // ->where('menu.compId','=',$compId)
            ->where('menu.menuParent', '=', null)
            ->where('role_menu.rmRoleId', '=', $role)
            ->orderby('menu.menuOrder', 'asc')
            ->get();
        $result = array();
        $index = 0;
        foreach ($level1 as $key => $val) {
            $res1 = array(
                'menuNama' => $val->menuNama,
                'menuRoute' => $val->menuRoute,
                'menuIcon' => $val->menuIcon,
                'menuLevel' => 1,
                // 'menuActive' => $val->menuActive,
                'menuChild' => '',
            );
            $result[] = $res1;

            $level2 = $menu
                ->leftjoin('role_menu', 'role_menu.rmMenuId', '=', 'menu.menuId')
                // ->where('menu.compId','=',$compId)
                ->where('menu.menuParent', '=', $val->menuId)
                ->where('role_menu.rmRoleId', '=', $role)
                ->orderby('menu.menuOrder', 'asc')
                ->get();
            $res2 = array();
            $index2 = 0;
            foreach ($level2 as $key2 => $val2) {
                $res2[] = array(
                    'menuNama' => $val2->menuNama,
                    'menuRoute' => $val2->menuRoute,
                    'menuIcon' => $val2->menuIcon,
                    'menuLevel' => 2,
                    // 'menuActive' => $val->menuActive,
                    'menuChild' => '',
                );
                $level3 = $menu
                    ->leftjoin('role_menu', 'role_menu.rmMenuId', '=', 'menu.menuId')
                    // ->where('menu.compId','=',$compId)
                    ->where('menu.menuParent', '=', $val2->menuId)
                    ->where('role_menu.rmRoleId', '=', $role)
                    ->orderby('menu.menuOrder', 'asc')
                    ->get();
                $res3 = array();
                $index3 = 0;
                foreach ($level3 as $key3 => $val3) {
                    $res3[] = array(
                        'menuNama' => $val3->menuNama,
                        'menuRoute' => $val3->menuRoute,
                        'menuIcon' => $val3->menuIcon,
                        'menuLevel' => 3,
                        // 'menuId' => $val3->menuId,
                        'menuChild' => '',
                    );
                    $level4 = $menu
                        ->leftjoin('role_menu', 'role_menu.rmMenuId', '=', 'menu.menuId')
                        // ->where('menu.compId','=',$compId)
                        ->where('menu.menuParent', '=', $val3->menuId)
                        ->where('role_menu.rmRoleId', '=', $role)
                        ->orderby('menu.menuOrder', 'asc')
                        ->get();
                    $res4 = array();
                    $index4 = 0;
                    foreach ($level4 as $key4 => $val4) {
                        $res4[] = array(
                            'menuNama' => $val4->menuNama,
                            'menuRoute' => $val4->menuRoute,
                            'menuIcon' => $val4->menuIcon,
                            'menuLevel' => 4,
                            // 'menuActive' => $val->menuActive,
                            'menuChild' => '',
                        );

                        $level5 = $menu
                            ->leftjoin('role_menu', 'role_menu.rmMenuId', '=', 'menu.menuId')
                            // ->where('menu.compId','=',$compId)
                            ->where('menu.menuParent', '=', $val4->menuId)
                            ->where('role_menu.rmRoleId', '=', $role)
                            ->orderby('menu.menuOrder', 'asc')
                            ->get();

                        $res5 = array();
                        foreach ($level5 as $key5 => $val5) {
                            $res5[] = array(
                                'menuNama' => $val5->menuNama,
                                'menuRoute' => $val5->menuRoute,
                                'menuIcon' => $val5->menuIcon,
                                'menuLevel' => 5,
                                // 'menuActive' => $val->menuActive,
                                'menuChild' => '',
                            );
                        }

                        $res4[$index4]['menuChild'] = $res5;
                        $index4++;
                    }
                    $res3[$index3]['menuChild'] = $res4;
                    $index3++;
                }
                $res2[$index2]['menuChild'] = $res3;
                $index2++;
            }
            $result[$index]['menuChild'] = $res2;
            $index++;
        }
        return $result;
    }

  
    public function index ()
    {
      
    }

    public function getnamasubrek($kdrek){
       
        $sub = Subrincianobjek::select('srobjNm as nama')
                ->where('srobjKd','=',$kdrek)              
                ->limit(1)
                ->get();
                $nm=!empty($sub[0]->nama)?$sub[0]->nama:'';       
        return $nm;
    }

    public function getMasterRekLevel($level, $levelrek)
   {
      $lvl = $level;
      if ($lvl == 1) {       

        $rek1 = DB::table('msakun')
           ->select('akunKd AS rek', 'akunKd AS kode', 'akunNm AS nama')
           // ->where(DB::raw('LENGTH(kode)'), '<', 6)
           ->where(DB::raw('akunKd'), 'like', $levelrek . '%')
           // ->whereIn('jenisKd', $arrjenis)
           ->orderby('akunKd', 'ASC')
           ->get();
           
     } else if ($lvl == 2) {       

         $rek1 = DB::table('mskelompok')
            ->select('kelompokKd AS rek', 'kelompokKd AS kode', 'kelompokNm AS nama')
            // ->where(DB::raw('LENGTH(kode)'), '<', 6)
            ->where(DB::raw('kelompokKd'), 'like', $levelrek . '%')
            // ->whereIn('jenisKd', $arrjenis)
            ->orderby('kelompokKd', 'ASC')
            ->get();

      } else if ($lvl == 3) {       

         $rek1 = DB::table('msjenis')
            ->select('jenisKd AS rek', 'jenisKd AS kode', 'jenisNm AS nama')
            // ->where(DB::raw('LENGTH(kode)'), '<', 6)
            ->where(DB::raw('jenisKd'), 'like', $levelrek . '%')
           // ->whereIn('jenisKd', $arrjenis)
            ->orderby('jenisKd', 'ASC')
            ->get();
      } else 
    if ($lvl == 4) {       

         $rek1 = DB::table('msobjek')
            ->select('objekKd AS rek', 'objekKd AS kode', 'objekNm AS nama')
            // ->where(DB::raw('LENGTH(kode)'), '<', 6)
            ->where(DB::raw('objekKd'), 'like', $levelrek . '%')
            //->whereIn('objekKd', $arrobjek)
            ->orderby('objekKd', 'ASC')
            ->get();
      } else 
    if ($lvl == 5) {        

         $rek1 = DB::table('msrincianobjek')
            ->select('robjKd AS rek', 'robjKd AS kode', 'robjNm AS nama')
            // ->where(DB::raw('LENGTH(kode)'), '<', 6)
            ->where(DB::raw('robjKd'), 'like', $levelrek . '%')
            //->whereIn('robjKd', $arrrincianobjek)
            ->orderby('robjKd', 'ASC')
            ->get();
      } else 
    if ($lvl == 6) {        

         $rek1 = DB::table('mssubrincianobjek')
            ->select('srobjKd AS rek', 'srobjKd AS kode', 'srobjNm AS nama')
            // ->where(DB::raw('LENGTH(kode)'), '<', 6)
            ->where(DB::raw('srobjKd'), 'like', $levelrek . '%')
            //->whereIn('srobjKd', $arrsubro)
            ->orderby('srobjKd', 'ASC')
            ->get();
      }
      return $rek1;
   }

    public function getRekLevel($level, $levelrek, $tablelalu, $kolomlalu)
    {
        $lvl = $level;
        if ($lvl == 1) {       
            $rek1 = DB::table('msakun')
                ->select('akunKd AS rek', 'akunKd AS kode', 'akunNm AS nama')
                ->where(DB::raw('akunKd'), 'like', $levelrek . '%')
                ->orderby('akunKd', 'ASC')
                ->get();
        } else if ($lvl == 2) {       
            $rek1 = DB::table('mskelompok')
                ->select('kelompokKd AS rek', 'kelompokKd AS kode', 'kelompokNm AS nama')
                ->where(DB::raw('kelompokKd'), 'like', $levelrek . '%')
                ->orderby('kelompokKd', 'ASC')
                ->get();
        } else if ($lvl == 3) {
            $ang = DB::table('angdrka')
            ->select(DB::raw('left(adrkaSubRekKd,4) AS rek'))
            ->groupby('rek');

            $aa  = DB::table('tukdju')
                ->select(DB::raw('left(klrSubRekKredit,4) AS rek'))
                ->groupby('rek');

            $lalu  = DB::table($tablelalu)
                ->select(DB::raw('left('.$kolomlalu.',4) AS rek'))
                ->groupby('rek');
            $vjenis  = DB::table('tukdju')
                ->select(DB::raw('left(klrSubRekDebet,4) AS rek'))
                ->groupby('rek')
                ->union($ang)
                ->union($aa)
                ->union($lalu)
                ->get();

            $arrjenis = json_decode(json_encode($vjenis), true);

            $rek1 = DB::table('msjenis')
                ->select('jenisKd AS rek', 'jenisKd AS kode', 'jenisNm AS nama')
                // ->where(DB::raw('LENGTH(kode)'), '<', 6)
                ->where(DB::raw('jenisKd'), 'like', $levelrek . '%')
                ->whereIn('jenisKd', $arrjenis)
                ->orderby('jenisKd', 'ASC')
                ->get();
        } else if ($lvl == 4) {
            $ang = DB::table('angdrka')
            ->select(DB::raw('left(adrkaSubRekKd,6) AS rek'))
            ->groupby('rek');
            $aa  = DB::table('tukdju')
                ->select(DB::raw('left(klrSubRekKredit,6) AS rek'))
                ->groupby('rek');
            $lalu  = DB::table($tablelalu)
                ->select(DB::raw('left('.$kolomlalu.',6) AS rek'))
                ->groupby('rek');
            $vobjek  = DB::table('tukdju')
                ->select(DB::raw('left(klrSubRekDebet,6) AS rek'))
                ->groupby('rek')
                ->union($ang)
                ->union($aa)
                ->union($lalu)
                ->get();
            $arrobjek = json_decode(json_encode($vobjek), true);

            $rek1 = DB::table('msobjek')
                ->select('objekKd AS rek', 'objekKd AS kode', 'objekNm AS nama')
                // ->where(DB::raw('LENGTH(kode)'), '<', 6)
                ->where(DB::raw('objekKd'), 'like', $levelrek . '%')
                ->whereIn('objekKd', $arrobjek)
                ->orderby('objekKd', 'ASC')
                ->get();
        } else if ($lvl == 5) {
            $ang = DB::table('angdrka')
            ->select(DB::raw('left(adrkaSubRekKd,8) AS rek'))
            ->groupby('rek');
            $aa  = DB::table('tukdju')
                ->select(DB::raw('left(klrSubRekKredit,8) AS rek'))
                ->groupby('rek');
            $lalu  = DB::table($tablelalu)
                ->select(DB::raw('left('.$kolomlalu.',8) AS rek'))
                ->groupby('rek');
            $vrincianobjek  = DB::table('tukdju')
                ->select(DB::raw('left(klrSubRekDebet,8) AS rek'))
                ->groupby('rek')
                ->union($ang)
                ->union($aa)
                ->union($lalu)
                ->get();
            $arrrincianobjek = json_decode(json_encode($vrincianobjek), true);

            $rek1 = DB::table('msrincianobjek')
                ->select('robjKd AS rek', 'robjKd AS kode', 'robjNm AS nama')
                // ->where(DB::raw('LENGTH(kode)'), '<', 6)
                ->where(DB::raw('robjKd'), 'like', $levelrek . '%')
                ->whereIn('robjKd', $arrrincianobjek)
                ->orderby('robjKd', 'ASC')
                ->get();
        } else if ($lvl == 6) {
            $ang = DB::table('angdrka')
            ->select(DB::raw('left(adrkaSubRekKd,12) AS rek'))
            ->groupby('rek');
            $aa  = DB::table('tukdju')
                ->select(DB::raw('left(klrSubRekKredit,12) AS rek'))
                ->groupby('rek');
            $lalu  = DB::table($tablelalu)
                ->select(DB::raw('left('.$kolomlalu.',12) AS rek'))
                ->groupby('rek');
            $vsubro  = DB::table('tukdju')
                ->select(DB::raw('left(klrSubRekDebet,12) AS rek'))
                ->groupby('rek')
                ->union($ang)
                ->union($aa)
                ->union($lalu)
                ->get();
            $arrsubro = json_decode(json_encode($vsubro), true);

            $rek1 = DB::table('mssubrincianobjek')
                ->select('srobjKd AS rek', 'srobjKd AS kode', 'srobjNm AS nama')
                // ->where(DB::raw('LENGTH(kode)'), '<', 6)
                ->where(DB::raw('srobjKd'), 'like', $levelrek . '%')
                ->whereIn('srobjKd', $arrsubro)
                ->orderby('srobjKd', 'ASC')
                ->get();
        }
        return $rek1;
    }
    public function parse_string($string, $pjcell)
    {
        $string_parse = explode(" ", trim($string));
        $jumlah_parse = count($string_parse);
        $x = 0;
        $str[$x] = '';
        for ($a = 0; $a <= $jumlah_parse - 1; $a++) {       if (strlen($string_parse[$a]) + strlen($str[$x]) > $pjcell) {
                $x++;
                $str[$x] = '';
            }
            $str[$x] = $str[$x] . $string_parse[$a] . " ";
        }
        return $str;
    }

    public function dateName($tgl)
    {
        $a = explode("/", $tgl);
        if ($a[0] == '01') {
            $bln = "Januari";
        } elseif ($a[0] == '02') {
            $bln = "Februari";
        } elseif ($a[0] == '03') {
            $bln = "Maret";
        } elseif ($a[0] == '04') {
            $bln = "April";
        } elseif ($a[0] == '05') {
            $bln = "Mei";
        } elseif ($a[0] == '06') {
            $bln = "Juni";
        } elseif ($a[0] == '07') {
            $bln = "Juli";
        } elseif ($a[0] == '08') {
            $bln = "Agustus";
        } elseif ($a[0] == '09') {
            $bln = "September";
        } elseif ($a[0] == '10') {
            $bln = "Oktober";
        } elseif ($a[0] == '11') {
            $bln = "November";
        } elseif ($a[0] == '12') {
            $bln = "Desember";
        }

        return $a[1] . ' ' . $bln . ' ' . $a[2];
    }
    public function dateNameUstoId($tgl)
    {
        //2018-01-01
        $a = explode("-", $tgl);
        if ($a[1] == '01') {
            $bln = "Januari";
        } elseif ($a[1] == '02') {
            $bln = "Februari";
        } elseif ($a[1] == '03') {
            $bln = "Maret";
        } elseif ($a[1] == '04') {
            $bln = "April";
        } elseif ($a[1] == '05') {
            $bln = "Mei";
        } elseif ($a[1] == '06') {
            $bln = "Juni";
        } elseif ($a[1] == '07') {
            $bln = "Juli";
        } elseif ($a[1] == '08') {
            $bln = "Agustus";
        } elseif ($a[1] == '09') {
            $bln = "September";
        } elseif ($a[1] == '10') {
            $bln = "Oktober";
        } elseif ($a[1] == '11') {
            $bln = "November";
        } elseif ($a[1] == '12') {
            $bln = "Desember";
        }

        return $a[2] . ' ' . $bln . ' ' . $a[0];
    }

    public function number_fmt($inp, $dec_separator)
    {
        if ($inp < 0) {
            return '(' . number_format(abs($inp), $dec_separator,',','.') . ')';
        } else {
            return number_format($inp, $dec_separator,',','.');
        }
    }

    public function number_fi($inp, $dec_separator)
    {
        if ($inp < 0) {
            return '(' . number_format(abs($inp), $dec_separator) . ')';
        } else {
            return number_format($inp, $dec_separator);
        }
    }

    public function splitRow($txt,$maxlength){
        $idxLength=floor(strlen($txt)/$maxlength)+1;
        $res='';
        for($i=0;$i<$idxLength;$i++){
           $a=substr($txt,$i*($maxlength+1),$maxlength+1);
           if($i==$idxLength){
            $res = $res.$a;
           }else{
            $res = $res.$a.'<br>';
           }

        }
        return $res;
     }
  
    // public function nilainol($id, $dec_separator)
    // {
    //     if ($id == 0 || $id == 0.00) {
    //         return '';
    //     } else {
    //         if($id < 0){
    //         return '(' . number_format(abs($id), $dec_separator) . ')';
    //         }else{
    //         return number_format($id,$dec_separator);
    //         }
    //     }
    // }

}
