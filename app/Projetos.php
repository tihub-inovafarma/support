<?php

namespace App;

use Illuminate\Database\Eloquent\Model;





class Projetos extends Model
{

    protected $fillable = [
      
        'id_projetos','id_empresa','id_gerente','id_analista','id_agente_comercial','responsavel_implantacao','id_cidade','tipo_farmacia','data_inicio','data_fim','
        data_negociada','vencimento_mensalidade','valor_mensalidade','natureza_implantacao','possui_imendes','status','natureza_implantacao'];
   

        protected $primaryKey = 'id_projetos';
}
