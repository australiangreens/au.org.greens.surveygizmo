<?php

class CRM_SurveyGizmo_Page_SurveyGizmo extends CRM_Core_Page {

  public function run() {
    // // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    // CRM_Utils_System::setTitle(ts('SurveyGizmo'));

    // // Example: Assign a variable for use in a template
    // $this->assign('currentTime', date('Y-m-d H:i:s'));

    // parent::run();
    //
    if ($cs = CRM_Utils_Request::retrieve('cs', 'String', $this, TRUE)) {
      if ($cid = CRM_Utils_Request::retrieve('cid', 'Positive', $this, TRUE)) {
        if (CRM_Contact_BAO_Contact_Utils::validChecksum($cid, $cs)) {
          $profile = civicrm_api3('UFGroup', 'GetSingle', array(
            'name' => 'SurveyGizmo_Webhook'));

          $profile_id = $profile['id'];

          $contact = civicrm_api3('Profile', 'Get', array(
            'contact_id' => $cid,
            'profile_id' => $profile_id
          ));

          $fields = $contact['values'];

          echo(http_build_query($fields));
        } else {
          echo('Invalid checksum');
        }
      }
    }
    CRM_Utils_System::civiExit();
  }

}
