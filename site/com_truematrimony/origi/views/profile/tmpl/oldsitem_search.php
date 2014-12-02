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
 // No direct access to this file
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view');

require_once JPATH_ADMINISTRATOR.'/components/com_truematrimony/helpers/select.php';

$profiles = new TruematrimonyControllerProfiles();

$items = $profiles->getProfiles();

print_r($items);

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

<?php for($i=0; $i<count($items); $i++) { ?>

<!-- search results row fluid div starts -->
<div class="row-fluid">

<form class="form-horizontal" role="form">

   <!-- control group div starts -->   
   <div class="control-group">
	
		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_NAME'); ?></label>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php echo $items[$i]['profile_name']; ?>
		</div>
	
   </div><!-- control group div ends -->
   
   <!-- control group div starts -->
   <div class="control-group">
   		
   		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_ID'); ?></label>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php echo 'F'.$items[$i]['truematrimony_profile_id']; ?>
		</div>
   		
   </div><!-- control group div ends -->
   
   <!-- control group div starts -->
   <div class="control-group">
   		
   		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_GENDER'); ?></label>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php 
			if($items[$i]['gender']==2){
			echo JText::_('MATRIMONY_FEMALE');
			}
			?>
		</div>
   		
   </div><!-- control group div ends -->
   
   <!-- control group div starts -->
   <div class="control-group">
   		
   		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_DOB'); ?></label>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php 
			echo $items[$i]['dob'];
			?>
		</div>
   		
   </div><!-- control group div ends -->
   
   <!-- control group div starts -->
   <div class="control-group">
   		
   		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_DOB'); ?></label>
	
		<!-- control groups div starts -->
		<div class="control-groups">
		
			<?php 
							
			/**
			 *
			* @var $bday Get birth of date.
			*/
			$bday = new DateTime($items[$i]['dob']);
				
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
			
			if($diff->y==0) {
				echo $diff->m." Months, ".$diff->d." Days ";					
			} else {
				echo $diff->y." years";
			}
			?>		
		</div><!-- control groups div ends -->
   		
   </div><!-- control group div ends -->
   
   <!-- control group div starts -->
   <div class="control-group">
   		
   		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_EMAIL'); ?></label>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php echo $items[$i]['email']; ?>		
		</div><!-- control groups div ends -->
   		
   </div><!-- control group div ends --> 
   
   <!-- control group div starts -->
   <div class="control-group">
   		
   		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_MOBILE_NUMBER'); ?></label>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php echo $items[$i]['mobile_number']; ?>		
		</div><!-- control groups div ends -->
   		
   </div><!-- control group div ends -->
     
   <!-- control group div starts -->
   <div class="control-group">
   		
   		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_MONTHLY_INCOME'); ?></label>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php echo $items[$i]['monthly_income']; ?>		
		</div><!-- control groups div ends -->
   		
   </div><!-- control group div ends -->
   
   <!-- control group div starts -->
   <div class="control-group">
   		
   		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_RELIGION'); ?></label>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php
			$result = TrueMatrimonyHelperSelect::getReligionlist('religion_id','', $items[$i]['religion_id']);
			echo $result[$items[$i]['religion_id']];			
			?>		
		</div><!-- control groups div ends -->
   		
   </div><!-- control group div ends -->
   
   <?php if(!empty($items[$i]['mothertongue_id'])) :?>
   <!-- control group div starts -->
   <div class="control-group">
   		
   		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_MOTHER_TONGUE'); ?></label>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php
			$result = TrueMatrimonyHelperSelect::getMothertongueslist('mothertongue_id','', $items[$i]['mothertongue_id']);
			echo $result[$items[$i]['mothertongue_id']];			
			?>		
		</div><!-- control groups div ends -->
   		
   </div><!-- control group div ends -->
   <?php endif; ?>
   
   <?php if(!empty($items[$i]['caste_id'])) :?>
   <!-- control group div starts -->
   <div class="control-group">
   		
   		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_CASTE'); ?></label>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php
				$result = TrueMatrimonyHelperSelect::getCastelist('caste_id','', $items[$i]['caste_id']);
				echo $result[$items[$i]['caste_id']];			
			?>		
		</div><!-- control groups div ends -->
   		
   </div><!-- control group div ends -->
   <?php endif; ?>
    </form>
   
</div><hr><!-- search results row fluid div starts -->


<?php }
