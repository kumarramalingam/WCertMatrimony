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
 * Controller class name TrueMatrimonyControllerMembers.
 *
 */
class TruematrimonyControllerMembers extends FOFController
{
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
				
	//$pathname = JPATH_SITE.'/media/truematrimony/profiles/profile_'.$id;
	 
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
						
	$x = 200;
	$y = 200;
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
						
	//$uploadimg = glob(imagepath."{*.jpg,*.gif,*.png}", GLOB_BRACE);	
	 		
	//return $uploadimg;
	 	
	//JFile::copy(JPATH_BASE.'/'.$img, __DIR__.'/uploadfiles/'.$imgpath['basename']);
		
	/**
	 * copy source path into thumb folder;
	 */
	//JFile::copy(JPATH_BASE.'/'.$img, __DIR__.'/uploadfiles/thumb/'.$imgpath['basename']);

	/**
	 * Save the post request data into table.
	 */
	$profile = FOFTable::getInstance('Profile','TrueMatrimonyTable')->save($results);
		
    /**
     *
     * @var $msg success message.
     */
    $msg = JText::_('COM_TRUEMATRIMONY_UPLOAD_PROFILE_PICTURE_SUCCESS');
        
    $url = 'index.php?option=com_truematrimony&view=member&layout=item';
     
    $app->redirect($url,$msg,'success');
       
	}
	
	/**
	 * Upload profile files.
	 */ 
	public function uploadfile() {
	
	/**
	 * Get the applicaiton.
	 */ 
	$app = JFactory::getApplication();
	
	/**
	 * Get the data from post request.
	 */ 
	$data = $app->input->getArray($_POST);		
	
	if($_FILES["file"]["tmp_name"]!="") {
	
	/**
	 * file temporary name.
	 */ 	
	$tmp_name = $_FILES["file"]["tmp_name"];
							
	/**
	 * Get the profile id.
	 */
	$id = $app->input->get('truematrimony_profile_id');
					
	//$pathname = JPATH_SITE.'/media/truematrimony/profiles/profile_'.$id;
	 
	/**
	 * 
	 * @var $pathname Original profile picture path name.
	 */
	$pathname = JPATH_SITE.'/media/truematrimony/profiles/profile_'.$id.'/files';
	
	mkdir($pathname);
	   
    /**
	 * file temporary name.
	 */ 	
	$tmp_name = $_FILES["file"]["tmp_name"];
    
    /**
     * upload file name.
     */ 
    $name = $_FILES["file"]["name"];       
       
    //application/x-pdf
    //image/png
    //image/jpeg
    //image/gif
    //application/msword
    //application/vnd.oasis.opendocument.text
    
   if($_FILES["file"]["type"]=="application/x-pdf" || $_FILES["file"]["type"]=="image/png" || $_FILES["file"]["type"]=="image/jpeg" || $_FILES["file"]["type"]=="image/gif" || $_FILES["file"]["type"]=="application/msword" || $_FILES["file"]["type"]=="application/vnd.oasis.opendocument.text" ) {   
   
   if (file_exists($pathname.'/'.$name)) {
	 
	 /**
     *
     * @var $msg success message.
     */
    $msg = JText::_('COM_TRUEMATRIMONY_UPLOAD_PROFILE_FILE_EXIST');
        
    $url = 'index.php?option=com_truematrimony&view=member&layout=item';
     
    $app->redirect($url,$msg,'warning');
			
	} else {
		        
    /**
     * copy temporary into profile picture folder.
     */       
    JFile::copy($_FILES["file"]["tmp_name"], "$pathname/$name");
    
    $datas = array('profile_file'=> $name);
    
	$results = array_merge($data, $datas);
	
	/**
	 * Save the post request data into table.
	 */
	$profile = FOFTable::getInstance('Profile','TrueMatrimonyTable')->save($results);
		
    /**
     *
     * @var $msg success message.
     */
    $msg = JText::_('COM_TRUEMATRIMONY_UPLOAD_PROFILE_FILE_SUCCESS');
        
    $url = 'index.php?option=com_truematrimony&view=member&layout=item';
     
    $app->redirect($url,$msg,'success');
    
    }
    
    }  else {
		
	 /**
     *
     * @var $msg success message.
     */
    $msg = JText::_('COM_TRUEMATRIMONY_UPLOAD_PROFILE_FILE_NOT_SUPPORT');
        
    $url = 'index.php?option=com_truematrimony&view=member&layout=item';
     
    $app->redirect($url,$msg,'warning');
    
   } 
   } else {
	   
    /**
     *
     * @var $msg success message.
     */
    $msg = JText::_('COM_TRUEMATRIMONY_UPLOAD_YOUR_FILE_INFORMATION');
        
    $url = 'index.php?option=com_truematrimony&view=member&layout=item';
     
    $app->redirect($url,$msg,'warning');
    
   }
   
 }
	
/**
 * Update family informations.
 */ 
public function updatefamilyinfo() {

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
	
	$profile = FOFTable::getInstance('Profile','TrueMatrimonyTable')->save($data);
		
    /**
     *
     * @var $msg success message.
     */
    $msg = JText::_('COM_TRUEMATRIMONY_PROFILE_INFORMATION_UPDATE_SUCCESS');
    
    //$url = 'index.php?option=com_truematrimony&view=profile&layout=item_member&id='.$id;
     
    $url = 'index.php?option=com_truematrimony&view=member&layout=item';
     
    $app->redirect($url,$msg,'success');
	}
	
    /**
     * Update package information.
     */ 
	public function updatepackage() {
		
     /**
	 * Get the applicaiton.
	 */ 
	$app = JFactory::getApplication();
	
	/**
	 * Get the data from post request.
	 */ 
	$data = $app->input->getArray($_POST);	
	
	if($data['package_id']) {				
	/**
	 * Get the profile id.
	 */
	$id = $app->input->get('truematrimony_profile_id');	
	
	$datas = array('package_status'=> "1");
    
	$results = array_merge($data, $datas);
	
	$profile = FOFTable::getInstance('Profile','TrueMatrimonyTable')->save($results);
			
    /**
     *
     * @var $msg success message.
     */
    $msg = JText::_('COM_TRUEMATRIMONY_PROFILE_INFORMATION_UPDATE_SUCCESS');
    
    //$url = 'index.php?option=com_truematrimony&view=profile&layout=item_member&id='.$id;
     
    $url = 'index.php?option=com_truematrimony&view=member&layout=item';
     
    $app->redirect($url,$msg,'success');     
	} else {	
	/**
     *
     * @var $msg success message.
     */
    $msg = JText::_('COM_TRUEMATRIMONY_PROFILE_PACKAGE_PLEASE_SELECT_PACKAGE');
    
    //$url = 'index.php?option=com_truematrimony&view=profile&layout=item_member&id='.$id;
     
    $url = 'index.php?option=com_truematrimony&view=member&layout=item';
     
    $app->redirect($url,$msg,'warning');   
	}
	}
}
