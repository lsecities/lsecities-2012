<?php
/**
 * Template Name: Pods - Event iCalendar
 * Description: iCalendar (.ics) data of an event
 *
 * see http://stackoverflow.com/a/1464355
 * 
 * @package LSECities2012
 *
 * Pods initialization
 * URI: /media/objects/events/[id]/ical
 */

namespace LSECitiesWPTheme;

$obj = pods_prepare_event(get_pod_permalink([ 'from_uri' => TRUE, 'uri_var_position' => 3 ]));

$ical = "BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//lsecities.net/wpcal//NONSGML v1.0//EN
BEGIN:VEVENT
UID:" . sha1($obj['permalink'], false) . "@lsecities.net
DTSTAMP:" . gmdate('Ymd').'T'. gmdate('His') . "Z
DTSTART:".$obj['event_dtstart']."
DTEND:".$obj['event_dtend']."
SUMMARY:".$obj['title']."
URI:".$obj['event_page_uri']."\n";
if($obj['event_location']) {
  $ical .= "LOCATION:".$obj['event_location']."\n";
}
$ical .= "END:VEVENT
END:VCALENDAR";

//set correct content-type-header
header('Content-type: text/calendar; charset=utf-8');
header('Content-Disposition: inline; filename=lsecities_event_'.$obj['permalink'].'.ics');
echo $ical;
exit;
?>
