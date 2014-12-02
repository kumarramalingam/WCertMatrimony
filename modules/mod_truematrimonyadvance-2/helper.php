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

/**
 * Truematrimony search module - Helper class.
 */ 
class ModTrueMatrimonyAdvanceHelper {
	
	/**
	 * Get search members method.
	 */
	public function getMembers() {
	
		/**
		 * 
		 * @var $app Get the application.
		 */
		$app = JFactory::getApplication();
		
		/**
		 * @var $items Get the items from post request.
		 */
		$items = $app->input->getArray($_POST);
		
		$user = JFactory::getUser();
				
		if($user->id) {
		
		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);
		$query->select('p.*');
		$query->from('#__truematrimony_profiles AS p');
		$query->where('p.truematrimony_profile_id='.$user->profile_id);
		$db->setQuery($query);
		$results = $db->loadAssocList();
		
		/**
		 * Check profile gender status.
		 */
		if($results[0]['gender']==1) {
			$query->select('fe.*');
			$query->from('#__truematrimony_profiles AS fe');
			$query->where('fe.gender=2');
		} else {
			$query->select('ma.*');
			$query->from('#__truematrimony_profiles AS ma');
			$query->where('ma.gender=1');
		}
		
		$db->setQuery($query);
		
		$results = $db->loadAssocList();
		
		return $results;
	   }
	}
}
