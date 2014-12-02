<?php
/*------------------------------------------------------------------------
# com_wcertmatrimony
# ------------------------------------------------------------------------
# author    Kumar Ramalingam - http://www.w3cert.in
# mail      kumar@w3cert.in
# copyright Copyright (C) 2012 Citruscart.com All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://w3cert.in
-------------------------------------------------------------------------*/
?>

<?php
echo "welcome";
require_once JPATH_ADMINISTRATOR.'/components/com_truematrimony/helpers/select.php';

//$this->profileforlist = TrueMatrimonyHelperSelect::getProfileforlist('profilefor');

?>

<!-- register form starts -->	
<form class="regform form-horizontal" role="form" id="regform" action="">

	<!-- row-fluid div starts -->
	<div class="row-fluid">
	
		<!-- matrimony register div starts -->
		<div class="matrimony-register">		
		
		    <!-- control group register for div starts -->
			<div class="control-group">
				
				<!-- register for label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_FOR')?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_FOR')?>
				</label>
				
				<!-- register for list controls div starts -->
				<div class="controls">
					
					<?php 
					echo TrueMatrimonyHelperSelect::getProfileforlist('profilefor');
					?>
							
				</div>
			
			</div><!-- control group register for div ends -->
			
			<!-- control group register name div starts -->
			<div class="control-group">
				
				<!-- register name label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_NAME')?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_NAME')?>
				</label>
				
				<!-- register name div starts -->
				<div class="controls">
					<input type="text" class="matrimony-reg-name has-error" id="matrimony-reg-name" value="" required>			
				</div>
			
			</div><!-- control group register name div ends -->
			
			<!-- register gender div starts -->
			<div class="control-group">
				
				<!-- register gender label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_GENDER')?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_GENDER')?>
				</label>
				
				<!-- register for gender list-->
				<div class="controls">
					<?php echo TrueMatrimonyHelperSelect::getGenderlist('gender')?>
				</div>
			
			</div><!-- register gender div ends -->
			
			<!-- register religion div starts -->
			<div class="control-group">
				
				<!-- register religion label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_RELIGION')?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_RELIGION'); ?>
				</label>
				
				<!-- country select list -->
				<div class="controls">
					<?php 
						echo TrueMatrimonyHelperSelect::getReligionlist('religion');
					?>
				</div>
			    
			</div><!-- register religion div ends -->
			
			<!-- register mother tongue div starts -->
			<div class="control-group">
				
				<!-- register mother tongue label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_MOTHER_TONGUE')?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_MOTHER_TONGUE'); ?>
				</label>
				
				<!-- country select list -->
				<div class="controls">
						<?php 
							echo TrueMatrimonyHelperSelect::getMothertongueslist('mothertongues');
						?>
			    </div>
			    
			</div><!-- register mother tongue div ends -->
			
			<!-- register caste/division div starts -->
			<div class="control-group">
				
				<!-- register caste/division label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_CASTE_DIVISION')?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_CASTE_DIVISION'); ?>
				</label>
				
				<!-- country select list -->
				<div class="controls">
					<?php 
						echo TrueMatrimonyHelperSelect::getCastelist('caste');
					?>					
			    </div>
			    
			</div><!-- register caste/division div ends -->		
			
			<!-- register country div starts -->
			<div class="control-group">
				
				<!-- register country label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_COUNTRY')?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_COUNTRY'); ?>
				</label>
				
				<!-- country select list -->
				<div class="controls">
					<?php 
						echo TrueMatrimonyHelperSelect::getCountrylist('country');
					?>
				</div>
					
			</div><!-- register country div ends -->
			
			<!-- register mobile number div starts -->
			<div class="control-group">
				
				<!-- register mobile number label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_MOBILE_NUMBER');?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_MOBILE_NUMBER');?>
				</label>
			
			    <!-- register mobile number text -->
			    <div class="controls">
			    	<input type="text" name="matrimony-reg-mobile" id="matrimony-reg-mobile" value="" required>
			    </div>
			    
			</div><!-- register mobile number div ends --> 		
			
			<!-- register email div starts -->
			<div class="control-group">
				
				<!-- register email label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_EMAIL');?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_EMAIL');?>
				</label>
			
			    <!-- register email -->
			    <div class="controls">
			    	<input type="email" name="matrimony-reg-email" id="matrimony-reg-email" value="" required>
			    </div>
			    
			</div><!-- register email div ends --> 						
			
	        <!-- register password div starts -->
			<div class="control-group">
				
				<!-- register password label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_PASSWORD');?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_PASSWORD');?>
				</label>
			
			    <!-- register password -->
			    <div class="controls">
			    	<input type="password" name="matrimony-reg-pwd" id="matrimony-reg-pwd" value="" required>
			    </div>
			    
			</div><!-- register email div ends --> 						
	        			
		</div><!-- matrimony register div ends -->
		
		<!-- submit button -->
		<div class="controls">
		 	<button type="submit" class="btn btn-default"><?php echo JText::_('COM_MATRIMONY_REGISTER_SUBMIT'); ?></button>
	    </div>
	
	  <input type="hidden" name="table" value="profiles"/>
	  <input type="hidden" id="task" name="task" value=""/>
	  <input type="hidden" name="layout" value="default"/>
	  <input type="hidden" name="view" value="profiles"/>
	  	
	</div><!-- row-fluid div starts --> 
	 
</form><!-- register form ends -->

