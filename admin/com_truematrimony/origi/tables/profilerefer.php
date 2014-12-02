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
 * Profiles table class.
 *
 */
class TruematrimonyTableProfilerefers extends FOFTable
{
	/**
	 * Constructor
	 *
	 * @param JDatabase A database connector object
	 */
	public function __construct($table, $key, &$db)
	{
		$table = "#__truematrimony_profilerefers";
		$key = "profilerefer_id";
		parent::__construct($table, $key, $db);
	}
}
