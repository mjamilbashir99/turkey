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



$route['default_controller'] = "en/show";
$route['404_override'] 		 = "en/show/show404";


$route['(:any)/admin/users'] = "(:any)/admin/users";
$route['(:any)/users'] = "(:any)/show/members";


$route['(:any)/list-business'] 		= "(:any)/user/new_ad";
$route['(:any)/choose-package'] = "(:any)/user/payment/choosepackage";
$route['(:any)/create-ad'] 		= "(:any)/user/create_ad";
$route['(:any)/edit-business/(:any)'] = "(:any)/user/editpost/$2/$3";
$route['(:any)/update-ad'] 		= "(:any)/user/updatepost";
////////////////////
$route['(:any)/update-app'] 		= "(:any)/user/updateapp";
$route['(:any)/delete-app'] 		= "(:any)/user/deleteapp";
$route['(:any)/custom-ajax'] 		= "(:any)/user/customajax";

$route['(:any)/update-magazine'] 		= "(:any)/user/updatemagazine";
$route['(:any)/delete-magazine'] 		= "(:any)/user/deletemagazine";
$route['(:any)/custom-ajax_m'] 		= "(:any)/user/customajaxmagazine";
/////////////////////////

$route['(:any)/admin/business/locations']  = "(:any)/admin/business/locations";
$route['(:any)/locations'] 		= "(:any)/show/location";
$route['(:any)/location-posts/(:any)'] = "(:any)/show/location_posts/$2/$3";
$route['(:any)/profile/(:any)'] = "(:any)/show/memberposts/$2/$3";

$route['(:any)/blog-posts'] = "(:any)/show/post/blog";
$route['(:any)/news-posts'] = "(:any)/show/post/news";
$route['(:any)/article-posts'] = "(:any)/show/post/article";
$route['(:any)/post-detail/(:any)'] = "(:any)/show/postdetail/$2/$3";


$route['(:any)/admin/page/(:any)'] = "(:any)/admin/page/$2";
$route['(:any)/page/(:any)'] = "(:any)/show/page/$2";

$route['(:any)/contact'] = "(:any)/show/contact";
$route['(:any)/sendcontactemail'] = "(:any)/show/sendcontactemail";

$route['(:any)/advancesearch'] = "(:any)/show/search";
$route['(:any)/results'] = "(:any)/show/result";
$route['(:any)/results/(:any)'] = "(:any)/show/result/$2";


$route['(:any)/tags/(:any)'] = "(:any)/show/tag/$2";



$route['(:any)/ads/(:any)'] = "(:any)/show/detail/$2";

$route['(:any)/embed/(:any)'] = "(:any)/show/embed/$2";



$route['(:any)/meme/(:any)'] = "(:any)/show/detail";

$route['(:any)/video/(:any)'] = "(:any)/tv/v";
// Edit by TMG
$route['(:any)/videos'] 		= "(:any)/videos";
$route['(:any)/videos-posts/(:any)'] = "(:any)/videos_posts/$2/$3";

$route['(:any)/emagazine'] 		= "(:any)/show/emagazine";
$route['(:any)/emagazine_details/(:any)'] = "(:any)/show/emagazine_details/$2";

$route['(:any)/apps'] 		= "(:any)/show/apps";
$route['(:any)/apps_details/(:any)'] = "(:any)/show/apps_details/$2";

$route['(:any)/videos'] 		= "(:any)/show/videos";
$route['(:any)/videos_details/(:any)'] = "(:any)/show/videos_details/$2";

/* End of file routes.php */

/* Location: ./application/config/routes.php */