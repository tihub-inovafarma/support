<?php

namespace App\Http\Controllers\Cadastros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests;
use App\Http\Requests\EmpresaRequest;
use App\Http\Controllers\Controller;
use App\Empresas;
use App\Posts;


class EmpresaController extends Controller
{
    public function Index()
     //mostrar tela inicial cadastro de empresas
    {
      $empresasLista = DB::table('empresas')
            ->join('municipios_br', 'empresas.codigo_ibge', '=', 'municipios_br.codigo_ibge')
			->leftjoin('empresas_pessoas','empresas.id','=','empresa_id')
			->leftjoin('empresas_redes','empresas.RedeID','=','empresas_redes.id')
            ->select(DB::raw("empresas.id,inscricao_federal,SUBSTRING(razao_social,1,30) as razao_social,SUBSTRING(nome_fantasia,1,40) as nome_fantasia,pessoa,telefone_fixo,telefone_celular,concat(nome_municipio,' / ',uf) as cidade, CASE representante WHEN 1 THEN 'TIHUB' WHEN 2 THEN 'MVPRIME' ELSE 'TIHUB' END AS representante "))
			->where('representante', '=','1')
			->get(); 	  

	  $empresasTotal = DB::table('empresas')
            ->where('representante', '=','1');
      $totalEmpresas = $empresasTotal->count();
			
	  $empresasAtivas = DB::table('empresas')
            ->where('situacao', '=','A')
            ->where('representante', '=','1');
      $totalEmpresasAtivas = $empresasAtivas->count();
	  $percEmpresasAtivas = number_format(($totalEmpresasAtivas / $totalEmpresas) * 100,2);

      $empresasBloqueadasCanceladas = DB::table('empresas')
            ->where('situacao', '!=' ,'A')
            ->where('representante', '=','1');
      $totalEmpresasBloqueadasCanceladas = $empresasBloqueadasCanceladas->count();
	  $percEmpresasBloqueadasCanceladas = number_format(($totalEmpresasBloqueadasCanceladas / $totalEmpresas) * 100,2);

	  $empresasAtivasAno = DB::table('empresas')
            ->whereYear('data_ativacao', '=',date("Y"))
            ->where('representante', '=','1');	  
	  $totalEmpresasAtivasAno = $empresasAtivasAno->count();

	  $empresasAtivas90dias = DB::table('empresas')
			->whereBetween('data_ativacao',[date("Y-m-d 00:00:01",strtotime("-3 month", time())),date("Y-m-d 23:59:59",time())])
			->where('representante', '=','1');	  
	  $totalEmpresasAtivas90dias = $empresasAtivas90dias->count();

	  $empresasAtivasMes = DB::table('empresas')
			->whereMonth('data_ativacao', '=',date("m"))
			->whereYear('data_ativacao', '=',date("Y"))
			->where('representante', '=','1');
	  $totalEmpresasAtivasMes = $empresasAtivasMes->count();
	  
	  $empresasCanceladasAno = DB::table('empresas')
			->where('situacao', '=','C')
			->whereYear('data_cancelamento', '=',date("Y"))
			->where('representante', '=','1');
	  $totalEmpresasCanceladasAno = $empresasCanceladasAno->count();
	  
	  $empresasCanceladas90dias = DB::table('empresas')
			->where('situacao', '=','C')
			->whereBetween('data_cancelamento',[date("Y-m-d 00:00:01",strtotime("-3 month", time())),date("Y-m-d 23:59:59",time())])
			->where('representante', '=','1');
	  $totalEmpresasCanceladas90dias = $empresasCanceladas90dias->count();
	  
	  $empresasCanceladasMes = DB::table('empresas')
			->where('situacao', '=','C')
			->whereMonth('data_cancelamento', '=',date("m"))
			->whereYear('data_cancelamento', '=',date("Y"))
			->where('representante', '=','1');
	  $totalEmpresasCanceladasMes = $empresasCanceladasMes->count();
	  
      return view('cadastros.empresas.index',compact(
		'empresasLista',
		'totalEmpresas',
		'totalEmpresasAtivas',
		'percEmpresasAtivas',
		'totalEmpresasBloqueadasCanceladas',
		'percEmpresasBloqueadasCanceladas',
		'totalEmpresasAtivasAno',
		'totalEmpresasAtivas90dias',
		'totalEmpresasAtivasMes',
		'totalEmpresasCanceladasAno',
		'totalEmpresasCanceladas90dias',
		'totalEmpresasCanceladasMes')
      );
    }

    public function Novo()
    //direciona para incluir novo registro
    {
	  //popula campos com as redes cadastradas
	  $redesLista = DB::table('empresas_redes')
            ->where('Situacao', 'A')
			->orderBy('NomeRede')
			->get()
			->pluck('NomeRede','id');

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

			
      return view('cadastros.empresas.empresa',compact('redesLista','franquiasLista','cidadesLista'));
    }

    public function Salvar(EmpresaRequest $request)
    //salva novo registro no banco de dados
    {
		$save = Empresas::create([
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
		  'representante'      => $request->tRepresentante,
		  'RedeID'             => $request->tRede,
		  'filial'             => $request->tFG,
		  'franquia_id'        => $request->tFranquia,
		  'email'              => $request->tEmail,
		  'site'               => $request->tSite,
		  'situacao'           => 'A', //$request->tSituacao
		  'representante'           => '1', //seta tihub como representante
		  'observacao'         => $request->tObservacao,
		  'user_id'            => Auth::user()->id,
		  /*'codigo_antigo'      => $request->,*/
		  'sistema'            => $request->tUnNegocio
        ]);	  

        
		return redirect()->route('Cadastros.Empresas.Editar',$save->id)->withSuccess(['Success Message here!']);	
    }
	
     public function Editar($id)
     //direciona para editar o registro selecionado
    {
	  $empresaDados = Empresas::find($id);	
	  
	  $redesLista = DB::table('empresas_redes')
            ->where('Situacao', 'A')
			->orderBy('NomeRede')
			->get()
			->pluck('NomeRede','id');
			
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
		$updEmpresa = Empresas::findOrFail($id);

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
		  'representante'      => $request->tRepresentante,
		  'RedeID'             => $request->tRede,
		  'filial'             => $request->tFG,
		  'franquia_id'        => $request->tFranquia,
		  'email'              => $request->tEmail,
		  'site'               => $request->tSite,
		  'situacao'           => 'A', //$request->tSituacao
		  'representante'           => '1',  //seta tihub como representante
		  'observacao'         => $request->tObservacao,
		  //'user_id'            => Auth::user()->id,
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