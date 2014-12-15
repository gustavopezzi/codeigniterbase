<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

define('LOGGED', 'logged');

define('CMSPANELFOLDER', 'cmspanel/');

define('UPLOAD_PATH', BASEPATH.'../files/');

define('BANNERS_PATH', 'files/banners/');
define('BANNERS_UPLOAD_PATH', str_replace('/system/', '', BASEPATH).'/'.BANNERS_PATH);

define('PRODUCTS_PATH', 'files/products/');
define('PRODUCTS_UPLOAD_PATH', str_replace('/system/', '', BASEPATH).'/'.PRODUCTS_PATH);

define('ASSETS', 'assets/');
define('ASSETS_CMSPANEL', 'assets/cmspanel/');
define('JS_CMSPANEL', ASSETS_CMSPANEL.'js/');
define('JS', ASSETS.'js/');
define('IMG', 'images/');

define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb');  // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');