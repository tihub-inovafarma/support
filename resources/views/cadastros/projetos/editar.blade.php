@extends('adminlte::page')

@section('title', 'Tihub Suporte - Projetos Editando')

@section('content_header')

@stop

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                @if(count($errors))
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Houve alguns problemas ao salvar este formul&atilde;rio.
                    <br />
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

                    <span class="progress-description">
                   
              </span>
                    <!-- /.card-header -->
                    <!-- form start -->


                    {!! Form::open(['route' => ['Projetos.update',$projetosDados->id_projetos], 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                    @method('PUT')
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