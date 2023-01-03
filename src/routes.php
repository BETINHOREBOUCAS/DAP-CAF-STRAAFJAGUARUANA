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

$router->get('/lista/membros/{id}', 'MembrosController@listaMembro');
$router->get('/cadastrar/membros/{id}', 'MembrosController@cadastrarMembro');
$router->post('/cadastrar/membros/{id}', 'MembrosController@cadastrarMembroAction');
$router->get('/lista/membros/excluir/{id}/{idmembro}', 'MembrosController@excluirMembro');
$router->post('/lista/membros/excluir/{id}/{idmembro}', 'MembrosController@excluirMembroAction');
$router->get('/lista/membros/editar/{id}/{idmembro}', 'MembrosController@editarMembro');
$router->post('/lista/membros/editar/{id}/{idmembro}', 'MembrosController@editarMembroAction');

$router->get('/arquivo/{idsocio}', 'ArquivoController@index');
$router->post('/arquivo/{idsocio}', 'ArquivoController@indexAction');
$router->get('/arquivo/emissao/{iddoc}', 'ArquivoController@emissao');
$router->post('/arquivo/emissao/{iddoc}', 'ArquivoController@emissaoAction');

$router->get('/declaracao/{iddoc}', 'DeclaracaoController@index');
$router->get('/declaracao/separacao/{iddeclaracao}', 'DeclaracaoController@declaracaoSeparado');
$router->post('/declaracao/separacao/{iddeclaracao}', 'DeclaracaoController@declaracaoSeparadoAction');