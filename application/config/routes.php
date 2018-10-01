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
| When you manage this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/



// ADMIN
$route['manage/auth'] = 'auth/auth_manage/login';
$route['manage/([a-zA-Z_-]+)'] = '$1/$1_manage';
$route['manage/auth/(:any)'] = 'auth/auth_manage/$1';
$route['manage/([a-zA-Z_-]+)/(:any)'] = '$1/$1_manage/$2';
$route['manage/(:any)/edit/(:num)'] = "$1/$1_manage/add/$2";
$route['manage/(:any)/(:any)/edit/(:num)'] = "$1/$1_manage/add_$2/$3";
$route['manage/(:any)/(:any)/(:num)/(:num)'] = "$1/$1_manage/$2/$3/$4";
$route['manage/(:any)/(:any)/(:num)/(:num)/(:num)'] = "$1/$1_manage/$2/$3/$4/$5";
$route['manage/(:any)/(:any)/(:num)/(:num)/(:num)/(:num)'] = "$1/$1_manage/$2/$3/$4/$5/$6";
$route['manage/(:any)/(:any)/(:num)'] = "$1/$1_manage/$2/$3";
$route['manage/(:any)/(:any)/(:any)'] = "$1/$1_manage/$3_$2";
$route['manage'] = "dashboard/Dashboard_manage";

// FRONTEND

$route['(:any)'] = "$1";
$route['(:any)/detail/(:num)'] = "$1/detail/$2";
$route['(:any)/detail/(:num)/(:any)'] = "$1/detail/$2";
$route['(:any)/(:any)/(:num)/(:any)'] = "$2/detail/$3";

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
