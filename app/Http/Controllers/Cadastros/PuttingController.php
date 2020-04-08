<?php

namespace App\Http\Controllers\Cadastros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests;
use App\Http\Requests\PuttingRequest;
use App\Http\Controllers\Controller;
use App\Putting;
use App\Posts;


class PuttingController extends Controller{



    public function Index(){
     //mostrar tela inicial cadastro de empresas
    
      $empresasLista = DB::table('projetos')
      ->join('empresas', 'empresas.id', '=', 'projetos.id_empresa')
      ->leftjoin('municipios_br', 'empresas.codigo_ibge', '=', 'municipios_br.codigo_ibge')
      ->leftjoin('users', 'projetos.id_analista', '=', 'users.id')
			->select(DB::raw("projetos.id,empresas.nome_fantasia,empresas.telefone_fixo,users.name,responsavel_implantacao,data_inicio,data_fim,data_negociada,status,id_cidade,concat(nome_municipio,' / ',uf) as cidade"))
			->orderBy('data_inicio')
			->get(); 	 
      return view('cadastros.putting.index',compact('empresasLista')
      );
    }

    public function Novo()
    //direciona para incluir novo registro
    {
	  //popula campos com as redes cadastradas
	  $redesLista = DB::table('empresas_redes')
            ->where('situacao', 'A')
			->orderBy('rede')
			->get()
			->pluck('rede','id');

	  //popula campos com as franquias cadastradas
	  $usersLista = DB::table('users')
            ->where('tipo', '1')
			->orderBy('name')
			->get()
			->pluck('name','id');			
			
    //popula campos com as cidades cadastradas
    

    
	  $empresasLista = DB::table('empresas')
	 ->get()
	  ->pluck('nome_fantasia','id','inscricao_federal');

			
      return view('cadastros.projetos.projeto',compact('usersLista','empresasLista'));
    }

    public function Salvar(Request $request){
    
    $projeto = new Projetos();
    
 
    $data  = $request->input('datefilter');
    $result = explode(" - ", $data);

    $time1 = strtotime($result[0]);
    $data1 = date('Y-m-d',$time1);
    $time2 = strtotime($result[1]);
    $data2 = date('Y-m-d',$time2);



		$projeto->id_empresa = $request->input('tEmpresa');
		$projeto->data_inicio = $data1;
    $projeto->data_fim = $data2;
    $projeto->data_negociada = $request->input('data_negociada');
    $projeto->natureza_implantacao = $request->input('natureza_implantacao');
    $projeto->responsavel_implantacao = $request->input('responsavel_implantacao');
    $projeto->tipo_farmacia = $request->input('tipo_farmacia');
    $projeto->regime_tributario = $request->input('regime_tributario');
    $projeto->id_analista = $request->input('id_analista');
    $projeto->id_agente_comercial = $request->input('id_agente_comercial'); 
    $projeto->status = '1';
   


	


		$projeto->save();
		
        return redirect()->route('Cadastros.Projetos1');
    }

    
	
     public function Editar($id)
     //direciona para editar o registro selecionado
    {
	  $empresaDados = Empresas::find($id);	
	  
	  $redesLista = DB::table('empresas_redes')
            ->where('situacao', 'A')
			->orderBy('rede')
			->get()
			->pluck('rede','id');
			
	  //popula campos com as franquias cadastradas
	  $franquiasLista = DB::table('empresas_franquias')
            ->where('situacao', 'A')
			->orderBy('franquia')
			->get()
			->pluck('franquia','id');
			
	  //popula campos com as cidades cadastradas
	  $cidadesLista = DB::table('municipios_br')
            ->select(DB::raw('CONCAT(nome_municipio," - ",uf) AS municipio'), 'codigo_ibge')
			->whereIn('uf',['PR','SC','RS'])
            ->groupBy('uf','nome_municipio','codigo_ibge')
			->orderBy('nome_municipio')
            ->get()
			->pluck('municipio','codigo_ibge');
			
      return view('cadastros.empresas.editar',compact('empresaDados','redesLista','franquiasLista','cidadesLista'));
    }

    public function Atualizar(EmpresaRequest $request, $id)
     //salva a atualização no banco de dados
    {
		$updEmpresa = Empresas::find($id);

		$updEmpresa->update([
		  'razao_social'       => $request->tRazaoSocial,
		  'nome_fantasia'      => $request->tFantasia,
		  'inscricao_federal'  => $request->tCnpj,
		  'inscricao_estadual' => $request->tInscEstadual,
		  'endereco'           => $request->tEndereco,
		  'numero'             => $request->tNum,
		  'bairro'             => $request->tBairro,
		  'complemento'        => $request->tComplemento,
		  'cep'                => $request->tCep,
		  'codigo_ibge'        => $request->tCidade,
		  'telefone_fixo'      => $request->tTelefone,
		  /*'telefone_fixo2'     => $request->,*/
		  'telefone_celular'   => $request->tCelular,
		  /*'telefone_celular2'  => $request->,*/
		  'rede_id'            => $request->tRede,
		  'filial'             => $request->tFG,
		  'franquia_id'        => $request->tFranquia,
		  'email'              => $request->tEmail,
		  'site'               => $request->tSite,
		  'situacao'           => 'A', //$request->tSituacao
		  'observacao'         => $request->tObservacao,
		  'user_id'            => Auth::user()->id,
		  /*'codigo_antigo'      => $request->,*/
		  'sistema'            => $request->tUnNegocio
        ]);	  
		
        return redirect()->route('Cadastros.Empresas.Editar',$updEmpresa->id)->withSuccess(['Atualizado com sucesso!']);			
    }
	
    public function BuscaCep(Request $request)
	//Funcao para buscar o endereco conforme cep informado
    {
      $data = [];
      $cep = $request->all();
	  //$cep = '85.806-000';
	  if (!empty($cep)) {
		  $data = DB::table("cep_br")
		     ->join('municipios_br', 'cep_br.codigo_ibge', '=', 'municipios_br.codigo_ibge')
			 ->select(DB::raw('CONCAT(tipo_endereco," ",endereco) AS endereco'), 'bairro','cep_br.codigo_ibge','nome_municipio','uf')
		     ->where('cep','=',$cep)
		     ->get();
		  
		  return response()->json($data);
	  } else {
		  return response()->json($data);
	  }	  
    }


}	














/*
    }

    public function adicionar()
    {
      return view('cadastros.empresas.adicionar');
    }

    public function salvar(request $req)
    {
        //executa o salvar no banco de dados
      $dados = $req->all();

      Empresas::create($dados);

      return redirect()->route('cadastros.empresas');
    }

    public function Update($id)
     //executa a e no banco de dados
    {
      $registro = Empresas::find($id);
      return view('cadastros.empresas.update',compact('registro'));
    }

    public function find(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $tags = Empresas::search($term)->limit(5)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->nome_fantasia];
        }

        return \Response::json($formatted_tags);
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
*/