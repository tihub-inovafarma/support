<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');



/* 
|-------------
| Cadastros
|-------------
*/
// Empresas
 Route::get ('/cadastros/empresas',               ['as'=>'Cadastros.Empresas',          'uses'=>'Cadastros\EmpresaController@Index']);
 Route::get ('/cadastros/empresas/novo',          ['as'=>'Cadastros.Empresas.Novo',     'uses'=>'Cadastros\EmpresaController@Novo']);
 Route::post('/cadastros/empresas/salvar',        ['as'=>'Cadastros.Empresas.Salvar',   'uses'=>'Cadastros\EmpresaController@Salvar']);
 Route::get ('/cadastros/empresas/editar/{id}',   ['as'=>'Cadastros.Empresas.Editar',   'uses'=>'Cadastros\EmpresaController@Editar']);
 Route::post('/cadastros/empresas/atualizar/{id}',['as'=>'Cadastros.Empresas.Atualizar','uses'=>'Cadastros\EmpresaController@Atualizar']);
 Route::get ('/cadastros/empresas/busca_cep',     ['as'=>'Cadastros.Empresas.BuscaCep' ,'uses'=>'Cadastros\EmpresaController@BuscaCep']);
 Route::post('/cadastros/empresas/busca_cep',     ['as'=>'Cadastros.Empresas.BuscaCep' ,'uses'=>'Cadastros\EmpresaController@BuscaCep']);

 Route::resource('empresas','Cadastros\EmpresaController');


Route::get('/busca', ['as'=>'busca','uses'=>'DashboardController@busca']);






/* 
|-------------
| Manager
|-------------
*/
 Route::get ('manager',                 ['as'=>'Manager',                  'uses'=>'Manager\ManagerController@Index']);
 Route::get ('manager/contact',         ['as'=>'Config.Contrato.Novo',     'uses'=>'Config\ContratoController@Novo']);
 Route::post('manager/contact/save',    ['as'=>'Config.Contrato.Salvar',   'uses'=>'Config\ContratoController@Salvar']);
 Route::get ('manager/register/{id}',   ['as'=>'Config.Contrato.Novo',     'uses'=>'Config\ContratoController@Novo']);
 Route::post('manager/register/save',   ['as'=>'Config.Contrato.Salvar',   'uses'=>'Config\ContratoController@Salvar']);
 Route::get ('manager/putting/{id}',    ['as'=>'Config.Contrato.Novo',     'uses'=>'Config\ContratoController@Novo']);
 Route::post('manager/putting/save',    ['as'=>'Config.Contrato.Salvar',   'uses'=>'Config\ContratoController@Salvar']);
 Route::get ('manager/project/{id}',    ['as'=>'Config.Contrato.Novo',     'uses'=>'Config\ContratoController@Novo']);
 Route::post('manager/project/save',    ['as'=>'Config.Contrato.Salvar',   'uses'=>'Config\ContratoController@Salvar']);
 Route::get ('manager/completion/{id}', ['as'=>'Config.Contrato.Novo',     'uses'=>'Config\ContratoController@Novo']);
 Route::post('manager/completion/save', ['as'=>'Config.Contrato.Salvar',   'uses'=>'Config\ContratoController@Salvar']);




/* 
|-------------
| Config
|-------------
*/
// Contratos
 Route::get ('config/contract',            ['as'=>'Config.Contrato',          'uses'=>'Config\ContratoController@Index']);
 Route::get ('config/contract/create',     ['as'=>'Config.Contrato.Novo',     'uses'=>'Config\ContratoController@Novo']);
 Route::post('config/contract/save',       ['as'=>'Config.Contrato.Salvar',   'uses'=>'Config\ContratoController@Salvar']);
 Route::get ('config/contract/edit/{id}',  ['as'=>'Config.Contrato.Editar',   'uses'=>'Config\ContratoController@Editar']);
 Route::post('config/contract/update/{id}',['as'=>'Config.Contrato.Atualizar','uses'=>'Config\ContratoController@Atualizar']);

/*


*/


Route::get('/teste/calendario', function () {
    return view('teste/calendario');
});



Route::get('/link', ['as'=>'link','uses'=>'DashboardController@link']);

/* 
|-------------
| Donwloads
|-------------
*/
Route::get('/download/versoes', ['as'=>'Download.Index','uses'=>'Downloads\DownloadVersaoController@Index']);
Route::get('/download/aplicativos', ['as'=>'Download.Index','uses'=>'Downloads\DownloadAplicativosController@Index']);


Route::get('/download', ['as'=>'download','uses'=>'Downloads\DownloadController@index']);


Route::get('/download/Base', ['as'=>'Download.Base','uses'=>'Downloads\DownloadController@base']);
Route::get('/download/Pbm', ['as'=>'Download.Pbm','uses'=>'Downloads\DownloadController@pbm']);
Route::get('/download/Win', ['as'=>'Download.Win','uses'=>'Downloads\DownloadController@win']);
Route::get('/download/Imp', ['as'=>'Download.Imp','uses'=>'Downloads\DownloadController@imp']);
Route::get('/download/Etiquetas', ['as'=>'Download.Etiquetas','uses'=>'Downloads\DownloadController@etiquetas']);
Route::get('/download/Util', ['as'=>'Download.Util','uses'=>'Downloads\DownloadController@util']);


//Rotas do cadastro de projetos
Route::resource('Projetos', 'Cadastros\ProjetoController');


Route::post('/cadastros/Alertas',['as'=>'cadastro.alerta','uses'=>'Cadastros\AlertaController@Insert']);
Route::post('/cadastros/Informativos',['as'=>'cadastro.informativos','uses'=>'Cadastros\InformativoController@Insert']);
Route::get('/delete/Informativos/{id}',['as'=>'delete.informativos','uses'=>'Cadastros\InformativoController@delete']);



