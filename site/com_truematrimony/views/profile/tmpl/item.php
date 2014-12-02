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

require_once JPATH_ADMINISTRATOR.'/components/com_truematrimony/helpers/select.php';

$action = JRoute::_('index.php?option=com_truematrimony&view=profiles');

?>

<!-- register form starts -->	
<form class="matrimony-regform form-horizontal" role="form" name="adminForm" id="adminForm" action="<?php echo $action; ?>" method="POST">

	<!-- row-fluid div starts -->
	<div class="row-fluid">
		
		<!-- true matrimony basic info div starts -->
		<div class="truematrimony-basicinfo col-md-offset-3 col-md-6" style="background:#F6F6F6;padding-bottom:20px;">
			
			<h4 style="color:#FF0035; text-align:center;"><?php echo JText::_('Register Form'); ?></h4>
	
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
						$result = TrueMatrimonyHelperSelect::getProfileforlist('profilerefer_id','', $this->item->profilerefer_id);
					    				    
						echo JHtml::_('select.genericlist', $result, 'profilerefer_id', 'text', $this->item->profilerefer_id);
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
					<input type="text" class="matrimony-reg-name has-error" id="profile_name" name="profile_name" value="<?php echo $this->item->profile_name; ?>" required >			
				</div>
			
			</div><!-- control group register name div ends -->
			
			<!-- register email div starts -->
			<div class="control-group">
				
				<!-- register email label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_EMAIL');?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_EMAIL');?>
				</label>
			
			    <!-- register email -->
			    <div class="controls">
			    	<input type="email" name="email" id="email" value="<?php echo $this->item->email; ?>">
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
			    	<input type="password" name="pwd" id="pwd" value="<?php echo $this->item->pwd; ?>" required >
			    </div>
			    
			</div><!-- register email div ends --> 		
			
			<!-- register mobile number div starts -->
			<div class="control-group">
				
				<!-- register mobile number label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_MOBILE_NUMBER');?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_MOBILE_NUMBER');?>
				</label>
			
			    <!-- register mobile number text -->
			    <div class="controls">
			    	<input type="text" name="mobile_number" id="mobile_number" value="<?php echo $this->item->mobile_number; ?>" required>
			    </div>
			    
			</div><!-- register mobile number div ends --> 	
			
			<!-- register gender div starts -->
			<div class="control-group">
				
				<!-- register gender label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_GENDER')?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_GENDER')?>
				</label>
				
				<!-- register for gender list-->
				<div class="controls">
					<?php 
						$result = TrueMatrimonyHelperSelect::getGenderlist('gender','', $this->item->gender );
						//print_r($result);					
						echo JHtml::_('select.genericlist',$result,'gender','text',$this->item->gender);
					?>
				</div>
			
			</div><!-- register gender div ends -->
			
			<!-- profile date of birth control groups starts -->
			<div class="control-group">
			
				<!-- register date of birth label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_DOB')?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_DOB')?>
				</label>
				
				<!-- register for date of birth list-->
				<div class="controls">
					<?php 					
						//echo JHtml::_('select.genericlist',$result,'value','text',$this->item->dob);
						echo JHTML::_('calendar', $this->item->dob, 'dob','dob','%Y-%m-%d',array('class'=>'input-small'),'size="10" ');
					?>
				</div>
						
			</div><!-- profile date of birth control groups ends -->
			
			
			<div class="control-group">
				<!-- register date of birth label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_DOB')?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_DOB')?>
				</label>
				
				<div class="controls">
				   	<?php 
						$result = TrueMatrimonyHelperSelect::getDateList('date', '', '');	
					    echo JHtml::_('select.genericlist', $result, 'date', 'text');
					?>
					<?php 
					$result = TrueMatrimonyHelperSelect::getMonthList('month', '', '');	
					echo JHtml::_('select.genericlist', $result, 'month', 'text');
					?>
					<input type="text" value="" name="dob_year" id="dob_year" required="true">
				</div>
														
			</div>	
					
			<!-- register religion div starts -->
			<div class="control-group">
				
				<!-- register religion label -->
				<label class="control-label" for="<?php echo JText::_('COM_MATRIMONY_REGISTER_RELIGION')?>">
					<?php echo JText::_('COM_MATRIMONY_REGISTER_RELIGION'); ?>
				</label>
				
				<!-- country select list -->
				<div class="controls">
					<?php 
						$result = TrueMatrimonyHelperSelect::getReligionlist('religion_id', '', $this->item->religion_id);
						
						echo JHtml::_('select.genericlist', $result, 'religion_id', 'text', $this->item->religion_id);
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
							$result=TrueMatrimonyHelperSelect::getMothertongueslist('mothertongue_id', '', $this->item->mothertongue_id);
							echo JHtml::_('select.genericlist', $result, 'mothertongue_id', 'text', $this->item->mothertongue_id);
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
						$result = TrueMatrimonyHelperSelect::getCastelist('caste_id','',$this->item->caste_id);
						echo JHtml::_('select.genericlist', $result, 'caste_id', 'text', $this->item->caste_id);
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
						$result = TrueMatrimonyHelperSelect::getCountrylist('country_id','',$this->item->country_id);
						echo JHtml::_('select.genericlist', $result, 'country_id', 'text', $this->item->country_id);
					?>
				</div>
					
			</div><!-- register country div ends -->
					        			
		</div><!-- matrimony register div ends -->
		
		<!-- submit button -->
		<div class="controls" style="text-align:center;">
		 	<button type="submit" class="btn btn-success"><?php echo JText::_('COM_MATRIMONY_REGISTER_SUBMIT'); ?></button>
		</div>	
		
		</div><!-- true matrimony basic information div ends -->
		   
	  <input type="hidden" name="option" value="com_truematrimony"/>
	  <input type="hidden" name="view" value="profiles"/>
	  <input type="hidden" id="task" name="task" value="save"/>
	  <input type="hidden" name="layout" value="item"/>
	  <input type="hidden" name="truematrimony_profile_id" id="truematrimony_profile_id" value="<?php echo $this->item->truematrimony_profile_id; ?>" >	
	    	  	
	</div><!-- row-fluid div starts --> 
	 
	 <style>
		 
	 .input-append #dob_img {
		 background:#ffffff;
	 }
     #profilerefer_id, #gender, #religion_id, #mothertongue_id, #caste_id, #country_id {
	 width:224px;
	 }
     </style>
	 
</form><!-- register form ends -->
