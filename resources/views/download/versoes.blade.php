@extends('adminlte::page')

@section('title', 'Versões Inovafarma')

@section('content_header')
    <!-- <h1 class="m-0 text-dark">Contratos</h1> -->
@stop

@section('content')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Vers&otilde;es da Precis&atilde;o Sistemas</h3>
		 <!--<div class="card-tools"><a href=""class="btn btn-success" role="button" aria-pressed="true">Adicionar Vers&atilde;o</a></div>-->
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
		<ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="nav-inova-tab" data-toggle="pill" href="#nav-inova" role="tab" aria-controls="nav-inova" aria-selected="true">INOVAFARMA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="nav-service-tab" data-toggle="pill" href="#nav-service" role="tab" aria-controls="nav-service" aria-selected="false">SERVICE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="nav-importador-tab" data-toggle="pill" href="#nav-importador" role="tab" aria-controls="nav-importador" aria-selected="false">IMPORTADOR</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="nav-basedados-tab" data-toggle="pill" href="#nav-basedados" role="tab" aria-controls="nav-basedados" aria-selected="false">BASE DE DADOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#modalDownloadADD" data-whatever="@mdo" href="#">+ ADICIONAR</a>
          </li>			  
        </ul>
        <div class="tab-content" id="custom-content-above-tabContent">		 
 		  <div class="tab-pane fade show active" id="nav-inova" role="tabpanel" aria-labelledby="nav-inova-tab">	
 		   <div class="card-body table-responsive p-0" style="height: 100%;">		  
            <table class="table table-striped table-head-fixed">
              <thead>
                <tr>
                  <th style="width: 10px">Versão</th>
                  <th>Descrição</th>
		    	  <th>Download</th>
                  <th>Link para Download</th>
		    	  <th>Link do Github</th>
                </tr>
              </thead>
              <tbody>
		      @foreach($inovaLista as $registroInova)
                <tr>
		    	  <div id="{{ $registroInova->id }}" style="display:none;">{{ $registroInova->site_download }}</div>
		    	  <td>{{ $registroInova->versao }}</td>
                  <td>{{ $registroInova->descricao }}</td>
                  <td><a href="{{ $registroInova->site_download }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                  <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroInova->id }}')">Obter Link</button></td>
		    	  <td>{{ $registroInova->site_download }}</td>
                </tr>
              @endforeach
		      </tbody>
            </table>
 		   </div>			
		  </div>
          <div class="tab-pane fade" id="nav-service" role="tabpanel" aria-labelledby="nav-service-tab">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">Versão</th>
                  <th>Descrição</th>
		    	  <th>Download</th>
                  <th>Link para Download</th>
		    	  <th>Link do Github</th>
                </tr>
              </thead>
              <tbody>
		      @foreach($serviceLista as $registroService)
                <tr>
		    	  <div id="{{ $registroService->id }}" style="display:none;">{{ $registroService->site_download }}</div>
		    	  <td>{{ $registroService->versao }}</td>
                  <td>{{ $registroService->descricao }}</td>
                  <td><a href="{{ $registroService->site_download }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                  <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroService->id }}')">Obter Link</button></td>
		    	  <td>{{ $registroService->site_download }}</td>
                </tr>
              @endforeach
		      </tbody>
            </table>
           </div>
          <div class="tab-pane fade" id="nav-importador" role="tabpanel" aria-labelledby="nav-importador-tab">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">Versão</th>
                  <th>Descrição</th>
		    	  <th>Download</th>
                  <th>Link para Download</th>
		    	  <th>Link do Github</th>
                </tr>
              </thead>
              <tbody>
		      @foreach($importadorLista as $registroImportador)
                <tr>
		    	  <div id="{{ $registroImportador->id }}" style="display:none;">{{ $registroImportador->site_download }}</div>
		    	  <td>{{ $registroImportador->versao }}</td>
                  <td>{{ $registroImportador->descricao }}</td>
                  <td><a href="{{ $registroImportador->site_download }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                  <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroImportador->id }}')">Obter Link</button></td>
		    	  <td>{{ $registroImportador->site_download }}</td>
                </tr>
              @endforeach
		      </tbody>
            </table>
           </div>
          <div class="tab-pane fade" id="nav-basedados" role="tabpanel" aria-labelledby="nav-basedados-tab">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">Versão</th>
                  <th>Descrição</th>
		    	  <th>Download</th>
                  <th>Link para Download</th>
		    	  <th>Link do Github</th>
                </tr>
              </thead>
              <tbody>
		      @foreach($baseLista as $registroBase)
                <tr>
		    	  <div id="{{ $registroBase->id }}" style="display:none;">{{ $registroBase->site_download }}</div>
		    	  <td>{{ $registroBase->versao }}</td>
                  <td>{{ $registroBase->descricao }}</td>
                  <td><a href="{{ $registroBase->site_download }}" class="btn btn-success" role="button" aria-pressed="true">Download</a></td>
                  <td><button class="btn btn-primary" onclick="copyToClipboard('#{{ $registroBase->id }}')">Obter Link</button></td>
		    	  <td>{{ $registroBase->site_download }}</td>
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
					{!! Form::select('tTipo', array('1' => 'INOVAFARMA','2' => 'SERVICE','3' => 'IMPORTADOR','4' => 'BASE DE DADOS'),1, ['class' => 'form-control']) !!}
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