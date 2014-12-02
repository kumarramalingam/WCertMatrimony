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

require_once(JPATH_SITE . '/components/com_truematrimony/controllers/profiles.php');

/**
 * 
 * Controller class name TrueMatrimonyControllerProfiles.
 *
 */
class TruematrimonyControllerProfiles extends FOFController
{
	/* function __construct($config) {
		parent::__construct($config);
	} */
	
	
	function __construct($config=array())
	{
		parent::__construct($config);
		$this->app = JFactory::getApplication();
		$this->db = JFactory::getDbo();
	}
	
	public function save()
	{	
		/**
		 * Get the applicaiton.
		 */
		$app = JFactory::getApplication();
		
		/**
		 * Get the data from post request.
		 */			
		$dataitem = $app->input->getArray($_POST);
		    
	    /**
	     * 
	     * @var $msg success message.
	     */
		$msg = JText::_('COM_TRUEMATRIMONY_SUCCESS');	 
		
		/**
		 * 
		 * @var $profile Get the table instance.
		 */						
		$profile = FOFTable::getInstance('Profile','TrueMatrimonyTable')->save($dataitem);
		
		/*if(!$profile->save($dataitem)) {
			$msg = JText::_('COM_TRUEMATRIMONY_FAILURE');
			$url = 'index.php?option=com_truematrimony&view=profile&layout=item&id=';
		}*/	
		
		$users = JFactory::getUser();
		
		//$data = array('block'=>0) +
		      //  array('activation'=>"");
		
		$data = array();
			
		$data['block'] = 0;
		
		$data['activation'] = "";
		
		require_once(JPATH_COMPONENT. '/models/registration.php');
			
		//echo JPATH_COMPONENT.'/models/registration.php';
		
		$model = new TrueMatrimonyModelRegistration();
		 	    
	    //print_r($model);
	    
		$activation = $model->register($data);
			
		$url = "index.php?option=com_truematrimony&view=profiles";
		
		$this->setRedirect($url);
		
		//print_r($activation);
			    
	    //$datas = array_merge($dataitem, $userids);
		
		//print_r($datas);
		
		
	}
}

