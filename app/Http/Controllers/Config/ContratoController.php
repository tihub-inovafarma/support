<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\ContratoRequest;
use App\Contratos;

class ContratoController extends Controller
{
    //
    public function Index()
    {
        $contratosLista = DB::table('contratos')
			->select(DB::raw("id,created_at,updated_at,user_created,user_updated,versao,contrato,CASE tipo WHEN 1 THEN 'Proposta Comercial' ELSE 'Outros' END AS tipo"))
			->get(); 
		return view('config/contract/index',compact('contratosLista'));
    }	
	
	public function Novo()
	{
		return view('config/contract/create');
	}
	
	public function Salvar(ContratoRequest $request)
	{
		$save = Contratos::create([
		  'user_created' => Auth::user()->name,
		  'updated_at'   => date("Y-m-d H:i:s"),
		  'user_updated' => Auth::user()->name,
		  'tipo'         => $request->tTipo,
		  'versao'       => $request->tVersao,
		  'contrato'     => $request->tContrato
        ]);	  
        //
		return redirect()->route('Config.Contrato.Editar',$save->id)->withSuccess(['Os dados do formulário foram salvos']);
	}

     public function Editar($id)
    {
	  $contratoDados = Contratos::find($id);	
	  //	
      return view('config/contract/edit',compact('contratoDados'));
    }	
	
    public function Atualizar(ContratoRequest $request, $id)
    {
		$updContrato = Contratos::find($id);
		//
		$updContrato->update([
		  'updated_at'   => date("Y-m-d H:i:s"),
		  'user_updated' => Auth::user()->name,
		  'versao'       => $request->tVersao,		  
		  'contrato'     => $request->tContrato
        ]);	  
		//
        return redirect()->route('Config.Contrato.Editar',$updContrato->id)->withSuccess(['Os dados do formulário foram atualizados']);			
    }	
	
	
	
	
	
	
	
	
	
	
	
}
