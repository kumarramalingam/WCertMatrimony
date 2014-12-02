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
 * Controller class name TrueMatrimonyControllerProfiles.
 *
 */
class TruematrimonyControllerAddinfos extends FOFController
{
	/* function __construct($config) {
		parent::__construct($config);
	} */
	public function save() {	
		
		$app = JFactory::getApplication();
			
		$data= $app->input->getArray($_POST);
	    
		//print_r($data);
						
		$profile = FOFTable::getInstance('Addinfo','TrueMatrimonyTable');
				
		if(!$profile->save($data)){
			$msg = JText::_('COM_TRUEMATRIMONY_FAILURE');
			$url = 'index.php?option=com_truematrimony&view=addinfo&id=';		
		} else {
			$msg = JText::_('COM_TRUEMATRIMONY_SUCCESS');
			//$url = 'index.php?option=com_truematrimony&view=profile&layout=item_info&id='.$profile->truematrimony_profile_id;
    		$url = 'index.php?option=com_truematrimony&view=addinfo&id='.$profile->truematrimony_profile_id;
		}
		
		$app->redirect($url,$msg,'success');   
	    
	}
}	
	

