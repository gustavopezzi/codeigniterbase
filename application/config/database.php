<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

switch (ENVIRONMENT) {
	case 'development':
    	$active_group = 'development';
		break;
	case 'testing':
	case 'production':
		$active_group = 'production';
		break;
	default:
		exit('The application environment is not set correctly.');
}

$active_record = TRUE;

// development
$db['development']['hostname'] = 'localhost';
$db['development']['username'] = 'root';
$db['development']['password'] = '';
$db['development']['database'] = 'baseproject';
$db['development']['dbdriver'] = 'mysql';
$db['development']['dbprefix'] = '';
$db['development']['pconnect'] = TRUE;
$db['development']['db_debug'] = TRUE;
$db['development']['cache_on'] = FALSE;
$db['development']['cachedir'] = '';
$db['development']['char_set'] = 'utf8';
$db['development']['dbcollat'] = 'utf8_general_ci';
$db['development']['swap_pre'] = '';
$db['development']['autoinit'] = TRUE;
$db['development']['stricton'] = FALSE;

// testing/production
$db['production']['hostname'] = 'mysql01.baseproject.com';
$db['production']['username'] = 'username';
$db['production']['password'] = 'password';
$db['production']['database'] = 'baseproject';
$db['production']['dbdriver'] = 'mysql';
$db['production']['dbprefix'] = '';
$db['production']['pconnect'] = FALSE;
$db['production']['db_debug'] = TRUE;
$db['production']['cache_on'] = FALSE;
$db['production']['cachedir'] = '';
$db['production']['char_set'] = 'utf8';
$db['production']['dbcollat'] = 'utf8_general_ci';
$db['production']['swap_pre'] = '';
$db['production']['autoinit'] = TRUE;
$db['production']['stricton'] = FALSE;