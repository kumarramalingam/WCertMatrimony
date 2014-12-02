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

$app = JFactory::getApplication();

$document = JFactory::getDocument();

$document->addStyleSheet( JURI::root(true).'/modules/mod_truematrimony/media/css/style.css');

$action = 'index.php?option=com_truematrimony&view=profile';

?>

<!-- search module row-fluid div starts -->
<div class="container">
      	     	
      	<!-- search module form starts -->
      	<form class="form-horizontal" role="form" name="adminForm" id="adminForm" method="post">
		  
			<!-- control group div starts -->
			<div class="form-group search-options">
				
				<h4 class="search-head" style="text-align:center;"><?php echo JText::_('MOD_TRUEMATRIMONY_SEARCH_PROFILE'); ?></h4>
								
				<div class="row-fluid col-md-offset-3">
				
				<?php if(!$user->id) : ?>
				 <!-- search bride groom options -->	
				 			
				<div class="col-md-2 search-bride-groom">
					<label class="radio-inline">
					  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Bride
					</label>
					<label class="radio-inline">
					  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Groom
					</label>
				</div>				
				<?php endif; ?>
				
				<!-- search from age options -->	
				<div class="col-md-2 search-fage">					
					<label class="control-label"><?php echo "Age From"?></label>
					<input type="text" name="from-age" class="col-md-offset-1" id="from-age" value="" maxlength="2" size="10" required>
				</div>
				
				<!-- search to age options -->	
				<div class="col-md-1 search-tage">
					<label class="control-label"><?php echo "to"?></label>			
					<input type="text" name="to-age" class="col-md-offset-1" id="to-age" value="" maxlength="2" size="10" required>
				</div>
				
				<!-- search caste options -->
				<div class="col-md-3 search-caste">			    
					<?php
					$result = TrueMatrimonyHelperSelect::getCastelist('caste_id','','');
					echo JHtml::_('select.genericlist', $result, 'caste_id', 'text', '');
					?>
		        </div>
		        
		        <div class="col-md-2">
		            <?php if(!$user->id) { ?>					    
					<a href="#myModal" role="button" class="btn btn-success" data-toggle="modal"><?php echo JText::_('COM_TRUEMATRIMONY_SEARCH')?></a>
					<?php } else { ?>																					
					<input type="submit" class="btn btn-success" value="<?php echo JText::_('COM_TRUEMATRIMONY_SEARCH')?>" >																	
					<?php } ?>
				</div>		        
		        </div>
																	
			</div><!-- control group div ends -->
						   
            <!-- modal row-fluid div starts -->   
            <div class="row-fluid search-opt-modal">
				 
				<!-- Modal div starts -->
				<div id="myModal" class="modal fade in col-md-offset-4 col-md-3" role="dialog" style="background: none repeat scroll 0 0 #ffffff;margin-top: 76px;max-height: 280px; overflow:hidden;">
				  
				  <!-- modal header -->
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 id="myModalLabel"><?php echo JText::_('MOD_TRUEMATRIMONY_REGISTER_YOUR_PROFILE'); ?></h4>
				  </div>
				  
				  <!-- modal body -->
				  <div class="modal-body">
					<a href="index.php?option=com_truematrimony&view=profile&layout=item"><h4 class="alert alert-warning"><?php echo JText::_('MOD_TRUEMATRIMONY_GO_TO_REGISTER'); ?></h4></a>
				  </div>
				  
				  <!-- modal footer -->
				  <div class="modal-footer">
					<button class="btn btn-success" data-dismiss="modal" aria-hidden="true"><?php echo JText::_('MOD_TRUEMATRIMONY_REGISTER_YOUR_PROFILE_MODAL_CLOSE'); ?></button>
				  </div>
				  
				</div><!-- Modal div ends -->   
				
			</div><!-- modal row-fluid div ends --> 	    
	    <!-- 
	    <button class="btn btn-default"><?php echo JText::_('COM_TRUEMATRIMONY_SEARCH_CANCEL'); ?></button>
		-->					
		<input type="hidden" name="table" value="profiles" />
		<input type="hidden" name="task" value="getProfiles" />
		<input type="hidden" name="view" value="profile" />
		<input type="hidden" name="layout" value="item_search" />
		<input type="hidden" name="option" value="com_truematrimony" />
		<input type="hidden" name="id" value="<?php echo $user->profile_id; ?>" />
		
		<?php echo JHtml::_('form.token'); ?>
			
	  </form><!-- true matrimony search module form ends -->
	
