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

echo $viewTemplate = $this->getRenderedForm();
$items = $this->item->profile_file;
$pathname = JPATH_SITE."media/truematrimony/profiles/profile_".$this->item->truematrimony_profile_id."/files/".$items;

/*if (file_exists($pathname)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($pathname));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($pathname));
    readfile($pathname);
    exit;
}*/
?>
<a class="btnclick" target="_blank" href="<?php echo $pathname; ?>"><button class="btn btn-success"><span class="profile_file"><?php echo "Download"; ?></span></button></a>

<a href="<?php echo $pathname ?>" download="<?php echo $pathname; ?>" title="ImageName">
    <span class="profile_file"><?php echo "Download"; ?></span>
</a>

    <!-- profile picture div starts -->
	<div class="profile-picture">  
	      
	    <form class="adminForm form-horizontal truematrimony-profile-info" id="adminForm" name="adminForm" method="post" enctype="multipart/form-data">
					   
			   <label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_PICTURE'); ?>" >
					<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_PICTURE'); ?>
			   </label>	
			   			   
			    <!-- profile member default image -->
				<?php
				if($this->item->profile_img!="") {			
				$path = JUri::root().'/media/truematrimony/profiles/profile_'.$this->item->truematrimony_profile_id.'/thumbs/'.$this->item->profile_img;	
				?>
				<img src="<?php echo $path;?>" class="" style="max-width:180px;"> 	
				<?php	   
				} else {
					if($this->item->gender==1) {
					   $path = JURI::root().'/components/com_truematrimony/helpers/images/no-avatar.jpg'; ?>
					   <img src="<?php echo $path;?>" class="" style="max-width:180px;">
				<?php	} else {
					   $path = JURI::root().'/components/com_truematrimony/helpers/images/no-female.png'; ?>
					   <img src="<?php echo $path;?>" class="" style="max-width:180px;">
					   <?php
					}		    	
				}			
				?>					
				<div>					
				<!-- upload profile -->			
				<a href="#uploadprofile" data-toggle="modal" class="upload-picture btn btn-warning"><?php echo JText::_('COM_TRUEMATRIMONY_CHANGE_PROFILE_PICTURE'); ?></a>
				</div>
				
				<!-- modal div starts -->				
				<div class="modal fade container col-md-6" id="uploadprofile">
					
					<!-- modal header div -->
					<div class="modal-header">
						<h4><?php echo JText::_('COM_TRUEMATRIMONY_UPLOAD_PROFILE_PICTURE'); ?></h4>
						<a href="javascript:void(0)" style="float:right;" data-dismiss="modal"><?php echo "X"?></a>
					</div>
								
					<!-- modal body div starts -->
					<div class="modal-body">
						<input type="file" name="file" id="file" />
					</div><!-- modal body div ends -->
					
					<!-- modal footer -->
					<div class="modal-footer">
						<button type="submit" class="btn btn-warning"><?php echo JText::_('COM_TRUEMATRIMONY_UPLOAD_PROFILE_PICTURE_SAVE'); ?></button>
					</div>
				
				</div><!-- modal div ends -->	   
			   
		    <input type="hidden" name="option" value="com_truematrimony"/>
			<input type="hidden" name="view" value="profiles"/>
			<input type="hidden" id="task" name="task" value="uploadpicture"/>
			<input type="hidden" name="truematrimony_profile_id" id="truematrimony_profile_id" value="<?php echo $this->item->truematrimony_profile_id; ?>" >	
		  
		  </form>      
	      
	</div><!-- profile picture div ends -->	

