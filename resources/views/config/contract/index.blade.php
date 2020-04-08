@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <!-- <h1 class="m-0 text-dark">Contratos</h1> -->
@stop

@section('content')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Manuten&ccedil;&atilde;o de contratos</h3>
		<div class="card-tools"><a href="{{ Route('Config.Contrato.Novo') }}"class="btn btn-success" role="button" aria-pressed="true">Adicionar Contrato</a></div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Contrato</th>
			  <th>Versão</th>
              <th>Criado por</th>
              <th>Data criação</th>
			  <th>Alterado por</th>
			  <th>Data alteração</th>
            </tr>
          </thead>
          <tbody>
		  @foreach($contratosLista as $registro)
            <tr data-href="{{ route('Config.Contrato.Editar',$registro->id)}}" style="cursor:pointer">
              <td>{{ $registro->id }}</td>
              <td>{{ $registro->tipo }}</td>
              <td>{{ $registro->versao }}</td>
              <td>{{ $registro->user_created }}</td>
			  <td>{{ date('d/m/Y H:i:s', strtotime($registro->created_at)) }}</td>
			  <td>{{ $registro->user_updated }}</td>
			  <td>{{ date('d/m/Y H:i:s', strtotime($registro->updated_at)) }}</td>
            </tr>
          @endforeach
		  </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop

@section('js')
<script>
/*
/*Configuração da link da table
*/
  $(function(){
    $('#datatable tbody').on( 'click', 'tr', function () {  
        window.location = $(this).data('href');
    });
  });
</script>
@stop