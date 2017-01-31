<?php

require_once 'surveygizmo.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function surveygizmo_civicrm_config(&$config) {
  _surveygizmo_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function surveygizmo_civicrm_xmlMenu(&$files) {
  _surveygizmo_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function surveygizmo_civicrm_install() {
  _surveygizmo_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function surveygizmo_civicrm_postInstall() {
  _surveygizmo_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function surveygizmo_civicrm_uninstall() {
  _surveygizmo_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function surveygizmo_civicrm_enable() {
  _surveygizmo_civix_civicrm_enable();
  _surveygizmo_add_profile();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function surveygizmo_civicrm_disable() {
  _surveygizmo_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function surveygizmo_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _surveygizmo_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function surveygizmo_civicrm_managed(&$entities) {
  _surveygizmo_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function surveygizmo_civicrm_caseTypes(&$caseTypes) {
  _surveygizmo_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function surveygizmo_civicrm_angularModules(&$angularModules) {
  _surveygizmo_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function surveygizmo_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _surveygizmo_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function surveygizmo_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function surveygizmo_civicrm_navigationMenu(&$menu) {
  _surveygizmo_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'au.org.greens.surveygizmo')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _surveygizmo_civix_navigationMenu($menu);
} // */

/** 
 * Add the 'SurveyGizmo Webhook' reserved profile if it doesn't exist
 *
 * @throws \CiviCRM_API3_Exception
 */
function _surveygizmo_add_profile() {
  $profile = civicrm_api3('UFGroup', 'GetCount', array(
    'name' => 'SurveyGizmo_Webhook'
    ));
  if ($profile['count'] == 0) {
    civicrm_api3('UFGroup', 'Create', array(
      'group_type' => 'Contact',
      'title' => 'SurveyGizmo Webhook',
      'name' => 'SurveyGizmo_Webhook'
      ));
  }
}
