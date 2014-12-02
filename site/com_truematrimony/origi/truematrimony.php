<?php
/*------------------------------------------------------------------------
# com_truematrimony
# ------------------------------------------------------------------------
# author    Kumar Ramalingam - http://www.w3cert.in
# mail      kumar@w3cert.in
# copyright Copyright (C) 2012 W3cert.com All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://w3cert.in
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

if(!defined('DS')){
	define('DS',DIRECTORY_SEPARATOR);
}
JHtml::_('jquery.framework');
JHtml::_('bootstrap.framework');

//initialise FOF
if (!defined('FOF_INCLUDED'))
{
	include_once JPATH_LIBRARIES . '/fof/include.php';
}

// import joomla controller library
jimport('joomla.application.component.controller');

$doc = JFactory::getDocument();

FOFDispatcher::getTmpInstance('com_truematrimony')->dispatch();
