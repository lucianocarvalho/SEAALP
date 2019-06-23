<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['migrate'] = 'migrate/index';

$route['cadastrar'] = 'usuarios/cadastrar';

$route['login'] = 'login/index';
$route['login/auth'] = 'login/auth';
$route['logout'] = 'login/logout';

$route['admin/conteudos'] = 'conteudos/index';
$route['admin/conteudos/cadastrar'] = 'conteudos/cadastrar';
$route['admin/conteudos/visualizar/(:num)'] = 'conteudos/visualizar/$1';
$route['admin/conteudos/editar/(:num)'] = 'conteudos/editar/$1';
$route['admin/conteudos/remover/(:num)'] = 'conteudos/remover/$1';

$route['admin/exercicios'] = 'exercicios/index';
$route['admin/exercicios/cadastrar'] = 'exercicios/cadastrar';
$route['admin/exercicios/visualizar/(:num)'] = 'exercicios/visualizar/$1';
$route['admin/exercicios/editar/(:num)'] = 'exercicios/editar/$1';
$route['admin/exercicios/remover/(:num)'] = 'exercicios/remover/$1';
$route['admin/exercicios/redigir/(:num)'] = 'exercicios/redigir/$1';

$route['admin/exemplos/(:num)'] = 'exemplos/index/$1';
$route['admin/exemplos/cadastrar/(:num)'] = 'exemplos/cadastrar/$1';
$route['admin/exemplos/editar/(:num)'] = 'exemplos/editar/$1';
$route['admin/exemplos/remover/(:num)'] = 'exemplos/remover/$1';
$route['admin/exemplos/visualizar/(:num)'] = 'exemplos/visualizar/$1';

$route['painel/conteudos'] = 'dashboard/conteudos';
$route['painel/conteudos/visualizar/(:any)'] = 'conteudos/visualizar_aluno/$1';

$route['painel/anotacoes'] = 'anotacoes/index';
$route['painel/anotacoes/cadastrar/(:any)'] = 'anotacoes/cadastrar/$1';
$route['painel/anotacoes/remover/(:any)'] = 'anotacoes/remover/$1';
$route['painel/anotacoes/editar/(:any)'] = 'anotacoes/editar/$1';

$route['painel/exercicios'] = 'exercicios/listar_aluno';
$route['painel/exercicios/realizar/(:num)'] = 'exercicios/realizar/$1';

$route['painel/exercicios/corrigir'] = 'exercicios/corrigir';



$route['master/professores'] = 'professores/index';
$route['master/professores/cadastrar'] = 'professores/cadastrar';
$route['master/professores/remover/(:any)'] = 'professores/remover/$1';
$route['master/professores/visualizar/(:any)'] = 'professores/visualizar/$1';
$route['master/professores/editar/(:any)'] = 'professores/editar/$1';

$route['master/alunos'] = 'alunos/index';
$route['master/alunos/cadastrar'] = 'alunos/cadastrar';
$route['master/alunos/remover/(:any)'] = 'alunos/remover/$1';
$route['master/alunos/visualizar/(:any)'] = 'alunos/visualizar/$1';
$route['master/alunos/editar/(:any)'] = 'alunos/editar/$1';

$route['master/masters'] = 'masters/index';
$route['master/masters/cadastrar'] = 'masters/cadastrar';
$route['master/masters/remover/(:any)'] = 'masters/remover/$1';
$route['master/masters/visualizar/(:any)'] = 'masters/visualizar/$1';
$route['master/masters/editar/(:any)'] = 'masters/editar/$1';