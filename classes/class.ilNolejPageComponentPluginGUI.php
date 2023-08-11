<?php

/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see https://github.com/ILIAS-eLearning/ILIAS/tree/trunk/docs/LICENSE */

/**
 * Login Help Page Component GUI
 *
 * @ilCtrl_isCalledBy ilNolejPageComponentPluginGUI: ilPCPluggedGUI
 * @ilCtrl_isCalledBy ilNolejPageComponentPluginGUI: ilUIPluginRouterGUI
 * @ilCtrl_Calls ilNolejPageComponentPluginGUI: ilPasswordAssistanceGUI
 * 
 * @author Vincenzo Padula <vincenzo@oc-group.eu>
 */
class ilNolejPageComponentPluginGUI extends ilPageComponentPluginGUI
{
	/** @var ilCtrl $ctrl */
	protected $ctrl;

	/** @var ilTemplate $tpl */
	protected $tpl;

	/** @var ilNolejPageComponentPlugin */
	protected $plugin;

	/**
	 * ilNolejPageComponentPluginGUI constructor.
	 */
	public function __construct()
	{
		global $DIC;
		$this->ctrl = $DIC->ctrl();
		$this->tpl = $DIC->ui()->mainTemplate();

		parent::__construct();
	}

	/**
	 * Execute command
	 */
	public function executeCommand()
	{
		$next_class = $this->ctrl->getNextClass();
		switch ($next_class) {
			default:
				// perform valid commands
				$cmd = $this->ctrl->getCmd();
				switch ($cmd) {
					case "create":
					case "save":
					case "edit":
					case "update":
					case "cancel":
					case "viewPage":
						$this->$cmd();
						break;
					default:
						// Command not recognized
						return null;
				}
				break;
		}
	}

	/**
	 * Create
	 */
	public function insert()
	{
		$form = $this->initForm(true);
		// $this->tpl->setContent($form->getHTML());
		var_dump(get_object_vars($this));
		die();

		// Skip form
		// $a_properties = array();
		// $this->createElement($a_properties);
		// $this->returnToParent();
	}

	/**
	 * Save new pc element
	 */
	public function create()
	{
		$form = $this->initForm(true);

		if ($form->checkInput()) {
			if ($this->saveForm($form, true)) {
				ilUtil::sendSuccess($this->lng->txt("msg_obj_created"), true);
				$this->returnToParent();
			}
			$form->setValuesByPost();
		}
		$this->tpl->setContent($form->getHtml());
	}
	
	/**
	 * Init the properties form and load the stored values
	 */
	public function edit()
	{
		$form = $this->initForm(false);
		// $this->tpl->setContent($form->getHTML());
		$this->tpl->setContent(print_r($this->getProperties(), true));
	}

	/**
	 * Update
	 */
	public function update()
	{
		$form = $this->initForm(false);
		if ($form->checkInput()) {
			if ($this->saveForm($form, false)) {
				ilUtil::sendSuccess($this->lng->txt("msg_obj_modified"), true);
				$this->returnToParent();
			}
		}
		$form->setValuesByPost();
		$this->tpl->setContent($form->getHtml());
	}

	/**
	 * View Page
	 */
	public function viewPage()
	{
		// $properties = $this->getProperties();
		// $content = new ilNolejPageComponent($this->plugin, $properties["settings_id"]);
		// $renderer = new ilExternalContentRenderer($content);
		// $renderer->render();
	}

	/**
	 * Init creation editing form
	 * @param bool $a_create true: create component, false: edit component
	 */
	protected function initForm($a_create = false)
	{
		$form = new ilPropertyFormGUI();

		if ($a_create) {
			$this->addCreationButton($form);
			$form->addCommandButton("cancel", $this->plugin->txt("cmd_cancel"));
			$form->setTitle($this->plugin->txt("cmd_insert"));
			$form->setFormAction($this->ctrl->getFormAction($this, "create"));
		} else {
			$form->addCommandButton("update", $this->plugin->txt("cmd_save"));
			$form->addCommandButton("cancel", $this->plugin->txt("cmd_cancel"));
			$form->setTitle($this->plugin->txt("cmd_edit"));
			$form->setFormAction($this->ctrl->getFormAction($this, "update"));
		}

		return $form;
	}

	/**
	 * Save the form values
	 * @param ilPropertyFormGUI $form
	 * @param bool $a_create
	 * @return bool success
	 */
	protected function saveForm($form, $a_create)
	{
		$a_properties = array();
		if ($a_create) {
			return $this->createElement($a_properties);
		}

		return $this->updateElement($a_properties);
	}

	/**
	 * Cancel
	 */
	public function cancel()
	{
		$this->returnToParent();
	}

	/**
	 * Get HTML for element
	 *
	 * @param string page mode (edit, presentation, print, preview, offline)
	 * @return string html code
	 */
	public function getElementHTML($a_mode, array $a_properties, $a_plugin_version)
	{
		global $lng, $ilSetting;

		return "<p>New page component! In " . $a_mode . " mode!</p>";
	}

}