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

class TruematrimonyModelProfiles extends FOFModel {
	
	public function Uploadpic() {
		
		/**
		 * Get the applicaiton.
		 */
		$app = JFactory::getApplication();
		
		/**
		 * Get the data from post request.
		 */			
		$data= $app->input->getArray($_POST);
		
		//print_r($data);
			
		print_r($_FILES['files']['tmp_name']);	
	
	}
	
		
}
