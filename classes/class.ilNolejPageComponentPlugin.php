<?php

/**
 * This file is part of Nolej Page Component Plugin for ILIAS,
 * developed by OC Open Consulting to integrate ILIAS with Nolej
 * software by Neuronys.
 *
 * @author Vincenzo Padula <vincenzo@oc-group.eu>
 * @copyright 2023 OC Open Consulting SB Srl
 */

/**
 * NolejPageComponent Page Component Plugin
 */
class ilNolejPageComponentPlugin extends ilPageComponentPlugin
{

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
     * @param array $a_properties properties saved in the page (will be deleted afterwards)
     * @param string $a_plugin_version plugin version of the properties
     */
    public function onDelete($a_properties, $a_plugin_version, $move_operation = false)
    {
        // $settings_id = $a_properties["settings_id"];
        // if (!empty($settings_id))
        // {
        // 	$exco_settings = new ilExternalContentSettings($settings_id);
        // 	$exco_settings->delete();
        // }
    }
}
