<?php

/**
 * When a visitor submits a Urban Age Delhi 2014 "register your interest" form
 * and asks to receive LSE Cities updates, subscribe them to the LSE Cities News
 * Mailchimp list
 */
function cf7mailchimp_integration_on_submission($cf7_data) {
  // get CF7 submission data 
  $submission = WPCF7_Submission::get_instance();
  if(!$submission) {
    return FALSE;
  }

  $posted_data = $submission->get_posted_data();

  // Calculate subscriber hash (MD5 of lowercase email address)
  $subscriber_hash = md5(strtolower($posted_data['your-email']));

  $MailChimp_lc = new \DrewM\MailChimp\MailChimp(LSECITIES_MAILCHIMP_API_KEY);
  $MailChimp_ua = new \DrewM\MailChimp\MailChimp(URBANAGE_MAILCHIMP_API_KEY);
  /* MailChimp API wrapper developer recommends not to disable SSL verification
   * and to update CA certs on the machines running WP, *but* since the root CA
   * needed for MailChimp certs has been deprecated as weak by Mozilla, it seems
   * more sensible to actually *not* enable that CA root system-wide and just
   * accept that awful MITM risk that comes from disabling certificate verification
   * for API calls to MailChimp. duh.
   */
  $MailChimp_lc->verify_ssl = FALSE;
  $MailChimp_ua->verify_ssl = FALSE;

  switch($cf7_data->id()) {
    case '6844' :
      // the form being submitted is the Delhi 2014 register your interest one
      $list_id = '1f3b65491d';
      $result = $MailChimp_lc->put('lists/' . $list_id. '/members/' . $subscriber_hash, [
        'email_address' => $cf7_data->posted_data['your-email'],
        'status' => 'subscribed',
        'merge_vars' => [
          'FNAME' => $posted_data['first-name'],
          'LNAME' => $posted_data['your-name'],
          'ROLE' => $posted_data['role'],
          'ORG' => $posted_data['organisation'],
          'CITY' => $posted_data['city'],
          'COUNTRY' => $posted_data['country'],
          'TOPICS' => $posted_data['topics'],
          '2014CONF' => $posted_data['interest-in-ua2014-conference'],
          '2014UANEWS' => $posted_data['subscribe-to-all-updates'] ? 'All LSE Cities news' : 'Urban Age 2014 conference news only'
        ]
      ]);
      var_trace($MailChimp_lc->getLastError(), 'mailchimp_last_error');
      var_trace($MailChimp_lc->getLastResponse(), 'mailchimp_last_response');
      break;

    case '11074':
      // the form being submitted is the Venice 2016 register your interest one
      $list_id = 'bba9d8e6ea';
      $result = $MailChimp_ua->put('lists/' . $list_id. '/members/' . $subscriber_hash, [
        'email_address' => $posted_data['your-email'],
        'status' => 'subscribed',
        'merge_fields' => [
          'FNAME' => $posted_data['first-name'],
          'LNAME' => $posted_data['your-name'],
        ]
      ]);
      var_trace($MailChimp_ua->getLastError(), 'mailchimp_last_error');
      var_trace($MailChimp_ua->getLastResponse(), 'mailchimp_last_response');
      break;

  }

  var_trace(var_export($result, TRUE), 'mailchimp API result');

  return $cf7_data;
}

/**
 * Register action
 */
add_action('wpcf7_before_send_mail', 'cf7mailchimp_integration_on_submission');

