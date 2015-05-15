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

$event = new Event(get_pod_permalink([ 'from_uri' => TRUE, 'uri_var_position' => 3 ]));

$ical = "BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//lsecities.net/wpcal//NONSGML v1.0//EN
BEGIN:VEVENT
UID:" . sha1($event->permalink, false) . "@lsecities.net
DTSTAMP:" . gmdate('Ymd').'T'. gmdate('His') . "Z
DTSTART:".$event->event_dtstart."
DTEND:".$event->event_dtend."
SUMMARY:".$event->title."
URI:".$event->event_page_uri."\n";
if($event->event_location) {
  $ical .= "LOCATION:".$event->event_location."\n";
}
$ical .= "END:VEVENT
END:VCALENDAR";

//set correct content-type-header
header('Content-type: text/calendar; charset=utf-8');
header('Content-Disposition: inline; filename=lsecities_event_'.$event->permalink.'.ics');
echo $ical;
exit;
?>
