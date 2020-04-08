@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

@stop

@section('content')

<link rel="stylesheet" href="{{ URL::asset('vendor/select2/select2.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ URL::asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('vendor/daterangepicker-master/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('vendor/daterangepicker/daterangepicker-bs3.css') }}">
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
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
		  @if(count($errors))
		      <div class="alert alert-danger">
		  	      <strong>Whoops!</strong> Houve alguns problemas ao salvar este formul&atilde;rio.
		  	      <br/>
		      </div>
		  @endif
		  @if (session()->has('success'))
		      <div class="alert alert-success">
		          @if(is_array(session()->get('success')))
		          <ul>
		              @foreach (session()->get('success') as $message)
		                  <li>{{ $message }}</li>
		              @endforeach
		          </ul>
		          @else
		              {{ session()->get('success') }}
		          @endif
		      </div>
		  @endif
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Dados da Empresa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
			{!! Form::open(['route' => 'Cadastros.Projetos.Salvar', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
			    @include('cadastros.projetos._form')
			{!! Form::close() !!}
          </div>
          <!-- /.general form elements -->
        </div>
        <!-- /.left column -->
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection


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

 
  <script src="{{ URL::asset('vendor/daterangepicker-master/moment.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/daterangepicker-master/daterangepicker.js') }}"></script>

 

  
<!-- FastClick -->
  <script src="{{ URL::asset('vendor/fastclick/fastclick.js') }}"></script>
<!-- Slimscroll -->
  <script src="{{ URL::asset('vendor/slimscroll/slimscroll.min.js') }}"></script>

<script type="text/javascript">
  $(function (){
    //Initialize Select2 Elements
    $('.company-show-search').select2({
		placeholder: 'Selecione a empresa',
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



<script type="text/javascript">
$(function() {

  $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
    "format": "DD/MM/YYYY",
    "separator": " - ",
    "applyLabel": "Aplicar",
    "cancelLabel": "Cancelar",
    "daysOfWeek": [
      "Dom",
      "Seg",
      "Ter",
      "Qua",
      "Qui",
      "Sex",
      "Sab"
    ],
    "monthNames": [
      "Janeiro",	
      "Fevereiro",
      "Março",
      "Abril",
      "Maio",
      "Junho",
      "Julho",
      "Agosto",
      "Setembro",
      "Outubro",
      "Novembro",
      "Dezembro"
    ],
    "firstDay": 1
  }
  });

  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
      
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
</script>


@stop