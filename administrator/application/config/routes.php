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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'auth/index';
$route['checklogin'] = 'auth/checklogin';
$route['logout'] = 'auth/logout';

//designer
$route['designer'] = 'designer/index';
$route['designer/add'] = 'designer/adddesigner';
$route['designer/save'] = 'designer/savedesigner';
$route['designer/edit/(:any)'] = 'designer/editdesigner/$1';
$route['designer/update'] = 'designer/updatedesigner';
$route['designer/delete/(:any)'] = 'designer/deletedesigner/$1';

//category
$route['category'] = 'category/index';
$route['category/add'] = 'category/addcategory';
$route['category/save'] = 'category/savecategory';
$route['category/edit/(:any)'] = 'category/editcategory/$1';
$route['category/update'] = 'category/updatecategory';
$route['category/delete/(:any)'] = 'category/deletecategory/$1';

//product
$route['product'] = 'product/index';
$route['product/add'] = 'product/addproduct';
$route['product/save'] = 'product/saveproduct';
$route['product/edit/(:any)'] = 'product/editproduct/$1';
$route['product/update'] = 'product/updateproduct';
$route['product/delete/(:any)'] = 'product/deleteproduct/$1';

//subscribers
$route['subscribers'] = 'subscribers/index';
$route['subscribers/delete/(:any)'] = 'subscribers/deletesubscriber/$1';

//transaction
$route['transaction'] = 'transaction/index';
$route['transaction/add'] = 'transaction/addtransaction';
$route['transaction/save'] = 'transaction/savetransaction';
$route['transaction/detail/(:any)'] = 'transaction/detailtransaction/$1';
$route['transaction/update'] = 'transaction/updatetransaction';

//message
$route['message'] = 'message/index';
$route['message/delete/(:any)'] = 'message/deletemessage/$1';

//admin
$route['admin'] = 'admin/index';
$route['admin/add'] = 'admin/addadmin';
$route['admin/save'] = 'admin/saveadmin';
$route['admin/delete/(:any)'] = 'admin/deleteadmin/$1';

//profile
$route['profile'] = 'auth/profile';
$route['profile/update'] = 'auth/updateprofile';
$route['profile/changepassword'] = 'auth/changepassword';
$route['profile/updatepassword'] = 'auth/updatepassword';
?>