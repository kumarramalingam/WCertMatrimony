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

defined('_JEXEC') or die;

/**
 * 
 * Profiles class.
 * 
 * Get profile information for matrimony.
 *
 */
class TruematrimonyModelMember extends FOFModel {
	
	/**
	 * Get the profile information.
	 * 
	 */
	public function getItem() {
		
		/**
		 * 
		 * @var $db Get the database object.
		 */
		$db=JFactory::getDbo();
		
		/**
		 * 
		 * @var $query.
		 * 
		 * Get the getQuery() method.
		 */
		$query=$db->getQuery(true);
		
		$user = JFactory::getUser();	
		
		if($user->id) {  
		
		/**
		 * query statement.
		 */
		$query->select("*")->from("#__truematrimony_profiles")
		->where('truematrimony_profile_id='.$user->profile_id);
		
		/**
		 * Set the query statement.
		 */
		$db->setQuery($query);
		
		/**
		 * 
		 * @var $result Get the data.
		 */
		$result=$db->loadObjectList();
						
	
		/**
		 * return the result.
		 */
	    return $result;
	   }
	}	
}

