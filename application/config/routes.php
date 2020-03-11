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
$route['default_controller'] = 'IndexController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['indexroute'] = 'IndexRoutingController';
$route['indexroute/login'] = 'IndexRoutingController/login';
$route['indexroute/register'] = 'IndexRoutingController/register';


$route['login'] = 'LoginController';

$route['indexoption/login'] = 'IndexoptionController/login';
$route['indexoption/register'] = 'IndexoptionController/register';

$route['menu'] = 'MenuController';
$route['menu/addsub']='MenuController/addsub';
$route['menu/addcourse']='MenuController/addcourse';
$route['menu/adddept'] = 'MenuController/adddept';
$route['menu/addusertype'] = 'MenuController/addusertype';
$route['menu/assignsubject'] = 'MenuController/assignsubject';

$route['data/addsub'] = 'DataController/addsub';
$route['data/addcourse'] = 'DataController/addcourse';
$route['data/adddept'] = 'DataController/adddept';
$route['data/addusertype'] = 'DataController/addusertype';
$route['data/assignsubject'] = 'DataController/assignsubject';

$route['tdata/getsubjectdata'] = 'DataController/getsubjectData';

$route['mdata/getmodelsubject'] = 'DataController/getmodelsubject';
$route['mdata/subjectdelete'] = 'DataController/subjectdelete';
$route['mdata/subjectupdate'] = 'DataController/subjectupdate';

$route['menudata/singletable'] = 'DataController/singletable';
$route['datacollection/datatablegetconnectivitydata'] = 'DataController/datatablegetconnectivitydata';

$route['menudata/multipletable'] = 'Crud';
$route['datacollection/datatablegetbusconnectivitydatatest'] = 'Crud/get_product_json';

$route['datacollection/datatablegetbusconnectivitydata'] = 'DataController/get_product_json';


$route['menudata/get_place'] = 'DataController/get_place';








