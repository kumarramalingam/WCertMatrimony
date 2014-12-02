<?php
/*------------------------------------------------------------------------
# mod_truematrimonysearch
# ------------------------------------------------------------------------
# author    Kumar Ramalingam - http://www.w3cert.in
# mail      kumar@w3cert.in
# copyright Copyright (C) 2012 W3Cert.in All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://w3cert.in
-------------------------------------------------------------------------*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
JFactory::getLanguage()->load('com_truematrimony', JPATH_SITE);
require_once __DIR__ . '/helper.php';
include_once JPATH_LIBRARIES.'/fof/include.php';

$items = ModTrueMatrimonyHelper::getMembers();

require( JModuleHelper::getLayoutPath('mod_truematrimonysearch') );
