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
class TruematrimonyModelSearch extends FOFModel {

	/**
	 * Get the search advanced profiles.
	 */ 
	public function getSearchProfiles() {				
		
		/**
		 * 
		 * @var $user Get the user.
		 */
		$user = JFactory::getUser();
		/**
		 * 
		 * @var $app Get the application.
		 */
		$app = JFactory::getApplication();
					
		$ageto = $app->input->getString('to-age');
				
	    $agefrom = $app->input->getString('from-age');
	    
	 	
		$caste = $app->input->getString('caste_id');
		
		
		$country = $app->input->getString('country_id');	
		
						    
	    $db		= JFactory::getDbo();
	    $query	= $db->getQuery(true);
	    $query->select('p.*');
	    $query->from('#__truematrimony_profiles AS p');
	    $query->where('p.truematrimony_profile_id='.$user->profile_id);
	    $db->setQuery($query);
	    $usersinfo = $db->loadAssocList();	 
          
		/**
		 * Check profile gender status.
		 *  
		 */
		if($usersinfo[0]['gender']==1) {
					
			$query->select('fe.*');
			
			$query->from('#__truematrimony_profiles AS fe');					
			
			$query->where('fe.gender=2');		    
		    
		    /*{							
				$query->where('fe.gender=2 AND fe.caste_id='.$items['caste_id'].' AND fe.age >='.$items['from-age'].' AND fe.age <='.$items['to-age'].' AND fe.country_id='.$items['country_id'].' AND fe.highesteducation_id='.$items['highesteducation_id'].
				              ' AND fe.occupation_id='.$items['occupation_id'].' AND fe.employedin_id='.$items['employedin_id'].' AND fe.complexion_id='.$items['complexion_id'].' AND fe.physicalstate_id='.$items['physicalstate_id']);
			}*/
						
			$db->setQuery($query);
			$results = $db->loadAssocList();
			
			return $results;			
												
		} else {
			
			$query->select('ma.*');
			$query->from('#__truematrimony_profiles AS ma');
			$query->where('ma.gender=1');		    
			$db->setQuery($query);
			$results = $db->loadAssocList();
			return $results;
		}	
	
	}
  
} //end of class.
