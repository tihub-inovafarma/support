<?php

namespace App\Http\Controllers\Downloads;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Empresas;

class DownloadController extends Controller
{

    public function index(){

    }



public function versoes(Request $request){
  return view('download/versoes');
}

public function base(Request $request){
  return view('download/base');
}

public function pbm(Request $request){
  return view('download/pbm');
}
public function win(Request $request){
  return view('download/win');
}
public function imp(Request $request){
  return view('download/imp');
}
public function etiquetas(Request $request){
  return view('download/etiquetas');
}
public function util(Request $request){
  return view('download/util');
}
}
