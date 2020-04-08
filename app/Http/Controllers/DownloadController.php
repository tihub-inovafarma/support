<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Download;

class DownloadController extends Controller
{
    
    public function index()
    {


        $registros = Download::all();
        return view('download',compact('registros'));
      
    }

    

public function salvar(Request $request)
{
  $path = $request->file('arquivo')->store('downloads','public');

  $post = new Download();
  $post->descricao = $request->input('descricao'); 
  $post->arquivo = $path; 
  $post->save();
 

 
  return redirect()->route('download');

}
}