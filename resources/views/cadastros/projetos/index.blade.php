@extends('adminlte::page')

@section('title', 'Tihub - Projetos')

@section('content_header')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Projetos</h3>
        <a href="{{ route('Projetos.create')}}" class="btn btn-success float-right" role="button"
            aria-pressed="true">Adicionar Projetos</a>
    </div>

    <div class="card-body p-0">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 1%">Id</th>
                    <th style="width: 20%">Empresas</th>
                    <th style="width: 22%">Participantes</th>
                    <th style="width: 8%">Progresso</th>
                    <th style="width: 8%" class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projetosLista ?? '' as $registro)
                <tr data-toggle="modal" data-target="#modal_projetos{{ $registro->id_projetos }}"
                    style="cursor:pointer">
                    <td>{{ $registro->id_projetos }}</td>
                    <td>{{ $registro->nome_fantasia }}
                        <br />
                        <small>
                            {{ $registro->cidade }}
                        </small>
                    </td>
                    <td>{{isset($registro->agente_comercial) ? $registro->agente_comercial : ''}}
                    <br />
                    <small>
                    {{isset($registro->responsavel_implantacao) ? $registro->responsavel_implantacao : ''}}
                        </small>
                        <br />
                        <small>
                    {{isset($registro->responsavel_implantacao) ? $registro->responsavel_implantacao : ''}}
                        </small>
                    </td>

                    <td>
                        @if($registro->status=='aguardando')
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="30"
                                aria-valuemin="0" aria-valuemax="100">20%</div>
                        @elseif($registro->status=='pre')
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30"
                                aria-valuemin="0" aria-valuemax="100">30%</div>
                        @elseif($registro->status=='prod')
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="30"
                                aria-valuemin="0" aria-valuemax="100">80%</div>
                            @elseif($registro->status=='4')

                            @elseif($registro->status=='5')

                            @elseif($registro->status=='6')

                            @endif




                    </td>

                    <td>
                        @if($registro->status=='aguardando')
                        <button type="button" class="btn btn-block btn-danger btn-flat">Aguardando</button>
                        @elseif($registro->status=='pre')
                        <button type="button" class="btn btn-block btn-info btn-flat">Pre-Implantacao</button>
                        @elseif($registro->status=='prod')
                        <button type="button" class="btn btn-block btn-primary btn-flat">Produção</button>
                        @elseif($registro->status=='4')
                        <button type="button" class="btn btn-block btn-primary btn-flat">Em-Implantacao</button>
                        @elseif($registro->status=='5')
                        <button type="button" class="btn btn-block btn-Dark btn-flat">Bloqueado</button>
                        @elseif($registro->status=='6')
                        <button type="button" class="btn btn-block btn-success btn-flat">Finalizado</button>
                        @endif
                    </td>





                    <!-- Button trigger modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="modal_projetos{{ $registro->id_projetos }}" tabindex="-1" role="dialog"
                        aria-labelledby="modal_projetos_label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal_projetos_label"> O que deseja fazer?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Projeto: {{ $registro->nome_fantasia }}
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-app" href="{{ route('Projetos.edit',$registro->id_projetos)}}">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>


                                    <form action="{{route('Projetos.update',$registro->id_projetos)}}" method="post">
                                        <input type="hidden" name="status" value="pre">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                        <button class="btn-lg btn-app" type="submit">
                                            <i class="fas fa-play"></i> Liberar Pré
                                        </button>
                                    </form>


                                    <a class="btn btn-app" href="{{ route('Projetos.pdf')}}">
                                        <i class="fas fa-print"></i> Gerar Pdf
                                    </a>
                                    <a class="btn btn-app">
                                        <i class="fas fa-pause"></i> Pausar
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>














                </tr>
                @endforeach
            </tbody>
        </table>


        <!-- Button trigger modal -->




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
//pega linha da tabela ao clicar
$(document).ready(function() {
    $('#datatable tbody').on('click', 'tr', function() {
        window.location = $(this).data('toggle');
    });

});
</script>
@stop