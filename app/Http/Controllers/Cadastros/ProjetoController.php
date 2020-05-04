<?php
namespace App\Http\Controllers\Cadastros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests;
use App\Http\Requests\ProjetoRequest;
use App\Http\Controllers\Controller;
use App\Projetos;
use App\Empresas;
use App\Users;
use App\Posts;
use PDF;


class ProjetoController extends Controller{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function Index(){
          //mostrar tela inicial mostra projetos
            $projetosLista = DB::table('projetos')
            ->join('empresas', 'empresas.id', '=', 'projetos.id_empresa')
            ->leftjoin('municipios_br', 'empresas.codigo_ibge', '=', 'municipios_br.codigo_ibge')
            ->leftjoin('users', 'projetos.id_analista', '=', 'users.id')
            ->select(DB::raw("projetos.id_projetos,empresas.nome_fantasia,empresas.telefone_fixo,agente_comercial,responsavel_implantacao,data_inicio,data_fim,data_negociada,status,id_cidade,concat(nome_municipio,' / ',uf) as cidade"))
            ->orderBy('data_inicio')
            ->where('representante', '=','1')
            ->get(); 	 
            return view('cadastros.projetos.index',compact('projetosLista')
            );
    }


    
    public function create(){
      $empresasLista = DB::table('empresas')
      
      ->select(DB::raw("id,SUBSTRING(nome_fantasia,1,40) as nome_fantasia"))
->where('representante', '=','1')
->get(); 	 
          return view('cadastros.projetos.projeto',compact('empresasLista'));
    }



    public function store(Request $request){

     
    $projeto = new Projetos();
    //separa intervalo de dados para persistir no banco
    $data  = $request->input('datefilter');
    $result = explode(" - ", $data);
    $time1 = strtotime($result[0]);
    $data1 = date('Y-m-d',$time1);
    $time2 = strtotime($result[1]);
    $data2 = date('Y-m-d',$time2);

		$projeto->id_empresa = $request->input('id_empresa');
		$projeto->data_inicio = $data1;
    $projeto->data_fim = $data2;
    $projeto->data_negociada = $request->input('tData_negocial');
    $projeto->natureza_implantacao = $request->input('natureza_implantacao');
    $projeto->responsavel_implantacao = $request->input('tResponsavel');
    $projeto->tipo_farmacia = $request->input('tipo_farmacia');
    $projeto->regime_tributario = $request->input('regime_tributario');
    $projeto->id_analista = $request->input('id_analista');
    $projeto->agente_comercial = $request->input('agente_comercial'); 
    $projeto->imp_cpa = isset($request->cpa)? 1 : 0;
    $projeto->imp_cpr = isset($request->cpr)? 1 : 0;
    $projeto->imp_prod = isset($request->prd)? 1 : 0;
    $projeto->imp_cli = isset($request->cli)? 1 : 0;
    $projeto->imp_out = isset($request->out)? 1 : 0;
    $projeto->pbm_fp = isset($request->fp)? 1 : 0;
    $projeto->pbm_trn = isset($request->trn)? 1 : 0;
    $projeto->pbm_func = isset($request->func)? 1 : 0;
    $projeto->pbm_epha = isset($request->eph)? 1 : 0;
    $projeto->pbm_vd = isset($request->vd)? 1 : 0;
    $projeto->pbm_phar = isset($request->phar)? 1 : 0;
    $projeto->pbm_pec = isset($request->pec)? 1 : 0;
    $projeto->pbm_obj = isset($request->obj)? 1 : 0;
    $projeto->pbm_rec = isset($request->rec)? 1 : 0;
    $projeto->tef = isset($request->tef)? 1 : 0;
    $projeto->gest_comp = isset($request->tef)? 1 : 0;
    $projeto->fiscal_gest_trib = isset($request->fiscal_gest_trib)? 1 : 0;
    $projeto->fiscal_sped = isset($request->fiscal_sped)? 1 : 0;
    $projeto->fiscal_sintegra = isset($request->fiscal_sintegra)? 1 : 0;
    $projeto->fiscal_outros = isset($request->fiscal_outros)? 1 : 0;
    $projeto->fiscal_msg_outros = $request->input('tfiscal_outros'); 
    $projeto->import_info = $request->input('timport_info'); 
    $projeto->status = 'aguard';
    $projeto->save();
    
        return redirect()->route('Projetos');
    }

    
	
