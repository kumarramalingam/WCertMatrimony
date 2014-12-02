<?php
/*------------------------------------------------------------------------
# com_truematrimony
# ------------------------------------------------------------------------
# author    Kumar Ramalingam - http://www.w3cert.in
# mail      kumar@w3cert.in
# copyright Copyright (C) 2012 w3cert.in All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://w3cert.in
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * 
 * Controller class name TrueMatrimonyControllerMembers.
 *
 */
class TruematrimonyControllerMembers extends FOFController
{
	
	/**
	 * Get the profile information,
	 */
	public function getItem() {
	
		/**
		 * 
		 * @var $app Get the application.
		 */
		$app = JFactory::getApplication();
		
		/**
		 *
		 * @var $profile Get the table instance.
		 */
		$profile = FOFTable::getInstance('Profile','TrueMatrimonyTable');
		
		print_r($profile);
		
		return $profile;
		
	}

}