</div><!-- search module row-fluid div starts -->	

<!-- search results row -fluid div starts  -->
<div class="row-fluid search-opt-results">     
	        
    <!-- form starts -->
	<form class="form-horizontal" role="form">
	
	<?php if(!empty($items)) { ?>
    
    <h4><?php echo "Profile search results"?></h4>
    
	<ul class="profile-search-results container">
	
	<?php for($i=0; $i<count($items); $i++) : ?>
		
    <li>
		
	<div class="container">
			
	<h5><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_INFORMATIONS'); ?></h5>		
    <!-- profile photos div starts -->
    <div class="col-md-2 matrimony-profile-image">
    	
    	<!-- profile member default image -->
		<?php
			if($items[$i]['profile_img']!="") {			
			$path = JUri::root().'/media/truematrimony/profiles/profile_'.$items[$i]['truematrimony_profile_id'].'/thumbs/'.$items[$i]['profile_img'];	
		    } else {
		    	if($items[$i]['gender']==1) {
			       $path = JURI::root().'/components/com_truematrimony/helpers/images/no-avatar.jpg';
		    	} else {
		    	   $path = JURI::root().'/components/com_truematrimony/helpers/images/no-female.png';
		    	}		    	
		    }			
		 ?>
		
		<img src="<?php echo $path;?>" class="" style="max-width:150px;">
    
    </div><!-- profile photos div starts -->   
	
	<!-- profile search results information div starts -->
	<div class="col-md-6 col-md-offset-0 matrimony-profile-results" style="padding-left:0px;">  
	   
	   <form name="adminForm" id="adminForm" class="form-horizontal">
	   
	    <!-- profile id control groups div starts -->
		<div class="control-groups">
		
		    <!-- profile id control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_ID'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
			   	<?php 
			   	if($items[$i]['gender']==1) {			   	
			   		echo 'M'.$items[$i]['truematrimony_profile_id'];
			   	} else {
			   		echo 'F'.$items[$i]['truematrimony_profile_id'];
			   	} ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- profile id control groups div ends -->
		
		<?php if($params->get('show_profilename')==1) { ?>
		<!-- profile name control groups div starts -->
		<div class="control-groups">
		
		    <!-- profile name control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_NAME'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
		     	<?php echo $items[$i]['profile_name']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- profile name control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_dob')==1) { ?>
		<!-- dob control groups div starts -->
		<div class="control-groups">
		
		    <!-- dob control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_DATE_OF_BIRTH'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					$newDate = date("d-m-Y", strtotime($items[$i]['dob']));
					echo $newDate;
				?>							
		    </div><!-- control group div ends -->
		    
		</div><!-- dob control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_age')==1) { ?>
		<!-- age control groups div starts -->
		<div class="control-groups">
		
		    <!-- age control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_AGE'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
		     	<?php echo $items[$i]['age'].' years'; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- dob control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_caste')==1) { ?>
		<!-- caste name control groups div starts -->
		<div class="control-groups">
		
		    <!-- caste name control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_CASTE'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
		     	<?php 
		     		$result = TrueMatrimonyHelperSelect::getCastelist('caste_id','',$items[$i]['caste_id']);
					echo $result[$items[$i]['caste_id']]; 
				?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- caste name control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_country')==1) { ?>		
		<!-- country control groups div starts -->
		<div class="control-groups">
		
		    <!-- country control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_COUNTRY'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
		     	<?php 
		     		$result = TrueMatrimonyHelperSelect::getCountrylist('country_id','',$items[$i]['country_id']);
					echo $result[$items[$i]['country_id']]; 
				?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- country control groups div ends -->
		<?php } ?>	
				
		<?php if($params->get('show_religion')==1) { ?>		
		<!-- country control groups div starts -->
		<div class="control-groups">
		
		    <!-- country control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_RELIGION'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
		     	<?php 
		     	  $result = TrueMatrimonyHelperSelect::getReligionlist('religion_id','', $items[$i]['religion_id']);
			      echo $result[$items[$i]['religion_id']];
				?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- country control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_mothertongue')==1) { ?>		
		<!-- country control groups div starts -->
		<div class="control-groups">
		
		    <!-- country control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_MOTHER_TONGUE'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
		     	<?php 
		     	  $result=TrueMatrimonyHelperSelect::getMothertongueslist('mothertongue_id', '', $items[$i]['mothertongue_id']);
				  echo $result[$items[$i]['mothertongue_id']]; 
				 ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- country control groups div ends -->
		<?php } ?>		
		
		<?php if($params->get('show_mobileno')==1) { ?>
		<!-- dob control groups div starts -->
		<div class="control-groups">
		
		    <!-- dob control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_MOBILE_NUMBER'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php echo $items[$i]['mobile_number']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- dob control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_email')==1) { ?>
		<!-- dob control groups div starts -->
		<div class="control-groups">
		
		    <!-- dob control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_EMAIL'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php echo $items[$i]['email']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- dob control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_father')==1 && !empty($items[$i]['father_name'])) { ?>
		<!-- father name control groups div starts -->
		<div class="control-groups">
		
		    <!-- father name control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_FATHER_NAME'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php echo $items[$i]['father_name']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- father control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_mother')==1 && !empty($items[$i]['mother_name'])) { ?>
		<!-- mother name control groups div starts -->
		<div class="control-groups">
		
		    <!-- mother name control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_MOTHER_NAME'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php echo $items[$i]['mother_name']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- mother control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_siblings')==1 && !empty($items[$i]['siblings_members'])) { ?>
		<!-- siblings control groups div starts -->
		<div class="control-groups">
		
		    <!-- siblings control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_SIBLINGS'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php echo $items[$i]['siblings_members']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- siblings control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_birthtime')==1 && !empty($items[$i]['birth_time'])) { ?>
		<!-- birth time control groups div starts -->
		<div class="control-groups">
		
		    <!-- birth time control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_BIRTH_TIME'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php echo $items[$i]['birth_time']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- birth time control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_birthplace')==1 && !empty($items[$i]['birth_place'])) { ?>
		<!-- birth place control groups div starts -->
		<div class="control-groups">
		
		    <!-- birth place control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_BIRTH_PLACE'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php echo $items[$i]['birth_place']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- birth place control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_native')==1 && !empty($items[$i]['native'])) { ?>
		<!-- native control groups div starts -->
		<div class="control-groups">
		
		    <!-- native control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_NATIVE'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php echo $items[$i]['native']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- native control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_bloodgroup')==1 && !empty($items[$i]['bloodgroup_id'])) { ?>
		<!-- blood group control groups div starts -->
		<div class="control-groups">
		
		    <!-- blood group control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_BLOOD_GROUP'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					$result = TrueMatrimonyHelperSelect::getBloodgroup('bloodgroup_id', '', $items[$i]['bloodgroup_id']);
					echo $result[$items[$i]['bloodgroup_id']];
				?>
		    </div><!-- control group div ends -->
		    
		</div><!-- blood group control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_templename')==1 && !empty($items[$i]['temple_name'])) { ?>
		<!-- temple name control groups div starts -->
		<div class="control-groups">
		
		    <!-- temple name control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_TEMPLE_NAME'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					echo $items[$i]['temple_name'];
				?>
		    </div><!-- control group div ends -->
		    
		</div><!-- temple name control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_janmaraase')==1 && !empty($items[$i]['janmaraase_id'])) { ?>
		<!-- janama raase control groups div starts -->
		<div class="control-groups">
		
		    <!-- janama raase control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_JANAMA_RAASE'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					$result = TrueMatrimonyHelperSelect::getJanmaraasi('janmaraase_id', '', $items[$i]['janmaraase_id']);
					echo $result[$items[$i]['janmaraase_id']];
				?>
		    </div><!-- control group div ends -->
		    
		</div><!-- janama raase control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_janmalagnam')==1 && !empty($items[$i]['janma_lagnam'])) { ?>
		<!-- janama lagnam control groups div starts -->
		<div class="control-groups">
		
		    <!-- janama lagnam control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_JANAMA_LAGNAM'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					echo $items[$i]['janma_lagnam'];
				?>
		    </div><!-- control group div ends -->
		    
		</div><!-- janama lagnam control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_janmanakshatra')==1 && !empty($items[$i]['janma_nakshatra'])) { ?>
		<!-- janama nakshatra control groups div starts -->
		<div class="control-groups">
		
		    <!-- janama nakshatra control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_JANAMA_NAKSHATRA'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					echo $items[$i]['janma_lagnam'];
				?>
		    </div><!-- control group div ends -->
		    
		</div><!-- janama nakshatra control groups div ends -->
		<?php } ?>
			
		<?php if($params->get('show_ragugathu')==1 && !empty($items[$i]['ragu_gathu'])) { ?>
		<!-- ragu gathu control groups div starts -->
		<div class="control-groups">
		
		    <!-- ragu gathu control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_RAHU_AND_KETHU'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					echo $items[$i]['ragu_gathu'];
				?>
		    </div><!-- control group div ends -->
		    
		</div><!-- ragu gathu control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_sevai')==1 && !empty($items[$i]['sevai_opt'])) { ?>
		<!-- sevai control groups div starts -->
		<div class="control-groups">
		
		    <!-- sevai control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_SEVAI'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					echo $items[$i]['sevai_opt'];
				?>
		    </div><!-- control group div ends -->
		    
		</div><!-- sevai control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_pavagam')==1 && !empty($items[$i]['pavagam_change'])) { ?>
		<!-- pavagam change control groups div starts -->
		<div class="control-groups">
		
		    <!-- pavagam change control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_PAVAGAM_CHANGE'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					echo $items[$i]['pavagam_change'];
				?>
		    </div><!-- control group div ends -->
		    
		</div><!-- pavagam change control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_jananakalam')==1 && !empty($items[$i]['janana_kalam'])) { ?>
		<!-- janana kalam control groups div starts -->
		<div class="control-groups">
		
		    <!-- janana kalam control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_JANANA_KALAM'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					echo $items[$i]['janana_kalam'];
				?>
		    </div><!-- control group div ends -->
		    
		</div><!-- janana kalam control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_dasabukthi')==1 && !empty($items[$i]['dasa_bukthi'])) { ?>
		<!-- dasa bukthi control groups div starts -->
		<div class="control-groups">
		
		    <!-- dasa bukthi control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_DASA_BUKTHI'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					echo $items[$i]['dasa_bukthi'];
				?>
		    </div><!-- control group div ends -->
		    
		</div><!-- dasa bukthi control groups div ends -->
		<?php } ?>
					
		<?php if($params->get('show_highesteducate')==1 && !empty($items[$i]['highesteducation_id'])) { ?>
		<!-- highest education control groups div starts -->
		<div class="control-groups">
		
		    <!-- highest education control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_HIGHEST_EDUCATION'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
		     	  $result = TrueMatrimonyHelperSelect::getHighestedu('highestedu','',$items[$i]['highesteducation_id']);
		     	  echo $result[$items[$i]['highesteducation_id']]; 
				?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- highest education control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_occupation')==1 && !empty($items[$i]['occupation_id'])) { ?>
		<!-- occupation control groups div starts -->
		<div class="control-groups">
		
		    <!-- occupation control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_OCCUPATION'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					$result = TrueMatrimonyHelperSelect::getOccupationlist('occupation','', $items[$i]['occupation_id']);
					echo $result[$items[$i]['occupation_id']]; 
				?>		
		    </div><!-- control group div ends -->
		    
		</div><!-- occupation control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_employedin')==1 && !empty($items[$i]['employedin_id'])) { ?>
		<!-- employedin control groups div starts -->
		<div class="control-groups">
		
		    <!-- employedin control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_EMPLOYED_IN'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					$result = TrueMatrimonyHelperSelect::getEmployedinlist('employedin','', $items[$i]['employedin_id']);
					echo $result[$items[$i]['employedin_id']]; 
				?>	
		    </div><!-- control group div ends -->
		    
		</div><!-- employedin control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_monthlyincome')==1 && !empty($items[$i]['monthly_income'])) { ?>
		<!-- monthly income control groups div starts -->
		<div class="control-groups">
		
		    <!-- monthly income control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_MONTHLY_INCOME'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php echo $items[$i]['monthly_income']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- monthly income control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_height')==1 && !empty($items[$i]['height_id'])) { ?>
		<!-- height control groups div starts -->
		<div class="control-groups">
		
		    <!-- height control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_HEIGHT'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfileheight('profileheight','', $items[$i]['height_id']);
					echo $result[$items[$i]['height_id']]; 
				?>			
		    </div><!-- control group div ends -->
		    
		</div><!-- height control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_weight')==1 && !empty($items[$i]['weight_id'])) { ?>
		<!-- weight control groups div starts -->
		<div class="control-groups">
		
		    <!-- weight control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_WEIGHT'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfileweight('profileweight','', $items[$i]['weight_id']);
					echo $result[$items[$i]['weight_id']]; 
				?>		
		    </div><!-- control group div ends -->
		    
		</div><!-- weight control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_bodytype')==1 && !empty($items[$i]['bodytype_id'])) { ?>
		<!-- body type control groups div starts -->
		<div class="control-groups">
		
		    <!-- body type control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_BODY_TYPE'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
                    $result = TrueMatrimonyHelperSelect::getProfilebodytype('bodytype_id','', $items[$i]['bodytype_id']); 				
					echo $result[$items[$i]['bodytype_id']];
				?>	
		    </div><!-- control group div ends -->
		    
		</div><!-- body type control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_complexion')==1 && !empty($items[$i]['complexion_id'])) { ?>
		<!-- complexion control groups div starts -->
		<div class="control-groups">
		
		    <!-- complexion control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_COMPLEXION_TYPE'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfilecomplexion('profilecomplexion','', $items[$i]['complexion_id']);
					echo $result[$items[$i]['complexion_id']]; 
				?>	
		    </div><!-- control group div ends -->
		    
		</div><!-- complexion control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_physical')==1 && !empty($items[$i]['physicalstate_id'])) { ?>
		<!-- physical status control groups div starts -->
		<div class="control-groups">
		
		    <!-- physical status control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_PHYSICAL_STATUS'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					$result = TrueMatrimonyHelperSelect::getProfilephysicalstatus('physicalstatus','', $items[$i]['physicalstate_id']);
					echo $result[$items[$i]['physicalstate_id']]; 
				?>
		    </div><!-- control group div ends -->
		    
		</div><!-- physical status control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_additinfo')==1 && !empty($items[$i]['additional_info'])) { ?>
		<!-- additional information control groups div starts -->
		<div class="control-groups">
		
		    <!-- additional information control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_ADDITIONAL_INFORMATION'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					echo $items[$i]['additional_info']; 
				?>
		    </div><!-- control group div ends -->
		    
		</div><!-- additional information control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_expectations')==1 && !empty($items[$i]['expectations'])) { ?>
		<!-- expectations control groups div starts -->
		<div class="control-groups">
		
		    <!-- expectations control label -->
		    <label class="control-label col-md-4"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_EXPECTATIONS'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group col-md-4">
				<?php 
					echo $items[$i]['expectations']; 
				?>
		    </div><!-- control group div ends -->
		    
		</div><!-- expectations control groups div ends -->
		<?php } ?>
		
		</form>
		 </div><!-- profile search results information div end -->
		
		</div>
		</li> 
		
		<?php endfor; ?>
		
		</ul>		
		
		<?php } else { ?>
		       
		       <!-- -->
		       <?php if(!empty($_POST)) :?>
			
               		<h3 class="label label-warning"><?php echo JText::_('MOD_TRUEMATRIMONY_DOES_NOT_FOUND_SEARCH_RESULTS'); ?></h3>
			   
			   <?php endif; ?>
			    
		<?php } ?>
	
	</form><!-- form ends -->

</div><!-- search results row -fluid div ends  -->


