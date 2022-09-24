<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// ADMIN SECTION ROUTES ++++++++++++++++++
$route['admin'] = 'admin';
// Home Slider Section 
$route['homeSlider'] = 'admin/home_slider';
$route['viewAddSlider'] = 'admin/viewAddSlider';
$route['addSlider'] = 'admin/add_slider';
$route['editSlider/(.+)'] = 'admin/edit_slider/$1';
$route['updateSlider'] = 'admin/update_slider';

// Channels Section 
$route['channels'] = 'admin/channels';
$route['viewAddChannel'] = 'admin/view_add_channel';
$route['addChannel'] = 'admin/add_channel';
$route['editChannel/(.+)'] = 'admin/edit_channel/$1';

// Cricke Section Start ================
$route['cricket'] = 'admin/cricket';
$route['login'] = 'admin/login';
$route['loginprocess'] = 'admin/loginprocess';

