<div class="card-body">
  <div class="row">
    <div class="form-group col-md-3 {{ $errors->has('tEmpresa') ? ' has-error' : '' }}">
      {!! Form::label('tEmpresa','Empresa:') !!}
      {!! Form::select('tEmpresa', $empresasLista, isset($projetoDados->id_empresa) ? $empresaDados->codigo_ibge : null, ['class' => 'company-show-search form-control','placeholder' => 'Selecione a Empresa','onkeyup' => 'upper(this)']) !!}
      <small class="text-danger">{{ $errors->first('tCidade') }}</small>
    </div>
    <div class="form-group col-md-3 {{ $errors->has('tRazaoSocial') ? ' has-error' : '' }}">
      {!! Form::label('responsavel_implantacao','Responsável Acompanhamento:') !!}
      {!! Form::text('responsavel_implantacao',isset($projetoDados->razao_social) ? $empresaDados->razao_social : null,['class' => 'form-control','placeholder' => '','onkeyup' => 'upper(this)']) !!}
      <small class="text-danger">{{ $errors->first('responsavel_implantacao') }}</small>
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('tPeriodo','Periodo de Implantação:') !!}
      <input type="text" class="form-control" name="datefilter" autocomplete="off" value="" />
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('tSistema','Data pode ser Negociada?:') !!}
      {!! Form::select('tSistema', array('1' => 'SIM','2' => 'NAO'), isset($projetoDados->sistema) ? $empresaDados->sistema : 1, ['class' => 'form-control']) !!}
      <small class="text-danger">{{ $errors->first('tSistema') }}</small>
    </div>
  </div>
  <div class="" role="tabpanel" data-example-id="togglable-tabs">
    <h3 class="card-title">Acordos Comerciais</h3><br>
    <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist"></ul>
  </div>
  <div class="row">
    <div class="form-group col-md-2">
      <label>Tipo de Loja</label>
      <select class="form-control form-control" name="tipo_farmacia"  id="tipo_farmacia">
        <option></option>
        <option>Farmácia Individual</option>
        <option>Rede Sincronizada</option>
        <option>Abertura de filial Sincronismo</option>
        <option>Abertura de filial Independente</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label>Tipo de Conversão</label>
      <select class="form-control select2" name="natureza_implantacao"  id="natureza_implantacao"style="width: 100%;">
        <option></option>
        <option>Loja Nova</option>
        <option>Softpharma</option>
        <option>Big</option>
        <option>SoftIse farma </option>
        <option>SoftIse farma NG</option>
        <option>Trier</option>
        <option>VSM</option>
        <option>Far</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label>Regime Tributario</label>
      <select class="form-control select2" name="regime_tributario"  id="regime_tributario"style="width: 100%;">
        <option></option>
        <option>Simples Nacional</option>
        <option>Lucro Presumido</option>
        <option>Lucro Real</option>
      </select>
    </div>
    <div class="form-group col-md-2 {{ $errors->has('tEmpresa') ? ' has-error' : '' }}">
      {!! Form::label('id_analista','Analista Implantação:') !!}
      {!! Form::select('id_analista', $usersLista, isset($empresaDados->codigo_ibge) ? $empresaDados->codigo_ibge : null, ['class' => 'analista-show-search form-control','placeholder' => 'Selecione o Analista','onkeyup' => 'upper(this)']) !!}
      <small class="text-danger">{{ $errors->first('id_analista') }}</small>
    </div>
    <div class="form-group col-md-2 {{ $errors->has('tEmpresa') ? ' has-error' : '' }}">
      {!! Form::label('id_agente_comercial','Agente Comercial:') !!}
      {!! Form::select('id_agente_comercial', $usersLista, isset($empresaDados->codigo_ibge) ? $empresaDados->codigo_ibge : null, ['class' => 'agente-show-search form-control','placeholder' => 'Selecione o Agente','onkeyup' => 'upper(this)']) !!}
      <small class="text-danger">{{ $errors->first('id_agente_comercial') }}</small>
    </div>
  </div>
  <div class="" role="tabpanel" data-example-id="togglable-tabs">
    <br><br>
    <h3 class="card-title">Produtos e Serviços</h3>
    <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist"></ul>
    <br>
  </div>
  <div class="row">
   <div class="card  col-md-6">
    <div class="card-header">
      <h3 class="card-title">Dados a Importar</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group clearfix">
            <div class="icheck-primary d-inline">
              <input type="checkbox" id="cpa" name="cpa">
              <label for="cpa">Contas a Pagar</label>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group clearfix">
            <div class="icheck-primary d-inline">
              <input type="checkbox" id="cpr" name="cpr">
              <label for="cpr">Contas a  Receber</label>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group clearfix">
            <div class="icheck-primary d-inline">
              <input type="checkbox" id="prd" name="prd">
              <label for="prd">Cadastro Produto/Grupos</label>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group clearfix">
            <div class="icheck-primary d-inline">
              <input type="checkbox" id="cli" name="cli">
              <label for="cli">Cadastro Clientes/Convenios</label>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group clearfix">
            <div class="icheck-primary d-inline">
              <input type="checkbox" id="out" name="out">
              <label for="out">Outros</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="card  col-md-6">
    <div class="card-header">
      <h3 class="card-title">Produtos Inclusos</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group clearfix">
            <div class="icheck-danger d-inline">
              <input type="checkbox" id="fp" name="fp">
              <label for="fp">Farmacia Popular</label>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group clearfix">
            <div class="icheck-danger d-inline">
              <input type="checkbox" id="trn" name="trn">
              <label for="trn">Portal Drogaria</label>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group clearfix">
            <div class="icheck-danger d-inline">
              <input type="checkbox" id="func" name="func">
              <label for="func">Funcional Card</label>
            </div>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-sm-4">
          <div class="form-group clearfix">
            <div class="icheck-danger d-inline">
              <input type="checkbox" id="eph" name="eph">
              <label for="eph">E-pharma</label>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group clearfix">
            <div class="icheck-danger d-inline">
              <input type="checkbox" id="vd" name="vd">
              <label for="vd">Vidalink</label>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group clearfix">
            <div class="icheck-danger d-inline">
              <input type="checkbox" id="phar" name="phar">
              <label for="phar">Pharmalink</label>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group clearfix">
            <div class="icheck-danger d-inline">
              <input type="checkbox" id="pec" name="pec">
              <label for="pec">Pec-Febrafar</label>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group clearfix">
            <div class="icheck-danger d-inline">
              <input type="checkbox" id="obj" name="obj">
              <label for="obj">Object-Pro</label>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group clearfix">
            <div class="icheck-danger d-inline">
              <input type="checkbox" id="rec" name="rec">
              <label for="rec">Recarga</label>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group clearfix">
            <div class="icheck-danger d-inline">
              <input type="checkbox" id="tef" name="tef">
              <label for="tef">Tef</label>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group clearfix">
            <div class="icheck-danger d-inline">
              <input type="checkbox" id="gest" name="gest">
              <label for="gest">Gestor Tributario</label>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group clearfix">
            <div class="icheck-danger d-inline">
              <input type="checkbox" id="comp" name="comp">
              <label for="comp">Gestor Compras</label>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>




<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <br><br>
    <h3 class="card-title">Investimentos Financeiros</h3>
    <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist"></ul>
    <br>
  </div>



<div class="form-group">
  {!! Form::submit('Gravar', ['class' => 'btn btn-default btn-xs']); !!}
</div>
			  
@section('css')
<!-- Select2 -->
  <link rel="stylesheet" href="{{ URL::asset('vendor/select2/css/select2.min.css') }}">
  <style>
    .select2 {
       width: 100% !important;
  	 height: 36px;
    }
    .select2 .select2-selection--single{
  	 box-sizing:border-box;
  	 cursor:pointer;
  	 display:block;
  	 height:37px;
  	 user-select:none;
  	 -webkit-user-select:none;
    }
  </style>
@stop
