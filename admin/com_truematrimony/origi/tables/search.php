<?php
/*------------------------------------------------------------------------
# com_truematrimony
# ------------------------------------------------------------------------
# author    Kumar Ramalingam - http://www.w3cert.in
# mail      kumar@w3cert.in
# copyright Copyright (C) 2012 Citruscart.com All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://w3cert.in
-------------------------------------------------------------------------*/

// No direct access
defined('_JEXEC') or die;

/**
 * 
 * TrueMatrimonyTableProfile table class name.
 *
 */
class TrueMatrimonyTableSearch extends FOFTable
{
	public function __construct($table, $key, &$db)
	{
		/*$query = $db->getQuery(true)
		->select($db->qn('#__truematrimony_additionalinfos').'.additionalinfo_id')
		->select($db->qn('#__truematrimony_additionalinfos').'.monthly_income')
		->leftJoin('#__truematrimony_additionalinfos ON #__truematrimony_additionalinfos.truematrimony_additionalinfo_id = #__truematrimony_profiles.additionalinfo_id');
		*/	
		
		$table = "#__truematrimony_search";
		$key = "truematrimony_search_id";
		parent::__construct($table, $key, $db);
	}
}
