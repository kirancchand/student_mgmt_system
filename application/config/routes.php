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
$route['menu/addsem']='MenuController/addsem';
$route['menu/addclasstimetbl']='MenuController/addclasstimetbl';
$route['menu/addday']='MenuController/addday';
$route['menu/addyear']='MenuController/addyear';
$route['menu/addperiod']='MenuController/addperiod';
$route['menu/viewstudent']='MenuController/viewstudent';
$route['menu/uploadmarks']='MenuController/uploadmarks';



$route['data/addsub'] = 'DataController/addsub';
$route['data/addcourse'] = 'DataController/addcourse';
$route['data/adddept'] = 'DataController/adddept';
$route['data/addusertype'] = 'DataController/addusertype';
$route['data/assignsubject'] = 'DataController/assignsubject';
$route['data/addsem'] = 'DataController/addsem';
$route['data/assign_timetblsubject'] = 'DataController/assign_timetblsubject';
$route['data/addday']='DataController/addday';
$route['data/addyear']='DataController/addyear';
$route['data/addperiod']='DataController/addperiod';



$route['tdata/getsubjectdata'] = 'DataController/getsubjectData';
$route['tdata/getcoursedata'] = 'DataController/getcourseData';
$route['tdata/getdepartmentdata'] = 'DataController/getdepartmentData';
$route['tdata/getusertypedata'] = 'DataController/getusertypeData';
$route['tdata/getassignsubjectdata'] = 'DataController/getassignsubjectdata';
$route['tdata/getsemesterdata'] = 'DataController/getsemesterData';
$route['tdata/getdaydata'] = 'DataController/getdayData';
$route['tdata/getyeardata'] = 'DataController/getyeardata';
$route['tdata/getperioddata'] = 'DataController/getperiodData';
$route['tdata/gettimetbldata'] = 'DataController/gettimetblData';
$route['tdata/getstudentdata'] = 'DataController/getstudentDatas';

$route['mdata/getmodelsubject'] = 'DataController/getmodelsubject';
$route['mdata/subjectdelete'] = 'DataController/subjectdelete';
$route['mdata/subjectupdate'] = 'DataController/subjectupdate';

$route['mdata/getmodelcourse'] = 'DataController/getmodelcourse';
$route['mdata/coursedelete'] = 'DataController/coursedelete';
$route['mdata/courseupdate'] = 'DataController/courseupdate';

$route['mdata/getmodeldepartment'] = 'DataController/getmodeldepartment';
$route['mdata/departmentdelete'] = 'DataController/departmentdelete';
$route['mdata/departmentupdate'] = 'DataController/departmentupdate';

$route['mdata/getmodelusertype'] = 'DataController/getmodelusertype';
// $route['mdata/departmentdelete'] = 'DataController/departmentdelete';
$route['mdata/usertypeupdate'] = 'DataController/usertypeupdate';

$route['mdata/getassignsubject'] = 'DataController/getassignsubject';

$route['mdata/getmodelsemester'] = 'DataController/getmodelsemester';
$route['mdata/semesterupdate'] = 'DataController/semesterupdate';

$route['mdata/getmodelday'] = 'DataController/getmodelday';
$route['mdata/dayupdate'] = 'DataController/dayupdate';

$route['mdata/getmodelyear'] = 'DataController/getmodelyear';
$route['mdata/yearupdate'] = 'DataController/yearupdate';

$route['mdata/getmodelperiod'] = 'DataController/getmodelperiod';
$route['mdata/periodupdate'] = 'DataController/periodupdate';

$route['mdata/excelexport'] = 'DataController/excelexport';

$route['mdata/getmarklist'] = 'DataController/getmarklist';

$route['menudata/singletable'] = 'DataController/singletable';
$route['datacollection/datatablegetconnectivitydata'] = 'DataController/datatablegetconnectivitydata';

$route['menudata/multipletable'] = 'Crud';
$route['datacollection/datatablegetbusconnectivitydatatest'] = 'Crud/get_product_json';

$route['datacollection/datatablegetbusconnectivitydata'] = 'DataController/get_product_json';


$route['menudata/get_place'] = 'DataController/get_place';

$route['menu/users'] = 'DataController/users';
$route['menu/marklist'] = 'DataController/marklist';
$route['menu/exportCSV'] = 'DataController/exportCSV';
$route['menu/exportStudent'] = 'DataController/exportStudent';


$route['student/movesem']='DataController/moveSem';




