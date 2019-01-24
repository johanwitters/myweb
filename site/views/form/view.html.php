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
 * MyWeb View
 * This is the site view presenting the user with the ability to add a new Myweb record
 * 
 */
class MyWebViewForm extends JViewLegacy
{

	protected $form = null;
	protected $canDo;

	/**
	 * Display the My Web view
	 *
	 * @param   string  $tpl  The name of the layout file to parse.
	 *
	 * @return  void
	 */
	public function display($tpl = null)
	{
		// Get the form to display
		$this->form = $this->get('Form');
		// Get the javascript script file for client-side validation
		$this->script = $this->get('Script'); 

		// Check that the user has permissions to create a new myweb record
		$this->canDo = JHelperContent::getActions('com_myweb');
		if (!($this->canDo->get('core.create'))) 
		{
			$app = JFactory::getApplication(); 
			$app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');
			$app->setHeader('status', 403, true);
			return;
		}
        
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors), 500);
		}

		// Call the parent display to display the layout file
		parent::display($tpl);

		// Set properties of the html document
		$this->setDocument();
	}

	/**
	 * Method to set up the html document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_MYWEB_MYWEB_CREATING'));
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "/administrator/components/com_myweb"
		                                  . "/views/myweb/submitbutton.js");
		JText::script('COM_MYWEB_MYWEB_ERROR_UNACCEPTABLE');
	}
}