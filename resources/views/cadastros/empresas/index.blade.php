@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
	  <!--Info Box With-->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-success">
            <span class="info-box-icon"><i class="fas fa-bookmark"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Clientes Ativos</span>
              <span class="info-box-number">{{$totalEmpresasAtivas}} / {{$totalEmpresas}}</span>
              <div class="progress">
                <div class="progress-bar" style="width: {{$percEmpresasAtivas}}%"></div>
              </div>
              <span class="progress-description">
                {{$percEmpresasAtivas}}% da carteira
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-info">
            <span class="info-box-icon"><i class="fas fa-bookmark"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Ativa&ccedil;&otilde;es neste ano ({{date("Y",time())}})</span>
              <span class="info-box-number">{{$totalEmpresasAtivasAno}}</span>
              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
				{{$totalEmpresasAtivas90dias}} &uacute;ltimos 90 dias / {{$totalEmpresasAtivasMes}} neste m&ecirc;s
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-warning">
            <span class="info-box-icon"><i class="fas fa-bookmark"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Cancelados neste ano ({{date("Y",time())}})</span>
              <span class="info-box-number">{{$totalEmpresasCanceladasAno}}</span>
              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description"> 
                {{$totalEmpresasCanceladas90dias}} &uacute;ltimos 90 dias / {{$totalEmpresasCanceladasMes}} neste m&ecirc;s
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-danger">
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Clientes Bloq / Cancelados</span>
              <span class="info-box-number">{{$totalEmpresasBloqueadasCanceladas}} / {{$totalEmpresas}}</span>
              <div class="progress">
                <div class="progress-bar" style="width: {{$percEmpresasBloqueadasCanceladas}}%"></div>
              </div>
              <span class="progress-description">
				{{$percEmpresasBloqueadasCanceladas}}% da carteira
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@stop

@section('content')
    <div class="row">
      <!-- Main row -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Empresas Cadastradas</h3>
		  <div class="card-tools"><a href="{{ route('Cadastros.Empresas.Novo')}}"class="btn btn-success" role="button" aria-pressed="true">Adicionar nova Empresa</a></div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap table-hover dtr-inline collapsed display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
				<th>Rep</th>
				<th>CNPJ</th>
                <th>Raz&atilde;o</th>
                <th>Fantasia</th>
				<th>Contato</th>
                <th>Fone Fixo</th>
				<th>Celular</th>
				<th>Cidade</th>
              </tr>
            </thead>
            <tbody>
			  @foreach($empresasLista as $registro)
                <tr data-href="{{ route('Cadastros.Empresas.Editar',$registro->id)}}" style="cursor:pointer">
                  <td>{{ $registro->id }}</td>
				  <td>{{ $registro->representante }}</td>
				  <td>{{ $registro->inscricao_federal }}</td>
				  <td>{{ $registro->razao_social }}</td>
				  <td>{{ $registro->nome_fantasia }}</td>
				  <td>{{ $registro->pessoa }}</td>
				  <td>{{ $registro->telefone_fixo }}</td>
				  <td>{{ $registro->telefone_celular }}</td>
				  <td>{{ $registro->cidade }}</td>
                </tr>						
              @endforeach
			</tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
     <!-- /.container-fluid -->
    </div>
<!-- /.content-wrapper -->
@endsection
 
@section('css')
<!-- Ionicons -->
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- dataTable.net -->
 <link href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" rel="stylesheet">	
 <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
@stop

@section('js')
<!-- jQuery UI 1.11.4 -->
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>	
<!-- dataTable.net -->	

 <script src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
 
 <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script> 
 
 
 <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> 


<!-- Slimscroll -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
  $.widget.bridge('uibutton', $.ui.button)
 </script>

 <script>
 /*
  * Confirguracoes gerais da dataTable
  * Parametrize de acordo com as configuracoes abaixo
 */
  $(function () {
	$('#datatable').addClass('nowrap');
	$('#datatable').css("font-size", "1.0em");
    $('#datatable').DataTable({
	  "responsive": true,
	  "paging": true,
      "lengthChange": true,
	  "bScrollCollapse": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
	  "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]],
	  "scrollX": true,
	  "dom": "Bfrtip",
      "buttons": [
            {
                "extend":    "copyHtml5",
                "text":      '<i class="fa fa-copy"></i>',
                "titleAttr": "Copiar"
            },
            {
                "extend":    "excelHtml5",
                "text":      "<i class='fa fa-file-excel'></i>",
                "titleAttr": "Excel"
            },
            {
                "extend":    "csvHtml5",
                "text":      "<i class='fa fa-file-alt'></i>",
                "titleAttr": "CSV"
            },/*
            {
                "extend":    "pdfHtml5",
                "text":      "<i class='fa fa-file-pdf'></i>",
                "titleAttr": "PDF"
            },*/
            {
                "extend": "print",
                "text": "<i class='fa fa-print'></i>",
				"titleAttr": "Imprimir",
                "autoPrint": true
            }			
      ],	
      "language":   {
           "sEmptyTable": "Nenhum registro encontrado",
           "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
           "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
           "sInfoFiltered": "(Filtrados de _MAX_ registros)",
           "sInfoPostFix": "",
           "sInfoThousands": ".",
           "sLengthMenu": "_MENU_ resultados por página",
           "sLoadingRecords": "Carregando...",
           "sProcessing": "Processando...",
           "sZeroRecords": "Nenhum registro encontrado",
           "sSearch": "Pesquisar",
           "oPaginate": {
               "sNext": "Próximo",
               "sPrevious": "Anterior",
               "sFirst": "Primeiro",
               "sLast": "Último"
           },
           "oAria": {
               "sSortAscending": ": Ordenar colunas de forma ascendente",
               "sSortDescending": ": Ordenar colunas de forma descendente"
           },
           "select": {
               "rows": {
                   "_": "Selecionado %d linhas",
                   "0": "Nenhuma linha selecionada",
                   "1": "Selecionado 1 linha"
               }		   
           }	  
      }
    });
	$('#datatable').DataTable().columns.adjust().draw();	
  });
  /*
  /*Configuração da link da table
  */
  $(document).ready(function(){
	$('#datatable tbody').on( 'click', 'tr', function () {  
        window.location = $(this).data('href');
    });
	
  });
 </script>
@stop
