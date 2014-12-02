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

require_once(JPATH_COMPONENT. '/models/search.php');

/**
 * 
 * @var $user Get the user informations.
 */
$user = JFactory::getUser();

/**
 * 
 * @var $objitems Create the object frin model search.
 */
$objitems = new TruematrimonyModelSearch();

$items = $objitems->getSearchProfiles();

$app = JFactory::getApplication();

//print_r($items);

$app = JFactory::getApplication();

//$action = 'index.php?option=com_truematrimony&view=search&layout=item';
?>


<!-- search module row-fluid div starts -->
<div class="row-fluid">
      	     	
      	<!-- search module form starts -->
      	<form class="form-horizontal" role="form" name="adminForm" id="adminForm" method="post" >	  		  
			
			<h4 class="search-head"><?php echo JText::_('COM_TRUEMATRIMONY_SEARCH_PROFILE'); ?></h4>
					
			<!-- control group div starts -->
			<div class="control-group">
				
				<label class="control-label"><?php echo JText::_('Age'); ?></label>
											
				<!-- control group search age starts -->
				<div class="control-group search-age">
								
					<input type="text" name="from-age" class="mini" id="from-age" value="" size="10" placeholder="Age From" style="width:91px;">
						
					<input type="text" name="to-age" id="to-age" value="" size="10" placeholder="Age To" style="width:91px; margin-left:20px;">
						
				</div><!-- control group search age ends -->
			
			</div><!-- control group div ends -->
			
			<!-- search kulam div starts -->
            <div class="control-group search-kulam">
				
				<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_SEARCH_KULAM'); ?></label>   
				
				<!-- form groups div starts -->
				<div class="control-groups">
					<?php
					$result = TrueMatrimonyHelperSelect::getCastelist('caste_id','','');
					echo JHtml::_('select.genericlist', $result, 'caste_id', 'text', '');
					?>
				</div>	    
            
            </div><!-- search country div ends -->
			
			<!-- search country div starts -->
            <div class="control-group search-country">
				
				<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_SEARCH_COUNTRY'); ?></label>   
				
				<!-- form groups div starts -->
				<div class="control-groups">
					<?php
					$result = TrueMatrimonyHelperSelect::getCountrylist('country_id','','');
					echo JHtml::_('select.genericlist', $result, 'country_id', 'text', '');
					?>
				</div>	    
            
            </div><!-- search country div ends -->
            
            <!-- search highest education div starts -->
            <div class="control-group search-highestedu">
				
				<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_SEARCH_HIGHEST_EDUCATION'); ?></label>   
				
				<!-- form groups div starts -->
				<div class="control-groups">
					<?php
						$result = TrueMatrimonyHelperSelect::getHighestedu('highestedu','','');
						echo JHtml::_('select.genericlist', $result, 'highesteducation_id', 'text', '');
					?>
				</div>	    
            
            </div><!-- search highest education div ends -->
            
             <!-- search occupation div starts -->
            <div class="control-group search-occupation">
				
				<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_SEARCH_OCCUPATION'); ?></label>   
				
				<!-- form groups div starts -->
				<div class="control-groups">
					<?php
						$result = TrueMatrimonyHelperSelect::getOccupationlist('occupation','','');
						echo JHtml::_('select.genericlist', $result, 'occupation_id', 'text', '');
					?>
				</div>	    
            
            </div><!-- search highest education div ends -->
            
            <!-- search employedin div starts -->
            <div class="control-group search-employedin">
				
				<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_SEARCH_EMPLOYED_IN'); ?></label>   
				
				<!-- form groups div starts -->
				<div class="control-groups">
					<?php
						$result = TrueMatrimonyHelperSelect::getEmployedinlist('employedin','','');
						echo JHtml::_('select.genericlist', $result, 'employedin_id', 'text', '');
					?>
				</div>	    
            
            </div><!-- search employedin div ends -->
                        
            <!-- search complexion div starts -->
            <div class="control-group search-complexion">
				
				<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_SEARCH_COMPLEXION'); ?></label>   
				
				<!-- form groups div starts -->
				<div class="control-groups">
					<?php
						$result = TrueMatrimonyHelperSelect::getProfilecomplexion('complexion','','');
						echo JHtml::_('select.genericlist', $result, 'complexion_id', 'text', '');
					?>
				</div>	    
            
            </div><!-- search complexion div ends -->
                          	
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
			
		<input type="hidden" name="table" value="profiles">	
		<input type="hidden" name="task" value="getAdvanceProfiles" />
		<input type="hidden" name="view" value="searchs" />		
		<input type="hidden" name="layout" value="item" />
		<input type="hidden" name="option" value="com_truematrimony" />
		<input type="hidden" name="id" value="<?php echo $user->profile_id; ?>" />
						
		<?php echo JHtml::_('form.token'); ?>
			
	  </form><!-- true matrimony search module form ends -->
	
</div><!-- search module row-fluid div starts -->	


<!-- search results row -fluid div starts  -->
<div class="row-fluid">     
        
    <!-- form starts -->
	<form class="form-horizontal" role="form">
	<?PHP
		/**
	 * 
	 * @var $items Get the items from getsearchprofiles method.
	 */
	if(!empty($items)) { ?>

	<ul class="profile-search-results unstyled" style="list-style:none;">
	
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
		    <label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_ID'); ?></label>
		    
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
		
		
		<!-- profile name control groups div starts -->
		<div class="control-groups">
		
		    <!-- profile name control label -->
		    <label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_NAME'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group">
		     	<?php echo $items[$i]['profile_name']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- profile name control groups div ends -->
		
		<!-- dob control groups div starts -->
		<div class="control-groups">
		
		    <!-- dob control label -->
		    <label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_DATE_OF_BIRTH'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group">
				<?php echo $items[$i]['dob']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- dob control groups div ends -->
				
		<!-- age control groups div starts -->
		<div class="control-groups">
		
		    <!-- age control label -->
		    <label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_AGE'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group">
		     	<?php echo $items[$i]['age']; ?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- dob control groups div ends -->
			
		<?php if(!empty($items[$i]['caste_id'])) :?>	
		<!-- caste name control groups div starts -->
		<div class="control-groups">
		
		    <!-- caste name control label -->
		    <label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_CASTE'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group">
		     	<?php 
		     		$result = TrueMatrimonyHelperSelect::getCastelist('caste_id','',$items[$i]['caste_id']);
					echo $result[$items[$i]['caste_id']]; 
				?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- caste name control groups div ends -->
		<?php endif; ?>
		
		<?php if($items[$i]['country_id']) :?>
		<!-- country control groups div starts -->
		<div class="control-groups">
		
		    <!-- country control label -->
		    <label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_PROFILE_COUNTRY'); ?></label>
		    
		    <!-- control group div starts -->
			<div class="control-group">
		     	<?php 
		     		$result = TrueMatrimonyHelperSelect::getCountrylist('country_id','',$items[$i]['country_id']);
					echo $result[$items[$i]['country_id']]; 
				?>				
		    </div><!-- control group div ends -->
		    
		</div><!-- country control groups div ends -->
		<?php endif; ?>
			
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


<style>
	
.search-age {
display:inline-flex;
}	
	
.profile-search-results .control-label {
margin-right:15px;
margin-top:-5px;
font-weight:bold;
}
</style>

</div><!-- search results row -fluid div ends  -->
