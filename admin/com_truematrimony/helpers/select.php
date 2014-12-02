<?php
/*------------------------------------------------------------------------
# com_truematrimony
# ------------------------------------------------------------------------
# author    Kumar Ramalingam - http://www.w3cert.in
# mail      kumar@w3cert.in
# copyright Copyright (C) 2012 w3cert.in All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://w3cert.in
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access');

/**
 * 
 * Helper class.
 * 
 * Get matrimony list items.
 */

class TrueMatrimonyHelperSelect {
	
	/**
	 * 
	 * Get profilefor list.
	 * 
	 * @param $name Profilefor list name.
	 * @param $attr Profilefor list attributes
	 * @param $selected_value Profilefor list selected values.
	 * @param $id Profilefor list id.
	 * @return mixed
	 */
	public function getProfileforlist($name='', $attr=array(), $selected_value='', $id='') {
				
		$items = FOFModel::getTmpInstance('Profilerefers', 'TrueMatrimonyModel')->enabled(1)->getList(true);
    	
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_SELECT_PROFILE_FOR');
		foreach($items as $item) {
			$result[$item->profilerefer_id] = $item->profile_reference;
		}			
		return $result;
	}
	
	public function getGenderlist($name='', $attr=array(), $selected_value='', $id='') {
	
	    $result =array();
	    $result[] = JText::_('COM_TRUEMATRIMONY_SELECT_GENDER');
		$result[] = JHtml::_('select.option',1,JText::_('MATRIMONY_MALE'));
		$result[] = JHtml::_('select.option',2,JText::_('MATRIMONY_FEMALE'));
		
		return $result;
		//return JHtml::_('select.genericlist',$result,$name,$attr, 'value','text',$selected_value, $id);
	}
		
	/**
	 *
	 * Get Mother tongues list.
	 *
	 * @param $name Mother tongues list name.
	 * @param $attr Mother tongues list attributes
	 * @param $selected_value Mother tongues list selected values.
	 * @param $id Mother tongues list id.
	 * @return mixed
	 */
	public function getMothertongueslist($name='', $attr=array(), $selected_value='', $id='') {
	
		$items = FOFModel::getTmpInstance('Mothertongues', 'TrueMatrimonyModel')->getItemList();
		 
		$result = array();
		//$result[] =JText::_('COM_TRUEMATRIMONY_SELECT_MOTHER_TONGUE');
		foreach($items as &$item) {
			$result[$item->truematrimony_mothertongue_id] =$item->mothertongue_type;
		}
		return $result;
	}

    /**
	 *
	 * Get package name list.
	 *
	 * @param $name package name.
	 * @param $attr package list attributes
	 * @param $selected_value package name list selected values.
	 * @param $id package name list id.
	 * @return mixed
	 */
	public function getPackagelist($name='', $attr=array(), $selected_value='', $id='') {
	
		$items = FOFModel::getTmpInstance('Packages', 'TrueMatrimonyModel')->getItemList();
		 
		$result = array();
		//$result[] =JText::_('COM_TRUEMATRIMONY_SELECT_MOTHER_TONGUE');
		foreach($items as &$item) {
			$result[$item->truematrimony_package_id] =$item->package_name;
		}
		return $result;
	}	
    
	/**
	 *
	 * Get Religion list.
	 *
	 * @param $name Religion list name.
	 * @param $attr Religion list attributes
	 * @param $selected_value Religion list selected values.
	 * @param $id Religion list id.
	 * @return mixed
	 */
	public function getReligionlist($name='', $attr=array(), $selected_value='', $id='') {
	
		$items = FOFModel::getTmpInstance('Religions', 'TrueMatrimonyModel')->getItemList();
			
		$result = array();
		//$result[] =JText::_('COM_TRUEMATRIMONY_SELECT_RELIGIONS');
		foreach($items as &$item) {
			$result[$item->truematrimony_religion_id] =$item->religion_type;
		}
		return $result;
	}
	
