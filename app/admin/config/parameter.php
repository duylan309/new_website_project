<?php
$parameter = array();

// --------- Database
$parameter['db']['debug']    = false;
$parameter['db']['host']     = 'localhost';
$parameter['db']['port']     = 3306;
$parameter['db']['username'] = 'root';
$parameter['db']['password'] = 'root';
$parameter['db']['name']     = 'thue_today';
$parameter['db']['charset']  = 'utf8';

$parameter['db_slave']['debug']    = false;
$parameter['db_slave']['host']     = 'localhost';
$parameter['db_slave']['port']     = 3306;
$parameter['db_slave']['username'] = 'root';
$parameter['db_slave']['password'] = 'root';
$parameter['db_slave']['name']     = 'thue_today';
$parameter['db_slave']['charset']  = 'utf8';
// Database ---------

// --------- Application
$parameter['application']['protocol']         = 'http://';
$parameter['application']['base_url']         = $parameter['application']['protocol'] . 'localhost.admin.thue:81/';
$parameter['application']['asset']['version'] = '20161115_4_22pm';
// Application ---------

// --------- Facebook
$parameter['facebook']['app_id']     = '';
$parameter['facebook']['app_secret'] = '';
$parameter['facebook']['permission'] = array('public_profile');
// Facebook ---------

// --------- Volt
$parameter['volt']['separator'] = '%';
$parameter['volt']['debug']     = true;
$parameter['volt']['stat']      = true;
// Volt ---------

// --------- Cache
$parameter['cache']['lifetime'] = 900;
$parameter['cache']['prefix']   = '_thue_admin_';

$parameter['cache']['type']   = 'apc';
//$parameter['cache']['type'] = 'memcache';
//$parameter['cache']['type'] = 'redis';

$parameter['cache']['memcache']['host'] = '127.0.0.1';
$parameter['cache']['memcache']['port'] = 11211;

$parameter['cache']['redis']['host'] = '127.0.0.1';
$parameter['cache']['redis']['port'] = 6379;
$parameter['cache']['redis']['auth'] = 'redis';
// Cache ---------
