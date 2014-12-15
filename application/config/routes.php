<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "home";
$route['404_override'] = '';
// site
$route[''] = "home/index/$1";
$route['home/language/'] = "home/language/";
$route['home/language/(:num)'] = "home/language/$1";
$route['home/language/(:any)'] = "home/language/$1/$2/$3";
// manager
$route['cmspanel'] = "cmspanel/login";
$route['cmspanel/login/(:any)'] = "cmspanel/login/$1/$2/$3";
$route['cmspanel/empresa/items'] = "cmspanel/empresa_items/index";
$route['cmspanel/empresa/items/(:num)'] = "cmspanel/empresa_items/index/$1";
$route['cmspanel/empresa/items/(:any)'] = "cmspanel/empresa_items/$1/$2/$3";
$route['cmspanel/atuacao/images'] = "cmspanel/atuacao_images/index";
$route['cmspanel/atuacao/images/(:num)'] = "cmspanel/atuacao_images/index/$1";
$route['cmspanel/atuacao/images/(:any)'] = "cmspanel/atuacao_images/$1/$2/$3";
$route['cmspanel/servicos/images'] = "cmspanel/servicos_images/index";
$route['cmspanel/servicos/images/(:num)'] = "cmspanel/servicos_images/index/$1";
$route['cmspanel/servicos/images/(:any)'] = "cmspanel/servicos_images/$1/$2/$3";
$route['cmspanel/servicos/items'] = "cmspanel/servicos_items/index";
$route['cmspanel/servicos/items/(:num)'] = "cmspanel/servicos_items/index/$1";
$route['cmspanel/servicos/items/(:any)'] = "cmspanel/servicos_items/$1/$2/$3";