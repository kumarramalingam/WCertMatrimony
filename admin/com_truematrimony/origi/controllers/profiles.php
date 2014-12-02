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
		$profile = FOFTable::getInstance('Profile','TrueMatrimonyTable');
		
		$users = JFactory::getUser();
		
		//print_r($users);
		//exit;
		
		//$userids = array('user_id'=> $users->id);
		 
		//$datas = array_merge($dataitem, $userids);
		
		$datas = $dataitem;
		
		//print_r($datas);
		//exit;
		 
		/*$query = 'SELECT COUNT(*) FROM #__truematrimony_profiles WHERE email = ' . $this->db->quote($datas['email']);
		
		$this->db->setQuery($query);
		if ($this->db->loadResult() > 0) {
			$msg = JText::_("COM_TRUEMATRIMONY_EMAIL_EXIST");
			$url = 'index.php?option=com_truematrimony&view=profile&layout=item';
			$this->setRedirect($url,$msg,'warning');
		} else { */		
			/**
			 * if, data not save means,
			 */
				
			jimport('joomla.filter.filterinput');
		
			$filter = JFilterInput::getInstance();
		
			$email = $filter->clean($app->input->getString('email'));
		
			// Check that e-mail is not already taken
			$query = 'SELECT COUNT(*) FROM #__users WHERE profile_id = ' .$datas['truematrimony_profile_id'];
			$this->db->setQuery($query);
            //$userresult = $this->db->load();
            					
			$url = 'index.php?option=com_truematrimony&view=profile&r&id='.$datas['truematrimony_profile_id'];
					
    		if ($this->db->loadResult() == 0) {
    			
    			$query = 'SELECT COUNT(*) FROM #__users WHERE email = ' . $this->db->quote($email);
		        $this->db->setQuery($query);
    			
    			if($this->db->loadResult()>0){
    			 
				$message = "COM_SIMPLEREGISTRATION_EMAIL_EXIST";
				$type = "error";
				$this->setRedirect($url, $message, $type);
				return false;
    			}
			}
		
			jimport('joomla.application.component.helper');
			$params = JComponentHelper::getParams('com_truematrimony');
		
			jimport('joomla.mail.helper');
			jimport('joomla.user.helper');
		
			$lang = JFactory::getLanguage();
			$lang->load('com_user');
			$lang->load('com_users');
		
			if (!JMailHelper::isEmailAddress($email)) {
				JError::raiseWarning('', JText::_('TRUEMATRIMONY_EMAIL_NOT_VALID'));
				return false;
			}
		
			$user = JFactory::getUser(0);
		
			$usersParams = JComponentHelper::getParams('com_users');
			$usertype = $usersParams->get('new_usertype');
				
			$data = array();
						
			$activations = " ";				
								 
			$data['name'] = $datas['profile_name'];
			$data['email'] = $email;
			$data['email1'] = $email;
			$data['gid'] = $usertype;
			$data['sendEmail'] = 0;
			$data['profile_id']= $datas['truematrimony_profile_id'];
			
			if($datas['enabled']==1) {
			$data['block'] = 0; 
			$data['activation'] = " ";
			} else {
			$data['block'] = 1;
			$data['activation'] = "1";
			}
						
			if($profile->gender==1){			
			$gprofile_id = 'M'.$profile->truematrimony_profile_id;
			} else {
			$gprofile_id = 'F'.$profile->truematrimony_profile_id;
			}	
							
			if ($params->get('extractusername', 0) == 1) {
				//$tmp_array = explode('@', $email);
				//$data['username'] = $tmp_array[0];
				//$data['username'] = $datas['profile_name'];
				$data['username'] = $gprofile_id;
			} else {
				$data['username'] = $gprofile_id;
				//$data['username'] = $datas['profile_name'];
			}
		
			/*if ($params->get('requestpassword', 0) == 0) {
			 $password = JUserHelper::genRandomPassword();
			}
			else {
			$password = $filter->clean(JRequest::getVar('password'));
			}*/		
		
			$data['password'] = $datas['pwd'];
			$data['password1'] = $datas['pwd'];
			$data['password2'] = $datas['pwd'];
			//print_r($data);
							
			require_once(JPATH_COMPONENT. '/models/registration.php');
				
			echo JPATH_COMPONENT.'/models/registration.php';
			
			if(!$profile->save($datas)) {
				$msg = JText::_('COM_TRUEMATRIMONY_FAILURE');
				$url = 'index.php?option=com_truematrimony&view=profile&layout=item&id=';
			}
		
			/**
			 * register user informations into user table.
			 */
			if ($app->input->get('return','')) {
				//$return = "index.php?option=com_truematrimony&view=profile&layout=item_member";
				$this->url = base64_decode(JFactory::getApplication()->input->get('return',''));
			}
		
			$model = new TrueMatrimonyModelRegistration();
			$activation = $model->register($data);
								
			//$profile = FOFTable::getInstance('Profile','TrueMatrimonyTable');
		
			switch ($activation) {
				case 'useractivate':
					$message = JText::_('COM_USERS_REGISTRATION_COMPLETE_ACTIVATE');
					break;
				case 'adminactivate':
					$message = JText::_('COM_USERS_REGISTRATION_COMPLETE_VERIFY');
					break;
				default:
					$message = JText::_('COM_USERS_REGISTRATION_ACTIVATE_SUCCESS');
			}
				
			if ($params->get('autologin', 0) == 1) {
				$credentials = array("username" => $data['username'], "password" => $data['password']);
				if(true === $this->app->login($credentials)) {
					//$app->setUserState('users.login.form.data', array());
					$url = 'index.php?option=com_truematrimony&view=profile&layout=item_member&id='.$profile->truematrimony_profile_id;
					$this->setRedirect($url);
				}
			}
		
			//$this->setRedirect($this->url, $message);
		
			/**
			 *
			 * @var $url redirect url.
			 */
			$url = 'index.php?option=com_truematrimony&view=profiles';
				
			$app->redirect($url,$msg,'success');
		
		//}
		
	}
}

