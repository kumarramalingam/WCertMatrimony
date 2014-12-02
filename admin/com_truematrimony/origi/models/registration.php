<?php
/*------------------------------------------------------------------------
 # com_truematrimony
 # ------------------------------------------------------------------------
 # author    Kumar Ramalingam - http://www.w3cert.in
 # mail      kumar@w3cert.in
 # copyright Copyright (C) 2012 w3cert.in All Rights Reserved.
 # @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 # Websites: http://w3cert.in
 ------------------------------------------------------------------------*/
    	
require_once(JPATH_SITE . '/components/com_users/models/registration.php');
    	
/**
 * 
 * Registration model into users table..
 *
 */
class TrueMatrimonyModelRegistration extends UsersModelRegistration
 	{
    	
  		public function register($temp)
  		{
  			
  		$config = JFactory::getConfig();
        $db = $this->getDbo();
        $params = JComponentHelper::getParams('com_users');

        // Initialise the table with JUser.
        $user = new JUser;
        $data = (array) $this->getData();
        
        // print_r($user['profile_id']);
       
                     
        // Merge in the registration data.
        foreach ($temp as $k => $v) {
            $data[$k] = $v;
        }

        // Prepare the data for the user object.
        $data['email'] = $data['email1'];
        $data['password'] = $data['password1'];
        $data['block'] = $data['block'];
        $data['activation'] = $data['activation'];
        //$useractivation = $params->get('useractivation');
        //$sendpassword = $params->get('sendpassword', 1);

        // Check if the user needs to activate their account.
        /*if (($useractivation == 1) || ($useractivation == 2)) {
            $data['activation'] = JApplication::getHash(JUserHelper::genRandomPassword());
            $data['block'] = 1;
        }*/
        
      
       /* $db		= JFactory::getDbo();
	    $query	= $db->getQuery(true);
	    $query->select('u.*');
	    $query->from('#__users AS u');
	    $query->where('u.profile_id='.$data['profile_id']);
	    $db->setQuery($query);
	    $usersinfo = $db->loadAssocList();
	     */       
                
			// Bind the data.
			if (!$user->bind($data)) {
				$this->setError(JText::sprintf('COM_USERS_REGISTRATION_BIND_FAILED', $user->getError()));
				return false;
			}      

			// Load the users plugin group.
			JPluginHelper::importPlugin('user');

			// Store the data.
			if (!$user->save()) {
				$this->setError(JText::sprintf('COM_USERS_REGISTRATION_SAVE_FAILED', $user->getError()));
				return false;
			}
                	    
    	}
    }    
    
