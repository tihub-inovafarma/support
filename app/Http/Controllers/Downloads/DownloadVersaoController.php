<?php

namespace App\Http\Controllers\Downloads;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\ContratoRequest;
use App\Download;

class DownloadVersaoController extends Controller
{
    //
    public function Index()
    {
        $inovaLista = DB::table('downloads_inovafarma')
			->select(DB::raw('id,descricao,site_download,site_copy,releases,versao'))
			->where('tipo_download', '=', '1')
			->orderBy('versao','desc')
			->get(); 

        $serviceLista = DB::table('downloads_inovafarma')
			->select(DB::raw('id,descricao,site_download,site_copy,releases,versao'))
			->where('tipo_download', '=', '2')
			->orderBy('versao','desc')
			->get(); 
			
        $importadorLista = DB::table('downloads_inovafarma')
			->select(DB::raw('id,descricao,site_download,site_copy,releases,versao'))
			->where('tipo_download', '=', '3')
			->orderBy('versao','desc')
			->get(); 			
			
        $baseLista = DB::table('downloads_inovafarma')
			->select(DB::raw('id,descricao,site_download,site_copy,releases,versao'))
			->where('tipo_download', '=', '4')
			->orderBy('versao','desc')
			->get(); 			
		return view('download/versoes',compact('inovaLista','serviceLista','importadorLista','baseLista'));
    }	

    public function NovaVersao()
    {	
	
	}
}
