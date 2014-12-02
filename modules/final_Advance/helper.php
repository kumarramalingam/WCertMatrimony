<?php
/*------------------------------------------------------------------------
# com_truematrimony
# ------------------------------------------------------------------------
# author    Kumar Ramalingam - http://www.w3cert.in
# mail      kumar@w3cert.in
# copyright Copyright (C) 2012 W3cert.in All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://w3cert.in
-------------------------------------------------------------------------*/

// No direct access
defined('_JEXEC') or die;

require_once JPATH_SITE.'/components/com_truematrimony/controllers/profiles.php';

/**
 * Truematrimony search module - Helper class.
 */ 
class ModTrueMatrimonyAdvanceHelper {	
	
	public function getSearchProfiles() {
		
		/**
		 * 
		 * @var $user Get the user.
		 */
		$user = JFactory::getUser();
		
		/**
		 * 
		 * @var $profiles Create object.
		 */
		$profiles = new TruematrimonyControllerProfiles();
		
		/**
		 * $items Get the search profiles results.
		 */		
		$items = $profiles->getAdvanceProfiles();
			
		/**
		 * return array of items.
		 */
		return $items;
	}
	
}
