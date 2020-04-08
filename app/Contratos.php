<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Contratos extends Model
{
        protected $fillable = ['id','user_created','user_updated','tipo','versao','contrato'];

}