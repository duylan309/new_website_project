<?php
$parameter = array();

// --------- Database
$parameter['db']['debug']    = true;
$parameter['db']['host']     = 'localhost';
$parameter['db']['port']     = 3306;
$parameter['db']['username'] = 'root';
$parameter['db']['password'] = 'admin';
$parameter['db']['name']     = 'thue_today';
$parameter['db']['charset']  = 'utf8';

$parameter['db_slave']['debug']    = false;
$parameter['db_slave']['host']     = 'localhost';
$parameter['db_slave']['port']     = 3306;
$parameter['db_slave']['username'] = 'root';
$parameter['db_slave']['password'] = 'admin';
$parameter['db_slave']['name']     = 'thue_today';
$parameter['db_slave']['charset']  = 'utf8';
// Database ---------

// --------- Application
$parameter['application']['protocol']   = 'http://';
$parameter['application']['base_url'] = $parameter['application']['protocol'] . 'adminphalcon.thue.today/';
// Application ---------

// --------- Asset
$parameter['asset']['url']     = $parameter['application']['base_url'] . 'asset/';
$parameter['asset']['version'] = '20161117_11_57am';
// Asset ---------

// --------- Mailer
$parameter['mailer']['delivery'] = true;
$parameter['mailer']['ssl']      = true;
$parameter['mailer']['host']     = '';
$parameter['mailer']['port']     = '';
$parameter['mailer']['username'] = '';
$parameter['mailer']['password'] = '';
// Mailer ---------

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
$parameter['cache']['lifetime'] = 0;
$parameter['cache']['prefix']   = '_thue_admin_';


//$parameter['cache']['type']   = 'apc';
//$parameter['cache']['type'] = 'memcache';
//$parameter['cache']['type'] = 'redis';
$parameter['cache']['type'] = 'file';

$parameter['cache']['memcache']['host'] = '127.0.0.1';
$parameter['cache']['memcache']['port'] = 11211;

$parameter['cache']['redis']['host'] = '127.0.0.1';
$parameter['cache']['redis']['port'] = 6379;
$parameter['cache']['redis']['auth'] = 'redis';
// Cache ---------
