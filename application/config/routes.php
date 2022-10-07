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
$route['default_controller']                      = 'CoInicio';
$route['/']                                       = 'CoInicio';
$route['inicio']                                  = 'CoInicio';
$route['ingreso']                                 = 'CoInicio/ingreso';
$route['sesion']                                  = 'CoSeguridad/sesion';
$route['panel']                                   = 'CoPanel';

$route['personas']                                = "CoPersonas";
$route['personas-registro']                       = "CoPersonas/registro";
$route['personas-add']                            = "CoPersonas/save";
$route['personas-edit/(:any)']                    = 'CoPersonas/edit/$1';
$route['personas/active/(:any)']                  = 'CoPersonas/active/$1';
$route['personas/inactive/(:any)']                = 'CoPersonas/inactive/$1';
$route['personas/del/(:any)']                     = 'CoPersonas/del/$1';
$route['personas/repassword/(:any)']              = 'CoPersonas/repassword/$1';

$route['documentos']                              = 'CoDocumentos';
$route['documentos/add']                          = "CoDocumentos/save";
$route['documentos/permisar']                     = "CoDocumentos/permisar";
$route['documentos/edit/(:any)']                  = 'CoDocumentos/edit/$1';
$route['documentos/del/(:any)']                   = 'CoDocumentos/del/$1';

$route['documentos-permisos']                     = 'CoDocumentos/permisos';
$route['documentos-permisos/del/(:any)']          = 'CoDocumentos/del_documento_permiso/$1';

$route['misdocumentos']                           = 'CoDocumentos/misdocumentos';


$route['salir']                                   = 'CoInicio/salir';
$route['change-password']                         = 'CoSeguridad/changepassword';
$route['404_override']                            = '';
$route['translate_uri_dashes']                    = FALSE;
