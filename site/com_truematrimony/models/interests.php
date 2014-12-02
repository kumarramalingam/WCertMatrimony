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
class TruematrimonyModelInterests extends FOFModel {
	
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
		
		
		//$this->record = FOFTable::getAnInstance('Interest','TrueMatrimonyTable');
				
		//print_r($this->record);
		//exit;
		
		/**
		 * 
		 * @var $query.
		 * 
		 * Get the getQuery() method.
		 */
		$query=$db->getQuery(true);
		
		$user = JFactory::getUser();	
			
		/**
		 * query statement.
		 */
		$query->select("*")->from("#__truematrimony_interests");
		
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
	
	/**
	 * Get all the interests informations.
	 */ 
	public function getInterests() {				
				
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
		$query->select("*")->from("#__truematrimony_interests")
		->where('profile_id='.$user->profile_id);
		
		/**
		 * Set the query statement.
		 */
		$db->setQuery($query);
		
		/**
		 * 
		 * @var $result Get the data.
		 */
		$results=$db->loadAssocList();
		
		return $results;
	}
	
	}	
		
	public function getProfileInterests() {
		
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
		 * 
		 * @var $query.
		 * 
		 * Get the getQuery() method.
		 */
		$proquery=$db->getQuery(true);	
						
		$proquery->select("distinct p.truematrimony_profile_id, p.profile_name, p.profile_img, p.dob, p.age")->from("#__truematrimony_profiles as p");
		$proquery->rightJoin("#__truematrimony_interests as i ON i.interest_to_profile_id = p.truematrimony_profile_id AND i.profile_id");
		$proquery->where('i.profile_id='.$user->profile_id);
		
		/*
		$proquery->select("distinct p.truematrimony_profile_id, p.profile_name, p.profile_img, p.dob, p.age")->from("#__truematrimony_profiles as p");
		$proquery->rightJoin("#__truematrimony_interests as i ON i.truematrimony_interest_id = p.truematrimony_profile_id AND i.profile_id");
		$proquery->where('i.profile_id='.$user->profile_id);
		*/
		
		$db->setQuery($proquery);
		$results =  $db->loadAssocList();
									
		return $results;
				
	   }
	}		
	
}
