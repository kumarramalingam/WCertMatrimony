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
jimport( 'joomla.filesystem.file' );

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
$action = JRoute::_('index.php?option=com_truematrimony&view=profiles');
//print_r($this->item);
?>
<script type="text/javascript">

window.onload = function() {  
   document.getElementById('additional-info').style.display = 'none';
   document.getElementById('hideadditinfo').style.display = 'none';
   document.getElementById('uploadpic').style.display = 'none';
}

function showAdditionalinfo() {
	document.getElementById('additional-info').style.display = 'inline';
    document.getElementById('hideadditinfo').style.display = 'inline';
    document.getElementById('moreinfo').style.display = 'none';
}


function hideAdditionalinfo() {
	document.getElementById('additional-info').style.display = 'none';
	document.getElementById('hideadditinfo').style.display = 'none';
	document.getElementById('moreinfo').style.display = 'inline';
}

function showUpload() {
document.getElementById('uploadpic').style.display = 'inline';
}
</script>

<?php
 
//$path = JUri::root().'/media/truematrimony/profiles/profile_10/';	

//$uploadimg = glob($path."{*.jpg,*.gif,*.png}");
?>

<form class="adminForm form-horizontal truematrimony-profile-info" id="adminForm" name="adminForm" method="post" enctype="multipart/form-data">