	/**
	 *
	 * Get Blood group list.
	 *
	 * @param $name Blood group list name.
	 * @param $attr Blood group list attributes
	 * @param $selected_value Blood group list selected values.
	 * @param $id Blood group id.
	 * @return mixed
	 */
	public function getBloodgroup($name='', $attr=array(), $selected_value='', $id='') {
	
		$items = FOFModel::getTmpInstance('Bloodgroups', 'TrueMatrimonyModel')->getItemList();
			
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_SELECT_BLOOD_GROUPS');
		foreach($items as &$item) {
			$result[$item->truematrimony_bloodgroup_id] =$item->bloodgroup_name;
		}
		return $result;
	}
	
	/**
	 *
	 * Get Janma raasi list.
	 *
	 * @param $name Janma raasi list name.
	 * @param $attr Janma raasi list attributes
	 * @param $selected_value Janma raasi list selected values.
	 * @param $id Janma raasi id.
	 * @return mixed
	 */
	public function getJanmaraasi($name='', $attr=array(), $selected_value='', $id='') {
	
		$items = FOFModel::getTmpInstance('Janmaraases', 'TrueMatrimonyModel')->getItemList();
			
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_SELECT_JANMA_RAASI');
		foreach($items as &$item) {
			$result[$item->truematrimony_janmaraase_id] =$item->janmaraasi_name;
		}
		return $result;
	}
	
	/**
	 *
	 * Get Caste list.
	 *
	 * @param $name Caste list name.
	 * @param $attr Caste list attributes
	 * @param $selected_value Caste list selected values.
	 * @param $id Caste list id.
	 * @return mixed
	 */
	public function getCastelist($name='', $attr=array(), $selected_value='', $id='') {
	
		$items = FOFModel::getTmpInstance('Castes', 'TrueMatrimonyModel')->getItemList();
			
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_SELECT_CASTE');
		foreach($items as &$item) {
			$result[$item->truematrimony_caste_id] =$item->caste_type;
		}
		return $result;
	}
	
	/**
	 *
	 * Get Mother Kuttam list.
	 *
	 * @param $name Caste list name.
	 * @param $attr Caste list attributes
	 * @param $selected_value Caste list selected values.
	 * @param $id Caste list id.
	 * @return mixed
	 */
	public function getMotherKuttamlist($name='', $attr=array(), $selected_value='', $id='') {
	
		$items = FOFModel::getTmpInstance('Motherkuttams', 'TrueMatrimonyModel')->getItemList();
			
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_SELECT_CASTE');
		foreach($items as &$item) {
			$result[$item->truematrimony_motherkuttam_id] =$item->motherkuttam_type;
		}
		return $result;
	}
	
	public function getMonthList($name='',$attr=array(),$selected_value='',$id='') {
	    
	    $result =array();
	    $result[] = JText::_('COM_TRUEMATRIMONY_SELECT_MONTH');
		$result[] = JHtml::_('select.option',01,JText::_('MATRIMONY_JAN'));
		$result[] = JHtml::_('select.option',02,JText::_('MATRIMONY_FEB'));
		$result[] = JHtml::_('select.option',03,JText::_('MATRIMONY_MAR'));
		$result[] = JHtml::_('select.option',04,JText::_('MATRIMONY_APR'));
		$result[] = JHtml::_('select.option',05,JText::_('MATRIMONY_MAY'));
		$result[] = JHtml::_('select.option',06,JText::_('MATRIMONY_JUN'));
		$result[] = JHtml::_('select.option',07,JText::_('MATRIMONY_JUL'));
		$result[] = JHtml::_('select.option',08,JText::_('MATRIMONY_AUG'));
		$result[] = JHtml::_('select.option',09,JText::_('MATRIMONY_SEP'));
		$result[] = JHtml::_('select.option',10,JText::_('MATRIMONY_OCT'));
		$result[] = JHtml::_('select.option',11,JText::_('MATRIMONY_NAV'));
		$result[] = JHtml::_('select.option',12,JText::_('MATRIMONY_DEC'));		
		return $result;
	}
	
