@extends('adminlte::page')

@section('title', 'Aplicativos Diversos')

@section('content_header')
    <!-- <h1 class="m-0 text-dark">Contratos</h1> -->
@stop

@section('content')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Aplicativos Diversos</h3>
		 <!--<div class="card-tools"><a href=""class="btn btn-success" role="button" aria-pressed="true">Adicionar Vers&atilde;o</a></div>-->
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
		<ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="nav-pbm-tab" data-toggle="pill" href="#nav-pbm" role="tab" aria-controls="nav-pbm" aria-selected="true">PBMs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="nav-impressoras-tab" data-toggle="pill" href="#nav-impressoras" role="tab" aria-controls="nav-impressoras" aria-selected="false">IMPRESSORAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="nav-bancodados-tab" data-toggle="pill" href="#nav-bancodados" role="tab" aria-controls="nav-bancodados" aria-selected="false">BANCO DE DADOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="nav-utilitarios-tab" data-toggle="pill" href="#nav-utilitarios" role="tab" aria-controls="nav-utilitarios" aria-selected="false">UTILITÁRIOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#modalAplicativosADD" data-whatever="@mdo" href="#">+ ADICIONAR</a>
          </li>			  
        </ul>
        <div class="tab-content" id="custom-content-above-tabContent">		 
 		  <div class="tab-pane fade show active" id="nav-pbm" role="tabpanel" aria-labelledby="nav-pbm-tab">	 
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Descrição</th>
		    	  <th>Download</th>
                  <th>Link para Download</th>
                </tr>
              </thead>
              <tbody>
		      @foreach($pbmLista as $registroPBM)
                <tr>
		    	  <div id="{{ $registroPBM->id }}" style="display:none;">{{ $registroPBM->site_download }}</div>
		    	  <td>{{ $registroPBM->versao }}</td>
                  <td>{{ $registroPBM->descricao }}</td>
                  <td><a href="{{ $registroPBM->site_download }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                  <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroPBM->id }}')">Obter Link</button></td>
                </tr>
              @endforeach
		      </tbody>
            </table>
		  </div>
          <div class="tab-pane fade" id="nav-impressoras" role="tabpanel" aria-labelledby="nav-impressoras-tab">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Descrição</th>
		    	  <th>Download</th>
                  <th>Link para Download</th>
                </tr>
              </thead>
              <tbody>
		      @foreach($impressoraLista as $registroImpressora)
                <tr>
		    	  <div id="{{ $registroImpressora->id }}" style="display:none;">{{ $registroImpressora->site_download }}</div>
		    	  <td>{{ $registroImpressora->versao }}</td>
                  <td>{{ $registroImpressora->descricao }}</td>
                  <td><a href="{{ $registroImpressora->site_download }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                  <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroImpressora->id }}')">Obter Link</button></td>
                </tr>
              @endforeach
		      </tbody>
            </table>
           </div>
          <div class="tab-pane fade" id="nav-bancodados" role="tabpanel" aria-labelledby="nav-bancodados-tab">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">Versão</th>
                  <th>Descrição</th>
		    	  <th>Download</th>
                  <th>Link para Download</th>
		    	  <th>Link Externo</th>
                </tr>
              </thead>
              <tbody>
		      @foreach($bancoLista as $registroBanco)
                <tr>
		    	  <div id="{{ $registroBanco->id }}" style="display:none;">{{ $registroBanco->site_download }}</div>
		    	  <td>{{ $registroBanco->versao }}</td>
                  <td>{{ $registroBanco->descricao }}</td>
                  <td><a href="{{ $registroBanco->site_download }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                  <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroBanco->id }}')">Obter Link</button></td>
		    	  <td>{{ $registroBanco->site_download }}</td>
                </tr>
              @endforeach
		      </tbody>
            </table>
           </div>		   
          <div class="tab-pane fade" id="nav-utilitarios" role="tabpanel" aria-labelledby="nav-utilitarios-tab">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Descrição</th>
		    	  <th>Download</th>
                  <th>Link para Download</th>
		    	  <th>Link Externo</th>
                </tr>
              </thead>
              <tbody>
		      @foreach($utilitariosLista as $registroUtilitarios)
                <tr>
		    	  <div id="{{ $registroUtilitarios->id }}" style="display:none;">{{ $registroUtilitarios->site_download }}</div>
		    	  <td>{{ $registroUtilitarios->versao }}</td>
                  <td>{{ $registroUtilitarios->descricao }}</td>
                  <td><a href="{{ $registroUtilitarios->site_download }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                  <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroUtilitarios->id }}')">Obter Link</button></td>
		    	  <td>{{ $registroUtilitarios->site_download }}</td>
                </tr>
              @endforeach
		      </tbody>
            </table>
           </div>
		</div><!-- /.nav-bar -->
      </div>
	 
      <div class="modal fade" id="modalDownloadADD">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Adicionar nova vers&atilde;o</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- <div class="box-body">-->
              <div class="card-body">
                <div class="row">
				  <div class="form-group col-md-8">
                    {!! Form::label('tTipo','Tipo Download:') !!}
					{!! Form::select('tTipo', array('1' => 'PBM','2' => 'IMPRESSORAS','3' => 'BASE DE DADOS','4' => 'UTILITÁRIOS'),1, ['class' => 'form-control']) !!}
                  </div>		
				  <div class="form-group col-md-4">
                    {!! Form::label('tVersao','Vers&atilde;o:') !!}
					{!! Form::text('tVersao','',['class' => 'form-control','placeholder' => 'Vers&atilde;o']) !!}
                  </div>	
                </div>	
                <div class="row">				  
				  <div class="form-group col-md-12">
                    {!! Form::label('tDescricao','Descri&ccedil;&atilde;o:') !!}
					{!! Form::text('tDescricao','',['class' => 'form-control','placeholder' => 'Descri&ccedil;&atilde;o']) !!}
                  </div>
                </div>	
                <div class="row">
				  <div class="form-group col-md-12">
                    {!! Form::label('tSite','URL:') !!}
					{!! Form::text('tSite','',['class' => 'form-control','placeholder' => 'URL']) !!}
                  </div>
                </div>	
                <div class="row">				  
				  <div class="form-group col-md-12">
                    {!! Form::label('tArquivo','Arquivo:') !!}
					 <input type="file" id="tArquivo" class="form-control-file" placeholder="">
                  </div>				  
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
				{!! Form::button('Fechar', ['class' => 'btn btn-default','data-dismiss' => 'modal']); !!}
				{!! Form::submit('Salvar', ['class' => 'btn btn-primary']); !!}
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
	  
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop

@section('js')
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
@stop