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

jimport('joomla.filesystem.file');

jimport('joomla.filesystem.folder');

require_once(JPATH_COMPONENT. '/models/search.php');

//require_once(JPATH_COMPONENT. '/controllers/user.php');

/**
 * 
 * Controller class name TrueMatrimonyControllerProfiles.
 *
 */
class TruematrimonyControllerSearchs extends FOFController
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
	
	public function save() {
		
		/**
		 * Get the applicaiton.
		 */
		$app = JFactory::getApplication();
			
		$task = $app->input->get('task');
	
		/**
		 * Get the data from post request.
		 */			
		$dataitems = $app->input->getArray($_POST);
		
		/**
		 *
		 * @var $bday Get birth of date.
		 */
		$bday = new DateTime($dataitems['dob']);
			
		/**
		 *
		 * @var $today Get today date.
		 */
		$today = new DateTime(date('F.j.Y', time()));
			
		/**
		 *
		 * @var $diff. Calculate age.
		 */
		$diff = $today->diff($bday);
			
		$ageitem = array('age'=>$diff->y);
		
		$dataitem = array_merge($dataitems, $ageitem );			
				
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
			
		$userids = array('user_id'=> $users->id);
	    
	    $datas = array_merge($dataitem, $userids);
	        
	    //exit;
	        		
		$query = 'SELECT COUNT(*) FROM #__truematrimony_profiles WHERE email = ' . $this->db->quote($datas['email']);
		
		$this->db->setQuery($query);
		if ($this->db->loadResult() > 0) {
			$msg = JText::_("COM_TRUEMATRIMONY_EMAIL_EXIST");
			$url = 'index.php?option=com_truematrimony&view=profile&layout=item';
			$this->setRedirect($url,$msg,'warning');
		} else {		
		
		/**
		 * if, data not save means, 
		 */
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
		
		jimport('joomla.filter.filterinput');
		
		$filter = JFilterInput::getInstance();
		
		$email = $filter->clean($app->input->getString('email'));
								
		// Check that e-mail is not already taken
		$query = 'SELECT COUNT(*) FROM #__users WHERE email = ' . $this->db->quote($email);
		$this->db->setQuery($query);
		    
		if ($this->db->loadResult() > 0) {
			$message = "COM_SIMPLEREGISTRATION_EMAIL_EXIST";
			$type = "error";
			$this->setRedirect($this->url, $message, $type);
			return false;
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
			
		$data['name'] = $datas['profile_name'];
		$data['email'] = $email;
		$data['email1'] = $email;
		$data['gid'] = $usertype;
		$data['sendEmail'] = 0;
		$data['profile_id']= $profile->truematrimony_profile_id;
		
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
			//$data['username'] = $datas['profile_name'];
			$data['username'] = $gprofile_id;
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
		
		require_once(JPATH_COMPONENT. '/models/registration.php');
			
		echo JPATH_COMPONENT.'/models/registration.php';
		
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
					
		/**
		 * 
		 * @var $url redirect url.
		 */
		$url = 'index.php?option=com_truematrimony&view=profile&layout=item_info&id='.$profile->truematrimony_profile_id;
			
		$app->redirect($url,$msg,'success');   
		
		}
	}
	
	/**
	 * Update method.
	 * 
	 * Update values in the profiles table.
	 */ 
	public function update() {
	
	/**
	 * Get the applicaiton.
	 */ 
	$app = JFactory::getApplication();
	
	/**
	 * Get the data from post request.
	 */ 
	$data = $app->input->getArray($_POST);
		
	/**
	 * Get the profile id.
	 */	
	$id = $app->input->get('truematrimony_profile_id'); 
				
	/**
	 * Save the post request data into table.
	 */ 
	$profile = FOFTable::getInstance('Profile','TrueMatrimonyTable')->save($data);

	/**
	 *
	 * @var $msg success message.
	 */
	$msg = JText::_('COM_TRUEMATRIMONY_SUCCESS');
		
	/**
	 *
	 * @var $url redirect url.
	 */
	$url = 'index.php?option=com_truematrimony&view=profile&layout=item_member&id='.$id;
		
	$app->redirect($url,$msg,'success');	
	
	}
	
	/**
	 * Upload profile picture method.
	 */ 
	public function uploadpicture() {
	
	/**
	 * Get the applicaiton.
	 */ 
	$app = JFactory::getApplication();
	
	/**
	 * Get the data from post request.
	 */ 
	$data = $app->input->getArray($_POST);
				
	/**
	 * Get the profile id.
	 */
	$id = $app->input->get('truematrimony_profile_id');
	 
	/**
	 * 
	 * @var $pathname Original profile picture path name.
	 */
	$pathname = JPATH_SITE.'/media/truematrimony/profiles/profile_'.$id;
	
	/**
	 * make a directory for source profile picture.
	 */
	mkdir($pathname);
	
	/**
	 * 
	 * @var $thumbpath Thumbnail profile picture path.
	 */
	$thumbpath = $pathname.'/thumbs';
	
	/**
	 * make a directory for thumbnail profile picture.
	 */
	mkdir($thumbpath);
	
	/**
	 * file temporary name.
	 */ 	
	$tmp_name = $_FILES["file"]["tmp_name"];
    
    /**
     * upload file name.
     */ 
    $name = $_FILES["file"]["name"];
            
    /**
     * copy temporary into profile picture folder.
     */ 
       
    JFile::copy($_FILES["file"]["tmp_name"], "$pathname/$name");	
       
    JFile::copy($pathname."/".$name, $thumbpath."/".$name );
    	
	$sourceimg = $thumbpath."/".$name;
	
	$datas = array('profile_img'=> $name);
	$results = array_merge($data, $datas);         
	
																
	$size = getimagesize($sourceimg);
						
	$x = 100;
	$y = 100;
	if ($size[0] > $size[1])
	{
		$y = $x * $size[1] / $size[0];
	} else {
		$tmpx = $x;
		$x = $y;
		$y = $tmpx * $size[0] / $size[1];
	}
											
	/**
	 * create thumb jpg image file.
	 */
	if ($_FILES["file"]["type"] == 'image/jpeg') {
						
		$img_big = imagecreatefromjpeg($sourceimg);
						
		$img_new = imagecreate($x, $y);
					
		$img_mini = imagecreatetruecolor($x, $y) or $img_mini = imagecreate($x, $y);
																	
		imagecopyresized($img_mini, $img_big, 0, 0, 0, 0, $x, $y, $size[0], $size[1]);
												
		$thumbimg = imagejpeg($img_mini, $sourceimg);								
	
	} elseif ($imgpath['extension'] == 'png') { // create thumb png file. 
					
		$img_big = imagecreatefrompng($sourceimg);
						
		$img_new = imagecreate($x, $y);
					
		$img_mini = imagecreatetruecolor($x, $y) or $img_mini = imagecreate($x, $y);
						
		imagecopyresized($img_mini, $img_big, 0, 0, 0, 0, $x, $y, $size[0], $size[1]);
						
		imagepng($img_mini, $sourceimg);
						
	} elseif ($imgpath['extension'] == 'gif') { //create thumb gif file.
						
		$img_big = imagecreatefromgif($sourceimg);
						
		$img_new = imagecreate($x, $y);
						
		$img_mini = imagecreatetruecolor($x, $y) or $img_mini = imagecreate($x, $y);
						
		imagecopyresized($img_mini, $img_big, 0, 0, 0, 0, $x, $y, $size[0], $size[1]);
						
		imagegif($img_mini, $sourceimg);
	
	}
	
	/**
	 * Save the post request data into table.
	 */
	$profile = FOFTable::getInstance('Profile','TrueMatrimonyTable')->save($results);
		
    /**
     *
     * @var $msg success message.
     */
    $msg = JText::_('COM_TRUEMATRIMONY_UPLOAD_PROFILE_PICTURE_SUCCESS');
    
    $url = 'index.php?option=com_truematrimony&view=profile&layout=item_member&id='.$id;
     
    $app->redirect($url,$msg,'success');
       
	}
	
	public function getAdvanceProfiles() {		
		
		/**
		 * 
		 * @var $user Get the user.
		 */
		$user = JFactory::getUser();
		
		if($user->id) {
				
		/**
		 * 
		 * @var $app Get the application.
		 */
		$app = JFactory::getApplication();
			
		/**
		 * @var $items Get the items from post request.
		 */
		$items = $app->input->getArray($_POST);
		
		
		//$objitems = new TruematrimonyModelSearch();
		
		//$items = $objitems->getSearchProfiles($items);
		
		//print_r($items);
							
		if($items['option']=='com_truematrimony') {
			
			$obitems = new TruematrimonyModelSearch();
			
			$obitems->getSearchProfiles();
						
			$url = 'index.php?option=com_truematrimony&view=search&layout=item';
			$app->redirect($url);
					
  }	
}

}
	
}	
	
