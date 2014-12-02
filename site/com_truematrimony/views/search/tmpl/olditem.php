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
defined('_JEXEC') or die();

$action = JRoute::_('index.php?option=com_truematrimony&view=search');
?>

<!-- search form starts -->	
<form class="form-horizontal" role="form" name="adminForm" id="adminForm" method="post" action="<?php echo $action; ?>" >

	<!-- search module row-fluid div starts -->
	<div class="row-fluid">
	
	    <!-- control group div starts -->
		<div class="control-group">
		
		    <!-- search module label -->
			<label class="control-label"><?php echo JText::_('COM_TRUEMATRIMONY_SEARCH_LABEL'); ?></label>
		
		    <!-- control groups div starts -->
		    <div class="control-groups">
		    
		        <!-- search input box -->
		    	<input type="text" name="search_name" id="truematrimony-search" value="" />
		    
		    </div><!-- control groups div ends -->
		    
		</div><!-- control group div ends -->
		
		<!-- search button control group -->
		<div class="control-group">
			<button type="submit" class="btn btn-default"><?php echo JText::_('COM_TRUEMATRIMONY_SEARCH')?></button>
		</div>
	
	</div><!-- search module row-fluid div ends -->
	
	<input type="hidden" name="option" value="com_truematrimony"/>
	<input type="hidden" name="view" value="search"/>
	<input type="hidden" id="task" name="task" value="save"/>
	<input type="hidden" name="layout" value="item"/>
	<input type="hidden" name="truematrimony_profile_id" id="truematrimony_profile_id" value="<?php echo $this->item->truematrimony_profile_id; ?>" >	
	
</form><!-- search form ends -->	

