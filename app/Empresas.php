<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $fillable = [
			'razao_social','nome_fantasia','inscricao_federal','inscricao_estadual','endereco','numero','bairro','complemento','cep','codigo_ibge','telefone_fixo','telefone_fixo2',
			'telefone_celular','telefone_celular2','representante','rede_id','filial','franquia_id','email','site','situacao','observacao','user_id','codigo_antigo','sistema'];

 }
