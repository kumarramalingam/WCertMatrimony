<?php
/*------------------------------------------------------------------------
# com_truematrimony
# ------------------------------------------------------------------------
# author    Kumar Ramalingam - http://www.w3cert.in
# mail      kumar@w3cert.in
# copyright Copyright (C) 2012 W3cert.com All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://w3cert.in
-------------------------------------------------------------------------*/
defined('_JEXEC') or die;


class TruematrimonyViewProfiles extends FOFViewHtml {
		
		public function onDisplay()
		{
			$app = JFactory::getApplication();
					
			$view = $app->input->getCmd('view', 'profiles');
					
			// Load the model
			$items = TruematrimonyModelProfiles::getProfilerefer();

			print_r($items);
			
			return $items;
		
		}		
}