	public function getDateList($name='',$attr=array(),$selected_value='',$id='') {
	    
	    $result =array();
	    $result[] = JText::_('COM_TRUEMATRIMONY_SELECT_DATE');
		for($i=1;$i<=31;$i++) {
		$result[] = JHtml::_('select.option',$i, $i);
	    }
		return $result;
	}
	
	
	
	/**
	 *
	 * Get Countries list.
	 *
	 * @param $name Countries list name.
	 * @param $attr Countries list attributes
	 * @param $selected_value Countries list selected values.
	 * @param $id Countries list id.
	 * @return mixed
	 */
	public function getCountrylist($name='', $attr=array(), $selected_value='', $id='') {
	
		$items = FOFModel::getTmpInstance('Countries', 'TrueMatrimonyModel')->getItemList();
			
		$result = array();
		//$result[] =JText::_('COM_TRUEMATRIMONY_SELECT_COUNTRY');
		foreach($items as &$item) {
			$result[$item->truematrimony_country_id] =$item->country_name;
		}
		return $result;
	}
	
	public function getRegCountrylist($name='', $attr=array(), $selected_value='', $id='') {
	
		$items = FOFModel::getTmpInstance('Countries', 'TrueMatrimonyModel')->getItemList();
			
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_REGISTER_SELECT_COUNTRY');
		foreach($items as &$item) {
			$result[$item->truematrimony_country_id] =$item->country_name;
		}
		return $result;
	}
	
	/**
	 * Get highest education list.
	 * 
	 * @param $name Highest education list name.
	 * @param $attr Highest education list attributes.
	 * @param $selected_value Highest education list selected value.
	 * @param $id Highest education list id.
	 */
	public function getHighestedu($name='', $attr=array(), $selected_value='', $id='') {
		$items = FOFModel::getTmpInstance('Highesteducations', 'TrueMatrimonyModel')->getItemList();
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_SELECT');
		foreach($items as &$item) {
			$result[$item->truematrimony_highesteducation_id] = $item->highesteducation_name;
		}
		return $result;
	}
		
	/**
	 * Get Occupation list.
	 *
	 * @param $name Occupation list name.
	 * @param $attr Occupation list attributes.
	 * @param $selected_value Occupation list selected value.
	 * @param $id Occupation list id.
	 */
	public function getOccupationlist($name='', $attr=array(), $selected_value='', $id='') {
		$items = FOFModel::getTmpInstance('Occupations', 'TrueMatrimonyModel')->getItemList();
			
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_SELECT');
		foreach($items as &$item) {
			$result[$item->truematrimony_occupation_id] = $item->occupation_name;
		}
		return $result;
	}
	
	/**
	 * Get Employed in list.
	 *
	 * @param $name Employed in list name.
	 * @param $attr Employed in list attributes.
	 * @param $selected_value Employed in list selected value.
	 * @param $id Employed in list id.
	 */
	public function getEmployedinlist($name='', $attr=array(), $selected_value='', $id='') {
		$items = FOFModel::getTmpInstance('Employedins', 'TrueMatrimonyModel')->getItemList();
			
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_SELECT');
		foreach($items as &$item) {
			$result[$item->truematrimony_employedin_id] = $item->employedin_name;
		}
		return $result;
	}
	
	public function getProfilefiles() {
	$items = FOFModel::getTmpInstance('Profiles', 'TrueMatrimonyModel')->getItemList();
	
	print_r($items);
	}
	
	/**
	 * Get Monthly income list.
	 *
	 * @param $name Monthly income list name.
	 * @param $attr Monthly income list attributes.
	 * @param $selected_value Monthly income list selected value.
	 * @param $id Monthly income list id.
	 */
	public function getMonthlyincome($name='', $attr=array(), $selected_value='', $id='') {
		$items = FOFModel::getTmpInstance('Monthlyincomes', 'TrueMatrimonyModel')->getItemList();
			
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_SELECT');
		foreach($items as &$item) {
			$result[$item->truematrimony_monthlyincome_id] = $item->monthlyincome_name;
		}
		return $result;
	}
	
