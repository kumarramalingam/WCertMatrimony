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

$action = 'index.php?option=com_truematrimony&view=profile';
?>

<!-- search module row-fluid div starts -->
<div class="row-fluid">
      	     	
      	<!-- search module form starts -->
      	<form class="form-horizontal" role="form" name="adminForm" id="adminForm" method="post">
		  		  
			
			<h4 class="search-head"><?php echo JText::_('MOD_TRUEMATRIMONY_SEARCH_PROFILE'); ?></h4>
			
			<?php if(!$user->id) : ?>
					
			<!-- control group div starts -->
			<div class="form-group search-mf">
				
				<label class="form-label"><?php echo JText::_('MOD_TRUEMATRIMONY_SEARCH_OPTIONS'); ?></label>
						
				<!-- bride radio div starts -->
				<div class="radio-inline">				  
				    <input type="radio" name="search-opt-bride" id="search-opt-bride" value="bride">		
				    <?php echo JText::_('MOD_TRUEMATRIMONY_SEARCH_BRIDE_LABEL'); ?>				    
				    <input type="radio" name="search-opt-groom" id="search-opt-groom" value="groom">
				     <?php echo JText::_('MOD_TRUEMATRIMONY_SEARCH_GROOM_LABEL'); ?>			  
				</div><!-- bride radio div ends -->
																	
			</div><!-- control group div ends -->
			<?php endif; ?>
					
			<!-- control group search age starts -->
			<div class="form-group search-age">
							
				<input type="text" name="from-age" class="mini" id="from-age" value="" size="10" placeholder="Age From" required>
								
				<input type="text" name="to-age" id="to-age" value="" size="10" placeholder="Age To" required>
			    
			    <?php
			    $result = TrueMatrimonyHelperSelect::getCastelist('caste_id','','');
				echo JHtml::_('select.genericlist', $result, 'caste_id', 'text', '');
		        ?>
		
			</div><!-- control group search age ends -->
			
			<?php if(!$user->id) { ?>					    
			<a href="#myModal" role="button" class="btn btn-success" data-toggle="modal"><?php echo JText::_('COM_TRUEMATRIMONY_SEARCH')?></a>
			<?php } else { ?>			
															 					
			<input type="submit" class="btn btn-success" value="<?php echo JText::_('COM_TRUEMATRIMONY_SEARCH')?>" >
															
			<?php } ?>	   

			<!-- Modal div starts -->
			<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  
			  <!-- modal header -->
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 id="myModalLabel"><?php echo JText::_('MOD_TRUEMATRIMONY_REGISTER_YOUR_PROFILE'); ?></h4>
			  </div>
			  
			  <!-- modal body -->
			  <div class="modal-body">
				<a href="index.php?option=com_truematrimony&view=profile&layout=item"><h4 class="label label-warning"><?php echo JText::_('MOD_TRUEMATRIMONY_GO_TO_REGISTER'); ?></h4></a>
			  </div>
			  
			  <!-- modal footer -->
			  <div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo JText::_('MOD_TRUEMATRIMONY_REGISTER_YOUR_PROFILE_MODAL_CLOSE'); ?></button>
			  </div>
			  
			</div><!-- Modal div ends -->   	    
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
<div class="row-fluid">     
<style>
.profile-search-results .control-label {
margin-right:15px;
margin-top:-5px;
font-weight:bold;
}
</style>
	        
    <!-- form starts -->
	<form class="form-horizontal" role="form">
	
	<?php if(!empty($items)) { ?>

	<ul class="profile-search-results unstyled">
	
	<?php for($i=0; $i<count($items); $i++) : ?>
		
    <li>
    <!-- profile photos div starts -->
    <div class="span2 col-md-2">
    	
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
		
		<img src="<?php echo $path;?>" class="">
    
    </div><!-- profile photos div starts -->   
	
	<!-- profile search results information div starts -->
	<div class="span10 col-md-10">  
	   
	    <!-- profile id control groups div starts -->
		<div class="control-groups">
		    
		    <!-- profile id control label -->
		    <label class="control-label"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_ID'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group">
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
		    <label class="control-label"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_NAME'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group">
		     	<?php echo $items[$i]['profile_name']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- profile name control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_dob')==1) { ?>
		<!-- dob control groups div starts -->
		<div class="control-groups">
		
		    <!-- dob control label -->
		    <label class="control-label"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_DATE_OF_BIRTH'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group">
				<?php echo $items[$i]['dob']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- dob control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_age')==1) { ?>
		<!-- age control groups div starts -->
		<div class="control-groups">
		
		    <!-- age control label -->
		    <label class="control-label"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_AGE'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group">
		     	<?php echo $items[$i]['age']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- dob control groups div ends -->
		<?php } ?>
		
		<?php if($params->get('show_caste')==1) { ?>
		<!-- caste name control groups div starts -->
		<div class="control-groups">
		
		    <!-- caste name control label -->
		    <label class="control-label"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_CASTE'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group">
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
		    <label class="control-label"><?php echo JText::_('MOD_TRUEMATRIMONY_PROFILE_COUNTRY'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group">
		     	<?php 
		     		$result = TrueMatrimonyHelperSelect::getCountrylist('country_id','',$items[$i]['country_id']);
					echo $result[$items[$i]['country_id']]; 
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
		
		 </div><!-- profile search results information div end -->
		
		</li> 
		
		<?php endfor; ?>
		
		</ul>		
		
		<?php } else { ?>
		      
		       <?php if(!empty($_POST)) :?>
			
               		<h3 class="label label-warning"><?php echo JText::_('MOD_TRUEMATRIMONY_DOES_NOT_FOUND_SEARCH_RESULTS'); ?></h3>
			   
			   <?php endif; ?>
			    
		<?php } ?>
	
	</form><!-- form ends -->

</div><!-- search results row -fluid div ends  -->


