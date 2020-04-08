@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
   
<div class="content-wrapper">
  <br>
  
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Farmácia Popular</h3>
        </div>
        <div class="card-body">
          <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap table-hover" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>FUNÇÃO</th>
                <th>ACESSAR</th>
                <th>OBTER LINK</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Produção</td>
                <div id="fp1" style="display:none;">https://farmaciapopular-portal.saude.gov.br/farmaciapopular-portal</div>
                <td>
                  <a href="https://farmaciapopular-portal.saude.gov.br/farmaciapopular-portal"target="_blank" class="btn btn-success" role="button" aria-pressed="true">Acessar</a>
                </td>
                <td>
                  <button class="btn btn-primary" onclick="copyToClipboard('#fp1')">Obter Link</button>
                </td>
              </tr>

              <tr>
                <th scope="row">2</th>
                
                <td>Homologação</td>
                <div id="fp2" style="display:none;"> https://farmaciapopular-portal-homologacao.saude.gov.br/farmaciapopular-portal</div>
                <td>
                  <a href=" https://farmaciapopular-portal-homologacao.saude.gov.br/farmaciapopular-portal"target="_blank" class="btn btn-success" role="button" aria-pressed="true">Acessar</a>
                </td>
                <td>
                  <button class="btn btn-primary" onclick="copyToClipboard('#fp2')">Obter Link</button>
                </td>
              </tr>
              





              <tr>
                <th scope="row">3</th>
                
                <td>Lista Produtos Gratuitos</td>
                <div id="fp3" style="display:none;">http://portalarquivos2.saude.gov.br/images/pdf/2018/julho/24/lista-gratuidade-EAN-24.07.2018.pdf</div>
                <td>
                  <a href="http://portalarquivos2.saude.gov.br/images/pdf/2018/julho/24/lista-gratuidade-EAN-24.07.2018.pdf"target="_blank" class="btn btn-success" role="button" aria-pressed="true">Acessar</a>
                </td>
                <td>
                  <button class="btn btn-primary" onclick="copyToClipboard('#fp3')">Obter Link</button>
                </td>
              </tr>
              

              <tr>
                <th scope="row">4</th>
                
                <td>Produtos com Participação</td>
                <div id="fp4" style="display:none;">http://portalarquivos2.saude.gov.br/images/pdf/2018/julho/24/lista-copagamento-EAN-24.07.2018.pdf</div>
                <td>
                  <a href="http://portalarquivos2.saude.gov.br/images/pdf/2018/julho/24/lista-copagamento-EAN-24.07.2018.pdf"target="_blank" class="btn btn-success" role="button" aria-pressed="true">Acessar</a>
                </td>
                <td>
                  <button class="btn btn-primary" onclick="copyToClipboard('#fp4')">Obter Link</button>
                </td>
              </tr>


              
              <tr>
                <th scope="row">5</th>
                
                <td>Fraldas Fornecidas pela FP</td>
                <div id="fp5" style="display:none;">http://portalarquivos2.saude.gov.br/images/pdf/2018/julho/02/Lista-de-fraldas-geriatricas-28.06.2018.pdf</div>
                <td>
                  <a href="http://portalarquivos2.saude.gov.br/images/pdf/2018/julho/02/Lista-de-fraldas-geriatricas-28.06.2018.pdf"target="_blank" class="btn btn-success" role="button" aria-pressed="true">Acessar</a>
                </td>
                <td>
                  <button class="btn btn-primary" onclick="copyToClipboard('#fp5')">Obter Link</button>
                </td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Sefaz</h3>
          </div>
          <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap table-hover" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>FUNÇÃO</th>
                  <th>ACESSAR</th>
                  <th>OBTER LINK</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  
                  <td>F-Sist Donwload NF-e</td>
                  <div id="fsist" style="display:none;">https://www.fsist.com.br</div>
                  <td>
                    <a href="https://www.fsist.com.br/"target="_blank" class="btn btn-success" role="button" aria-pressed="true">Acessar</a>
                  </td>
                  <td>
                    <button class="btn btn-primary" onclick="copyToClipboard('#fsist')">Obter Link</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  
                  <td>Status de Servicos SEFAZ</td>
                  <div id="sefaz" style="display:none;">http://www.nfe.fazenda.gov.br/portal/disponibilidade.aspx?versao=0.00&tipoConteudo=Skeuqr8PQBY=</div>
                  <td>
                    <a href="http://www.nfe.fazenda.gov.br/portal/disponibilidade.aspx?versao=0.00&tipoConteudo=Skeuqr8PQBY="target="_blank" class="btn btn-success" role="button" aria-pressed="true">Acessar</a>
                  </td>
                  <td>
                    <button class="btn btn-primary" onclick="copyToClipboard('#sefaz')">Obter Link</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  
                  <td>Consultar CSC Token</td>
                  <div id="token" style="display:none;">https://receita.pr.gov.br/login</div>
                  <td>
                    <a href="https://receita.pr.gov.br/login"target="_blank" class="btn btn-success" role="button" aria-pressed="true">Acessar</a>
                  </td>
                  <td>
                    <button class="btn btn-primary" onclick="copyToClipboard('#token')">Obter Link</button>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </section>
</div>
     
@endsection
 
@section('css')
<!-- Ionicons -->
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- dataTable.net -->
 <link href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" rel="stylesheet">	
 <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop

@section('js')
<!-- jQuery UI 1.11.4 -->
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>	

<!-- Slimscroll -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
  $.widget.bridge('uibutton', $.ui.button)
 </script>

 
@stop
