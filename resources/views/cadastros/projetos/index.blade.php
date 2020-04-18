@extends('adminlte::page')

@section('title', 'Tihub - Projetos')

@section('content_header')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Projetos</h3>
    <a href="{{ route('Projetos.create')}}"class="btn btn-success float-right" role="button" aria-pressed="true">Adicionar Projetos</a>
    <div class="card-tools">

        </div>
      </div>

      <div class="card-body p-0">
        <table id="datatable" class="table Projeto">
          <thead>
            <tr>
              <th style="width: 1%">Id</th>
              <th style="width: 20%">Empresas</th>
              <th style="width: 30%">Participantes</th>
              <th style="width: 8%">Progresso</th>
              <th style="width: 8%" class="text-center">Status</th>
            </tr>
          </thead>
          <tbody>
          @foreach($empresasLista as $registro)
          <tr data-href="{{ route('Projetos.show',$registro->id)}}" style="cursor:pointer">
                  <td>{{ $registro->id }}</td>
				  <td>{{ $registro->nome_fantasia }}
          <br/>
                          <small>
                          {{ $registro->cidade }}
                          </small>
          </td>
          <td>{{ $registro->name }}</td>
          <td>
          <div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
</div>

          </td>


				  <td>
                          @if($registro->status=='1')
                          <button type="button" class="btn btn-block btn-danger btn-flat">Aguardando</button>
                          @elseif($registro->status=='2')
                          <button type="button" class="btn btn-block btn-secondary btn-flat">Pre-Agendado</button>
                          @elseif($registro->status=='3')
                          <button type="button" class="btn btn-block btn-info btn-flat">Pre-Implantacao</button>
                          @elseif($registro->status=='4')
                          <button type="button" class="btn btn-block btn-primary btn-flat">Em-Implantacao</button>
                          @elseif($registro->status=='5')
                          <button type="button" class="btn btn-block btn-Dark btn-flat">Bloqueado</button>
                          @elseif($registro->status=='6')
                          <button type="button" class="btn btn-block btn-success btn-flat">Finalizado</button>
                          @endif
          </td>


                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </div>
  <!-- /.card -->


  @endsection

  @section('css')


   
  @stop

  @section('js')
  <!-- jQuery UI 1.11.4 -->
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <!-- dataTable.net -->

  
   

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
