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
 * My Web Component Controller
 *
 * @since  0.0.1
 */
class MyWebController extends JControllerLegacy
{
	public function mapsearch()
    {
        if (!JSession::checkToken('get')) 
        {
            echo new JResponseJson(null, "Error: Invalid token", true);
        }
        else 
        {
            parent::display();
        }
    }
}