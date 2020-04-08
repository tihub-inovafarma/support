<?php

namespace App\Http\Controllers\Cadastros;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Alerta;


class AlertaController extends Controller
{

    /**
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Insert(request $req)
    {
      
        //executa o salvar no banco de dados
    //  $rec_alerta = $req->all();
      
      $prior = $req->prioridade;
      if($prior=='Alta'){
          $prior=1;
      }else if($prior=='Média'){
        $prior=2;
      }else if($prior=='Baixa'){
        $prior=3;
      }
       $novaAlerta = new Alerta();
       $novaAlerta->descricao = $req->descricao;
       $novaAlerta->prioridade = $prior;
       $novaAlerta->id_empresas =$req->id_empresas;
       $novaAlerta->username =auth()->user()->name;
       $novaAlerta->save();
     



     // Alerta::create($rec_alerta);
  return redirect()->route('home');
    }

   

}
