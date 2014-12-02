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

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class TruematrimonyControllerDefault extends FOFController
{
	public function getView($name = '', $type = '', $prefix = '', $config = array())
	{
		$config['linkbar_style'] = 'classic';

		return parent::getView($name, $type, $prefix, $config);
	}
}
