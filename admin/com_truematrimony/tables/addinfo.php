<?php
/*------------------------------------------------------------------------
# com_truematrimony
# ------------------------------------------------------------------------
# author    Kumar Ramalingam - http://www.w3cert.in
# mail      kumar@w3cert.in
# copyright Copyright (C) 2012 Citruscart.com All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://w3cert.in
-------------------------------------------------------------------------*/

// No direct access
defined('_JEXEC') or die;

/**
 * 
 * TrueMatrimonyTableProfile table class name.
 *
 */
class TrueMatrimonyTableAddinfo extends FOFTable
{
	public function __construct($table, $key, &$db)
	{
		$table = "#__truematrimony_addinfos";
		$key = "truematrimony_addinfo_id";
		parent::__construct($table, $key, $db);
	}
}
