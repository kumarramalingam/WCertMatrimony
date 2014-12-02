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

defined('_JEXEC') or die('Restricted access');

require_once JPATH_ADMINISTRATOR.'/components/com_truematrimony/helpers/select.php';

?>

<!-- profile - education details form starts -->
<form class="matrimony-additional-form form-horizontal" role="form" id="adminForm" name="adminForm" method="post">

	<!-- row-fluid div starts -->
	<div class="row-fluid">
	
	    <!-- matrimony family informations div starts -->
	    <div class="matrimony-family-info">
	    
	        <!-- matrimony family informations heading -->
			<div class="matrimony-education-head">
				<h5><?php echo JText::_('COM_TRUEMATRIMONY_FAMILY_INFORMATIONS'); ?></h5>
			</div>
	   
	        <!-- control group father name div starts -->
			<div class="control-group">
				
				<!-- register father name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_FATHER_NAME')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_FATHER_NAME'); ?>
				</label>
				<!-- register father name div starts -->
				<div class="controls">
					<input type="text" class="matrimony-reg-name has-error" id="father_name" name="father_name" value="<?php echo $this->item->father_name; ?>">			
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
					<input type="text" class="matrimony-reg-name has-error" id="mother_name" name="mother_name" value="<?php echo $this->item->mother_name; ?>">			
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
					<input type="text" class="matrimony-reg-name has-error" id="siblings_members" name="siblings_members" value="<?php echo $this->item->siblings_members; ?>" >			
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
					<input type="text" class="matrimony-reg-name has-error" id="birth_time" name="birth_time" value="<?php echo $this->item->birth_time; ?>" >			
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
					<input type="text" class="matrimony-reg-name has-error" id="birth_place" name="birth_place" value="<?php echo $this->item->birth_place; ?>" >			
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
					<input type="text" class="matrimony-reg-name has-error" id="native" name="native" value="<?php echo $this->item->native; ?>" >			
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
						$result = TrueMatrimonyHelperSelect::getBloodgroup('bloodgroup_id', '', $this->item->bloodgroup_id);
						echo JHtml::_('select.genericlist', $result, 'bloodgroup_id', 'text', $this->item->bloodgroup_id);
					?>
				</div>
			
			</div><!-- control group blood group name div ends -->	
	
	    </div><!-- matrimony family informations div ends -->
	    
	   <!-- matrimony raasi information div starts -->  
	   <div class="matrimony-raasi-info">
	   
	        <!-- matrimony raasi informations heading -->
			<div class="matrimony-raasi-head">
				<h5><?php echo JText::_('COM_TRUEMATRIMONY_RAASI_INFORMATIONS'); ?></h5>
			</div>
	    
	    	<!-- register janma raasi div starts -->
			<div class="control-group">
				
				<!-- register janma raasi label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_RAASI')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_RAASI'); ?>
				</label>
				
				<!-- country select list -->
				<div class="controls">
					<?php 
						$result = TrueMatrimonyHelperSelect::getJanmaraasi('janmaraase_id', '', $this->item->janmaraase_id);
						echo JHtml::_('select.genericlist', $result, 'janmaraase_id', 'text', $this->item->janmaraase_id);
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
				<div class="controls">
					<input type="text" class="matrimony-reg-name has-error" id="janma_lagnam" name="janma_lagnam" value="<?php echo $this->item->janma_lagnam; ?>" >			
				</div>
			
			</div><!-- control group janma lagna div ends -->
			
			<!-- control group janma nakshatra div starts -->
			<div class="control-group">
				
				<!-- register janma nakshatra label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_NAKSHATRA')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANMA_NAKSHATRA'); ?>
				</label>
				<!-- register janma nakshatra div starts -->
				<div class="controls">
					<input type="text" class="matrimony-reg-name has-error" id="janma_nakshatra" name="janma_nakshatra" value="<?php echo $this->item->janma_nakshatra; ?>" >			
				</div>
			
			</div><!-- control group janma nakshatra div ends -->
			
			<!-- control group temple name div starts -->
			<div class="control-group">
				
				<!-- register temple name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_TEMPLE_NAME')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_TEMPLE_NAME'); ?>
				</label>
				<!-- register temple name div starts -->
				<div class="controls">
					<input type="text" class="matrimony-reg-name has-error" id="temple_name" name="temple_name" value="<?php echo $this->item->temple_name; ?>" >			
				</div>
			
			</div><!-- control group temple name div ends -->
			
			<!-- control group ragu & gathu name div starts -->
			<div class="control-group">
				
				<!-- register ragu & gathu name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_RAGU_AND_GATHU_OPTION')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_RAGU_AND_GATHU_OPTION'); ?>
				</label>
				<!-- register ragu & gathu name div starts -->
				<div class="controls">
					<input type="text" class="matrimony-reg-name has-error" id="ragu_gathu" name="ragu_gathu" value="<?php echo $this->item->ragu_gathu; ?>" >			
				</div>
			
			</div><!-- control group ragu & gathu name div ends -->
			
			<!-- control group sevai name div starts -->
			<div class="control-group">
				
				<!-- register sevai name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_SEVAI')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_SEVAI'); ?>
				</label>
				<!-- register sevai name div starts -->
				<div class="controls">
					<input type="text" class="matrimony-reg-name has-error" id="sevai_opt" name="sevai_opt" value="<?php echo $this->item->sevai_opt; ?>" >			
				</div>
			
			</div><!-- control group sevai name div ends -->	
			
			<!-- control group pavagam change div starts -->
			<div class="control-group">
				<!-- register pavagam change label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_PAVAGAM_CHANGE')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_PAVAGAM_CHANGE'); ?>
				</label>
				<!-- register pavagam change div starts -->
				<div class="controls">
					<textarea class="matrimony-reg-name has-error" id="pavagam_change" name="pavagam_change" ><?php echo $this->item->pavagam_change; ?></textarea>			
				</div>			
			</div><!-- control group pavagam change div ends -->
			
			<!-- control group janana kaala Dasai erupu div starts -->
			<div class="control-group">
				
				<!-- register janana kaala Dasai erupu label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANANA_KAALA_DASAI_ERUPU')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_JANANA_KAALA_DASAI_ERUPU'); ?>
				</label>
				<!-- register janana kaala Dasai erupu div starts -->
				<div class="controls">
					<textarea class="matrimony-reg-name has-error" id="janana_kalam" name="janana_kalam"><?php echo $this->item->janana_kalam; ?></textarea>			
				</div>
			
			</div><!-- control group janana kaala Dasai erupu div ends -->
			
			<!-- control group end of nadaapu dasa bukthi div starts -->
			<div class="control-group">
				
				<!-- register end of nadaapu dasa bukthi label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_NADAAPU_DASA_BUKTHI')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_NADAAPU_DASA_BUKTHI'); ?>
				</label>
				<!-- register end of dasa bukthi div starts -->
				<div class="controls">
					<input type="text" class="matrimony-reg-name has-error" id="dasa_bukthi" name="dasa_bukthi" value="<?php echo $this->item->dasa_bukthi; ?>" >			
				</div>
			
			</div><!-- control group end of nadaapu dasa bukthi div ends -->	
			
		</div><!-- matrimony raasi information div ends -->   
	    
	    
	    <!-- matrimony additional informations div starts -->
	    <div class="matrimony-additional-infos">
	    
	        <!-- matrimony additional informations heading -->
			<div class="matrimony-additional-head">
				<h5><?php echo JText::_('COM_TRUEMATRIMONY_ADDITIONAL_INFORMATIONS'); ?></h5>
			</div>    
	    
	    	<!-- control group additional information div starts -->
			<div class="control-group">
				
				<!-- register additional information label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_ADDITIONAL_INFORMATION')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_ADDITIONAL_INFORMATION'); ?>
				</label>
				<!-- register additional information div starts -->
				<div class="controls">
					<textarea class="matrimony-reg-name has-error" id="additional_info" name="additional_info"><?php echo $this->item->additional_info; ?></textarea>			
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
					<textarea class="matrimony-reg-name has-error" id="expectations" name="expectations"><?php echo $this->item->expectations; ?></textarea>			
				</div>
			
			</div><!-- control group expectations into div ends -->	
	    
	    </div><!-- matrimony additional informations div ends -->	 	
		
		<!-- profile education and occupation div starts -->
	    <div class="matirmony-education-occupat">	
	    
	    <!-- profile education and occupation heading -->
		<div class="matrimony-education-head">
			<h5><?php echo JText::_('COM_TRUEMATRIMONY_EDUCATION_AND_OCCUPATION'); ?></h5>
		</div>
		
		<!-- control-group div starts -->
		<div class="control-group">
		
			<!-- highest education label -->
			<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_HIGHEST_EDUCATION');?>" >
				<?php echo JText::_('COM_TRUEMATRIMONY_HIGHEST_EDUCATION'); ?>
			</label>
		
            <!-- highest education list --> 		
			<div class="controls">
				<?php 
					  $result = TrueMatrimonyHelperSelect::getHighestedu('highestedu','', $this->item->highesteducation_id);
					  echo JHtml::_('select.genericlist', $result, 'highesteducation_id', 'text', $this->item->highesteducation_id);
				?>
			</div>
			
		</div><!-- control-group div ends -->
		
		<!-- occupation control-group div starts -->
		<div class="control-group">
			
			<!-- profile occupation label -->
			<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_OCCUPATION'); ?>" >
				<?php echo JText::_('COM_TRUEMATRIMONY_OCCUPATION'); ?>
			</label>
			
			<!-- profile occupation lists -->
			<div class="controls">
				<?php 
					$result = TrueMatrimonyHelperSelect::getOccupationlist('occupation','', $this->item->occupation_id);
					echo JHtml::_('select.genericlist', $result, 'occupation_id', 'text', $this->item->occupation_id);
				?>
			</div>
			
		</div><!-- occupation control-group div ends -->
		
		<!-- employed in control group div starts -->
		<div class="control-group">
		
			<!-- profile employed in label -->
			<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_EMPLOYED_IN'); ?>">
				<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_EMPLOYED_IN');?>
			</label>
			
			<!-- profile employed in controls list -->
			<div class="controls">
				<?php 
					$result = TrueMatrimonyHelperSelect::getEmployedinlist('employedin','', $this->item->employedin_id);
					echo JHtml::_('select.genericlist', $result, 'employedin_id', 'text', $this->item->employedin_id);
				?>
			</div>
		
		</div><!-- employed in control group div starts -->		
		
		<!-- monthly income control group div starts -->
		<div class="control-group">
			
			<!-- profile monthly income label -->
			<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_MONTHLY_INCOME');?>" >
				<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_MONTHLY_INCOME');?>	
			</label>
			
			<!-- profile monthly income controls list -->
			<div class="controls">
				<?php 
					//$result = TrueMatrimonyHelperSelect::getMonthlyincome('monthincome','', $this->item->truematrimony_monthincome_id);
					//echo JHtml::_('select.genericlist', $result, 'value', 'text', $this->item->truematrimony_monthincome_id);
				?>
				<input type="text" name="monthly_income" id="monthly_income" value="<?php echo $this->item->monthly_income; ?>" >
			</div>
						
		</div><!-- monthly income control group div ends -->
	
	 </div><!-- profile education and occupation div starts -->
	 
	 <!-- profile physical attributes div starts -->
	 <div class="matrimony-physical-attribyutes">
	 
	 	<!-- profile physical attributes head -->
	 	<div class="matrimony-physical-head">
	 		<h5><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_PHYSICAL_ATTRIBUTES'); ?></h5>
	 	</div>
	 
	 	<!-- height control group div starts -->
	 	<div class="control-group">
	 		
	 		<!-- profile height label -->
	 		<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_HEIGHT'); ?>" >
	 			<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_HEIGHT'); ?>
	 		</label>
	 		
	 		<!-- profile height controls -->
	 		<div class="controls">
	 			<?php 
					$result = TrueMatrimonyHelperSelect::getProfileheight('profileheight','', $this->item->height_id);
					echo JHtml::_('select.genericlist', $result, 'height_id', 'text', $this->item->height_id);
				?>	 			
	 		</div>
	 	
	 	</div><!-- height control group div ends -->
	 	
	 	<!-- profile weight control group div starts-->
	 	<div class="control-group">
	 		
	 		<!-- profile weight label -->
	 		<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_WEIGHT'); ?>" >
	 			<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_WEIGHT'); ?>
	 		</label>
	 		 		
	 		<!-- profile weight controls -->
	 		<div class="controls">
	 			<?php 
					$result = TrueMatrimonyHelperSelect::getProfileweight('profileweight','', $this->item->weight_id);
					echo JHtml::_('select.genericlist', $result, 'weight_id', 'text', $this->item->weight_id);
				?>	 			
	 		</div>
	 		 		
		</div><!-- profile weight control group div starts --> 	
	 	
	 	<!-- profile body type control group div starts-->
	 	<div class="control-group">
	 		
	 		<!-- profile body type label -->
	 		<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_BODY_TYPE'); ?>" >
	 			<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_BODY_TYPE'); ?>
	 		</label>
	 		
	 		<!-- profile body type controls -->
	 		<div class="controls">
	 						
				<?php 
					 $result = TrueMatrimonyHelperSelect::getProfilebodytype('bodytype_id','', $this->item->bodytype_id);
					 echo JHtml::_('select.genericlist',$result,'bodytype_id','text',$this->item->bodytype_id);
				?>
					
	 		</div>
	 		 		
		</div><!-- profile body type control group div starts--> 
		
		<!-- profile complexion control group div starts-->
	 	<div class="control-group">
	 		
	 		<!-- profile complexion label -->
	 		<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_COMPLEXION'); ?>" >
	 			<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_COMPLEXION'); ?>
	 		</label>
	 		
	 		<!-- profile complexion controls -->
	 		<div class="controls">
	 			<?php 
					$result = TrueMatrimonyHelperSelect::getProfilecomplexion('profilecomplexion','', $this->item->complexion_id);
					echo JHtml::_('select.genericlist', $result, 'complexion_id', 'text', $this->item->complexion_id);
				?>	 			
	 		</div>
	 		 		
		</div><!-- profile complexion control group div starts--> 
		
		<!-- profile physical status control group div starts-->
	 	<div class="control-group">
	 		
	 		<!-- profile physical status label -->
	 		<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_PHYSICAL_STATUS'); ?>" >
	 			<?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_PHYSICAL_STATUS'); ?>
	 		</label>
	 		
	 		<!-- profile complexion controls -->
	 		<div class="controls">
	 			<?php 
					$result = TrueMatrimonyHelperSelect::getProfilephysicalstatus('physicalstatus','', $this->item->physicalstate_id);
					echo JHtml::_('select.genericlist', $result, 'physicalstate_id', 'text', $this->item->physicalstate_id);
				?>	 			
	 		</div>
	 			 		 		
		</div><!-- profile complexion control group div starts--> 
	 	 		 	
	 </div><!-- profile physical attributes div ends -->
	 					
	 <!-- submit button -->
	 <div class="controls">
	 	<button type="submit" class="btn btn-default"><?php echo JText::_('COM_MATRIMONY_UPDATE_SUBMIT'); ?></button>
        <button type="button" class="btn btn-default" onclick="window.location='index.php?option=com_truematrimony&view=profile&layout=item_member&id=<?php echo $this->item->truematrimony_profile_id; ?>' "><?php echo JText::_('COM_MATRIMONY_SKIP_TO_HOME'); ?></button>
	 </div>
	
	  <input type="hidden" name="option" value="com_truematrimony"/>
	  <input type="hidden" name="view" value="profiles"/>
	  <input type="hidden" id="task" name="task" value="update"/>
	  <input type="hidden" name="layout" value="item_info"/>		
	  <input type="hidden" name="truematrimony_profile_id" id="truematrimony_profile_id" value="<?php echo $this->item->truematrimony_profile_id; ?>" >	
				
	</div><!-- row-fluid div starts -->

</form><!-- profile - education details form starts -->

