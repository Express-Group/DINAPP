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
$route['default_controller'] = 'user/home_controller';

$route['user/commonwidget/(:any)'] = "user/commonwidget/$1";

$route['404_override'] = '';

$route['(:any)/rssfeed']  = 'user/rss_controller';

$route['sitemap.xml'] 		= "user/rss_controller/sitemap";
$route['new-sitemap.xml'] 		= "user/rss_controller/new_sitemap";
$route['(:any).xml'] 		= "user/rss_controller/section_year_sitemap";
$route['(:any).ece']      = 'user/article_controller';
$route['(:any).html']     = 'user/article_controller';

$route['(:any)'] 		  = 'user/section_controller';


/* End of file routes.php */
/* Location: ./application/config/routes.php */