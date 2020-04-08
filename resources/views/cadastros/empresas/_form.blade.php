              <!-- <div class="box-body">-->
              <div class="card-body">
                <div class="row">
				  <div class="form-group col-md-1">
                    {!! Form::label('tEmpresa','Empresa:') !!}
					{!! Form::text('tEmpresa',isset($empresaDados->id) ? $empresaDados->id : null,['class' => 'form-control','readonly' => 'readonly']) !!}
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tCnpj') ? ' has-error' : '' }}">
                    {!! Form::label('tCnpj','CNPJ:') !!}
					{!! Form::text('tCnpj',isset($empresaDados->inscricao_federal) ? $empresaDados->inscricao_federal : null,['class' => 'form-control','placeholder' => 'CNPJ']) !!}
					<small class="text-danger">{{ $errors->first('tCnpj') }}</small>
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tInscEstadual') ? ' has-error' : '' }}">
                    {!! Form::label('tInscEstadual','Insc Estadual:') !!}
					{!! Form::text('tInscEstadual',isset($empresaDados->inscricao_estadual) ? $empresaDados->inscricao_estadual : null,['class' => 'form-control','placeholder' => 'Inscri&ccedil;&atilde;o Estadual']) !!}
					<small class="text-danger">{{ $errors->first('tInscEstadual') }}</small>
                  </div>
                  <div class="form-group col-md-3 ">
					{!! Form::label('tFranquia','Franquia:') !!}
					{!! Form::select('tFranquia', $franquiasLista, isset($empresaDados->franquia_id) ? $empresaDados->franquia_id : 0, ['class' => 'form-control']) !!}
                  </div>				  
                  <div class="form-group col-md-4 ">
					{!! Form::label('tRede','Rede:') !!}
					{!! Form::select('tRede', $redesLista, isset($empresaDados->rede_id) ? $empresaDados->rede_id : 0, ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-5 {{ $errors->has('tRazaoSocial') ? ' has-error' : '' }}">
                    {!! Form::label('tRazaoSocial','Raz&atilde;o:') !!}
					{!! Form::text('tRazaoSocial',isset($empresaDados->razao_social) ? $empresaDados->razao_social : null,['class' => 'form-control','placeholder' => 'Raz&atilde;o Social','onkeyup' => 'upper(this)']) !!}
					<small class="text-danger">{{ $errors->first('tRazaoSocial') }}</small>
                  </div>
                  <div class="form-group col-md-5 {{ $errors->has('tFantasia') ? ' has-error' : '' }}">
                    {!! Form::label('tFantasia','Fantasia:') !!}
					{!! Form::text('tFantasia',isset($empresaDados->nome_fantasia) ? $empresaDados->nome_fantasia : null,['class' => 'form-control','placeholder' => 'Fantasia','onkeyup' => 'upper(this)']) !!}
					<small class="text-danger">{{ $errors->first('tFantasia') }}</small>
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tFG') ? ' has-error' : '' }}">
                    {!! Form::label('tFG','Filial:') !!}
					{!! Form::select('tFG', array('0' => 'Matriz','1' => 'Filial 1','2' => 'Filial 2','3' => 'Filial 3','4' => 'Filial 4','5' => 'Filial 5','6' => 'Filial 6','7' => 'Filial 7'), 
						isset($empresaDados->email) ? $empresaDados->email : 0, ['class' => 'form-control','disabled' => 'disabled']) !!}
					<small class="text-danger">{{ $errors->first('tFG') }}</small>
                  </div>
                </div>	
                <div class="row">
                  <div class="form-group col-md-2 {{ $errors->has('tCep') ? ' has-error' : '' }}">
                    {!! Form::label('tCep','CEP:') !!}
					{!! Form::text('tCep',isset($empresaDados->cep) ? $empresaDados->cep : null,['class' => 'form-control','placeholder' => 'CEP']) !!}
					<small class="text-danger">{{ $errors->first('tCep') }}</small>
                  </div>				
                  <div class="form-group col-md-5 {{ $errors->has('tEndereco') ? ' has-error' : '' }}">
                    {!! Form::label('tEndereco','Endere&ccedil;o:') !!}
					{!! Form::text('tEndereco',isset($empresaDados->endereco) ? $empresaDados->endereco : null,['class' => 'form-control','placeholder' => 'Endere&ccedil;o','onkeyup' => 'upper(this)']) !!}
					<small class="text-danger">{{ $errors->first('tEndereco') }}</small>				  
                  </div>
                  <div class="form-group col-md-1 {{ $errors->has('tNum') ? ' has-error' : '' }}">
                    {!! Form::label('tNum','Num:') !!}
					{!! Form::number('tNum',isset($empresaDados->numero) ? $empresaDados->numero : null,['class' => 'form-control','placeholder' => '99']) !!}
					<small class="text-danger">{{ $errors->first('tNum') }}</small>	
                  </div>
                  <div class="form-group col-md-4 {{ $errors->has('tComplemento') ? ' has-error' : '' }}">
                    {!! Form::label('tComplemento','Complemento:') !!}
					{!! Form::text('tComplemento',isset($empresaDados->complemento) ? $empresaDados->complemento : null,['class' => 'form-control','placeholder' => 'Complemento','onkeyup' => 'upper(this)']) !!}
					<small class="text-danger">{{ $errors->first('tComplemento') }}</small>	
                  </div>
                </div>				
                <div class="row">
                  <div class="form-group col-md-6 {{ $errors->has('tBairro') ? ' has-error' : '' }}">
                    {!! Form::label('tBairro','Bairro:') !!}
					{!! Form::text('tBairro',isset($empresaDados->bairro) ? $empresaDados->bairro : null,['class' => 'form-control','placeholder' => 'Bairro','onkeyup' => 'upper(this)']) !!}
					<small class="text-danger">{{ $errors->first('tBairro') }}</small>					  
                  </div>
                  <div class="form-group col-md-4 {{ $errors->has('tCidade') ? ' has-error' : '' }}">
                    {!! Form::label('tCidade','Cidade:') !!}
					{!! Form::select('tCidade', $cidadesLista, isset($empresaDados->codigo_ibge) ? $empresaDados->codigo_ibge : null, ['class' => 'city-show-search form-control','placeholder' => 'Selecione a Cidade','onkeyup' => 'upper(this)']) !!}
					<small class="text-danger">{{ $errors->first('tCidade') }}</small>	
                  </div>
				  
                  <div class="form-group col-md-2 {{ $errors->has('tRepresentante') ? ' has-error' : '' }}">
                    {!! Form::label('tRepresentante','Representante:') !!}
					{!! Form::select('tRepresentante', array('1' => 'TIHUB','2' => 'MVPRIME'), isset($empresaDados->representante) ? $empresaDados->representante : '1', ['class' => 'form-control','disabled' => 'disabled'])!!}
					<small class="text-danger">{{ $errors->first('tRepresentante') }}</small>	
                  </div>	
                </div>				
                <div class="row">
                  <div class="form-group col-md-4 {{ $errors->has('tContato') ? ' has-error' : '' }}">
                    {!! Form::label('tContato','Contato:') !!}
					{!! Form::text('tContato',isset($empresaDados->contato) ? $empresaDados->contato : null,['class' => 'form-control','placeholder' => 'Contato','onkeyup' => 'upper(this)']) !!}
					<small class="text-danger">{{ $errors->first('tContato') }}</small>	
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tTelefone') ? ' has-error' : '' }}">
                    {!! Form::label('tTelefone','Telefone:') !!}
					{!! Form::text('tTelefone',isset($empresaDados->telefone_fixo) ? $empresaDados->telefone_fixo : null,['class' => 'form-control','placeholder' => 'Fixo']) !!}
					<small class="text-danger">{{ $errors->first('tTelefone') }}</small>					  
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tCelular') ? ' has-error' : '' }}">
                    {!! Form::label('tCelular','Celular:') !!}
					{!! Form::text('tCelular',isset($empresaDados->telefone_celular) ? $empresaDados->telefone_celular : null,['class' => 'form-control','placeholder' => 'Celular']) !!}
					<small class="text-danger">{{ $errors->first('tCelular') }}</small>	
                  </div>
                  <div class="form-group col-md-4 {{ $errors->has('tSite') ? ' has-error' : '' }}">
                    {!! Form::label('tSite','Site:') !!}
					{!! Form::text('tSite',isset($empresaDados->site) ? $empresaDados->site : null,['class' => 'form-control','placeholder' => 'Site','onkeyup' => 'lower(this)']) !!}
					<small class="text-danger">{{ $errors->first('tSite') }}</small>	
                  </div>				  
                </div>				
                <div class="row">
                  <div class="form-group col-md-4 {{ $errors->has('tEmail') ? ' has-error' : '' }}">
                    {!! Form::label('tEmail','E-mail:') !!}
					{!! Form::email('tEmail',isset($empresaDados->email) ? $empresaDados->email : null,['class' => 'form-control','placeholder' => 'E-mail','onkeyup' => 'lower(this)']) !!}
					<small class="text-danger">{{ $errors->first('tEmail') }}</small>	
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tSistema') ? ' has-error' : '' }}">
                    {!! Form::label('tSistema','Sistema:') !!}
					{!! Form::select('tSistema', array('1' => 'INOVA FARMA','2' => 'PROCFIT'), isset($empresaDados->sistema) ? $empresaDados->sistema : 1, ['class' => 'form-control']) !!}
					<small class="text-danger">{{ $errors->first('tSistema') }}</small>
                  </div>
                  <div class="form-group col-md-2 {{ $errors->has('tSituacao') ? ' has-error' : '' }}">
                    {!! Form::label('tSituacao','Situa&ccedil;&atilde;o:') !!}
					{!! Form::select('tSituacao', array('A' => 'Ativo','B' => 'Bloqueado','C' => 'Cancelado'), isset($empresaDados->situacao) ? $empresaDados->situacao : 'A', ['class' => 'form-control','disabled' => 'disabled']) !!}
					<small class="text-danger">{{ $errors->first('tSituacao') }}</small>				  
                  </div>
                  <div class="form-group col-md-2">
                    {!! Form::label('tCadastro','Cadastro:') !!}
					{!! Form::text('tCadastro',isset($empresaDados->created_at) ? \Carbon\Carbon::parse($empresaDados->created_at)->format('d/m/Y H:i:s') : null,['class' => 'form-control','disabled' => 'disabled']) !!}
                  </div>
                  <div class="form-group col-md-2">
                    {!! Form::label('tAtivacao','Ativa&ccedil;&atilde;o:') !!}
					{!! Form::text('tAtivacao',isset($empresaDados->data_ativacao) ? \Carbon\Carbon::parse($empresaDados->data_ativacao)->format('d/m/Y H:i:s') : null,['class' => 'form-control','disabled' => 'disabled']) !!}	
                  </div>				  
                </div>				
                <div class="row">
                  <div class="form-group col-md-12 {{ $errors->has('tObservacao') ? ' has-error' : '' }}">
                    {!! Form::label('tObservacao','Observa&ccedil;&otilde;es:') !!}
					{!! Form::textarea('tObservacao',isset($empresaDados->observacao) ? $empresaDados->observacao : null,['class' => 'form-control','rows' => 4, 'cols' => 54,'onkeyup' => 'upper(this)']) !!}
                  </div>
                </div>				
				<!-- tab-panel -->
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_pessoas" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Pessoas</a></li>
                    <li role="presentation" class=""><a href="#tab_outrosdados" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Outros Dados</a></li>
                    <li role="presentation" class=""><a href="#tab_agendas" role="tab" id="profile-tabb3" data-toggle="tab" aria-controls="profile" aria-expanded="false">Agendas</a></li>
                  </ul>
                  <div id="tabCompany" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_pessoas" aria-labelledby="home-tab">
                     <div class="container">
                       <div class="row">
                         <div class='col-sm-2'>
                           Nome:
                           <div class='form-group'><input type='text' class="form-control" id="txtPessoaNome" name="txtPessoaNome" placeholder="Nome" maxlength="40" value=""></div>
                         </div>
                         <div class='col-sm-2'>
                           Cargo:
                           <div class='form-group'><input type='text' class="form-control" id="txtPessoaCargo" name="txtPessoaCargo" placeholder="Cargo" maxlength="40" value=""></div>
                         </div>
                         <div class='col-sm-2'>
                           Celular:
                           <div class='form-group'><input type='text' class="form-control" id="txtPessoaFone" name="txtPessoaFone" placeholder="Celular" maxlength="18" value=""></div>
                         </div>
                         <div class='col-sm-3'>
                           E-mail:
                           <div class='form-group'><input type='text' class="form-control" id="txtPessoaEmail" name="txtPessoaEmail" placeholder="e-mail" maxlength="255" value=""></div>
                         </div>
                         <div class='col-sm-3'>
                           Observa&ccedil;&otilde;es:
                           <div class='form-group input-group'><input type='text' class="form-control" id="txtPessoaObs" name="txtPessoaObs" placeholder="Observação" maxlength="255" value="">
						    <span class="input-group-btn">
                             <button type="button" class="btn btn-primary">Incluir</button>
                            </span>
						  </div>
                         </div>
                       </div>						
                     </div>	
					 <div class="ln_solid"></div>

				     <div class="table-pessoas">	
                      <!--<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> -->
					  <table id="datatable-responsive" class="table table-striped" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>#</th>
							<th>Nome</th>
				      	    <th>Cargo</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
				      	    <th>Observa&ccedil;&otilde;es</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
				     </div>
					
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_outrosdados" aria-labelledby="profile-tab">

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_agendas" aria-labelledby="profile-tab">

                    </div>
                  </div>
                </div>
				<!-- /.tab-panel -->
                <div class="clearfix"></div>
                <div class="ln_solid"></div>
                <div class="form-group">
				  {!! Form::submit('Gravar', ['class' => 'btn btn-default btn-xs']); !!}
				</div>
                <!-- </div> -->
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
			  
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

@section('js')
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>	
<!-- Select2 -->
  <script src="{{ URL::asset('vendor/select2/js/select2.full.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/select2/js/i18n/pt-BR.js') }}"></script>
<!-- InputMask -->
  <script src="{{ URL::asset('vendor/inputmask/inputmask.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/inputmask/inputmask.date.extensions.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/inputmask/inputmask.extensions.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/inputmask/jquery.inputmask.bundle.js') }}"></script> 
<!-- FastClick -->
  <script src="{{ URL::asset('vendor/fastclick/fastclick.js') }}"></script>
<!-- Slimscroll -->
  <script src="{{ URL::asset('vendor/slimscroll/slimscroll.min.js') }}"></script>

<script type="text/javascript">
  $(function (){
    //Initialize Select2 Elements
    $('.city-show-search').select2({
		placeholder: 'Selecione a cidade',
		allowClear: true,
		language: 'pt-BR'
	});
  });
  $('#tCep').change(function(){
    var cep = $(this).val();
	$.ajax({
		type: 'GET',
		url: '{{route('Cadastros.Empresas.BuscaCep')}}',
		data: {cep},
		datatype: 'JSON',
		//delay: 250,
		success: function(data) {
            //alert(JSON.stringify(data));
			$('#tEndereco').val(data[0].endereco);
			$('#tBairro').val(data[0].bairro);
			//$('#tCidade').val(data[0].codigo_ibge);
		}
	});
  });  
  $('#tRede').change(function() {
    var rede = $(this).val();
    if (rede != 0) {
		$('#tFG').removeAttr('disabled');
	} else{
		$('#tFG').val(0);
		$('#tFG').attr('disabled','disabled');
	}
  });
  $("input[id*='tCnpj']").inputmask({
    mask: ['99.999.999/9999-99'],
    keepStatic: true
  });
  $("input[id*='tCep']").inputmask({
    mask: ['99.999-999'],
    keepStatic: true
  });
  $("input[id*='tTelefone']").inputmask({
    mask: ['(99)9999-9999'],
    keepStatic: true
  });
  $("input[id*='tCelular']").inputmask({
    mask: ['(99)99999-9999'],
    keepStatic: true
  });
  $("input[id*='tPessoaFone']").inputmask({
    mask: ['(99)99999-9999'],
    keepStatic: true
  });
  function upper(z){
    v = z.value.toUpperCase();
    z.value = v;
 }
  function lower(z){
    l = z.value.toLowerCase();
    z.value = l;
  } 
  
</script>
@stop