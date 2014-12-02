<?php 
/*------------------------------------------------------------------------
# mod_truematrimony
# ------------------------------------------------------------------------
# author    Kumar Ramalingam - http://www.w3cert.in
# mail      kumar@w3cert.in
# copyright Copyright (C) 2012 W3Cert.in All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://w3cert.in
-------------------------------------------------------------------------*/
// No direct access to this file
//$action = JRoute::_('index.php?option=com_truematrimony&view=member&layout=item_search');

require_once JPATH_ADMINISTRATOR.'/components/com_truematrimony/helpers/select.php';

$user = JFactory::getUser();
?>
<!-- search module row-fluid div starts -->
<div class="row-fluid">
      	
      	<!-- register form starts -->	
        <form class="form-horizontal" role="form" name="adminForm" id="adminForm" method="post">
      			   
		   <!-- true matrimony search module form starts -->
		   <!-- <form name="search" id="cFormSearch" method="get" action="<?php //echo CRoute::_('index.php?option=com_truematrimony&view=search');?>">
           -->
			
			<!-- control group div starts -->
			<div class="form-group">
				
				<!-- search label-->
				<label class="form-label"><?php echo JText::_('MOD_TRUEMATRIMONY_SEARCH_LABEL'); ?>
					
				<!-- search control groups -->				
				<div class="form-groups">
				 	<input type="text" class="input-block-level" id="search_keyword" name="search_keyword" size="20" value=""/>
				</div>						
					
			</div><!-- control group div ends -->	
			
			<?php if(!$user->id) : ?>
			
			<!-- control group div starts -->
			<div class="form-group search-mf">
						
				<!-- bride radio div starts -->
				<div class="radio">
				  <label class="radio-inline">
				    <input type="radio" name="search-opt-bride" id="search-opt-bride" value="bride">		
				    <?php echo JText::_('MOD_TRUEMATRIMONY_SEARCH_BRIDE_LABEL'); ?>   
				  </label>
				</div><!-- bride radio div ends -->
				
				<!-- groom radio div starts -->
				<div class="radio">
				  <label class="radio-inline">
				    <input type="radio" name="search-opt-groom" id="search-opt-groom" value="groom">
				     <?php echo JText::_('MOD_TRUEMATRIMONY_SEARCH_GROOM_LABEL'); ?>  				   
				  </label>
				</div><!-- groom radio div ends -->
														
			</div><!-- control group div ends -->
			<?php endif; ?>
					
			<!-- control group search age starts -->
			<div class="form-group search-age">
			
			    <label class="form-label age"><?php echo JText::_('MOD_TRUEMATRIMONY_SEARCH_AGE_LABEL'); ?></label>
			   			
				<label class="form-label age"><?php echo JText::_('MOD_TRUEMATRIMONY_SEARCH_AGE_FROM_LABEL'); ?></label>
				
				<!-- form groups div starts -->
				<div class="form-groups">
					<input type="text" name="search-opt-age" class="mini" id="search-opt-age" value="" size="10">
				</div><!-- form groups div ends -->
				
				<label class="form-label age"><?php echo JText::_('MOD_TRUEMATRIMONY_SEARCH_AGE_TO_LABEL'); ?></label>
				
				<!-- form groups div starts -->
				<div class="form-groups">
					<input type="text" name="search-opt-age" id="search-opt-age" value="" size="10">
				</div><!-- form groups div ends -->
		
			</div><!-- control group search age ends -->
			
			<!-- search caste div starts -->
			<div class="form-group search-caste">
			
			    <!-- search caste label -->
				<label class="form-label search-opt-caste"><?php echo JText::_('MOD_TRUEMATRIMONY_SEARCH_CASTE_LABEL'); ?></label>
						    
			    <?php
			    $result = TrueMatrimonyHelperSelect::getCastelist('caste_id','','');
				echo JHtml::_('select.genericlist', $result, 'caste_id', 'text', '');
		        ?>    
			
			</div><!-- search caste div starts -->
			    
	    <button type="submit" class="btn btn-default"><?php echo JText::_('COM_TRUEMATRIMONY_SEARCH')?></button>
	    
	    <!-- 
	    <button class="btn btn-default"><?php echo JText::_('COM_TRUEMATRIMONY_SEARCH_CANCEL'); ?></button>
		-->
			
		<input type="hidden" name="table" value="profiles" />
	
	  </form><!-- true matrimony search module form ends -->
	
</div><!-- search module row-fluid div starts -->	

<?php for($i=0; $i<count($items); $i++) { ?>

<!-- search results row fluid div starts -->
<div class="row-fluid">

   <!-- control group div starts -->   
   <div class="control-group">
	
		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_NAME'); ?>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php echo $items[$i]['profile_name']; ?>
		</div>
	
   </div><!-- control group div ends -->
   
   <!-- control group div starts -->
   <div class="control-group">
   		
   		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_ID'); ?>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php echo 'F'.$items[$i]['truematrimony_profile_id']; ?>
		</div>
   		
   </div><!-- control group div ends -->
   
   <!-- control group div starts -->
   <div class="control-group">
   		
   		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_GENDER'); ?>
	
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
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_DOB'); ?>
	
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
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_DOB'); ?>
	
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
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_EMAIL'); ?>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php echo $items[$i]['email']; ?>		
		</div><!-- control groups div ends -->
   		
   </div><!-- control group div ends --> 
   
   <!-- control group div starts -->
   <div class="control-group">
   		
   		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_MOBILE_NUMBER'); ?>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php echo $items[$i]['mobile_number']; ?>		
		</div><!-- control groups div ends -->
   		
   </div><!-- control group div ends -->
     
   <!-- control group div starts -->
   <div class="control-group">
   		
   		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_MONTHLY_INCOME'); ?>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php echo $items[$i]['monthly_income']; ?>		
		</div><!-- control groups div ends -->
   		
   </div><!-- control group div ends -->
   
   <!-- control group div starts -->
   <div class="control-group">
   		
   		<!-- control label -->
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_RELIGION'); ?>
	
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
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_MOTHER_TONGUE'); ?>
	
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
		<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_CASTE'); ?>
	
		<!-- control groups div starts -->
		<div class="control-groups">
			<?php
				$result = TrueMatrimonyHelperSelect::getCastelist('caste_id','', $items[$i]['caste_id']);
				echo $result[$items[$i]['caste_id']];			
			?>		
		</div><!-- control groups div ends -->
   		
   </div><!-- control group div ends -->
   <?php endif; ?>
    
   
</div><!-- search results row fluid div starts -->


<?php }
