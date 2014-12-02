<?php
/*------------------------------------------------------------------------
# com_wcertmatrimony
# ------------------------------------------------------------------------
# author    Kumar Ramalingam - http://www.w3cert.in
# mail      kumar@w3cert.in
# copyright Copyright (C) 2012 Citruscart.com All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://w3cert.in
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

if(!defined('DS')){
	define('DS',DIRECTORY_SEPARATOR);
}

require_once JPATH_COMPONENT_ADMINISTRATOR.'/version.php';

JHtml::_('jquery.framework');
JHtml::_('bootstrap.framework');

//initialise FOF
if (!defined('FOF_INCLUDED')) {
	include_once JPATH_LIBRARIES . '/fof/include.php';
}

// import joomla controller library
jimport('joomla.application.component.controller');

FOFDispatcher::getTmpInstance('com_truematrimony')->dispatch();
