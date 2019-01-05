<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $route['login'] = 'user/login';

//product
$route['product/create'] = 'product/create';
$route['product/edit/(:num)'] = 'product/edit/$1';
$route['product/destroy/(:num)'] = 'product/destroy/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
