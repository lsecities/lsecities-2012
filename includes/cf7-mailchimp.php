<?php

/**
 * When a visitor submits a Urban Age Delhi 2014 "register your interest" form
 * and asks to receive LSE Cities updates, subscribe them to the LSE Cities News
 * Mailchimp list
 */
function cf7mailchimp_integration_on_submission($cf7_data) {
  var_trace(var_export($cf7_data, TRUE), 'cf7_data');

  switch($cf7_data->id) {
    case 6844:
      // the form being submitted is the Delhi 2014 register your interest one
      $MailChimp = new \DrewM\MailChimp\MailChimp(LSECITIES_MAILCHIMP_API_KEY);
      $list_id = '1f3b65491d';
      $result = $MailChimp->post('lists/' . $list_id. '/members', [
        'email_address' => $cf7_data->posted_data['your-email'],
        'merge_vars' => [
          'FNAME' => $cf7_data->posted_data['first-name'],
          'LNAME' => $cf7_data->posted_data['your-name'],
          'ROLE' => $cf7_data->posted_data['role'],
          'ORG' => $cf7_data->posted_data['organisation'],
          'CITY' => $cf7_data->posted_data['city'],
          'COUNTRY' => $cf7_data->posted_data['country'],
          'TOPICS' => $cf7_data->posted_data['topics'],
          '2014CONF' => $cf7_data->posted_data['interest-in-ua2014-conference'],
          '2014UANEWS' => $cf7_data->posted_data['subscribe-to-all-updates'] ? 'All LSE Cities news' : 'Urban Age 2014 conference news only'
        ],
        'double_optin' => FALSE,
        'update_existing' => TRUE,
      ]);
      break;

    case 11074:
      // the form being submitted is the Venice 2016 register your interest one
      $MailChimp = new \DrewM\MailChimp\MailChimp(URBANAGE_MAILCHIMP_API_KEY);
      $list_id = '189097';
      $result = $MailChimp->post('lists/' . $list_id. '/members', [
        'email_address' => $cf7_data->posted_data['your-email'],
        'merge_vars' => [
          'FNAME' => $cf7_data->posted_data['first-name'],
          'LNAME' => $cf7_data->posted_data['your-name'],
        ],
        'double_optin' => FALSE,
        'update_existing' => TRUE,
      ]);
      break;

    var_trace(var_export($result, TRUE), 'mailchimp API result');
  }

  return $cf7_data;
}

/**
 * Register action
 */
add_action('wpcf7_before_send_mail', 'cf7mailchimp_integration_on_submission');

