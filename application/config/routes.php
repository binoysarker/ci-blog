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
// default section
$route['default_controller'] = 'Home_Controller';
$route['about'] = 'Home_Controller/about';
$route['contact'] = 'Home_Controller/contact';
$route['posts'] = 'Home_Controller/posts';

// super admin sectioin
$route['dashboard'] = 'Super_Admin_Controller/index';
$route['logout'] = 'Super_Admin_Controller/logout';
$route['add-category'] = 'Super_Admin_Controller/add_category';
$route['edit-category/(.+)'] = 'Super_Admin_Controller/edit_category/$1';
$route['update-category'] = 'Super_Admin_Controller/update_category';
$route['delete-category/(.+)'] = 'Super_Admin_Controller/delete_category/$1';
$route['manage-category'] = 'Super_Admin_Controller/manage_category';
$route['publish-status/(.+)'] = 'Super_Admin_Controller/publish_status/$1';
$route['unpublish-status/(.+)'] = 'Super_Admin_Controller/unpublish_status/$1';
$route['add-post'] = 'Super_Admin_Controller/add_post';

$route['save-category'] = 'Super_Admin_Controller/save_category';
$route['save-post'] = 'Super_Admin_Controller/save_post';

// admin section
$route['admin'] = 'Admin_Controller/index';
$route['login-check'] = 'Admin_Controller/admin_login_check';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
