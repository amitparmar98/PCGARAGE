<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//$route['mycontrol/(:any)'] = "mycontrol/index";

/* page routes start */

$route['how-it-work'] = "page/showpage/1";
$route['repair-in-bulk'] = "page/showpagebulkrepair/2";
$route['book-a-repair'] = "page/showpage/3";
$route['wireless-setup'] = "page/showpage/4";
$route['why-pcgarage'] = "page/showpage/15";
$route['faqs'] = "page/showpage/16";
$route['about-company'] = "page/showpage/5";
$route['career'] = "page/showpage/6";
$route['our-team'] = "page/showpage/7";
$route['corporate-accounts'] = "page/showpage/8";
$route['terms-and-conditions'] = "page/showpage/17";
$route['data-recovery'] = "page/showpage/18";
$route['sell-your-device'] = "page/showpage/19";
$route['bridge-house'] = "page/showlocationpage/6";
$route['nottingham'] = "page/showlocationpage/5";
$route['ladbroke-grove'] = "page/showlocationpage/7";
$route['littlehampton'] = "page/showlocationpage/8";
$route['camden-town'] = "page/showlocationpage/9";
$route['mobile-repair'] = "repair/index/10";
$route['laptop-repair'] = "repair/index/12";
$route['pc-repair'] = "repair/index/37";
$route['tablet-repair'] = "repair/index/15";
$route['iphone-repair'] = "repair/index/10/6";


/* page routes ends */

/* End of file routes.php */
/* Location: ./application/config/routes.php */