<?php

/**
 * This file modifies the data container array of table tl_module.
 *
 * @copyright  Sven Rhinow 2010-2015
 * @author     Sven Rhinow <sven@sr-tag.de>
 * @package    getkey-tracker
 * @filesource
 */

$GLOBALS['TL_DCA']['tl_module']['palettes']['getkey_tracker']  = 'name,type,getkey';



array_insert($GLOBALS['TL_DCA']['tl_module']['fields'] , 2, array
(
	'getkey' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['getkey'],
		'exclude'                 => true,
		'default'                 => '',
		'inputType'               => 'text',
		'eval'                    => array('nospace'=>true, 'mandatory'=>true),
		'sql'					=> "varchar(255) NOT NULL default ''"
	)
));


/**
 * Class tl_getkeytracker_module
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Leo Feyer 2008-2009
 * @author     Leo Feyer <leo@typolight.org>
 * @package    Controller
 */
class tl_getkeytracker_module extends Backend
{


}

?>
