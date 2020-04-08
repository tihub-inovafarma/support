<?php

namespace App\Http\Controllers\Downloads;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\ContratoRequest;
use App\Download;

class DownloadAplicativosController extends Controller
{
    //
    public function Index()
    {
        $pbmLista = DB::table('downloads_aplicativos')
			->select(DB::raw('id,descricao,site_download,site_copy,versao'))
			->where('tipo_download', '=', '1')
			->orderBy('id','desc')
			->get(); 

        $impressoraLista = DB::table('downloads_aplicativos')
			->select(DB::raw('id,descricao,site_download,site_copy,versao'))
			->where('tipo_download', '=', '2')
			->orderBy('id','desc')
			->get(); 
			
        $bancoLista = DB::table('downloads_aplicativos')
			->select(DB::raw('id,descricao,site_download,site_copy,versao'))
			->where('tipo_download', '=', '3')
			->orderBy('id','desc')
			->get(); 			
			
        $utilitariosLista = DB::table('downloads_aplicativos')
			->select(DB::raw('id,descricao,site_download,site_copy,versao'))
			->where('tipo_download', '=', '4')
			->orderBy('id','desc')
			->get(); 			
		return view('download/aplicativos',compact('pbmLista','impressoraLista','bancoLista','utilitariosLista'));
    }	

    public function NovaVersao()
    {	
	}
}