	/**
	 * Get Profile height list.
	 *
	 * @param $name Profile height list name.
	 * @param $attr Profile height list attributes.
	 * @param $selected_value Profile height list selected value.
	 * @param $id Profile height list id.
	 */
	public function getProfileheight($name='', $attr=array(), $selected_value='', $id='') {
		$items = FOFModel::getTmpInstance('Heights', 'TrueMatrimonyModel')->getItemList();
			
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_SELECT_HEIGHT');
		foreach($items as &$item) {
			$result[$item->truematrimony_height_id] = $item->height_name;
		}
		return $result;
	}
	
	/**
	 * Get Profile weight list.
	 *
	 * @param $name Profile weight list name.
	 * @param $attr Profile weight list attributes.
	 * @param $selected_value Profile weight list selected value.
	 * @param $id Profile weight list id.
	 */
	public function getProfileweight($name='', $attr=array(), $selected_value='', $id='') {
		$items = FOFModel::getTmpInstance('Weights', 'TrueMatrimonyModel')->enabled(1)->getItemList();
			
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_SELECT_WEIGHT');
		foreach($items as &$item) {
			$result[$item->truematrimony_weight_id] = $item->weight_name;
		}
		return $result;
	}
	
	/**
	 * Get Profile body type list.
	 *
	 * @param $name Profile body type list name.
	 * @param $attr Profile body type list attributes.
	 * @param $selected_value Profile  list selected value.
	 * @param $id Profile weight list id.
	 */
	public function getProfilebodytype($name='', $attr=array(), $selected_value='', $id='') {

		$items = FOFModel::getTmpInstance('bodytype', 'TrueMatrimonyModel')->enabled(1)->getItemList();
			
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_SELECT_BODY_TYPE');
		foreach($items as &$item) {
			$result[$item->truematrimony_bodytype_id] = $item->bodytype_name;
		}
				
		return $result;		
	}
			
	/**
	 * Get Profile complexion list.
	 *
	 * @param $name Profile complexion list name.
	 * @param $attr Profile complexion list attributes.
	 * @param $selected_value Profile complexion list selected value.
	 * @param $id Profile complexion list id.
	 */
	public function getProfilecomplexion($name='', $attr=array(), $selected_value='', $id='') {
		
		
		$items = FOFModel::getTmpInstance('complexion', 'TrueMatrimonyModel')->enabled(1)->getItemList();
			
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_SELECT_COMPLEXION');
		foreach($items as &$item) {
			$result[$item->truematrimony_complexion_id] = $item->complexion_name;
		}
		
		return $result;
		
	}
	
	/**
	 * Get Profile complexion list.
	 *
	 * @param $name Profile complexion list name.
	 * @param $attr Profile complexion list attributes.
	 * @param $selected_value Profile complexion list selected value.
	 * @param $id Profile complexion list id.
	 */
	public function getProfilephysicalstatus($name='', $attr=array(), $selected_value='', $id='') {
		
		
		$items = FOFModel::getTmpInstance('Physicalstate', 'TrueMatrimonyModel')->enabled(1)->getItemList();
			
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_SELECT_PHYSICAL_STATUS');
		foreach($items as &$item) {
			$result[$item->truematrimony_physicalstate_id] = $item->physicalstate_name;
		}
		
		return $result;
	}	
	
	/**
	 * Get Profile kulaguru list.
	 *
	 * @param $name Profile complexion list name.
	 * @param $attr Profile complexion list attributes.
	 * @param $selected_value Profile complexion list selected value.
	 * @param $id Profile complexion list id.
	 */
	public function getProfilekulaguru($name='', $attr=array(), $selected_value='', $id='') {		
		
		$items = FOFModel::getTmpInstance('Kulaguru', 'TrueMatrimonyModel')->enabled(1)->getItemList();
			
		$result = array();
		$result[] =JText::_('COM_TRUEMATRIMONY_SELECT_KULAGURU_LIST');
		foreach($items as &$item) {
			$result[$item->truematrimony_kulaguru_id] = $item->kulaguru_type;
		}
		
		return $result;
	}	
}



