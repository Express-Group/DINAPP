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
$route['user/scroll_data/render_news'] = 'user/scroll_data/render_news';
$route['user/commonwidget/(:any)'] = "user/commonwidget/$1";
$route['user/rasipalan_controller/(:any)'] = "user/rasipalan_controller/$1";
$route['404_override'] = '';
$route['user/api/(:any)']="user/api/$1";
$route['embed/(:any)'] 		  = 'embed/$1';
$route['(:any)/rssfeed']  = 'user/rss_controller';
$route['readwhere/(:num)/sitemap.xml'] = "user/readwhere_controller";
$route['articleApi/(:any)/sitemap.xml'] = "user/readwhereApi_controller/article_by";
$route['(:any)/news/feed']  = 'user/rss_controller/uc_news';
$route['live/(:num)/news']  = 'user/readwhere_controller/livecontent';
$route['live/breaking/news']  = 'user/readwhere_controller/breaking_news';
$route['readwhere/home/news']  = 'user/readwhere_controller/home_news';
$route['news/(:any)/sitemap.xml'] = "user/rss_controller/magzterfeed";
//$route['sitemap.xml'] 		= "user/rss_controller/sitemap";
$route['home.xml'] 		        = "user/rss_controller/homefeed";
$route['tag.xml'] 		        = "user/rss_controller/tagfeed";
$route['latest.xml'] 		        = "user/rss_controller/latestfeed";
$route['astrology.xml'] 		        = "user/rss_controller/astrology";
$route['sitemap.xml'] 		= "user/rss_controller/sitemap_custom";
$route['sitemap_cloud.xml'] 		= "user/rss_controller/sitemap_cloud";
$route['new-sitemap.xml'] 		= "user/rss_controller/new_sitemap";
$route['news-sitemap.xml'] 		= "user/rss_controller/news_sitemap";
$route['latest-news.xml'] 		= "user/rss_controller/latest_sitemap";
$route['latest-feed.xml'] 		= "user/rss_controller/latest_feed";
$route['extension.xml'] 		= "user/rss_controller/extension";
$route['sitemap-index.xml'] 		= "user/rss_controller/sitemap_list";
$route['sitemap-main.xml'] 		= "user/rss_controller/sitemap_main";
$route['(:any).xml'] 		= "user/rss_controller/section_year_sitemap";
$route['(:any).ece']      = 'user/article_controller';
$route['(:any).html']     = 'user/article_controller';
$route['(:any).amp']     = 'user/ampcontroller';
$route['(:any)/(:num)/webstory.htm']     = 'user/ampstories_controller';
$route['(:any).cloud']               = 'user/cloud_controller';
$route['special-page/(:any)'] = 'user/special_controller/$1'; 
$route['(:any)'] 		  = 'user/section_controller';
$route['jallikattu'] = 'user/Quiz';
$route['jallikattu_save'] = 'user/Quiz/save';
$route['fetch_results'] = 'user/Quiz/fetch_results';
$route['jallikattu_result'] = 'user/Quiz/fetch_results';
$route['jallikattu_home'] = 'Banner';



/* End of file routes.php */
/* Location: ./application/config/routes.php */