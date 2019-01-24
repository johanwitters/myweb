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

/**
 * MyWeb component helper.
 *
 * @param   string  $submenu  The name of the active view.
 *
 * @return  void
 *
 * @since   1.6
 */
abstract class MyWebHelper extends JHelperContent
{
	/**
	 * Configure the Linkbar.
	 *
	 * @return Bool
	 */

	public static function addSubmenu($submenu) 
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_MYWEB_SUBMENU_MESSAGES'),
			'index.php?option=com_myweb',
			$submenu == 'mywebs'
		);

		JHtmlSidebar::addEntry(
			JText::_('COM_MYWEB_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&view=categories&extension=com_myweb',
			$submenu == 'categories'
		);

		// Set some global property
		$document = JFactory::getDocument();
		$document->addStyleDeclaration('.icon-48-myweb ' .
										'{background-image: url(../media/com_myweb/images/tux-48x48.png);}');
		if ($submenu == 'categories') 
		{
			$document->setTitle(JText::_('COM_MYWEB_ADMINISTRATION_CATEGORIES'));
		}
	}
}
