<?php
/*------------------------------------------------------------------------
# com_truematrimony
# ------------------------------------------------------------------------
# author    Kumar Ramalingam - http://www.w3cert.in
# mail      kumar@w3cert.in
# copyright Copyright (C) 2012 W3Cert.in All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://w3cert.in
-------------------------------------------------------------------------*/

//require_once JPATH_ADMINISTRATOR.'/components/com_truematrimony/controllers/members.php';
require_once(JPATH_COMPONENT. '/models/member.php');
class TruematrimonyViewMember extends FOFViewHtml {
		
	/**
	 * Display the profile information.
	 */
	function onDisplay(){
	
		/**
		 * 
		 * @var $app Get the application.
		 */
		$app = JFactory::getApplication();
		  
		$model = new TruematrimonyModelMember();
		$items = $model->getItem();
		print_r($items);
		return $items;
		
		//$items = FOFTable::getInstance('Profile','TrueMatrimonyTable');
		
		//print_r($items);		
		
	}
	
		/*
		 * function display($tpl = null){
			$app = JFactory::getApplication();
			$task = $app->input->getString('task');
		    echo $task;  	
			parent::display($tpl);
		}*/

}
