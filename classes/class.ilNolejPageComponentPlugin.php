<?php

/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see https://github.com/ILIAS-eLearning/ILIAS/tree/trunk/docs/LICENSE */

/**
 * NolejPageComponent Page Component Plugin
 * 
 * @author Vincenzo Padula <vincenzo@oc-group.eu>
 */
class ilNolejPageComponentPlugin extends ilPageComponentPlugin
{
	/** @var self */
	protected static $instance;

	/**
	 * Get plugin name
	 *
	 * @return string
	 */
	public function getPluginName()
	{
		return "NolejPageComponent";
	}

	/**
	 * Check if parent type is valid
	 * @see getParentType() of classes extending ilPageObject
	 * @see NolejPageComponent::getReturnUrl()
	 * @return bool
	 */
	public function isValidParentType($a_parent_type)
	{
		// $a_parent_type can be auth, cat, crs, ...
		return true;
	}

	/**
	 * Get the plugin instance
	 * @return self
	 */
	public static function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Handle an event
	 * @param string $a_component
	 * @param string $a_event
	 * @param mixed $a_parameter
	 */
	public function handleEvent($a_component, $a_event, $a_parameter)
	{
		// nothing to do here yet
	}

	/**
	 * This function is called when the page content is cloned
	 * @param array 	$a_properties		properties saved in the page, (should be modified if neccessary)
	 * @param string	$a_plugin_version	plugin version of the properties
	 */
	public function onClone(&$a_properties, $a_plugin_version)
	{
		// $settings_id = $a_properties["settings_id"];
		// if (!empty($settings_id))
		// {
		// 	$oldSettings = new ilExternalContentSettings($settings_id);
		// 	$newSettings = new ilExternalContentSettings();
		// 	$oldSettings->clone($newSettings);
		// 	$newSettings->setObjId($this->getParentId());
		// 	$newSettings->save();
		// 	$a_properties["settings_id"] = $newSettings->getSettingsId();
		// }
	}

	/**
	 * This function is called before the page content is deleted
	 * @param array 	$a_properties		properties saved in the page (will be deleted afterwards)
	 * @param string	$a_plugin_version	plugin version of the properties
	 */
	public function onDelete($a_properties, $a_plugin_version)
	{
		// $settings_id = $a_properties["settings_id"];
		// if (!empty($settings_id))
		// {
		// 	$exco_settings = new ilExternalContentSettings($settings_id);
		// 	$exco_settings->delete();
		// }
	}
}
