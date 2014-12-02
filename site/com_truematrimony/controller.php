<?php
/*------------------------------------------------------------------------
# com_truematrimony
# ------------------------------------------------------------------------
# author    Kumar Ramalingam - http://www.w3cert.in
# mail      kumar@w3cert.in
# copyright Copyright (C) 2012 w3cert.com All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://w3cert.in
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 
class TruematrimonyController extends JControllerLegacy
{		
        /**
         * display task
         *
         * @return void
         */
        function display($cachable = false,$urlparams=false) 
        {
                // set default view if not set                
                //$app = JFactory::getApplication();
                //$app->input->set('view', JRequest::getCmd('view', 'profiles'));
 
                // call parent behavior
                parent::display($cachable);
                
        }
}