<!-- profile member information row-fluid div starts -->
<div class="row-fluid truematrimony-profile">
		
	<!-- truematrimony profile head-->
	<h5 class="truematrimony_profile_head"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_MEMBER_HEAD'); ?></h5>

	<!-- profile member photo div starts -->
	<div class="span2">
		
		<!-- profile member default image -->
		<?php
			if($this->item->profile_img!="") {			
			$path = JUri::root().'/media/truematrimony/profiles/profile_'.$this->item->truematrimony_profile_id.'/thumbs/'.$this->item->profile_img;	
		    } else {
		    	if($this->item->gender==1) {
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
	      
	 </div><!-- profile member photo div ends -->
	
	<!-- profile member information div starts -->
	<div class="span9">
	
	  <!-- true matrimony basic information -->
	  <div class="truematrimony-basic-info" id="truematrimony-basic-info">
	        
	    <!-- profile id control group div starts -->
	    <?php if(!empty($this->item->truematrimony_profile_id)) : ?>
		<div class="control-group">
					
			<!-- profile id label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_ID');?></label>
					
			<!-- member control groups -->
			<div class="control-groups">	
				<?php				
				if($this->item->gender==1) {
					echo "M".$this->item->truematrimony_profile_id;
				} else {
					echo "F".$this->item->truematrimony_profile_id;		
				}		
				?>
			</div>
									
		</div><!-- profile id control group div starts -->
		<?php endif; ?>	
		
		<!-- member control group div starts -->
		<?php if(!empty($this->item->profile_name)) : ?>
		<div class="control-group">
			
			<!-- member label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_NAME');?></label>
			
			<!-- member control groups -->
			<div class="control-groups">			    
				<?php echo $this->item->profile_name; ?>
			</div>
						
		</div><!-- member control group div starts -->
		<?php endif; ?>	
		
		<!-- profile gender control group div starts -->
		<?php if(!empty($this->item->gender)) : ?>
		<div class="control-group">
			
			<!-- gender label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_GENDER');?></label>
			
			<!-- member gender control groups -->
			<div class="control-groups">
				<?php if($this->item->gender==1) {
					   echo JText::_("COM_TRUEMATRIMONY_MALE");
				   } else {
						echo JText::_("COM_TRUEMATRIMONY_FEMALE");
				   }
					 ?>
			</div>
						
		</div><!-- member gender control group div starts -->	
		<?php endif; ?>
		
		<!-- profile date of birth control group div starts -->
		<?php if(!empty($this->item->dob)) : ?>
		<div class="control-group">
			
			<!-- date of birth label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_DOB');?></label>
			
			<!-- member date of birth control groups -->
			<div class="control-groups">
				<?php 
				$newDate = date("d-m-Y", strtotime($this->item->dob));
				echo $newDate;
				?>
			</div>
						
		</div><!-- member date of birth control group div starts -->
		<?php endif; ?>
		
		<!-- profile age control group div starts -->
		<?php if(!empty($this->item->dob)) :?>
		<div class="control-group">
					
			<?php 
						
			/**
			 * 
			 * @var $bday Get birth of date.
			 */	
			$bday = new DateTime($this->item->dob);
			
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
		
		</div>
		
		
		    
	    <!-- profile additional information div starts -->
	    <div class="additional-info" id="additional-info">
			
		
	    
	     <!-- profile email control group div starts -->
        <?php if(!empty($this->item->email)) : ?>
		<div class="control-group">
			
			<!-- email label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_EMAIL');?></label>
			
			<!-- member email control groups -->
			<div class="control-groups">
				<?php echo $this->item->email; ?>
			</div>
						
		</div><!-- member email control group div starts -->
		<?php endif;  ?>
		
		<!-- profile mobile number control group div starts -->
		<?php if(!empty($this->item->mobile_number)) : ?>
		<div class="control-group">
			
			<!-- profile mobile number label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_MOBILE_NUMBER');?></label>
			
			<!-- profile mobile number control groups -->
			<div class="control-groups">
				<?php echo $this->item->mobile_number; ?>
			</div>
						
		</div><!-- profile mobile number control group div starts -->
		<?php endif; ?>
	    
	    <?php if(!empty($this->item->religion_id)) : ?>
	    <!-- profile religion control group div starts -->
		<div class="control-group">
			
			<!-- religion label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_RELIGION');?></label>
			
			<!-- member religion control groups -->
			<div class="control-groups">
			<?php 
			      $result = TrueMatrimonyHelperSelect::getReligionlist('religion_id','', $this->item->religion_id);
			      echo $result[$this->item->religion_id];
		    ?>			
			</div>
						
		</div><!-- member religion control group div starts -->
		<?php endif; ?>
		
		<!-- profile mothertongue id control group div starts -->
		<?php if(!empty($this->item->mothertongue_id)) : ?>
		<div class="control-group">
			
			<!-- profile mother tongue  label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_MOTHER_TONGUE');?></label>
			
			<!-- profile mother tongue  control groups -->
			<div class="control-groups">
				<?php 
					$result=TrueMatrimonyHelperSelect::getMothertongueslist('mothertongue_id', '', $this->item->mothertongue_id);
					echo $result[$this->item->mothertongue_id]; 
				?>
			</div>
						
		</div><!-- profile mother tongue control group div starts -->
		<?php endif; ?>
		
		<!-- profile caste id control group div starts -->
		<?php if(!empty($this->item->caste_id)) : ?>
		<div class="control-group">
			
			<!-- profile caste id label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_CASTE');?></label>
			
			<!-- profile caste id control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getCastelist('caste_id','',$this->item->caste_id);
					echo $result[$this->item->caste_id]; 
				?>
			</div>
						
		</div><!-- profile caste id control group div starts -->
		<?php endif; ?>
		
		<!-- profile country id control group div starts -->
		<?php if(!empty($this->item->country_id)) : ?>
		<div class="control-group">
			
			<!-- profile country id label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_COUNTRY');?></label>
			
			<!-- profile country id control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getCountrylist('country_id','',$this->item->country_id);
					echo $result[$this->item->country_id]; 
				?>
			</div>
						
		</div><!-- profile country id control group div starts -->   
		<?php endif; ?>
			
				
		<!-- matrimony family informations div starts -->
	    <div class="matrimony-family-info tab-pane fade active in" id="matrimony-family-info">
	    
	        <!-- matrimony family informations heading -->
			<div class="matrimony-education-head">
				<h5 class="basic-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_FAMILY_INFORMATIONS'); ?></u></h5>
			</div>
	   
	        <!-- control group father name div starts -->
			<div class="control-group">
				
				<!-- register father name label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_FATHER_NAME')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_FATHER_NAME'); ?>
				</label>
				<!-- register father name div starts -->
				<div class="controls">
					<?php echo $this->item->father_name; ?>			
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
					<?php echo $this->item->mother_name; ?>			
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
					<?php echo $this->item->siblings_members; ?>			
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
					<?php echo $this->item->birth_time; ?>			
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
					<?php echo $this->item->birth_place; ?>			
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
					<?php echo $this->item->native; ?>			
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
						echo $result[$this->item->bloodgroup_id];
					?>
				</div>
			
			</div><!-- control group blood group name div ends -->	
	
	    </div><!-- matrimony family informations div ends -->
	    
	      
	    <!-- matrimony raasi information div starts -->  
	   <div class="matrimony-raasi-info tab-pane fade" id="matrimony-raasi-info">
	   
	        <!-- matrimony raasi informations heading -->
			<div class="matrimony-raasi-head">
				<h5 class="raasi-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_RAASI_INFORMATIONS'); ?></u></h5>
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
						echo $result[$this->item->janmaraase_id];
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
					<?php echo $this->item->janma_lagnam; ?>			
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
					<?php echo $this->item->janma_nakshatra; ?>			
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
					<?php echo $this->item->temple_name; ?>		
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
					<?php echo $this->item->ragu_gathu; ?>			
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
					<?php echo $this->item->sevai_opt; ?>			
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
					<?php echo $this->item->pavagam_change; ?>			
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
					<?php echo $this->item->janana_kalam; ?>			
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
					<?php echo $this->item->dasa_bukthi; ?>			
				</div>
			
			</div><!-- control group end of nadaapu dasa bukthi div ends -->	
			
		</div><!-- matrimony raasi information div ends -->
	   
	    <!-- matrimony additional informations div starts -->
	    <div class="matrimony-additional-infos tab-pane fade" id="matrimony-additional-infos">
	    
	        <!-- matrimony additional informations heading -->
			<div class="matrimony-additional-head">
				<h5 class="raasi-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_ADDITIONAL_INFORMATIONS'); ?></u></h5>
			</div>    
	    
	    	<!-- control group additional information div starts -->
			<div class="control-group">
				
				<!-- register additional information label -->
				<label class="control-label" for="<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_ADDITIONAL_INFORMATION')?>">
					<?php echo JText::_('COM_TRUEMATRIMONY_REGISTER_ADDITIONAL_INFORMATION'); ?>
				</label>
				<!-- register additional information div starts -->
				<div class="controls">
					<?php echo $this->item->additional_info; ?>		
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
					<?php echo $this->item->expectations; ?>			
				</div>
			
			</div><!-- control group expectations into div ends -->	
	    
	    </div><!-- matrimony additional informations div ends -->	
			
		<div class="matrimony-education-info tab-pane fade" id="matrimony-education-info">
		 
			<h5 class="basic-info-head" style="color:#F89406;"><u><?php echo JText::_('COM_TRUEMATRIMONY_EDUCATION_AND_OCCUPATION'); ?></u></h5> 			 
		
				    
        <!-- profile highest education control group div starts -->
		<?php if(!empty($this->item->highesteducation_id)) : ?>
		<div class="control-group">
			
			<!-- profile highest education label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_HIGHEST_EDUCATION');?></label>
			
			<!-- profile highest education control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getHighestedu('highestedu','', $this->item->highesteducation_id);
					echo $result[$this->item->highesteducation_id]; 
				?>
			</div>
						
		</div><!-- profile highest education control group div starts -->
		<?php endif; ?>
		
		<!-- profile occupation control group div starts -->
		<?php if(!empty($this->item->occupation_id)) : ?>
		<div class="control-group">
			
			<!-- profile occupation label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_OCCUPATION');?></label>
			
			<!-- profile occupation control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getOccupationlist('occupation','', $this->item->occupation_id);
					echo $result[$this->item->occupation_id]; 
				?>
			</div>
						
		</div><!-- profile occupation control group div starts -->
		<?php endif; ?>
		
		<!-- profile employedin control group div starts -->
		<?php if(!empty($this->item->employedin_id)) : ?>
		<div class="control-group">
			
			<!-- profile employedin label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_EMPLOYEDIN');?></label>
			
			<!-- profile employedin control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getEmployedinlist('employedin','', $this->item->employedin_id);
					echo $result[$this->item->employedin_id]; 
				?>
			</div>
						
		</div><!-- profile employedin control group div starts -->
		<?php endif; ?>
		
		<?php if(!empty($this->item->monthly_income)) : ?>		     
		<!-- profile monthly income control group div starts -->
		<div class="control-group">
			
			<!-- profile monthly income label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_MONTHLY_INCOME');?></label>
			
			<!-- profile monthly income control groups -->
			<div class="control-groups">
				<?php echo $this->item->monthly_income; ?>
			</div>
						
		</div><!-- profile monthly income control group div starts -->
		<?php endif; ?>	
		</div>
		
		<div class="matrimony-physical-info tab-pane fade" id="matrimony-physical-info">
			
			<h5 class="basic-info-head" style="color:#F89406;"><u><b><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_PHYSICAL_ATTRIBUTES'); ?></b></u></h5> 		
		
		<!-- profile height control group div starts -->
		<?php if(!empty($this->item->height_id)) : ?>
		<div class="control-group">
			
			<!-- profile height label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_HEIGHT');?></label>
			
			<!-- profile height control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfileheight('profileheight','', $this->item->height_id);
					echo $result[$this->item->height_id]; 
				?>
			</div>
						
		</div><!-- profile height control group div starts -->
		<?php endif; ?>
		
		<!-- profile weight control group div starts -->
		<?php if(!empty($this->item->weight_id)) : ?>
		<div class="control-group">
			
			<!-- profile weight label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_WEIGHT');?></label>
			
			<!-- profile weight control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfileweight('profileweight','', $this->item->weight_id);
					echo $result[$this->item->weight_id]; 
				?>
			</div>
						
		</div><!-- profile weight control group div starts -->
		<?php endif; ?>
		
		<!-- profile body type control group div starts -->
		<?php if(!empty($this->item->bodytype_id)) : ?>
		<div class="control-group">
			
			<!-- profile body type label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_BODY_TYPE');?></label>
			
			<!-- profile body type control groups -->
			<div class="control-groups">
				<?php 
                    $result = TrueMatrimonyHelperSelect::getProfilebodytype('bodytype_id','', $this->item->bodytype_id); 				
					echo $result[$this->item->bodytype_id];
				?>
			</div>
						
		</div><!-- profile body type control group div starts -->
		<?php endif; ?>
		
		<!-- profile complexion control group div starts -->
		<?php if(!empty($this->item->complexion_id)) : ?>
		<div class="control-group">
			
			<!-- profile complexion label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_COMPLEXION');?></label>
			
			<!-- profile complexion control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfilecomplexion('profilecomplexion','', $this->item->complexion_id);
					echo $result[$this->item->complexion_id]; 
				?>
			</div>
						
		</div><!-- profile complexion control group div starts -->
		<?php endif; ?>
		
		<!-- profile physical state control group div starts -->
		<?php if(!empty($this->item->physicalstate_id)) : ?>
		<div class="control-group">
			
			<!-- profile physical state label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_PHYSICAL_STATE');?></label>
			
			<!-- profile physical state control groups -->
			<div class="control-groups">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfilephysicalstatus('physicalstatus','', $this->item->physicalstate_id);
					echo $result[$this->item->physicalstate_id]; 
				?>
			</div>
						
		</div><!-- profile physical state control group div starts -->
        <?php endif; ?>		
        </div>
        
	 </div><!-- profile additional information div ends -->	
	
	 <span>
            <input type="button" class="btn btn-warning" id="hideadditinfo" onclick="hideAdditionalinfo()" value="<?php echo JText::_('COM_TRUEMATRIMONY_HIDE_ADDITIONAL_INFORMATION'); ?>" style="float:right">
			<input type="button" class="btn btn-primary" id="moreinfo" onclick="showAdditionalinfo()" value="<?php echo JText::_('COM_TRUEMATRIMONY_SHOW_ADDITIONAL_INFORMATION'); ?>" style="float:right; margin-right:10px;">
  	 </span>
  	 	       
   </div><!-- profile member information div ends -->
</div><!-- profile member information row-fluid div ends -->

<input type="hidden" name="option" value="com_truematrimony"/>
<input type="hidden" name="view" value="profiles"/>
<input type="hidden" id="task" name="task" value="uploadpicture"/>
<input type="hidden" name="layout" value="item_member"/>	
<input type="hidden" name="truematrimony_profile_id" id="truematrimony_profile_id" value="<?php echo $this->item->truematrimony_profile_id; ?>" >	

<?php echo JHtml::_('form.token'); ?>
</form>

