<?php
use core\Router;

$router = new Router();

$router->get('/login', 'LoginController@login');
$router->post('/login', 'LoginController@loginAction');
$router->get('/login/recuperar/senha', 'LoginController@recuperar');
$router->post('/login/recuperar/senha', 'LoginController@recuperarAction');
$router->get('/login/recuperar/senha/confirmar', 'LoginController@senhaConfirmar');
$router->get('/sair', 'LoginController@logout');

$router->get('/', 'HomeController@index');
$router->post('/verify', 'HomeController@verifyCPF');

$router->get('/propriedade/{idsocio}', 'PropriedadeController@index');
$router->post('/propriedade/{idsocio}', 'PropriedadeController@cadastro');

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
$router->post('/lista/membros/excluir/{id}/{idmembro}', 'MembrosController@excluirMembro');
$router->get('/lista/membros/editar/{id}/{idmembro}', 'MembrosController@editarMembro');
$router->post('/lista/membros/editar/{id}/{idmembro}', 'MembrosController@editarMembroAction');

$router->get('/arquivo/{idsocio}', 'ArquivoController@index');
$router->post('/arquivo/{idsocio}', 'ArquivoController@indexAction');
$router->get('/arquivo/emissao/{iddoc}', 'ArquivoController@emissao');
$router->post('/arquivo/emissao/{iddoc}', 'ArquivoController@emissaoAction');

$router->get('/declaracao/{iddoc}', 'DeclaracaoController@index');
$router->get('/declaracao/separacao/{iddeclaracao}', 'DeclaracaoController@declaracaoSeparado');
$router->post('/declaracao/separacao/{iddeclaracao}', 'DeclaracaoController@declaracaoSeparadoAction');

$router->get('/gerenciar', 'GerenciarController@index');
$router->get('/gerenciar/user', 'GerenciarController@user');
$router->get('/gerenciar/add/user', 'GerenciarController@addUser');
$router->post('/gerenciar/add/user', 'GerenciarController@addUserAction');
$router->get('/gerenciar/user/edit/{iduser}', 'GerenciarController@editUser');
$router->post('/gerenciar/user/edit/{iduser}', 'GerenciarController@editUserAction');