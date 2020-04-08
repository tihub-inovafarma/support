<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Empresas;
use App\alerta;
use App\informativo;


class DashboardController extends Controller
{


    public function index()
    {
     
        $registros_alert = DB::table('alertas')
        ->join('empresas', 'alertas.id_empresas', '=', 'empresas.id')
        ->get();	 


        $registros_info = DB::table('informativos')
        ->where('situacao','=','0')
        ->get();	 
        return view('dashboard/v1',compact('registros_info','registros_alert'));
    }









    public function link()
    {
        return view('link');
    }

    public function check()
    {
        return view('check');
    }

    public function busca(Request $request)
    {
    	$data = [];


        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("empresas")
            		->select("id","nome_fantasia")
            		->where('nome_fantasia','LIKE',"%$search%")
            		->get();
        }


        return response()->json($data);
    }
}
