<?php

namespace App\Http\Controllers\Cadastros;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Informativo;


class InformativoController extends Controller
{

    /**
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Insert(request $req)
    {
      
       $novoInforme = new informativo();
       $novoInforme->descricao = $req->descricao;
       $novoInforme->username =auth()->user()->name;
       $novoInforme->situacao =0;
       $novoInforme->save();
     



     // Alerta::create($rec_alerta);
  return redirect()->route('home');
    }

  
    public function delete(Request $req, $id)
    {
      
      DB::table('informativos')
            ->where('id', $id)
            ->update(['situacao' => 1]);
     

      return redirect()->route('home');

    }
   

}
