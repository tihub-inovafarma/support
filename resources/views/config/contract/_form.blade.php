              <div class="card-body">
                <div class="row">
				  <div class="form-group col-md-1">
                    {!! Form::label('tId','ID:') !!}
					{!! Form::text('tId',isset($contratoDados->id) ? $contratoDados->id : null,['class' => 'form-control','readonly' => 'readonly']) !!}
                  </div>
                  <div class="form-group col-md-10 {{ $errors->has('tTipo') ? ' has-error' : '' }}">
                    {!! Form::label('tTipo','Tipo:') !!}
					{!! Form::select('tTipo', array('1' => 'Proposta Comercial','2' => 'Outros'), isset($contratoDados->tipo) ? $contratoDados->tipo : '1', ['class' => 'form-control'])!!}
					<small class="text-danger">{{ $errors->first('tTipo') }}</small>	
                  </div>
				  <div class="form-group col-md-1">
                    {!! Form::label('tVersao','Vers&atilde;o:') !!}
					{!! Form::text('tVersao',isset($contratoDados->versao) ? $contratoDados->versao : null,['class' => 'form-control']) !!}
                  </div>				
                </div>
                <div class="row">
                  <div class="form-group col-md-12 {{ $errors->has('tContrato') ? ' has-error' : '' }}">
                    {!! Form::label('tContrato','Objeto do Contrato:') !!}
					{!! Form::textarea('tContrato',isset($contratoDados->contrato) ? $contratoDados->contrato : null,['class' => 'form-control','rows' => 4, 'cols' => 54,'onkeyup' => 'upper(this)']) !!}
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="ln_solid"></div>
                <div class="form-group">
				  {!! Form::submit('Gravar', ['class' => 'btn btn-default btn-xs']); !!}
				</div>
              </div>
@section('css')
  <link href="{{ URL::asset('vendor/summernote/summernote-bs4.css') }}" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
<!-- -->
@section('js')
  <!-- Summernote editor-->
  <script src="{{ URL::asset('vendor/summernote/summernote-bs4.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/summernote/lang/summernote-pt-BR.js') }}"></script> 
  <!-- InputMask -->
  <script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
  <script>
  $(function () {
    // Summernote
    $('#tContrato').summernote({
      lang: 'pt-BR',   // default: 'en-US'
      height: 500,     // set editor height
      minHeight: null, // set minimum height of editor
      maxHeight: null, // set maximum height of editor
      focus: true  
    }),
	// InputMask
    $("input[id*='tVersao']").inputmask({
      mask: ['9.99'],
      keepStatic: true
    });	
	
  })
  </script>
@stop			  