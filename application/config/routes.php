<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['sales'] = 'sales/index';

$route['suppliers/update'] = 'suppliers/update';
$route['suppliers/create'] = 'suppliers/create';
$route['suppliers/(:any)'] = 'suppliers/view/$1';
$route['suppliers'] = 'suppliers/index';

$route['products/update'] = 'products/update';
// $route['products/edit'] = 'products/edit';
$route['products/create'] = 'products/create';
$route['products/(:any)'] = 'products/view/$1';
$route['products'] = 'products/index';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

/**kalo mau migrate table php index.php Migrate

$route['default_controller'] = 'index.php';

route['(:any)'] di comment dlu**/


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