     public function edit($id)
     //direciona para editar o registro selecionado
    {
     // $projetos = Projetos::find($id);
     $projetosDados = DB::table('projetos')
      ->join('empresas', 'empresas.id', '=', 'projetos.id_empresa')
     // ->select('projetos.*,empresas.nome_fantasia,empresas.id,empresas.telefone_fixo,responsavel_implantacao,data_inicio,data_fim,data_negociada,status')
      ->select('projetos.*', 'empresas.nome_fantasia', 'empresas.id')
      ->where('id_projetos', '=', $id)
      ->first();
      
     // dd($projetosDados);

    $usersLista = DB::table('users')
    ->where('tipo', '1')
    ->orderBy('name')
    ->get()
    ->pluck('name','id');			

    $empresasLista = Empresas::all();
   //dd($projetosDados);
    return view('cadastros.projetos.editar',compact('projetosDados','empresasLista','usersLista'));
//return view('cadastros.projetos.teste',compact('projetosDados'));
   
	 
			
    
    }

    public function update(Request $request,$id){
      
      $valida  = $request->input('status');
      if($valida == 'pre'){
       
        $projeto = Projetos::findOrFail($id);
        $projeto->status = 'pre';
        $projeto->save();
      }else{
       
        $projeto = Projetos::findOrFail($id);
        $data  = $request->input('datefilter');
      $result = explode(" - ", $data);
      $time1 = strtotime($result[0]);
      $data1 = date('Y-m-d',$time1);
      $time2 = strtotime($result[1]);
      $data2 = date('Y-m-d',$time2);
  
      $projeto->id_empresa = $request->input('id_empresa');
      $projeto->data_inicio = $data1;
      $projeto->data_fim = $data2;
      $projeto->data_negociada = $request->input('tData_negocial');
      $projeto->natureza_implantacao = $request->input('natureza_implantacao');
      $projeto->responsavel_implantacao = $request->input('tResponsavel');
      $projeto->tipo_farmacia = $request->input('tipo_farmacia');
      $projeto->regime_tributario = $request->input('regime_tributario');
      $projeto->id_analista = $request->input('id_analista');
      $projeto->agente_comercial = $request->input('agente_comercial'); 
      $projeto->imp_cpa = isset($request->cpa)? 1 : 0;
      $projeto->imp_cpr = isset($request->cpr)? 1 : 0;
      $projeto->imp_prod = isset($request->prd)? 1 : 0;
      $projeto->imp_cli = isset($request->cli)? 1 : 0;
      $projeto->imp_out = isset($request->out)? 1 : 0;
      $projeto->pbm_fp = isset($request->fp)? 1 : 0;
      $projeto->pbm_trn = isset($request->trn)? 1 : 0;
      $projeto->pbm_func = isset($request->func)? 1 : 0;
      $projeto->pbm_epha = isset($request->eph)? 1 : 0;
      $projeto->pbm_vd = isset($request->vd)? 1 : 0;
      $projeto->pbm_phar = isset($request->phar)? 1 : 0;
      $projeto->pbm_pec = isset($request->pec)? 1 : 0;
      $projeto->pbm_obj = isset($request->obj)? 1 : 0;
      $projeto->pbm_rec = isset($request->rec)? 1 : 0;
      $projeto->tef = isset($request->tef)? 1 : 0;
      $projeto->gest_comp = isset($request->tef)? 1 : 0;
      $projeto->fiscal_gest_trib = isset($request->fiscal_gest_trib)? 1 : 0;
      $projeto->fiscal_sped = isset($request->fiscal_sped)? 1 : 0;
      $projeto->fiscal_sintegra = isset($request->fiscal_sintegra)? 1 : 0;
      $projeto->fiscal_outros = isset($request->fiscal_outros)? 1 : 0;
      $projeto->fiscal_msg_outros = $request->input('tfiscal_outros'); 
      $projeto->import_info = $request->input('timport_info'); 
      $projeto->save();
    
      }
    

    
     //salva a atualização no banco de dados
    //$teste = Projetos::findOrFail($id);
    
    
    //$teste=$id;
		
    return view('cadastros.projetos.index');
    }

    public function geraPdf(){
    $proj = DB::table('projetos')
    ->join('empresas', 'empresas.id', '=', 'projetos.id_empresa')
    ->leftjoin('municipios_br', 'empresas.codigo_ibge', '=', 'municipios_br.codigo_ibge')
    ->leftjoin('users', 'projetos.id_analista', '=', 'users.id')
    ->select(DB::raw("projetos.id_projetos,empresas.nome_fantasia,empresas.telefone_fixo,agente_comercial,responsavel_implantacao,data_inicio,data_fim,data_negociada,status,id_cidade,concat(nome_municipio,' / ',uf) as cidade"))
    ->orderBy('data_inicio')
    ->where('representante', '=','1')
    ->get(); 	 




    $pdf = PDF::loadView('cadastros.projetos.proposta', compact('proj'));
		return $pdf->stream('document.pdf');
}
}	