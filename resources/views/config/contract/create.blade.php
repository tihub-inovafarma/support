@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
		  @if(count($errors))
		      <div class="alert alert-danger">
		  	       <h5><i class="icon fas fa-ban"></i> Whoops!!</h5>Houve alguns problemas ao salvar este formul&aacute;rio.
		  	      <br/>
		      </div>
		  @endif
		  @if (session()->has('success'))
		      <div class="alert alert-success">
		          <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
				  @if(is_array(session()->get('success')))
		              @foreach (session()->get('success') as $message)
		                  {{ $message }}
		              @endforeach
		          @else
		              {{ session()->get('success') }}
		          @endif
		      </div>
		  @endif	
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manuten&ccedil;&atilde;o de contratos</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
			{!! Form::open(['route' => 'Config.Contrato.Salvar', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
			    @include('config.contract._form')
			{!! Form::close() !!}
          </div>
          <!-- /.general form elements -->
        </div>
        <!-- /.left column -->
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection
<!-- -->
