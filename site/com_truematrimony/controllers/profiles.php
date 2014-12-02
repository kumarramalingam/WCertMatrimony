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

//require_once(JPATH_COMPONENT. '/controllers/user.php');

//getProfilecomplexion

//require_once(JPATH_ADMINISTRATOR. '/compontents/com_truematrimony/helpers/select.php');

/**
 * 
 * Controller class name TrueMatrimonyControllerProfiles.
 *
 */
class TruematrimonyControllerProfiles extends FOFController
{	
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
	
	    $dataitems['dob'] = $dataitems['dob_year']. "-". $dataitems['month']. "-". $dataitems['date'];
	   
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
	 	    	        		
		$query = 'SELECT COUNT(*) FROM #__truematrimony_profiles WHERE email = ' . $this->db->quote($datas['email']).' OR mobile_number='.$this->db->quote($datas['mobile_number']);
				
		$this->db->setQuery($query);
				
		if ($this->db->loadResult() > 0) {
			$msg = JText::_("COM_TRUEMATRIMONY_EMAIL_OR_MOBILE_NUMBER_EXIST");
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
		$query = 'SELECT COUNT(*) FROM #__users WHERE email = ' . $this->db->quote($email).' OR mobile_number='.$this->db->quote($datas['mobile_number']);
		$this->db->setQuery($query);
		    
		if ($this->db->loadResult() > 0) {
			$message = "COM_SIMPLEREGISTRATION_EMAIL_OR_MOBILE_NUMBER_EXIST";
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
	
	public function getProfiles() {		
		
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
			
		if($items['option']=='com_truematrimony') {
							    
	    $db		= JFactory::getDbo();
	    $query	= $db->getQuery(true);
	    $query->select('p.*');
	    $query->from('#__truematrimony_profiles AS p');
	    $query->where('p.truematrimony_profile_id='.$user->profile_id);
	    $db->setQuery($query);
	    $usersinfo = $db->loadAssocList();
	    $enabledval = 1;
	    	    	       
		/**
		 * Check profile gender status.
		 *  
		 */
		if($usersinfo[0]['gender']==1) {
			
						
			$query->select('fe.*');
			$query->from('#__truematrimony_profiles AS fe');
					
			if($items['caste_id']==0 && !empty($items['from-age']) && !empty($items['to-age'])){
			$query->where('fe.gender=2 AND fe.age >='.$items['from-age'].' AND fe.age <='.$items['to-age'].' AND p.enabled='.$enabledval);
			} else {							
			$query->where('fe.gender=2 AND fe.caste_id='.$items['caste_id'].' AND fe.age >='.$items['from-age'].' AND fe.age <='.$items['to-age'].' AND p.enabled='.$enabledval);
			}
					
			$db->setQuery($query);
			$results = $db->loadAssocList();	
										
		} else {
			$query->select('ma.*');
			$query->from('#__truematrimony_profiles AS ma');
			if($items['caste_id']==0 && !empty($items['from-age']) && !empty($items['to-age'])){
				$query->where('ma.gender=1 AND ma.age >='.$items['from-age'].' AND ma.age <='.$items['to-age'].' AND p.enabled='.$enabledval);
			} else {
				$query->where('ma.gender=1 AND ma.caste_id='.$items['caste_id'].' AND ma.age >='.$items['from-age'].' AND ma.age <='.$items['to-age'].' AND p.enabled='.$enabledval);
			}			
			$db->setQuery($query);
			$results = $db->loadAssocList();
		}	
	    	return $results;
		}
	 }
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
				
		if(!empty($items['search_profile_id'])) {
			$searchid = substr($items['search_profile_id'],1);
		}
				
		//$objitems = new TruematrimonyModelSearch();
		
		//$items = $objitems->getSearchProfiles($items);
		
							
		if($items['option']=='com_truematrimony') {
					    
	    $db		= JFactory::getDbo();
	    $userquery	= $db->getQuery(true);
	    $userquery->select('p.*');
	    $userquery->from('#__truematrimony_profiles AS p');
	    $userquery->where('p.truematrimony_profile_id='.$user->profile_id);
	    $db->setQuery($userquery);
	    $usersinfo = $db->loadAssocList();	 
	    
	    $interquery	= $db->getQuery(true);
	    $interquery->select('i.*');
	    $interquery->from('#__truematrimony_interests AS i');
	    $interquery->where('i.profile_id='.$user->profile_id);
	    $db->setQuery($interquery);
	    $interinfo = $db->loadAssocList();	
	    	   		   	    
	    $enabledval = 1;
	    
	    
	    
	    //print_r($usersinfo[0]['truematrimony_profile_id']);
	    
	    /*$proquery	= $db->getQuery(true);
	    $proquery->select("distinct p.*")->from("#__truematrimony_profiles as p");
		$proquery->rightJoin("#__truematrimony_interests as i ON i.interest_to_profile_id = p.truematrimony_profile_id AND i.profile_id");
		$proquery->where('p.gender=2 AND p.age >='.$items['from-age'].' AND p.age <='.$items['to-age'].' AND p.enabled='.$enabledval);
		$proquery->where('i.profile_id!='.$user->profile_id);
        $db->setQuery($proquery);
	    $proinfo = $db->loadAssocList();
	    */
        //print_r($proinfo);
                
        $intquery = $db->getQuery(true);
		$intquery->select("distinct p.*")->from("#__truematrimony_profiles as p");
			    
	     
	    	    	    
	    /*$prosquery = $db->getQuery(true);
		$prosquery->select("distinct p.*")->from("#__truematrimony_profiles as p");
		$prosquery->where('p.gender=2 AND p.age >='.$items['from-age'].' AND p.age <='.$items['to-age'].' AND p.enabled='.$enabledval);
		$db->setQuery($prosquery);
	    $proinfoss = $db->loadAssocList();	
	    	    
		//print_r($intinfos);	   
	    
	    $intpros = array();
	    foreach($intinfos as $key => $val) {
		$proquery = $db->getQuery(true);
		$proquery->select("distinct p.*")->from("#__truematrimony_profiles as p");
		$proquery->where('p.gender=2 AND p.age >='.$items['from-age'].' AND p.age <='.$items['to-age'].' AND p.enabled='.$enabledval.' AND p.truematrimony_profile_id='.$val['truematrimony_profile_id']);
		$db->setQuery($proquery);
	    $proinfos = $db->loadAssocList();		
	    print_r($proinfos);	    
	    }
		
	    exit;
	    $intinfs = array();	 */   			
		
	    /*if(empty($proinfo)) {
		$intquery = $db->getQuery(true);
		$intquery->select("distinct p.*")->from("#__truematrimony_profiles as p");
		$intquery->leftJoin("#__truematrimony_interests as i ON p.truematrimony_profile_id = i.interest_to_profile_id");
		$intquery->where('p.gender=2 AND p.age >='.$items['from-age'].' AND p.age <='.$items['to-age'].' AND p.enabled='.$enabledval);
		$intquery->where('i.interest_status=0');
		$db->setQuery($proquery);
	    $intinfo = $db->loadAssocList();
		}*/   
	           
	    //print_r($items['search_keywords']);   
	    
	    //$searchkeys = explode(',',$items['search_keywords']);
	    
	    //print_r($searchkeys);	    
	              	             	    	       
		/**
		 * Check profile gender status.
		 *  
		 */		 
		$db		= JFactory::getDbo();
	    $query	= $db->getQuery(true);
		if($usersinfo[0]['gender']==1) {
						
			$query->select("fe.*")->from("#__truematrimony_profiles as fe");
			
			if(!empty($items['search_keywords'])) {
				//for($a=0; $a < count($searchkeys); $a++) {
				//$query->where('fe.gender=2 AND fe.profile_name LIKE "%'.$items['search_keywords'].'%" OR fe.native LIKE "%'.$items['search_keywords'].'%"');
			    $query->where('fe.gender=2 AND fe.profile_name LIKE "%'.$items['search_keywords'].'%" OR fe.gender=2 AND fe.native LIKE "%'.$items['search_keywords'].'%" OR fe.gender=2 AND fe.additional_info LIKE "%'.$items['search_keywords'].'%" OR fe.gender=2 AND fe.expectations LIKE "%'.$items['search_keywords'].'%" 
			                   OR fe.gender=2 AND fe.dob LIKE "%'.$items['search_keywords'].'%" OR fe.gender=2 AND fe.age LIKE "%'.$items['search_keywords'].'%" OR fe.gender=2 AND fe.temple_name LIKE "%'.$items['search_keywords'].'%" OR fe.gender=2 AND fe.siblings_members LIKE "%'.$items['search_keywords'].'%"' );			    	 
			    //}
			}
			
			if(!empty($items['search_profile_id'])) {
				$query->where('fe.gender=2 AND fe.truematrimony_profile_id='.$searchid.' AND fe.enabled='.$enabledval);
			}
					
			if(!empty($items['from-age']) && !empty($items['to-age']) && !empty($items['caste_id']) && !empty($items['country_id']) && !empty($items['highesteducation_id']) && !empty($items['occupation_id']) && !empty($items['employedin_id']) && !empty($items['complexion_id']) ) {
				$query->where('fe.gender=2 AND fe.age >='.$items['from-age'].' AND fe.age <='.$items['to-age'].' AND fe.caste_id='.$items['caste_id'].' AND fe.country_id='.$items['country_id'].' AND fe.highesteducation_id='.$items['highesteducation_id'].' AND fe.occupation_id='.$items['occupation_id'].' AND fe.employedin_id='.$items['employedin_id'].' AND fe.complexion_id='.$items['complexion_id'].' AND fe.enabled='.$enabledval);
			} 
			
			if(!empty($items['caste_id'])) { 
				$query->where('fe.gender=2 AND fe.caste_id='.$items['caste_id'].' AND fe.enabled='.$enabledval);			
			} 
									
			if(!empty($items['country_id'])) {
				$query->where('fe.gender=2 AND fe.country_id='.$items['country_id'].' AND fe.enabled='.$enabledval);
		    }
		    
		    if(!empty($items['caste_id']) && !empty($items['country_id'])) {
				$query->where('fe.gender=2 AND fe.caste_id='.$items['caste_id'].' AND fe.country_id='.$items['country_id'].' AND fe.enabled='.$enabledval);		
			} 
			
			if(!empty($items['caste_id']) && !empty($items['country_id']) && !empty($items['highesteducation_id'])) {
				$query->where('fe.gender=2 AND fe.caste_id='.$items['caste_id'].' AND fe.country_id='.$items['country_id'].' AND fe.highesteducation_id='.$items['highesteducation_id'].' AND fe.enabled='.$enabledval);		
			}
			
			if(!empty($items['caste_id']) && !empty($items['country_id']) && !empty($items['highesteducation_id']) && !empty($items['occupation_id'])) {
				$query->where('fe.gender=2 AND fe.caste_id='.$items['caste_id'].' AND fe.country_id='.$items['country_id'].' AND fe.highesteducation_id='.$items['highesteducation_id'].' AND fe.occupation_id='.$items['occupation_id'].' AND fe.enabled='.$enabledval);		
			}
			
			if(!empty($items['caste_id']) && !empty($items['country_id']) && !empty($items['highesteducation_id']) && !empty($items['occupation_id']) && !empty($items['employedin_id'])) {
				$query->where('fe.gender=2 AND fe.caste_id='.$items['caste_id'].' AND fe.country_id='.$items['country_id'].' AND fe.highesteducation_id='.$items['highesteducation_id'].' AND fe.occupation_id='.$items['occupation_id'].' AND fe.employedin_id='.$items['employedin_id']);		
			}		
			
			if(!empty($items['caste_id']) && !empty($items['country_id']) && !empty($items['highesteducation_id']) && !empty($items['occupation_id']) && !empty($items['employedin_id']) && !empty($items['complexion_id'])) {
				$query->where('fe.gender=2 AND fe.caste_id='.$items['caste_id'].' AND fe.country_id='.$items['country_id'].' AND fe.highesteducation_id='.$items['highesteducation_id'].' AND fe.occupation_id='.$items['occupation_id'].' AND fe.employedin_id='.$items['employedin_id'].' AND fe.complexion_id='.$items['complexion_id']);		
			}
			
			if(!empty($items['caste_id']) && !empty($items['highesteducation_id'])) {
				$query->where('fe.gender=2 AND fe.caste_id='.$items['caste_id'].' AND fe.highesteducation_id='.$items['highesteducation_id']);		
			}
			
			if(!empty($items['caste_id']) && !empty($items['occupation_id'])) {
				$query->where('fe.gender=2 AND fe.caste_id='.$items['caste_id'].' AND fe.occupation_id='.$items['occupation_id']);		
			}  
			
			if(!empty($items['caste_id']) && !empty($items['employedin_id'])) {
				$query->where('fe.gender=2 AND fe.caste_id='.$items['caste_id'].' AND fe.employedin_id='.$items['employedin_id']);		
			} 
			
			if(!empty($items['caste_id']) && !empty($items['complexion_id'])) {
				$query->where('fe.gender=2 AND fe.caste_id='.$items['caste_id'].' AND fe.complexion_id='.$items['complexion_id']);		
			}
			
			if(!empty($items['country_id']) && !empty($items['highesteducation_id'])) {
				$query->where('fe.gender=2 AND fe.country_id='.$items['country_id'].' AND fe.highesteducation_id='.$items['highesteducation_id']);		
			} 
			
			if(!empty($items['country_id']) && !empty($items['highesteducation_id']) && !empty($items['occupation_id'])) {
				$query->where('fe.gender=2 AND fe.country_id='.$items['country_id'].' AND fe.highesteducation_id='.$items['highesteducation_id'].' AND fe.occupation_id='.$items['occupation_id']);		
			}
		    
		    if(!empty($items['country_id']) && !empty($items['highesteducation_id']) && !empty($items['occupation_id']) && !empty($items['employedin_id'])) {
				$query->where('fe.gender=2 AND fe.country_id='.$items['country_id'].' AND fe.highesteducation_id='.$items['highesteducation_id'].' AND fe.occupation_id='.$items['occupation_id'].' AND fe.employedin_id='.$items['employedin_id']);		
			}
			
			if(!empty($items['country_id']) && !empty($items['highesteducation_id']) && !empty($items['occupation_id']) && !empty($items['employedin_id']) && !empty($items['complexion_id'])) {
				$query->where('fe.gender=2 AND fe.country_id='.$items['country_id'].' AND fe.highesteducation_id='.$items['highesteducation_id'].' AND fe.occupation_id='.$items['occupation_id'].' AND fe.employedin_id='.$items['employedin_id'].' AND fe.complexion_id='.$items['complexion_id']);		
			}
		    
		    if(!empty($items['highesteducation_id'])) {
				$query->where('fe.gender=2 AND fe.highesteducation_id='.$items['highesteducation_id']);
		    } 
		    
		    if(!empty($items['highesteducation_id']) && !empty($items['occupation_id'])) {
				$query->where('fe.gender=2 AND fe.highesteducation_id='.$items['highesteducation_id'].' AND fe.occupation_id='.$items['occupation_id']);		
			} 
			
			if(!empty($items['highesteducation_id']) && !empty($items['occupation_id']) && !empty($items['employedin_id'])) {
				$query->where('fe.gender=2 AND fe.highesteducation_id='.$items['highesteducation_id'].' AND fe.occupation_id='.$items['occupation_id'].' AND fe.employedin_id='.$items['employedin_id']);		
			}
			
			if(!empty($items['highesteducation_id']) && !empty($items['occupation_id']) && !empty($items['employedin_id']) && !empty($items['complexion_id'])) {
				$query->where('fe.gender=2 AND fe.highesteducation_id='.$items['highesteducation_id'].' AND fe.occupation_id='.$items['occupation_id'].' AND fe.employedin_id='.$items['employedin_id'].' AND fe.complexion_id='.$items['complexion_id']);		
			}
		    
		    if(!empty($items['occupation_id'])) {
				$query->where('fe.gender=2 AND fe.occupation_id='.$items['occupation_id']);
		    } 
		    
		    if(!empty($items['occupation_id']) && !empty($items['employedin_id'])) {
				$query->where('fe.gender=2 AND fe.occupation_id='.$items['occupation_id'].' AND fe.employedin_id='.$items['employedin_id']);		
			}
			
			if(!empty($items['occupation_id']) && !empty($items['employedin_id']) && !empty($items['complexion_id'])) {
				$query->where('fe.gender=2 AND fe.occupation_id='.$items['occupation_id'].' AND fe.employedin_id='.$items['employedin_id'].' AND fe.complexion_id='.$items['complexion_id']);		
			}
		    
		    if(!empty($items['employedin_id'])) {
				$query->where('fe.gender=2 AND fe.employedin_id='.$items['employedin_id']);
		    }
		     
		    if(!empty($items['complexion_id'])) {
				$query->where('fe.gender=2 AND fe.complexion_id='.$items['complexion_id']);
		    } 
				
			$db->setQuery($query);
			$results = $db->loadAssocList();
						
			//return $results;
					
			/*if(!empty($items['search_profile_id'])) {
				$query->where('fe.gender=2 AND fe.truematrimony_profile_id='.$searchid.' AND fe.enabled='.$enabledval);
			}*/
													
			return $results;
												
			} else {
			
			$query->select('ma.*');
			$query->from('#__truematrimony_profiles AS ma');
			if(!empty($items['from-age']) && !empty($items['to-age'])) {
				$query->where('ma.gender=1 AND ma.age >='.$items['from-age'].' AND ma.age <='.$items['to-age']);
			}
					
			if(!empty($items['from-age']) && !empty($items['to-age']) && !empty($items['caste_id']) && !empty($items['country_id']) && !empty($items['highesteducation_id']) && !empty($items['occupation_id']) && !empty($items['employedin_id']) && !empty($items['complexion_id']) ) {
				$query->where('ma.gender=1 AND ma.age >='.$items['from-age'].' AND ma.age <='.$items['to-age'].' AND ma.caste_id='.$items['caste_id'].' AND ma.country_id='.$items['country_id'].' AND ma.highesteducation_id='.$items['highesteducation_id'].' AND ma.occupation_id='.$items['occupation_id'].' AND ma.employedin_id='.$items['employedin_id'].' AND ma.complexion_id='.$items['complexion_id']);
			} 
			
			if(!empty($items['caste_id'])) { 
				$query->where('ma.gender=1 AND ma.caste_id='.$items['caste_id']);			
			} 
									
			if(!empty($items['country_id'])) {
				$query->where('ma.gender=1 AND ma.country_id='.$items['country_id']);
		    }
		    
		    if(!empty($items['caste_id']) && !empty($items['country_id'])) {
				$query->where('ma.gender=1 AND ma.caste_id='.$items['caste_id'].' AND ma.country_id='.$items['country_id']);		
			} 
			
			if(!empty($items['caste_id']) && !empty($items['country_id']) && !empty($items['highesteducation_id'])) {
				$query->where('ma.gender=1 AND ma.caste_id='.$items['caste_id'].' AND ma.country_id='.$items['country_id'].' AND ma.highesteducation_id='.$items['highesteducation_id']);		
			}
			
			if(!empty($items['caste_id']) && !empty($items['country_id']) && !empty($items['highesteducation_id']) && !empty($items['occupation_id'])) {
				$query->where('ma.gender=1 AND ma.caste_id='.$items['caste_id'].' AND ma.country_id='.$items['country_id'].' AND ma.highesteducation_id='.$items['highesteducation_id'].' AND ma.occupation_id='.$items['occupation_id']);		
			}
			
			if(!empty($items['caste_id']) && !empty($items['country_id']) && !empty($items['highesteducation_id']) && !empty($items['occupation_id']) && !empty($items['employedin_id'])) {
				$query->where('ma.gender=1 AND ma.caste_id='.$items['caste_id'].' AND ma.country_id='.$items['country_id'].' AND ma.highesteducation_id='.$items['highesteducation_id'].' AND ma.occupation_id='.$items['occupation_id'].' AND ma.employedin_id='.$items['employedin_id']);		
			}		
			
			if(!empty($items['caste_id']) && !empty($items['country_id']) && !empty($items['highesteducation_id']) && !empty($items['occupation_id']) && !empty($items['employedin_id']) && !empty($items['complexion_id'])) {
				$query->where('ma.gender=1 AND ma.caste_id='.$items['caste_id'].' AND ma.country_id='.$items['country_id'].' AND ma.highesteducation_id='.$items['highesteducation_id'].' AND ma.occupation_id='.$items['occupation_id'].' AND ma.employedin_id='.$items['employedin_id'].' AND ma.complexion_id='.$items['complexion_id']);		
			}
			
			if(!empty($items['caste_id']) && !empty($items['highesteducation_id'])) {
				$query->where('ma.gender=1 AND ma.caste_id='.$items['caste_id'].' AND ma.highesteducation_id='.$items['highesteducation_id']);		
			}
			
			if(!empty($items['caste_id']) && !empty($items['occupation_id'])) {
				$query->where('ma.gender=1 AND ma.caste_id='.$items['caste_id'].' AND ma.occupation_id='.$items['occupation_id']);		
			}  
			
			if(!empty($items['caste_id']) && !empty($items['employedin_id'])) {
				$query->where('ma.gender=1 AND ma.caste_id='.$items['caste_id'].' AND ma.employedin_id='.$items['employedin_id']);		
			} 
			
			if(!empty($items['caste_id']) && !empty($items['complexion_id'])) {
				$query->where('ma.gender=1 AND ma.caste_id='.$items['caste_id'].' AND ma.complexion_id='.$items['complexion_id']);		
			}
			
			if(!empty($items['country_id']) && !empty($items['highesteducation_id'])) {
				$query->where('ma.gender=1 AND ma.country_id='.$items['country_id'].' AND ma.highesteducation_id='.$items['highesteducation_id']);		
			} 
			
			if(!empty($items['country_id']) && !empty($items['highesteducation_id']) && !empty($items['occupation_id'])) {
				$query->where('ma.gender=1 AND ma.country_id='.$items['country_id'].' AND ma.highesteducation_id='.$items['highesteducation_id'].' AND ma.occupation_id='.$items['occupation_id']);		
			}
		    
		    if(!empty($items['country_id']) && !empty($items['highesteducation_id']) && !empty($items['occupation_id']) && !empty($items['employedin_id'])) {
				$query->where('ma.gender=1 AND ma.country_id='.$items['country_id'].' AND ma.highesteducation_id='.$items['highesteducation_id'].' AND ma.occupation_id='.$items['occupation_id'].' AND ma.employedin_id='.$items['employedin_id']);		
			}
			
			if(!empty($items['country_id']) && !empty($items['highesteducation_id']) && !empty($items['occupation_id']) && !empty($items['employedin_id']) && !empty($items['complexion_id'])) {
				$query->where('ma.gender=1 AND ma.country_id='.$items['country_id'].' AND ma.highesteducation_id='.$items['highesteducation_id'].' AND ma.occupation_id='.$items['occupation_id'].' AND ma.employedin_id='.$items['employedin_id'].' AND ma.complexion_id='.$items['complexion_id']);		
			}
		    
		    if(!empty($items['highesteducation_id'])) {
				$query->where('ma.gender=1 AND ma.highesteducation_id='.$items['highesteducation_id']);
		    } 
		    
		    if(!empty($items['highesteducation_id']) && !empty($items['occupation_id'])) {
				$query->where('ma.gender=1 AND ma.highesteducation_id='.$items['highesteducation_id'].' AND ma.occupation_id='.$items['occupation_id']);		
			} 
			
			if(!empty($items['highesteducation_id']) && !empty($items['occupation_id']) && !empty($items['employedin_id'])) {
				$query->where('ma.gender=1 AND ma.highesteducation_id='.$items['highesteducation_id'].' AND ma.occupation_id='.$items['occupation_id'].' AND ma.employedin_id='.$items['employedin_id']);		
			}
			
			if(!empty($items['highesteducation_id']) && !empty($items['occupation_id']) && !empty($items['employedin_id']) && !empty($items['complexion_id'])) {
				$query->where('ma.gender=1 AND ma.highesteducation_id='.$items['highesteducation_id'].' AND ma.occupation_id='.$items['occupation_id'].' AND ma.employedin_id='.$items['employedin_id'].' AND ma.complexion_id='.$items['complexion_id']);		
			}
		    
		    if(!empty($items['occupation_id'])) {
				$query->where('ma.gender=1 AND ma.occupation_id='.$items['occupation_id']);
		    } 
		    
		    if(!empty($items['occupation_id']) && !empty($items['employedin_id'])) {
				$query->where('ma.gender=1 AND ma.occupation_id='.$items['occupation_id'].' AND ma.employedin_id='.$items['employedin_id']);		
			}
			
			if(!empty($items['occupation_id']) && !empty($items['employedin_id']) && !empty($items['complexion_id'])) {
				$query->where('ma.gender=1 AND ma.occupation_id='.$items['occupation_id'].' AND ma.employedin_id='.$items['employedin_id'].' AND ma.complexion_id='.$items['complexion_id']);		
			}
		    
		    if(!empty($items['employedin_id'])) {
				$query->where('ma.gender=1 AND ma.employedin_id='.$items['employedin_id']);
		    }
		     
		    if(!empty($items['complexion_id'])) {
				$query->where('ma.gender=1 AND ma.complexion_id='.$items['complexion_id']);
		    }    
		    
			$db->setQuery($query);
			$results = $db->loadAssocList();
			return $results;
		}
			
		}
	 }
  }	
  
  /**
   * Add to interest profiles.
   */ 
  public function addtointerest() {
	  
	    /**
		 * 
		 * @var $db Get the database object.
		 */
		$db=JFactory::getDbo();
		
	    /**
		 * 
		 * @var $app Get the application.
		 */
		$app = JFactory::getApplication();
			
		/**
		 * @var $items Get the items from post request.
		 */
		$data = $app->input->getArray($_POST);
				
		$profile_id = array('profile_id'=>$data['truematrimony_profile_id'],
							'interest_status'=>"1",
							'interest_date'=>date("Y-m-d")
							);		
				
		$dataitem = array_merge($data, $profile_id);
			
		/**
		 * 
		 * @var $query.
		 * 
		 * Get the getQuery() method.
		 */
		$proquery=$db->getQuery(true);
		
						
		/**
		 * query statement.
		 */
		$proquery->select("*")->from("#__truematrimony_profiles");
		$proquery->where('truematrimony_profile_id='.$data['truematrimony_profile_id']);		
		
		/**
		 * Set the query statement.
		 */
		$db->setQuery($proquery);
		
		$profileinfo = $db->loadAssocList();
		
		/**
		 * 
		 * @var $query.
		 * 
		 * Get the getQuery() method.
		 */
		$packquery=$db->getQuery(true);
			
		/**
		 * Get all package informations.
		 */ 
		$packquery->select("*")->from("#__truematrimony_packages");
		$packquery->where('truematrimony_package_id='.$profileinfo[0]['package_id']);
				
		/**
		 * Set the query statement.
		 */
		$db->setQuery($packquery);
				
		$packageinfos = $db->loadAssocList();	
		
		$today = date("Y-m-d");
					          
		$todaysDate = strtotime($today);
						 
        $expiryDate = strtotime($packageinfos[0]['package_end']);
       							
		$user = JFactory::getUser();	
		
		/**
		 * 
		 * @var $query.
		 * 
		 * Get the getQuery() method.
		 */
		$interquery=$db->getQuery(true);
			
		/**
		 * query statement.
		 */
		$interquery->select("*")->from("#__truematrimony_interests");
		$interquery->where('profile_id='.$dataitem['profile_id']);
		
		/**
		 * Set the query statement.
		 */
		$db->setQuery($interquery);
		
		$results = $db->loadObjectList();
	
		/**
		 * 
		 * @var $result Get the data.
		 */
		/*$results=$db->loadAssocList();
		$dataresult = array();
		foreach($results as $result) {
			$dataresult = $result;
		}*/
		
		if($packageinfos[0]['package_lifetime']=="1") {
		$interests = FOFTable::getInstance('Interests','TrueMatrimonyTable')->save($dataitem);
		$msg = JText::_("COM_TRUEMATRIMONY_PROFILE_INTEREST");
		$url = 'index.php?option=com_truematrimony';
		$this->setRedirect($url,$msg,'success');
		} else {	     
		if(count($results)<$packageinfos[0]['profile_limit'] && $todaysDate <= $expiryDate)
		{	
		$interests = FOFTable::getInstance('Interests','TrueMatrimonyTable')->save($dataitem);
		$msg = JText::_("COM_TRUEMATRIMONY_PROFILE_INTEREST");
		$url = 'index.php?option=com_truematrimony';
		$this->setRedirect($url,$msg,'success');	
		} else {
		$msg = JText::_("COM_TRUEMATRIMONY_UPGRADE_YOUR_ACCOUNT");
		$url = 'index.php?option=com_truematrimony&view=member&layout=item&pid='.$dataitem['profile_id'];		
		$this->setRedirect($url,$msg,'success');	
		}
	    }
		    
		/*if($results[$i]['interest_to_profile_id']==$dataitem['interest_to_profile_id'])	{
		 	$msg = JText::_("COM_TRUEMATRIMONY_PROFILE_INTEREST_ALREADY_EXIST");
		 	$url = 'index.php?option=com_truematrimony';
		 	$this->setRedirect($url,$msg,'warning');
		} else {
		 	$interests = FOFTable::getInstance('Interests','TrueMatrimonyTable')->save($dataitem);
		 	$msg = JText::_("COM_TRUEMATRIMONY_PROFILE_INTEREST");
		 	$url = 'index.php?option=com_truematrimony';
		 	$this->setRedirect($url,$msg,'success');
		}*/	    
		
		/**
	     * Save the post request data into table.
	     */ 
	    //$interests = FOFModel::getInstanceModel('Interests','TruematrimonyModel')->getItemList();
	    //print_r($interests);
	    //exit;	        
	}
	 
}	
	
