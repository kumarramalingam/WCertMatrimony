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

require_once(JPATH_SITE . '/components/com_users/models/registration.php');

class TrueMatrimonyModelRegistration extends UsersModelRegistration
{
    
    public function register($temp)
    {
        $config = JFactory::getConfig();
        $db = $this->getDbo();
        $params = JComponentHelper::getParams('com_users');
        
        $app = JFactory::getApplication();
               
        $datas = $app->input->getArray($_POST);
        
        //print_r($datas);
        
        print_r($datas);
               
        $user = new JUser;
        
        //print_r($user);
        //exit;
             
        // Bind the data.
        if (!$user->bind($temp)) {
            $this->setError(JText::sprintf('COM_USERS_REGISTRATION_BIND_FAILED', $user->getError()));
            return false;
        }

        // Load the users plugin group.
        JPluginHelper::importPlugin('user');

        // Store the data.
        if (!$user->save($temp)) {
            $this->setError(JText::sprintf('COM_USERS_REGISTRATION_SAVE_FAILED', $user->getError()));
            return false;
        }
     
       
    }

}
