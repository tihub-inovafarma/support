<div class="card-body">
    <div class="row">


        <div class="form-group col-md-3">
            <label for="tEmpresa">Empresa:</label>
            <select id="id_empresa" name="id_empresa" class="company-show-search form-control select2">
                <option value="{{isset($projetosDados->id) ? $projetosDados->id : ''}}">
                    {{isset($projetosDados->nome_fantasia) ? $projetosDados->nome_fantasia : ''}}</option>
                @foreach($empresasLista as $registro)
                <option value="{{ $registro->id}}">{!! $registro->nome_fantasia !!} </option>
                @endforeach
            </select>
            <small class="text-danger">{{ $errors->first('tEmpresa') }}</small>
        </div>

        <div class="form-group col-md-3">
            <label>Responsável Acompanhamento:</label>
            <input type="text" style="text-transform: uppercase" class="form-control" name="tResponsavel"
                value="{{isset($projetosDados->responsavel_implantacao) ? $projetosDados->responsavel_implantacao : ''}}" />
            <small class="text-danger">{{ $errors->first('tResponsavel') }}</small>
        </div>


        <div class="form-group col-md-3">
            {!! Form::label('tPeriodo','Periodo de Implantação:') !!}
            <input type="text" class="form-control" name="datefilter" autocomplete="off"
                value="{{isset($projetosDados->data_inicio) ? date('d-m-Y' , strtotime($projetosDados->data_inicio))  : ''}}{{isset($projetosDados->data_fim) ? date('d-m-Y' , strtotime($projetosDados->data_fim))  : ''}}" />
        </div>
        <div class="form-group col-md-3">
            <label>Data Negociavél?</label>
            <select class="form-control select2" name="tData_negocial" id="data_negociavel">
                <option>{{isset($projetosDados->data_negociada) ? $projetosDados->data_negociada : ''}}</option>
                <option>SIM</option>
                <option>NAO</option>
            </select>
        </div>

    </div>
    <br>
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <h3 class="card-title">Informações Adicionais</h3><br>
        <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist"></ul>
    </div>
    <div class="row">
        <div class="form-group col-md-3">
            <label>Tipo de Loja</label>
            <select class="form-control select2" name="tipo_farmacia" id="tipo_farmacia">
                <option>{{isset($projetosDados->tipo_farmacia) ? $projetosDados->tipo_farmacia : ''}}</option>
                <option>Farmácia Individual</option>
                <option>Rede Sincronizada</option>
                <option>Abertura de filial Sincronismo</option>
                <option>Abertura de filial Independente</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>Tipo de Conversão</label>
            <select class="form-control select2" name="natureza_implantacao" id="natureza_implantacao"
                style="width: 100%;">
                <option>{{isset($projetosDados->natureza_implantacao) ? $projetosDados->natureza_implantacao : ''}}
                </option>
                <option>Loja Nova</option>
                <option>Softpharma</option>
                <option>Big</option>
                <option>SoftIse farma </option>
                <option>SoftIse farma NG</option>
                <option>Trier</option>
                <option>VSM</option>
                <option>Far</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label>Regime Tributario</label>
            <select class="form-control select2" name="regime_tributario" id="regime_tributario" style="width: 100%;">
                <option>{{isset($projetosDados->regime_tributario) ? $projetosDados->regime_tributario : ''}}
                </option>
                <option>Simples Nacional</option>
                <option>Lucro Presumido</option>
                <option>Lucro Real</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label>Agente Comercial</label>
            <select class="form-control select2" name="tAgente" id="agente_comercial" style="width: 100%;">
                <option>{{isset($projetosDados->agente_comercial) ? $projetosDados->agente_comercial : ''}}</option>
                <option>Diogo</option>
                <option>Ivan</option>
                <option>Rodrigo</option>
                <option>Paulo</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label>Analista Implantação</label>
            <select class="form-control select2" name="tAnalista" id="analista" style="width: 100%;">
                <option>{{isset($projetosDados->id_analista) ? $projetosDados->id_analista : ''}}</option>
                <option>Diogo</option>
                <option>Ivan</option>
                <option>Rodrigo</option>
                <option>Paulo</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="card  col-md-12">
            <div class="card-header">
                <h3 class="card-title">Dados a Importar</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="cpa" name="cpa"
                                    {{isset($projetosDados->imp_cpa) && $projetosDados->imp_cpa == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="cpa">Contas a Pagar</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="cpr" name="cpr"
                                    {{isset($projetosDados->imp_cpr) && $projetosDados->imp_cpr == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="cpr">Contas a Receber</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="prd" name="prd"
                                    {{isset($projetosDados->imp_prod) && $projetosDados->imp_prod == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="prd">Cadastro Produto/Grupos</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="cli" name="cli"
                                    {{isset($projetosDados->imp_cli) && $projetosDados->imp_cli == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="cli">Cadastro Clientes/Convenios</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="out" name="out"
                                    {{isset($projetosDados->imp_out) && $projetosDados->imp_out == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="out">Outros</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Outras Informações importacao</label>
                        <textarea class="form-control" rows="2" name="timport_info" placeholder="Descreva ...">{{isset($projetosDados->import_info) ? $projetosDados->import_info : ''}}
                        </textarea>
                        <small class="text-danger">{{ $errors->first('timport_info') }}</small>
                    </div>
                </div>
            </div>
        </div>
        <br>



        <div class="card  col-md-12">
            <div class="card-header">
                <h3 class="card-title">Produtos Inclusos</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group clearfix">
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="fp" name="fp"
                                    {{isset($projetosDados->pbm_fp) && $projetosDados->pbm_fp == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="fp">Farmacia Popular</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group clearfix">
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="trn" name="trn"
                                    {{isset($projetosDados->pbm_trn) && $projetosDados->pbm_trn == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="trn">Portal Drogaria</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group clearfix">
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="func" name="func"
                                    {{isset($projetosDados->pbm_func) && $projetosDados->pbm_func == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="func">Funcional Card</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group clearfix">
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="eph" name="eph"
                                    {{isset($projetosDados->pbm_epha) && $projetosDados->pbm_epha == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="eph">E-pharma</label>
                            </div>
                        </div>
                    </div>
                    <div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group clearfix">
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="pec" name="pec"
                                    {{isset($projetosDados->pbm_pec) && $projetosDados->pbm_pec == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="pec">Pec-Febrafar</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group clearfix">
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="obj" name="obj"
                                    {{isset($projetosDados->pbm_obj) && $projetosDados->pbm_obj == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="obj">Object-Pro</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group clearfix">
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="rec" name="rec"
                                    {{isset($projetosDados->pbm_rec) && $projetosDados->pbm_rec == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="rec">Recarga</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="form-group clearfix">
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="tef" name="tef"
                                    {{isset($projetosDados->tef) && $projetosDados->tef == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="tef">Tef</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group clearfix">
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="fiscal_gest_trib" name="fiscal_gest_trib"
                                    {{isset($projetosDados->fiscal_gest_trib) && $projetosDados->fiscal_gest_trib == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="fiscal_gest_trib">Gestor Tributario</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group clearfix">
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="gest_comp" name="gest_comp"
                                    {{isset($projetosDados->gest_comp) && $projetosDados->gest_comp == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="gest_comp">Gestor Compras</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="card  col-md-12">
            <div class="card-header">
                <h3 class="card-title">Informações Fiscais</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group clearfix">
                            <div class="icheck-info d-inline">
                                <input type="checkbox" id="fiscal_sped" name="fiscal_sped"
                                    {{isset($projetosDados->fiscal_sped) && $projetosDados->fiscal_sped == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="fiscal_sped">Sped</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group clearfix">
                            <div class="icheck-info d-inline">
                                <input type="checkbox" id="fiscal_sintegra" name="fiscal_sintegra"
                                    {{isset($projetosDados->fiscal_sintegra) && $projetosDados->fiscal_sintegra == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="fiscal_sintegra">Sintegra</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group clearfix">
                            <div class="icheck-info d-inline">
                                <input type="checkbox" id="fiscal_outros" name="fiscal_outros"
                                    {{isset($projetosDados->fiscal_outros) && $projetosDados->fiscal_outros == 1 ? 'checked' : '' }}
                                    value="true" />
                                <label for="fiscal_outros">Outros</label>
                            </div>
                        </div>
                    </div>




                    <div class="form-group col-md-12">
                        <label>Outras Informações Fiscais</label>
                        <textarea class="form-control" rows="2" name="tfiscal_outros" placeholder="Descreva ...">{{isset($projetosDados->fiscal_msg_outros) ? $projetosDados->fiscal_msg_outros : ''}}
                        </textarea>
                    </div>
                </div>
            </div>
        </div>




        <div class="card  col-md-12">
            <div class="card-header">
                <h3 class="card-title">Informações Comerciais</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group clearfix">
                            <label for="tValor_mensal">Investimento inicial:</label>
                            <input type="text" id="tValor_inicial" name="tValor_inicial" placeholder="R$:"
                                class="dinheiro form-control" style="display:inline-block" />
                            <small class="text-danger">{{ $errors->first('tValor_inicial') }}</small>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group clearfix">
                            <label for="tValor_mensal">Valor Mensalidade:</label>
                            <input type="text" id="tValor_inicial" name="tValor_inicial" placeholder="R$:"
                                class="dinheiro form-control" style="display:inline-block" />
                            <small class="text-danger">{{ $errors->first('tValor_inicial') }}</small>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="tValor_mensal">Data 1º Mensalidade:</label>
                        <input type="text" class="form-control" name="data_vencimento" autocomplete="off">

                    </div>
                    <div class="col-sm-3">
                        <div class="form-group clearfix">
                            <label for="tValor_mensal">Faturamento Anual:</label>
                            <input type="text" id="tValor_inicial" name="tValor_inicial" placeholder="R$:"
                                class="dinheiro form-control" style="display:inline-block" />
                            <small class="text-danger">{{ $errors->first('tValor_inicial') }}</small>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group clearfix">
                            <label for="tValor_mensal">Numero Terminais:</label>
                            <input type="text" id="tValor_inicial" name="tValor_inicial" class="form-control"
                                style="display:inline-block" />
                            <small class="text-danger">{{ $errors->first('tValor_inicial') }}</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
   
    </div>
    

</div>

<div class="form-group">
    {!! Form::submit('Gravar', ['class' => 'btn btn-default btn-xs']); !!}
</div>

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ URL::asset('vendor/select2/css/select2.min.css') }}">

<link rel="stylesheet" href="{{ URL::asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('vendor/daterangepicker-master/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ URL::asset('vendor/daterangepicker/daterangepicker-bs3.css') }}">
<style>
.select2 .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 37px;
    user-select: none;
    -webkit-user-select: none;
}
</style>
@stop
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
<script src="{{ URL::asset('vendor/inputmask/jquery.mask.min.js') }}"></script>


<script src="{{ URL::asset('vendor/daterangepicker-master/moment.min.js') }}"></script>
<script src="{{ URL::asset('vendor/daterangepicker-master/daterangepicker.js') }}"></script>




<!-- FastClick -->
<script src="{{ URL::asset('vendor/fastclick/fastclick.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ URL::asset('vendor/slimscroll/slimscroll.min.js') }}"></script>

<script type="text/javascript">
$(function() {
    //Initialize Select2 Elements
    $('.company-show-search').select2({
        placeholder: 'Selecione a empresa',
        allowClear: true,
        language: 'pt-BR'
    });
});


$('.dinheiro').mask('#.##0,00', {
    reverse: true
});



function upper(z) {
    v = z.value.toUpperCase();
    z.value = v;
}

function lower(z) {
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
                "Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"
            ],
            "monthNames": [
                "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto",
                "Setembro", "Outubro", "Novembro", "Dezembro"
            ],
            "firstDay": 1
        }
    });

    $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format(
            'DD-MM-YYYY'));

    });

    $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

});
</script>


<script>
$(function() {
    $('input[name="data_vencimento"]').daterangepicker({

        singleDatePicker: true,
        showDropdowns: true,
        minYear: 2020,

        maxYear: parseInt(moment().format('YYYY'), 10),
        locale: {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "daysOfWeek": [
                "Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"
            ],
            "monthNames": [
                "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto",
                "Setembro", "Outubro", "Novembro", "Dezembro"
            ],
            "firstDay": 1
        }
    }, function(start, end, label) {


    });
});
</script>

@stop