<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_myweb
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Set some global property
$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-myweb {background-image: url(../media/com_myweb/images/Tux-16x16.png);}');

// Access check: is this user allowed to access the backend of this component?
if (!JFactory::getUser()->authorise('core.manage', 'com_myweb'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Require helper file
JLoader::register('MyWebHelper', JPATH_COMPONENT . '/helpers/myweb.php');

// Get an instance of the controller prefixed by MyWeb
$controller = JControllerLegacy::getInstance('MyWeb');

// Perform the Request task
$controller->execute(JFactory::getApplication()->input->get('task'));

// Redirect if set by the controller
$controller->redirect();
