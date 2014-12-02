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
require_once(JPATH_COMPONENT. '/models/member.php');

require_once JPATH_ADMINISTRATOR.'/components/com_truematrimony/helpers/select.php';
jimport( 'joomla.filesystem.file' );

//$this->profileforlist = TrueMatrimonyHelperSelect::getProfileforlist('profilefor');
$action = JRoute::_('index.php?option=com_truematrimony&view=profiles');

$user = JFactory::getUser();

if($user->id){

$model = new TruematrimonyModelMember();

$items = $model->getItem();

foreach($items as $item) {
$itemval = JArrayHelper::fromObject($item);
}

print_r($itemval);

//print_r($items);

//return $items;
//print_r($this->items);

?>

<style>
.control-groups {
position:relative;
left:25px;
top:5px;
}
.truematrimony-profile {
background:#F8F8F8;
}
.control-label {
font-weight:bold;
}
</style>
<?php 

//print_r($this->item);

//$this->profileforlist = TrueMatrimonyHelperSelect::getProfileforlist('profilefor');
//$action = JRoute::_('index.php?option=com_truematrimony&view=profiles');
//print_r($this->item);
?>

<script type="text/javascript">

window.onload = function() {  
   document.getElementById('additional-info').style.display = 'none';
   document.getElementById('matrimony-basic-edit-info').style.display = 'none';
   document.getElementById('hideadditinfo').style.display = 'none';
  //document.getElementById('uploadpic').style.display = 'none';  
}

function showAdditionalinfo() {
	document.getElementById('additional-info').style.display = 'inline';
    document.getElementById('hideadditinfo').style.display = 'inline';
    document.getElementById('moreinfo').style.display = 'none';
    document.getElementById('matrimony-edit-forms').style.display = 'none';
    document.getElementById('matrimony-raasi-edit-info').style.display = 'none';
    document.getElementById('matrimony-additional-edit-info').style.display = 'none';
    document.getElementById('matrimony-education-edit-info').style.display = 'none';
    document.getElementById('matrimony-physical-edit-info').style.display = 'none';
    document.getElementById('matrimony-contact-edit-info').style.display = 'none';
    document.getElementById('matrimony-basic-edit-info').style.display = 'none';
  }

function hideAdditionalinfo() {
	document.getElementById('additional-info').style.display = 'none';
	document.getElementById('hideadditinfo').style.display = 'none';
	document.getElementById('moreinfo').style.display = 'inline';
}

function showEditForm() {
   document.getElementById('matrimony-family-info').style.display = 'none';
   document.getElementById('matrimony-edit-forms').style.display = 'inline';   
}

function showEditRaasiForm() {
document.getElementById('matrimony-raasi-edit-info').style.display = 'inline';
document.getElementById('matrimony-raasi-info').style.display = 'none';
}

function showEditAdditForm() {
document.getElementById('matrimony-additional-edit-info').style.display = 'inline';
document.getElementById('matrimony-additional-infos').style.display = 'none';
}

function showUpload() {
//document.getElementById('uploadpic').style.display = 'inline';
}

function showEditEducateForm() {
document.getElementById('matrimony-education-edit-info').style.display = 'inline';
document.getElementById('matrimony-education-info').style.display = 'none';
}

function showEditPhysicalForm() {
document.getElementById('matrimony-physical-edit-info').style.display = 'inline';
document.getElementById('matrimony-physical-info').style.display = 'none';
}

function cancelFamilyForm() {
document.getElementById('matrimony-edit-forms').style.display = 'none';
document.getElementById('matrimony-family-info').style.display = 'inline';
}

function cancelRaasiForm() {
document.getElementById('matrimony-raasi-edit-info').style.display = 'none';
document.getElementById('matrimony-raasi-info').style.display = 'inline';
}

function cancelAdditForm() {
document.getElementById('matrimony-additional-edit-info').style.display = 'none';
document.getElementById('matrimony-additional-infos').style.display = 'inline';
}

function cancelEducateForm() {
document.getElementById('matrimony-education-edit-info').style.display = 'none';
document.getElementById('matrimony-education-info').style.display = 'inline';
}

function cancelPhysicalForm() {
document.getElementById('matrimony-physical-edit-info').style.display = 'none';
document.getElementById('matrimony-physical-info').style.display = 'inline';
}

function showContactForm() {
document.getElementById('matrimony-contact-edit-info').style.display = 'inline';
document.getElementById('matrimony-contact-info').style.display = 'none';
}

function showBasicForm() {
document.getElementById('matrimony-basic-edit-info').style.display = 'inline';
document.getElementById('truematrimony-basic-info').style.display = 'none';
}

function cancelBasicForm() {
document.getElementById('matrimony-basic-edit-info').style.display = 'none';
document.getElementById('truematrimony-basic-info').style.display = 'inline';
}

function cancelContactForm() {
document.getElementById('matrimony-contact-edit-info').style.display = 'none';
document.getElementById('matrimony-contact-info').style.display = 'inline';
}
</script>

<!-- profile member information row-fluid div starts -->
<div class="row-fluid truematrimony-profile">
		
	<!-- truematrimony profile head-->
	<h5 class="truematrimony_profile_head" style="color:#F89406;"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_MEMBER_HEAD'); ?></h5>

	<!-- profile member photo div starts -->
	<div class="span2">
		
		<form class="adminForm form-horizontal truematrimony-profile-info" id="adminForm" name="adminForm" method="post" enctype="multipart/form-data">
		
		<!-- profile member default image -->
		<?php
			if($itemval['profile_img']!="") {			
			$path = JUri::root().'/media/truematrimony/profiles/profile_'.$itemval['truematrimony_profile_id'].'/thumbs/'.$itemval['profile_img'];	
		    } else {
		    	if($itemval['gender']==1) {
			       $path = JURI::root().'/components/com_truematrimony/helpers/images/no-avatar.jpg';
		    	} else {
		    	   $path = JURI::root().'/components/com_truematrimony/helpers/images/no-female.png';
		    	}		    	
		    }			
		 ?>		
		<img src="<?php echo $path;?>" class="">
			
			<!-- upload profile -->			
			<a href="#uploadprofile" data-toggle="modal"><?php echo JText::_('COM_TRUEMATRIMONY_CHANGE_PROFILE_PICTURE'); ?></a>
			
			<!--
			<input type="file" name="file" id="file" />
			-->
								        
        <!-- modal div starts -->				
		<div class="modal hide fade" id="uploadprofile">
			
			<!-- modal header div -->
			<div class="modal-header">
				<h5><?php echo JText::_('COM_TRUEMATRIMONY_UPLOAD_PROFILE_PICTURE'); ?></h5>
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
		<input type="hidden" name="view" value="member"/>
		<input type="hidden" id="task" name="task" value="uploadpicture"/>
		<input type="hidden" name="layout" value="item_member"/>	
		<input type="hidden" name="truematrimony_profile_id" id="truematrimony_profile_id" value="<?php echo $itemval['truematrimony_profile_id']; ?>" >	
		    
	   </form>   
	      
	 </div><!-- profile member photo div ends -->
	
	<!-- profile member information div starts -->
	<div class="span9">
	
	  <!-- true matrimony basic information strts -->
	  <div class="truematrimony-basic-info" id="truematrimony-basic-info">
		  		
		<!-- matrimony family informations heading -->
		<div class="matrimony-education-head">
			<h5 class="basic-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_BASIC_INFORMATIONS'); ?></u></h5>
			<input type="button" class="btn btn-primary" id="editbtn" name="editbtn" onclick="showBasicForm()" value="<?php echo JText::_('COM_TRUEMATRIMONY_EDIT_PROFILES'); ?>" style="float:right; margin-right:10px;">
		</div>   
	        
	    <!-- profile id control group div starts -->
	    <?php if(!empty($itemval['truematrimony_profile_id'])) : ?>
		<div class="control-group">
					
			<!-- profile id label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_ID');?></label>
					
			<!-- member control groups -->
			<div class="control-groups">	
				<?php				
				if($itemval['gender']==1) {
					echo "M".$itemval['truematrimony_profile_id'];
				} else {
					echo "F".$itemval['truematrimony_profile_id'];		
				}		
				?>
			</div>
									
		</div><!-- profile id control group div starts -->
		<?php endif; ?>	
		
		<!-- member control group div starts -->
		<?php if(!empty($itemval['profile_name'])) : ?>
		<div class="control-group">
			
			<!-- member label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_NAME');?></label>
			
			<!-- member control groups -->
			<div class="control-groups">			    
				<?php echo $itemval['profile_name']; ?>
			</div>
						
		</div><!-- member control group div starts -->
		<?php endif; ?>	
		
		<!-- profile gender control group div starts -->
		<?php if(!empty($itemval['gender'])) : ?>
		<div class="control-group">
			
			<!-- gender label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_GENDER');?></label>
			
			<!-- member gender control groups -->
			<div class="control-groups">
				<?php if($itemval['gender']==1) {
					   echo JText::_("COM_TRUEMATRIMONY_MALE");
				   } else {
						echo JText::_("COM_TRUEMATRIMONY_FEMALE");
				   }
				?>							
			</div>
						
		</div><!-- member gender control group div starts -->	
		<?php endif; ?>
		
		<!-- profile date of birth control group div starts -->
		<?php if(!empty($itemval['dob'])) : ?>
		<div class="control-group">
			
			<!-- date of birth label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_DOB');?></label>
			
			<!-- member date of birth control groups -->
			<div class="control-groups">
				<?php echo $itemval['dob']; ?>
			</div>
						
		</div><!-- member date of birth control group div starts -->
		<?php endif; ?>
		
		<!-- profile age control group div starts -->
		<?php if(!empty($itemval['dob'])) :?>
		<div class="control-group">
								
			<?php 
						
			/**
			 * 
			 * @var $bday Get birth of date.
			 */	
			$bday = new DateTime($itemval['dob']);
			
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
			?>
			
			<!-- profile age label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_AGE');?></label>
			
			<!-- profile age control groups -->
			<div class="control-groups">
				<?php //echo $diff->y." Years , ".$diff->m." Months , ".$diff->d." Days " ; ?>
				<?php 
				if($diff->y==0) {
					echo $diff->m." Months, ".$diff->d." Days ";
					
				} else {
					echo $diff->y." years";
				}
				?>
			</div>
						
		</div><!-- profile age control group div starts -->
		<?php endif; ?>		
		
		</div><!-- true matrimony basic information ends -->		
		
	  <!-- true matrimony edit basic information strts -->
	  <div class="matrimony-basic-edit-info" id="matrimony-basic-edit-info">
	        
	    <!-- matrimony basic information form starts -->    
	    <form name="adminForm" id="adminForm" method="post">
			
		 <!-- matrimony family informations heading -->
		 <div class="matrimony-education-head">
			<h5 class="basic-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_BASIC_INFORMATIONS'); ?></u></h5>
	        <input type="button" class="btn btn-primary" id="editbtn" name="editbtn" onclick="cancelBasicForm()" value="<?php echo JText::_('COM_TRUEMATRIMONY_EDIT_PROFILES_CANCEL'); ?>" style="float:right; margin-right:10px;">
     	    <button type="submit" class="btn btn-warning" style="float:right; margin-right:10px;"><?php echo JText::_('COM_TRUEMATRIMONY_SAVE_PROFILE_INFORMATIONS'); ?></button>
		 </div> 

	        
	    <!-- profile id control group div starts -->
	    <div class="control-group">
					
			<!-- profile id label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_ID');?></label>
					
			<!-- member control groups -->
			<div class="control-groups">	
				<?php				
				if($itemval['gender']==1) {
					echo "M".$itemval['truematrimony_profile_id'];
				} else {
					echo "F".$itemval['truematrimony_profile_id'];		
				}		
				?>
				 
			</div>
									
		</div><!-- profile id control group div starts -->
				
		<!-- member control group div starts -->
		<div class="control-group">
			
			<!-- member label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_NAME');?></label>
			
			<!-- member control groups -->
			<div class="control-groups">			    
				<input type="text" name="profile_name" id="profile_name" value="<?php echo $itemval['profile_name']; ?>" >
			</div>
						
		</div><!-- member control group div starts -->
						
		<!-- profile date of birth control group div starts -->
		<div class="control-group">
			
			<!-- date of birth label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_DOB');?></label>
			
			<!-- member date of birth control groups -->
			<div class="control-groups">
				<?php echo JHTML::_('calendar', $itemval['dob'], 'dob','dob','%Y-%m-%d',array('class'=>'input-small'),'size="10" ');
                 ?>
			</div>
						
		</div><!-- member date of birth control group div starts -->
				
		<!-- profile age control group div starts -->
		<div class="control-group">
								
			<?php 
						
			/**
			 * 
			 * @var $bday Get birth of date.
			 */	
			$bday = new DateTime($itemval['dob']);
			
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
			?>
			
			<!-- profile age label -->
			<label class="control-label"><?php //echo JText::_('COM_TRUEMATRIMONY_PROFILE_AGE');?></label>
			
			<!-- profile age control groups -->
			<div class="control-groups">
				<?php //echo $diff->y." Years , ".$diff->m." Months , ".$diff->d." Days " ; ?>
				<?php 
				if($diff->y==0) {
					//echo $diff->m." Months, ".$diff->d." Days ";
					
				} else {
					//echo $diff->y." years";
				}
				?>
			</div>
						
		</div><!-- profile age control group div starts -->
		
		<input type="hidden" name="option" value="com_truematrimony"/>
		<input type="hidden" name="view" value="member"/>
		<input type="hidden" id="task" name="task" value="updatefamilyinfo"/>
		<input type="hidden" name="layout" value="item_member"/>	
		<input type="hidden" name="truematrimony_profile_id" id="truematrimony_profile_id" value="<?php echo $itemval['truematrimony_profile_id']; ?>" >	
		
		</form><!-- matrimony basic information form starts -->
				
		</div><!-- true matrimony basic information ends -->
		
		    
	    <!-- profile additional information div starts -->
	    <div class="additional-info" id="additional-info">
	    	
		<!-- nav tabs starts -->
		<!-- <ul class="nav nav-pills nav-stacked" id="myTab">
		-->	
		
		<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
			
			<li class="active">
				<a href="#matrimony-contact-info" data-toggle="tab"><?php echo "Contact"; ?></a>
			</li>
			
			<li>
				<a href="#matrimony-family-info" data-toggle="tab"><?php echo "Family"; ?></a>
			</li>
				
			<li >
				<a href="#matrimony-raasi-info" data-toggle="tab"><?php echo "Raasi"; ?></a>
			</li>
			
			<li>
				<a href="#matrimony-additional-infos" data-toggle="tab"><?php echo "Additional Info"; ?></a>
			</li>
			
			<li>
				<a href="#matrimony-education-info" data-toggle="tab"><?php echo "Education"; ?></a>
			</li>
			
			<li>
				<a href="#matrimony-physical-info" data-toggle="tab"><?php echo "Physical"; ?></a>
			</li>	
						
		</ul><!-- nav tabs ends -->
		
		 <div id="my-tab-content" class="tab-content">
			 
			<!-- contact information div starts --> 
			<div class="tab-pane active matrimony-contact-info" id="matrimony-contact-info">
				
				<!-- matrimony family informations heading -->
				<div class="matrimony-education-head">
					<h5 class="basic-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_CONTACT_INFORMATIONS'); ?></u></h5>
					<input type="button" class="btn btn-primary" id="editbtn" name="editbtn" onclick="showContactForm()" value="<?php echo JText::_('COM_TRUEMATRIMONY_EDIT_PROFILES'); ?>" style="float:right; margin-right:10px;">
				</div> 
			 
		 <!-- profile email control group div starts -->
        <?php if(!empty($itemval['email'])) : ?>
		<div class="control-group">
			
			<!-- email label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_EMAIL');?></label>
			
			<!-- member email control groups -->
			<div class="control-groups">
				<?php echo $itemval['email']; ?>
			</div>
						
		</div><!-- member email control group div starts -->
		<?php endif;  ?>
		
		<!-- profile mobile number control group div starts -->
		<?php if(!empty($itemval['mobile_number'])) : ?>
		<div class="control-group">
			
			<!-- profile mobile number label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_MOBILE_NUMBER');?></label>
			
			<!-- profile mobile number control groups -->
			<div class="control-groups">
				<?php echo $itemval['mobile_number']; ?>
			</div>
						
		</div><!-- profile mobile number control group div starts -->
		<?php endif; ?>
	    
	    <?php if(!empty($itemval['religion_id'])) : ?>
	    <!-- profile religion control group div starts -->
		<div class="control-group">
			
			<!-- religion label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_RELIGION');?></label>
			
			<!-- member religion control groups -->
			<div class="control-groups">
			<?php 
			      $result = TrueMatrimonyHelperSelect::getReligionlist('religion_id','', $itemval['religion_id']);
			      echo $result[$itemval['religion_id']];
		    ?>			
			</div>
						
		</div><!-- member religion control group div starts -->
		<?php endif; ?>
		
		<!-- profile mothertongue id control group div starts -->
		<?php if(!empty($itemval['mothertongue_id'])) : ?>
		<div class="control-group">
			
			<!-- profile mother tongue  label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_MOTHER_TONGUE');?></label>
			
			<!-- profile mother tongue  control groups -->
			<div class="control-groups">
				<?php 
					$result=TrueMatrimonyHelperSelect::getMothertongueslist('mothertongue_id', '', $itemval['mothertongue_id']);
					echo $result[$itemval['mothertongue_id']]; 
				?>
			</div>
						
		</div><!-- profile mother tongue control group div starts -->
		<?php endif; ?>
		
		<!-- profile caste id control group div starts -->
		<?php if(!empty($itemval['caste_id'])) : ?>
		<div class="control-group">
			
			<!-- profile caste id label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_CASTE');?></label>
			
			<!-- profile caste id control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getCastelist('caste_id','',$itemval['caste_id']);
					echo $result[$itemval['caste_id']]; 
				?>
			</div>
						
		</div><!-- profile caste id control group div starts -->
		<?php endif; ?>
		
		<!-- profile country id control group div starts -->
		<?php if(!empty($itemval['country_id'])) : ?>
		<div class="control-group">
			
			<!-- profile country id label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_COUNTRY');?></label>
			
			<!-- profile country id control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getCountrylist('country_id','',$itemval['country_id']);
					echo $result[$itemval['country_id']]; 
				?>
			</div>
						
		</div><!-- profile country id control group div starts -->   
		<?php endif; ?>
         
        </div><!-- contact information div ends --> 
        
        <!-- edit contact information div starts --> 
		<div class="matrimony-contact-edit-info" id="matrimony-contact-edit-info">
				
		 <!-- edit contact form starts -->		 
		 <form name="adminForm" id="adminForm" method="post">
						
		 <!-- matrimony family informations heading -->
		 <div class="matrimony-education-head">
			<h5 class="basic-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_CONTACT_INFORMATIONS'); ?></u></h5>
	        <input type="button" class="btn btn-primary" id="editbtn" name="editbtn" onclick="cancelContactForm()" value="<?php echo JText::_('COM_TRUEMATRIMONY_EDIT_PROFILES_CANCEL'); ?>" style="float:right; margin-right:10px;">
     	    <button type="submit" class="btn btn-warning" style="float:right; margin-right:10px;"><?php echo JText::_('COM_TRUEMATRIMONY_SAVE_PROFILE_INFORMATIONS'); ?></button>
		 </div> 
			 
		 <!-- profile email control group div starts -->
         <div class="control-group">
			
			<!-- email label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_EMAIL');?></label>
			
			<!-- member email control groups -->
			<div class="control-groups">
				<input type="text" name="email" id="email" value="<?php echo $itemval['email']; ?>" >
			</div>
						
		</div><!-- member email control group div starts -->
			
		<!-- profile mobile number control group div starts -->
		<div class="control-group">
			
			<!-- profile mobile number label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_MOBILE_NUMBER');?></label>
			
			<!-- profile mobile number control groups -->
			<div class="control-groups">
				<input type="text" name="mobile_number" id="mobile_number" value="<?php echo $itemval['mobile_number']; ?>" >
			</div>
						
		</div><!-- profile mobile number control group div starts -->
		
	    <!-- profile religion control group div starts -->
		<div class="control-group">
			
			<!-- religion label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_RELIGION');?></label>
			
			<!-- member religion control groups -->
			<div class="control-groups">
			<?php 
			      $result = TrueMatrimonyHelperSelect::getReligionlist('religion_id','', $itemval['religion_id']);
			      echo JHtml::_('select.genericlist', $result, 'religion_id', 'text', $result[$itemval['religion_id']]);
		    ?>			
			</div>
						
		</div><!-- member religion control group div starts -->
				
		<!-- profile mothertongue id control group div starts -->
		<div class="control-group">
			
			<!-- profile mother tongue  label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_MOTHER_TONGUE');?></label>
			
			<!-- profile mother tongue  control groups -->
			<div class="control-groups">
				<?php 
					$result=TrueMatrimonyHelperSelect::getMothertongueslist('mothertongue_id', '', $itemval['mothertongue_id']);
					echo JHtml::_('select.genericlist', $result, 'mothertongue_id', 'text', $result[$itemval['mothertongue_id']]);
				?>
			</div>
						
		</div><!-- profile mother tongue control group div starts -->
				
		<!-- profile caste id control group div starts -->
		<div class="control-group">
			
			<!-- profile caste id label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_CASTE');?></label>
			
			<!-- profile caste id control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getCastelist('caste_id','',$itemval['caste_id']);
					echo JHtml::_('select.genericlist', $result, 'caste_id', 'text', $result[$itemval['caste_id']]);
				?>
			</div>
						
		</div><!-- profile caste id control group div starts -->
				
		<!-- profile country id control group div starts -->
		<div class="control-group">
			
			<!-- profile country id label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_COUNTRY');?></label>
			
			<!-- profile country id control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getCountrylist('country_id','',$itemval['country_id']);
					echo JHtml::_('select.genericlist', $result, 'country_id', 'text', $result[$itemval['country_id']]);
				?>
			</div>
						
		</div><!-- profile country id control group div starts -->   
				
		<input type="hidden" name="option" value="com_truematrimony"/>
		<input type="hidden" name="view" value="member"/>
		<input type="hidden" id="task" name="task" value="updatefamilyinfo"/>
		<input type="hidden" name="layout" value="item_member"/>	
		<input type="hidden" name="truematrimony_profile_id" id="truematrimony_profile_id" value="<?php echo $itemval['truematrimony_profile_id']; ?>" >	
		</form><!-- edit contact form ends -->
         
        </div><!-- edit contact information div ends --> 

		<!-- matrimony family informations div starts -->
	    <div class="tab-pane" id="matrimony-family-info">
	    
	        <!-- matrimony family informations heading -->
			<div class="matrimony-education-head">
				<h5 class="basic-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_FAMILY_INFORMATIONS'); ?></u></h5>
				<input type="button" class="btn btn-primary" id="editbtn" name="editbtn" onclick="showEditForm()" value="<?php echo JText::_('COM_TRUEMATRIMONY_EDIT_PROFILES'); ?>" style="float:right; margin-right:10px;">
			</div>
	   
	        <?php if(!empty($itemval['father_name'])) : ?>
	        <!-- control group father name div starts -->
			<div class="control-group">
				
				<!-- register father name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_FATHER_NAME')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_FATHER_NAME'); ?>
				</label>
				<!-- register father name div starts -->
				<div class="controls">
					<?php echo $itemval['father_name']; ?>			
				</div>
			
			</div><!-- control group father name div ends -->
			<?php endif; ?>
			
			<?php if(!empty($itemval['mother_name'])) : ?>
			<!-- control group mother name div starts -->
			<div class="control-group">
				
				<!-- register mother name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_MOTHER_NAME')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_MOTHER_NAME'); ?>
				</label>
				<!-- register mother name div starts -->
				<div class="controls">
					<?php echo $itemval['mother_name']; ?>			
				</div>
			
			</div><!-- control group mother name div ends -->
			<?php endif; ?>
			
			<?php if(!empty($itemval['siblings_members'])) : ?>
			<!-- control group siblings div starts -->
			<div class="control-group">
				
				<!-- register siblings label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_SIBLINGS')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_SIBLINGS'); ?>
				</label>
				<!-- register siblings div starts -->
				<!-- <div class="controls">
					<input type="checkbox" class="matrimony-reg-name has-error" id="sibling_brother" name="sibling_brother" value="<?php echo $this->item->sibling_brother; ?>" ><?php echo JText::_('COM_MATRIMONY_REGISTER_SIBLING_BROTHER'); ?>			
				    <input type="checkbox" class="matrimony-reg-name has-error" id="sibling_sister" name="sibling_sister" value="<?php echo $this->item->sibling_sister; ?>" ><?php echo JText::_('COM_MATRIMONY_REGISTER_SIBLING_SISTER'); ?>
				</div> -->
				
				<!-- register siblings_members div starts -->
				<div class="controls">
					<?php echo $itemval['siblings_members']; ?>			
				</div>
			
			</div><!-- control group siblings div ends -->
			<?php endif; ?>
			
			<?php if(!empty($itemval['birth_time'])) : ?>			
			<!-- control group birth time div starts -->
			<div class="control-group">
				
				<!-- register birth time label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_BIRTH_TIME')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_BIRTH_TIME'); ?>
				</label>
				<!-- register mother name div starts -->
				<div class="controls">
					<?php echo $itemval['birth_time']; ?>			
				</div>
			
			</div><!-- control group mother name div ends -->
			<?php endif; ?>
			
			<?php if(!empty($itemval['birth_place'])) : ?>			
			<!-- control group birth place name div starts -->
			<div class="control-group">
				
				<!-- register birth place name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_BIRTH_PLACE')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_BIRTH_PLACE_NAME'); ?>
				</label>
				<!-- register birth place name div starts -->
				<div class="controls">
					<?php echo $itemval['birth_place']; ?>			
				</div>
			
			</div><!-- control group kovil name div ends -->
			<?php endif; ?>
			
			<?php if(!empty($itemval['native'])) : ?>	
			<!-- control group native div starts -->
			<div class="control-group">
				
				<!-- register native label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_NATIVE')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_NATIVE'); ?>
				</label>
				<!-- register native div starts -->
				<div class="controls">
					<?php echo $itemval['native']; ?>			
				</div>
			
			</div><!-- control native name div ends -->
			<?php endif; ?>
			
			<?php if(!empty($itemval['bloodgroup_id'])) : ?>	
			<!-- control group blood group name div starts -->
			<div class="control-group">
				
				<!-- register blood group name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_BLOOD_GROUP_NAME')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_BLOOD_GROUP_NAME'); ?>
				</label>
							
				<!-- country select list -->
				<div class="controls">
					<?php 
						$result = TrueMatrimonyHelperSelect::getBloodgroup('bloodgroup_id', '', $itemval['bloodgroup_id']);
						echo $result[$itemval['bloodgroup_id']];
					?>
				</div>
			
			</div><!-- control group blood group name div ends -->	
			<?php endif; ?>
	
	    </div><!-- matrimony family informations div ends -->
	    
	    <!-- matrimony family informations div starts -->
	    <div class="matrimony-edit-forms" id="matrimony-edit-forms">
	    
	       <form name="adminForm" id="adminForm" method="post">
			   
	        <!-- matrimony family informations heading -->
			<div class="matrimony-education-head">
				<h5 class="basic-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_FAMILY_INFORMATIONS'); ?></u></h5>
			    <input type="button" class="btn btn-primary" id="editbtn" name="editbtn" onclick="cancelFamilyForm()" value="<?php echo JText::_('COM_TRUEMATRIMONY_EDIT_PROFILES_CANCEL'); ?>" style="float:right; margin-right:10px;">
   		        <button type="submit" class="btn btn-warning" style="float:right; margin-right:10px;"><?php echo JText::_('COM_TRUEMATRIMONY_SAVE_PROFILE_INFORMATIONS'); ?></button>
   		    </div>
	   
	        <!-- control group father name div starts -->
			<div class="control-group">
				
				<!-- register father name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_FATHER_NAME')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_FATHER_NAME'); ?>
				</label>
				<!-- register father name div starts -->
				<div class="controls">
					<input type="text" name="father_name" id="father_name" value="<?php echo $itemval['father_name']; ?>">		
				</div>
			
			</div><!-- control group father name div ends -->
			
			<!-- control group mother name div starts -->
			<div class="control-group">
				
				<!-- register mother name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_MOTHER_NAME')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_MOTHER_NAME'); ?>
				</label>
				<!-- register mother name div starts -->
				<div class="controls">
					<input type="text" name="mother_name" id="mother_name" value="<?php echo $itemval['mother_name']; ?>" >			
				</div>
			
			</div><!-- control group mother name div ends -->
			
			<!-- control group siblings div starts -->
			<div class="control-group">
				
				<!-- register siblings label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_SIBLINGS')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_SIBLINGS'); ?>
				</label>
				<!-- register siblings div starts -->
				<!-- <div class="controls">
					<input type="checkbox" class="matrimony-reg-name has-error" id="sibling_brother" name="sibling_brother" value="<?php echo $this->item->sibling_brother; ?>" ><?php echo JText::_('COM_MATRIMONY_REGISTER_SIBLING_BROTHER'); ?>			
				    <input type="checkbox" class="matrimony-reg-name has-error" id="sibling_sister" name="sibling_sister" value="<?php echo $this->item->sibling_sister; ?>" ><?php echo JText::_('COM_MATRIMONY_REGISTER_SIBLING_SISTER'); ?>
				</div> -->
				
				<!-- register siblings_members div starts -->
				<div class="controls">
					<input type="text" name="siblings_members" id="siblings_members" value="<?php echo $itemval['siblings_members']; ?>" >			
				</div>
			
			</div><!-- control group siblings div ends -->
			
			<!-- control group birth time div starts -->
			<div class="control-group">
				
				<!-- register birth time label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_BIRTH_TIME')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_BIRTH_TIME'); ?>
				</label>
				<!-- register mother name div starts -->
				<div class="controls">
					<input type="text" name="birth_time" id="birth_time" value="<?php echo $itemval['birth_time']; ?>" >			
				</div>
			
			</div><!-- control group mother name div ends -->
					
			<!-- control group birth place name div starts -->
			<div class="control-group">
				
				<!-- register birth place name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_BIRTH_PLACE')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_BIRTH_PLACE_NAME'); ?>
				</label>
				<!-- register birth place name div starts -->
				<div class="controls">
					<input type="text" name="birth_place" id="birth_place" value="<?php echo $itemval['birth_place']; ?>" >			
				</div>
			
			</div><!-- control group kovil name div ends -->
			
			<!-- control group native div starts -->
			<div class="control-group">
				
				<!-- register native label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_NATIVE')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_NATIVE'); ?>
				</label>
				<!-- register native div starts -->
				<div class="controls">
					<input type="text" name="native" id="native" value="<?php echo $itemval['native']; ?>">			
				</div>
			
			</div><!-- control native name div ends -->
			
			<!-- control group blood group name div starts -->
			<div class="control-group">
				
				<!-- register blood group name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_BLOOD_GROUP_NAME')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_BLOOD_GROUP_NAME'); ?>
				</label>
							
				<!-- country select list -->
				<div class="controls">
					<?php 
						$result = TrueMatrimonyHelperSelect::getBloodgroup('bloodgroup_id', '', $itemval['bloodgroup_id']);
						echo JHtml::_('select.genericlist', $result, 'bloodgroup_id', 'text', $result[$itemval['bloodgroup_id']]);
					?>
				</div>
			
			</div><!-- control group blood group name div ends -->	
			
			<input type="hidden" name="option" value="com_truematrimony"/>
			<input type="hidden" name="view" value="member"/>
			<input type="hidden" id="task" name="task" value="updatefamilyinfo"/>
			<input type="hidden" name="layout" value="item_member"/>	
			<input type="hidden" name="truematrimony_profile_id" id="truematrimony_profile_id" value="<?php echo $itemval['truematrimony_profile_id']; ?>" >	
			</form>
	
	    </div><!-- matrimony family informations div ends -->
	    	    
	   <!-- matrimony raasi information div starts -->  
	   <div class="tab-pane matrimony-raasi-info" id="matrimony-raasi-info">
		      
	        <!-- matrimony raasi informations heading -->
			<div class="matrimony-raasi-head">
				<h5 class="raasi-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_RAASI_INFORMATIONS'); ?></u></h5>
			    <input type="button" class="btn btn-primary" id="editbtn" name="editbtn" onclick="showEditRaasiForm()" value="<?php echo JText::_('COM_TRUEMATRIMONY_EDIT_PROFILES'); ?>" style="float:right; margin-right:10px;">
         	</div>
	    
	        <?php if(!empty($itemval['janmaraase_id'])) : ?>
	    	<!-- register janma raasi div starts -->
			<div class="control-group">
				
				<!-- register janma raasi label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_RAASI')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_RAASI'); ?>
				</label>
				
				<!-- country select list -->
				<div class="controls raasi-form" id="raasi-form">
					<?php 
						$result = TrueMatrimonyHelperSelect::getJanmaraasi('janmaraase_id', '', $itemval['janmaraase_id']);
						echo $result[$itemval['janmaraase_id']];
					?>
				</div>
						    
			</div><!-- register janma raasi div ends -->
			<?php endif; ?>
			
			<?php if(!empty($itemval['janma_lagnam'])) : ?>
			<!-- control group janma lagna div starts -->
			<div class="control-group">
				
				<!-- register janma lagna label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_LAGNA')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_LAGNA'); ?>
				</label>
				
				<!-- register janma lagna div starts -->
				<div class="controls raasi-form" id="raasi-form-lagnam">
					<?php echo $itemval['janma_lagnam']; ?>			
				</div>
							
			</div><!-- control group janma lagna div ends -->
			<?php endif; ?>
							
			<?php if(!empty($itemval['janma_nakshatra'])) : ?>
			<!-- control group janma nakshatra div starts -->
			<div class="control-group">
				
				<!-- register janma nakshatra label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_NAKSHATRA')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_NAKSHATRA'); ?>
				</label>
				
				<!-- register janma nakshatra div starts -->
				<div class="controls raasi-form" id="raasi-form-nakshatram">
					<?php echo $itemval['janma_nakshatra']; ?>			
				</div>
				
			</div><!-- control group janma nakshatra div ends -->
			<?php endif; ?>
			
			<?php if(!empty($itemval['temple_name'])) : ?>	
			<!-- control group temple name div starts -->
			<div class="control-group">
				
				<!-- register temple name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_TEMPLE_NAME')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_TEMPLE_NAME'); ?>
				</label>
				<!-- register temple name div starts -->
				<div class="controls raasi-form" id="raasi-form-temple">
					<?php echo $itemval['temple_name']; ?>		
				</div>
						
			</div><!-- control group temple name div ends -->
			<?php endif; ?>
			
			<?php if(!empty($itemval['ragu_gathu'])) : ?>	
			<!-- control group ragu & gathu name div starts -->
			<div class="control-group">
				
				<!-- register ragu & gathu name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_RAGU_AND_GATHU_OPTION')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_RAGU_AND_GATHU_OPTION'); ?>
				</label>
				
				<!-- register ragu & gathu name div starts -->
				<div class="controls raasi-form" id="raasi-form-ragu-gathu">
					<?php echo $itemval['ragu_gathu']; ?>			
				</div>
						
			</div><!-- control group ragu & gathu name div ends -->
			<?php endif; ?>
			
			<?php if(!empty($itemval['sevai_opt'])) : ?>
			<!-- control group sevai name div starts -->
			<div class="control-group">
				
				<!-- register sevai name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_SEVAI')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_SEVAI'); ?>
				</label>
				
				<!-- register sevai name div starts -->
				<div class="controls raasi-form" id="raasi-form-sevai">
					<?php echo $itemval['sevai_opt']; ?>			
				</div>
				   
			</div><!-- control group sevai name div ends -->	
			<?php endif; ?>
			
			<?php if(!empty($itemval['pavagam_change'])) : ?>
			<!-- control group pavagam change div starts -->
			<div class="control-group">
				<!-- register pavagam change label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_PAVAGAM_CHANGE')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_PAVAGAM_CHANGE'); ?>
				</label>
				
				<!-- register pavagam change div starts -->
				<div class="controls raasi-form" id="raasi-form-pavagam">
					<?php echo $itemval['pavagam_change']; ?>			
				</div>			
							
			</div><!-- control group pavagam change div ends -->
			<?php endif; ?>
			
			<?php if(!empty($itemval['janana_kalam'])) : ?>
			<!-- control group janana kaala Dasai erupu div starts -->
			<div class="control-group">
				
				<!-- register janana kaala Dasai erupu label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANANA_KAALA_DASAI_ERUPU')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANANA_KAALA_DASAI_ERUPU'); ?>
				</label>
				
				<!-- register janana kaala Dasai erupu div starts -->
				<div class="controls raasi-form" id="raasi-form-kalam">
					<?php echo $itemval['janana_kalam']; ?>			
				</div>
						
			</div><!-- control group janana kaala Dasai erupu div ends -->
			<?php endif; ?>			
			
			<?php if(!empty($itemval['dasa_bukthi'])) : ?>
			<!-- control group end of nadaapu dasa bukthi div starts -->
			<div class="control-group">
				
				<!-- register end of nadaapu dasa bukthi label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_NADAAPU_DASA_BUKTHI')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_NADAAPU_DASA_BUKTHI'); ?>
				</label>
				
				<!-- register end of dasa bukthi div starts -->
				<div class="controls raasi-form" id="raasi-form-bukthi">
					<?php echo $itemval['dasa_bukthi']; ?>			
				</div>
						
			</div><!-- control group end of nadaapu dasa bukthi div ends -->
			<?php endif; ?>	
			
		</div><!-- matrimony raasi information div ends -->
	    
	   <!-- matrimony raasi information div starts -->  
	   <div class="matrimony-raasi-edit-info" id="matrimony-raasi-edit-info">
		   
		   <form name="adminForm" id="adminForm" method="post">
	   
	        <!-- matrimony raasi informations heading -->
			<div class="matrimony-raasi-head">
				<h5 class="raasi-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_RAASI_INFORMATIONS'); ?></u></h5>
   		        <input type="button" class="btn btn-primary" id="editbtn" name="editbtn" onclick="cancelRaasiForm()" value="<?php echo JText::_('COM_TRUEMATRIMONY_EDIT_PROFILES_CANCEL'); ?>" style="float:right; margin-right:10px;">
 			    <button type="submit" class="btn btn-warning" style="float:right; margin-right:10px;"><?php echo JText::_('COM_TRUEMATRIMONY_SAVE_PROFILE_INFORMATIONS'); ?></button>
			</div>
	    
	    	<!-- register janma raasi div starts -->
			<div class="control-group">
				
				<!-- register janma raasi label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_RAASI')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_RAASI'); ?>
				</label>
							
				<!-- country select list -->
				<div class="controls edit-raasi-form" id="edit-raasi-form">
					<?php 
						$result = TrueMatrimonyHelperSelect::getJanmaraasi('janmaraase_id', '', $itemval['janmaraase_id']);
						echo JHtml::_('select.genericlist', $result, 'janmaraase_id', 'text', $result[$itemval['janmaraase_id']]);
						?>
				</div>			
			    
			</div><!-- register janma raasi div ends -->
			
			<!-- control group janma lagna div starts -->
			<div class="control-group">
				
				<!-- register janma lagna label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_LAGNA')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_LAGNA'); ?>
				</label>
				
				<!-- register janma lagna div starts -->
				<div class="controls edit-raasi-form-lagnam" id="edit-raasi-form-lagnam">
					<input type="text" name="janma_lagnam" id="janma_lagnam" value="<?php echo $itemval['janma_lagnam']; ?>" >			
				</div>
			
			</div><!-- control group janma lagna div ends -->
			
			<!-- control group janma nakshatra div starts -->
			<div class="control-group">
				
				<!-- register janma nakshatra label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_NAKSHATRA')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_NAKSHATRA'); ?>
				</label>
						
				<!-- register janma nakshatra div starts -->
				<div class="controls edit-raasi-form nakshatram" id="edit-raasi-form-nakshatram">
					<input type="text" name="janma_nakshatra" id="janma_nakshatra" value="<?php echo $itemval['janma_nakshatra']; ?>" >			
				</div>
			
			</div><!-- control group janma nakshatra div ends -->
			
			<!-- control group temple name div starts -->
			<div class="control-group">
				
				<!-- register temple name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_TEMPLE_NAME')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_TEMPLE_NAME'); ?>
				</label>
							
				<div class="controls edit-raasi-form-temple" id="edit-raasi-form-temple">
					<input type="text" name="temple_name" id="temple_name" value="<?php echo $itemval['temple_name']; ?>" >			
				</div>				
			
			</div><!-- control group temple name div ends -->
			
			<!-- control group ragu & gathu name div starts -->
			<div class="control-group">
				
				<!-- register ragu & gathu name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_RAGU_AND_GATHU_OPTION')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_RAGU_AND_GATHU_OPTION'); ?>
				</label>
							
				<!-- register ragu & gathu name div starts -->
				<div class="controls edit-raasi-form-ragu-gathu" id="edit-raasi-form-ragu-gathu">
					<input type="text" name="ragu_gathu" id="ragu_gathu" value="<?php echo $itemval['ragu_gathu']; ?>" >			
				</div>
			
			</div><!-- control group ragu & gathu name div ends -->
			
			<!-- control group sevai name div starts -->
			<div class="control-group">
				
				<!-- register sevai name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_SEVAI')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_SEVAI'); ?>
				</label>
						
			    <!-- register sevai name div starts -->
				<div class="controls edit-raasi-form-sevai" id="edit-raasi-form-sevai">
					<input type="text" name="sevai_opt" id="sevai_opt" value="<?php echo $itemval['sevai_opt']; ?>" >			
				</div>
			
			</div><!-- control group sevai name div ends -->	
			
			<!-- control group pavagam change div starts -->
			<div class="control-group">
				<!-- register pavagam change label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_PAVAGAM_CHANGE')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_PAVAGAM_CHANGE'); ?>
				</label>
							
				<!-- register pavagam change div starts -->
				<div class="controls edit-raasi-form-pavagam" id="edit-raasi-form-pavagam">
					<input type="text" name="pavagam_change" id="pavagam_change" value="<?php echo $itemval['pavagam_change']; ?>" >			
				</div>
				
			</div><!-- control group pavagam change div ends -->
			
			<!-- control group janana kaala Dasai erupu div starts -->
			<div class="control-group">
				
				<!-- register janana kaala Dasai erupu label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANANA_KAALA_DASAI_ERUPU')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANANA_KAALA_DASAI_ERUPU'); ?>
				</label>
							
				<!-- register janana kaala Dasai erupu div starts -->
				<div class="controls edit-raasi-form-kalam" id="edit-raasi-form-kalam">
					<input type="text" name="janana_kalam" id="janana_kalam" value="<?php echo $itemval['janana_kalam']; ?>" >			
				</div>				
			
			</div><!-- control group janana kaala Dasai erupu div ends -->
			
			<!-- control group end of nadaapu dasa bukthi div starts -->
			<div class="control-group">
				
				<!-- register end of nadaapu dasa bukthi label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_NADAAPU_DASA_BUKTHI')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_NADAAPU_DASA_BUKTHI'); ?>
				</label>
						
			    <!-- register end of dasa bukthi div starts -->
				<div class="controls edit-raasi-form-bukthi" id="edit-raasi-form-bukthi">
					<input type="text" name="dasa_bukthi" id="dasa_bukthi" value="<?php echo $itemval['dasa_bukthi']; ?>" >			
				</div>
				
			</div><!-- control group end of nadaapu dasa bukthi div ends -->	
			
			<input type="hidden" name="option" value="com_truematrimony"/>
			<input type="hidden" name="view" value="member"/>
			<input type="hidden" id="task" name="task" value="updatefamilyinfo"/>
			<input type="hidden" name="layout" value="item_member"/>	
			<input type="hidden" name="truematrimony_profile_id" id="truematrimony_profile_id" value="<?php echo $itemval['truematrimony_profile_id']; ?>" >	
			</form>
			
		</div><!-- matrimony raasi information div ends -->
	    
	    <!-- matrimony additional informations div starts -->
	    <div class="tab-pane" id="matrimony-additional-infos">
	    
	        <!-- matrimony additional informations heading -->
			<div class="matrimony-additional-head">
				<h5 class="raasi-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_ADDITIONAL_INFORMATIONS'); ?></u></h5>
			    <input type="button" class="btn btn-primary" id="editbtn" name="editbtn" onclick="showEditAdditForm()" value="<?php echo JText::_('COM_TRUEMATRIMONY_EDIT_PROFILES'); ?>" style="float:right; margin-right:10px;">
			</div>    
	    	       
		    <?php if(!empty($itemval['additional_info'])) : ?>
	    	<!-- control group additional information div starts -->
			<div class="control-group">
				
				<!-- register additional information label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_ADDITIONAL_INFORMATION')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_ADDITIONAL_INFORMATION'); ?>
				</label>
				<!-- register additional information div starts -->
				<div class="controls">
					<?php echo $itemval['additional_info']; ?>		
				</div>
			
			</div><!-- control group addition into div ends -->	
			<?php endif; ?>
			
			<?php if(!empty($itemval['expectations'])) : ?>
			<!-- control group expectations div starts -->
			<div class="control-group">
				
				<!-- register expectations label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_EXPECTATIONS')?>" >
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_EXPECTATIONS'); ?>
				</label>
				<!-- register expectations div starts -->
				<div class="controls">
					<?php echo $itemval['expectations']; ?>			
				</div>
			
			</div><!-- control group expectations into div ends -->	
	        <?php endif; ?>
	    
	    </div><!-- matrimony additional informations div ends -->	
	    
	    <!-- matrimony additional informations div starts -->
	    <div class="matrimony-additional-edit-info" id="matrimony-additional-edit-info">
	    
	     <!-- additional informations form starts -->
	     <form name="adminForm" id="adminForm" method="post">
			 
	        <!-- matrimony additional informations heading -->
			<div class="matrimony-additional-head">
				<h5 class="raasi-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_ADDITIONAL_INFORMATIONS'); ?></u></h5>
			    <input type="button" class="btn btn-primary" id="editbtn" name="editbtn" onclick="cancelAdditForm()" value="<?php echo JText::_('COM_TRUEMATRIMONY_EDIT_PROFILES_CANCEL'); ?>" style="float:right; margin-right:10px;">
 			    <button type="submit" class="btn btn-warning" style="float:right; margin-right:10px;"><?php echo JText::_('COM_TRUEMATRIMONY_SAVE_PROFILE_INFORMATIONS'); ?></button>
			</div>    
	    
	    	<!-- control group additional information div starts -->
			<div class="control-group">
				
				<!-- register additional information label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_ADDITIONAL_INFORMATION')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_ADDITIONAL_INFORMATION'); ?>
				</label>
				
				<!-- register additional information div starts -->
				<div class="controls">
					<textarea name="additional_info" id="additional_info"><?php echo $itemval['additional_info']; ?></textarea>		
				</div>
			
			</div><!-- control group addition into div ends -->	
			
			<!-- control group expectations div starts -->
			<div class="control-group">
				
				<!-- register expectations label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_EXPECTATIONS')?>" >
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_EXPECTATIONS'); ?>
				</label>
				
				<!-- register expectations div starts -->
				<div class="controls">
					<textarea name="expectations" id="expectations"><?php echo $itemval['expectations']; ?></textarea>			
				</div>
			
			</div><!-- control group expectations into div ends -->	
			
			<input type="hidden" name="option" value="com_truematrimony"/>
			<input type="hidden" name="view" value="member"/>
			<input type="hidden" id="task" name="task" value="updatefamilyinfo"/>
			<input type="hidden" name="layout" value="item_member"/>	
			<input type="hidden" name="truematrimony_profile_id" id="truematrimony_profile_id" value="<?php echo $itemval['truematrimony_profile_id']; ?>" >	
			
			</form><!-- additional informations form ends -->
	    
	    </div><!-- matrimony additional informations div ends -->	
		
		<div class="tab-pane matrimony-education-info" id="matrimony-education-info">		 
			
			<div class="matrimony-educate-head">
				<h5 class="basic-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_EDUCATION_AND_OCCUPATION'); ?></u></h5> 			 
				<input type="button" class="btn btn-primary" id="editbtn" name="editbtn" onclick="showEditEducateForm()" value="<?php echo JText::_('COM_TRUEMATRIMONY_EDIT_PROFILES'); ?>" style="float:right; margin-right:10px;">
            </div> 
						    
        <!-- profile highest education control group div starts -->
		<?php if(!empty($itemval['highesteducation_id'])) : ?>
		<div class="control-group">
			
			<!-- profile highest education label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_HIGHEST_EDUCATION');?></label>
			
			<!-- profile highest education control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getHighestedu('highestedu','', $itemval['highesteducation_id']);
					echo $result[$itemval['highesteducation_id']]; 
				?>
			</div>
						
		</div><!-- profile highest education control group div starts -->
		<?php endif; ?>
		
		<!-- profile occupation control group div starts -->
		<?php if(!empty($itemval['occupation_id'])) : ?>
		<div class="control-group">
			
			<!-- profile occupation label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_OCCUPATION');?></label>
			
			<!-- profile occupation control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getOccupationlist('occupation','', $itemval['occupation_id']);
					echo $result[$itemval['occupation_id']]; 
				?>
			</div>
						
		</div><!-- profile occupation control group div starts -->
		<?php endif; ?>
		
		<!-- profile employedin control group div starts -->
		<?php if(!empty($itemval['employedin_id'])) : ?>
		<div class="control-group">
			
			<!-- profile employedin label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_EMPLOYEDIN');?></label>
			
			<!-- profile employedin control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getEmployedinlist('employedin','', $itemval['employedin_id']);
					echo $result[$itemval['employedin_id']]; 
				?>
			</div>
									
		</div><!-- profile employedin control group div starts -->
		<?php endif; ?>
		
		<?php if(!empty($itemval['monthly_income'])) : ?>		     
		<!-- profile monthly income control group div starts -->
		<div class="control-group">
			
			<!-- profile monthly income label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_MONTHLY_INCOME');?></label>
			
			<!-- profile monthly income control groups -->
			<div class="control-groups">
				<?php echo $itemval['monthly_income']; ?>
			</div>
						
		</div><!-- profile monthly income control group div starts -->
		<?php endif; ?>	
        </div>		
        
        <div class="matrimony-education-edit-info" id="matrimony-education-edit-info">		 
			
			<!-- additional informations form starts -->
	     <form name="adminForm" id="adminForm" method="post">
			 
	        <!-- matrimony additional informations heading -->
			<div class="matrimony-additional-head">
				<h5 class="basic-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_EDUCATION_AND_OCCUPATION'); ?></u></h5> 			 
			    <input type="button" class="btn btn-primary" id="editbtn" name="editbtn" onclick="cancelEducateForm()" value="<?php echo JText::_('COM_TRUEMATRIMONY_EDIT_PROFILES_CANCEL'); ?>" style="float:right; margin-right:10px;">
 			    <button type="submit" class="btn btn-warning" style="float:right; margin-right:10px;"><?php echo JText::_('COM_TRUEMATRIMONY_SAVE_PROFILE_INFORMATIONS'); ?></button>
			</div>    
									    
        <!-- profile highest education control group div starts -->
		<div class="control-group">
			
			<!-- profile highest education label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_HIGHEST_EDUCATION');?></label>
			
			<!-- profile highest education control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getHighestedu('highestedu','', $itemval['highesteducation_id']);
					echo JHtml::_('select.genericlist', $result, 'highesteducation_id', 'text', $result[$itemval['highesteducation_id']]);
				?>
			</div>
						
		</div><!-- profile highest education control group div starts -->
		
		<!-- profile occupation control group div starts -->
		<div class="control-group">
			
			<!-- profile occupation label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_OCCUPATION');?></label>
			
			<!-- profile occupation control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getOccupationlist('occupation','', $itemval['occupation_id']);
					echo JHtml::_('select.genericlist', $result, 'occupation_id', 'text', $result[$itemval['occupation_id']]);
				?>
			</div>
						
		</div><!-- profile occupation control group div starts -->
				
		<!-- profile employedin control group div starts -->
		<div class="control-group">
			
			<!-- profile employedin label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_EMPLOYEDIN');?></label>
			
			<!-- profile employedin control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getEmployedinlist('employedin','', $itemval['employedin_id']);
					echo JHtml::_('select.genericlist', $result, 'employedin_id', 'text', $result[$itemval['employedin_id']]);
				?>
			</div>
						
		</div><!-- profile employedin control group div starts -->
			     
		<!-- profile monthly income control group div starts -->
		<div class="control-group">
			
			<!-- profile monthly income label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_MONTHLY_INCOME');?></label>
			
			<!-- profile monthly income control groups -->
			<div class="control-groups">
				<input type="text" name="monthly_income" id="monthly_income" value="<?php echo $itemval['monthly_income']; ?>" >
			</div>
						
		</div><!-- profile monthly income control group div starts -->
				
		    <input type="hidden" name="option" value="com_truematrimony"/>
			<input type="hidden" name="view" value="member"/>
			<input type="hidden" id="task" name="task" value="updatefamilyinfo"/>
			<input type="hidden" name="layout" value="item_member"/>	
			<input type="hidden" name="truematrimony_profile_id" id="truematrimony_profile_id" value="<?php echo $itemval['truematrimony_profile_id']; ?>" >	
			
			</form><!-- additional informations form ends -->
		
        </div>		
        		
		<!-- physical information div starts -->
		<div class="tab-pane matrimony-physical-info" id="matrimony-physical-info">
			
			<!-- physical head div starts -->
			<div class="matrimony-physical-head">
				<h5 class="basic-info-head" style="color:#F89406;"><u><b><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_PHYSICAL_ATTRIBUTES'); ?></b></u></h5> 		
				<input type="button" class="btn btn-primary" id="editbtn" name="editbtn" onclick="showEditPhysicalForm()" value="<?php echo JText::_('COM_TRUEMATRIMONY_EDIT_PROFILES'); ?>" style="float:right; margin-right:10px;">
		    </div><!-- physical head div ends -->
		    
		<!-- profile height control group div starts -->
		<?php if(!empty($itemval['height_id'])) : ?>
		<div class="control-group">
			
			<!-- profile height label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_HEIGHT');?></label>
			
			<!-- profile height control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfileheight('profileheight','', $itemval['height_id']);
					echo $result[$itemval['height_id']]; 
				?>
			</div>
						
		</div><!-- profile height control group div starts -->
		<?php endif; ?>
		
		<!-- profile weight control group div starts -->
		<?php if(!empty($itemval['weight_id'])) : ?>
		<div class="control-group">
			
			<!-- profile weight label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_WEIGHT');?></label>
			
			<!-- profile weight control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfileweight('profileweight','', $itemval['weight_id']);
					echo $result[$itemval['weight_id']]; 
				?>
			</div>
						
		</div><!-- profile weight control group div starts -->
		<?php endif; ?>
		
		<!-- profile body type control group div starts -->
		<?php if(!empty($itemval['bodytype_id'])) : ?>
		<div class="control-group">
			
			<!-- profile body type label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_BODY_TYPE');?></label>
			
			<!-- profile body type control groups -->
			<div class="control-groups">
				<?php 
                    $result = TrueMatrimonyHelperSelect::getProfilebodytype('bodytype_id','', $itemval['bodytype_id']); 				
					echo $result[$itemval['bodytype_id']];
				?>
			</div>
						
		</div><!-- profile body type control group div starts -->
		<?php endif; ?>
		
		<!-- profile complexion control group div starts -->
		<?php if(!empty($itemval['complexion_id'])) : ?>
		<div class="control-group">
			
			<!-- profile complexion label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_COMPLEXION');?></label>
			
			<!-- profile complexion control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfilecomplexion('profilecomplexion','', $itemval['complexion_id']);
					echo $result[$itemval['complexion_id']]; 
				?>
			</div>
						
		</div><!-- profile complexion control group div starts -->
		<?php endif; ?>
		
		<!-- profile physical state control group div starts -->
		<?php if(!empty($itemval['physicalstate_id'])) : ?>
		<div class="control-group">
			
			<!-- profile physical state label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_PHYSICAL_STATE');?></label>
			
			<!-- profile physical state control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfilephysicalstatus('physicalstatus','', $itemval['physicalstate_id']);
					echo $result[$itemval['physicalstate_id']]; 
				?>
			</div>
						
		</div><!-- profile physical state control group div starts -->
        <?php endif; ?>	
        	
        </div><!-- physical information div ends -->
        
        <!-- edit physical information div starts -->
		<div class="matrimony-physical-edit-info" id="matrimony-physical-edit-info">
			
			<!-- physical informations edit form starts -->
			<form name="adminForm" id="adminForm" method="post">
			
			<!-- physical head div starts -->
			<div class="matrimony-physical-head">	
   			   <h5 class="basic-info-head" style="color:#F89406;"><u><b><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_PHYSICAL_ATTRIBUTES'); ?></b></u></h5> 		
		       <input type="button" class="btn btn-primary" id="editbtn" name="editbtn" onclick="cancelPhysicalForm()" value="<?php echo JText::_('COM_TRUEMATRIMONY_EDIT_PROFILES_CANCEL'); ?>" style="float:right; margin-right:10px;">
 			   <button type="submit" class="btn btn-warning" style="float:right; margin-right:10px;"><?php echo JText::_('COM_TRUEMATRIMONY_SAVE_PROFILE_INFORMATIONS'); ?></button>
			</div><!-- physical head div ends -->
			
		<!-- profile height control group div starts -->
		<div class="control-group">
			
			<!-- profile height label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_HEIGHT');?></label>
			
			<!-- profile height control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfileheight('profileheight','', $itemval['height_id']);
					echo JHtml::_('select.genericlist', $result, 'height_id', 'text', $result[$itemval['height_id']]);
				?>
			</div>
						
		</div><!-- profile height control group div starts -->
				
		<!-- profile weight control group div starts -->
		<div class="control-group">
			
			<!-- profile weight label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_WEIGHT');?></label>
			
			<!-- profile weight control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfileweight('profileweight','', $itemval['weight_id']);
					echo JHtml::_('select.genericlist', $result, 'weight_id', 'text', $result[$itemval['weight_id']]);
				?>
			</div>
						
		</div><!-- profile weight control group div starts -->
				
		<!-- profile body type control group div starts -->
		<div class="control-group">
			
			<!-- profile body type label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_BODY_TYPE');?></label>
			
			<!-- profile body type control groups -->
			<div class="control-groups">
				<?php 
                    $result = TrueMatrimonyHelperSelect::getProfilebodytype('bodytype_id','', $itemval['bodytype_id']); 				
					echo JHtml::_('select.genericlist', $result, 'bodytype_id', 'text', $result[$itemval['bodytype_id']]);
				?>
			</div>
						
		</div><!-- profile body type control group div starts -->
				
		<!-- profile complexion control group div starts -->
		<div class="control-group">
			
			<!-- profile complexion label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_COMPLEXION');?></label>
			
			<!-- profile complexion control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfilecomplexion('profilecomplexion','', $itemval['complexion_id']);
					echo JHtml::_('select.genericlist', $result, 'complexion_id', 'text', $result[$itemval['complexion_id']]);
				?>
			</div>
						
		</div><!-- profile complexion control group div starts -->
				
		<!-- profile physical state control group div starts -->
		<div class="control-group">
			
			<!-- profile physical state label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_PHYSICAL_STATE');?></label>
			
			<!-- profile physical state control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfilephysicalstatus('physicalstatus','', $itemval['physicalstate_id']);
					echo JHtml::_('select.genericlist', $result, 'physicalstate_id', 'text', $result[$itemval['physicalstate_id']]);
				?>
			</div>
						
		</div><!-- profile physical state control group div starts -->
                
        <input type="hidden" name="option" value="com_truematrimony"/>
		<input type="hidden" name="view" value="member"/>
		<input type="hidden" id="task" name="task" value="updatefamilyinfo"/>
		<input type="hidden" name="layout" value="item_member"/>	
		<input type="hidden" name="truematrimony_profile_id" id="truematrimony_profile_id" value="<?php echo $itemval['truematrimony_profile_id']; ?>" >	
        
        </form><!-- physical informations edit form starts -->
        	
        </div><!-- physical information div ends -->       
        
        </div>
      			    
	 </div><!-- profile additional information div ends -->	
	
	 <span>
            <input type="button" class="btn btn-warning" id="hideadditinfo" onclick="hideAdditionalinfo()" value="<?php echo JText::_('COM_TRUEMATRIMONY_HIDE_ADDITIONAL_INFORMATION'); ?>" style="float:right">
			<input type="button" class="btn btn-primary" id="moreinfo" onclick="showAdditionalinfo()" value="<?php echo JText::_('COM_TRUEMATRIMONY_SHOW_ADDITIONAL_INFORMATION'); ?>" style="float:right; margin-right:10px;">
  	 </span>
  	 	       
   </div><!-- profile member information div ends -->
</div><!-- profile member information row-fluid div ends -->

<?php }
