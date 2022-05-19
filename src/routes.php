<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/propriedade/{id}', 'PropriedadeController@index');
$router->post('/propriedade/{id}', 'PropriedadeController@cadastro');

$router->get('/renda/{idsocio}', 'RendaController@index');
$router->post('/renda/{idsocio}', 'RendaController@addRenda');
$router->get('/renda/excluir/{idobjeto}/{idsocio}', 'RendaController@excluir');

$router->get('/cadastro', 'CadastroController@index');
$router->post('/cadastro', 'CadastroController@cadastroAction');
$router->get('/cadastro/editar/{id}', 'CadastroController@editarCadastro');
$router->post('/cadastro/editar/{id}', 'CadastroController@editarCadastroAction');

$router->get('/arquivo/{idsocio}', 'ArquivoController@index');
$router->get('/arquivo/emissao/{idsocio}', 'ArquivoController@emissao');
$router->post('/arquivo/emissao/{idsocio}', 'ArquivoController@emissaoAction');

$router->get('/declaracao/{iddeclaracao}', 'DeclaracaoController@index');