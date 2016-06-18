<?php
/**
* Author: Sven Rhinow
* License: LGPL
*/

/**
* Modul-Parameter
*/
// $GLOBALS['GETKEYTRACKER']['allow_getkeys'] = array('qr');
$GLOBALS['GETKEYTRACKER']['filepath'] = 'system/modules/getkeyTracker/files/';
$GLOBALS['GETKEYTRACKER']['fileentity'] = '.txt';

/**
* Frontend-Module
*/
$GLOBALS['FE_MOD']['getkey_tracker'] = array(
	'getkey_tracker' => 'ModuleGetkeyTracker'
);
