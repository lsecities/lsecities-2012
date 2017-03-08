<?php

namespace LSECitiesWPTheme;

class PodsObject {

  /**
   * @var Array Pods metadata (created, modified, author, etc.)
   */
  protected $pods_metadata;

  protected function __construct() {
    $this->pods_metadata = [
      'created' => $this->pod->field('created'),
      'modified' => $this->pod->field('modified')
    ];
  }

  /**
   * Given a Pods pick field's name, read the related
   * table and return it as an array.
   * @param Object $pod The Pod object
   * @param string $field_name The related table's field name
   * @param string $class The related object's class, if any exists
   * @return array The related table values, if no class is associated
   *   with the related table, or objects, otherwise
   */
  public function initialize_related_object($pod, $field_name, $class = NULL) {
    $related = $pod->field($field_name);

    if(!empty($related) and is_array($related)) {
      if($class) {
        foreach($related as $item) {
          $objects[] = new $class($item['id']);
        }
        return $objects;
      }
      return $related;
    }

    return null;
  }
}

/**
 * Trait for objects 'happening over a timespan'
 */
trait ObjectWithTimespan {
  public $event_start;
  public $event_end;
  public $event_timezone;
  public $event_free_form_dates;
  public $event_date_string;
  public $event_starts_and_ends_on_same_day;

  /**
   * @var Integer Minutes to start of event (positive for future events, negative for events that have started already
   * @var Integer Minutes since event ended (positive for future events or events that have started, negative for events that have finished)
   */
  public $minutes_to_start_of_event;
  public $minutes_to_end_of_event;

  public function __construct($datetime_start, $datetime_end, $free_form_event_dates, $datetimezone = 'Europe/London') {
    /**
     * event start and end
     * We only support a single timespan (i.e. an event with a session
     * per day for three days cannot be represented with this data:
     * we can only set the initial timestamp and final timestamp).
     * Events starting and ending on the same day will display
     * start and end date and time; events spanning over multiple
     * days will only show start date and end date.
     * We also output microdata attributes for machine parsing of pages
     * and better output on search engines supporting this.
     */

    // first, create DateTime objects
    $this->event_timezone = new \DateTimeZone($datetimezone); // TODO: add timezone handling in Events pod
    $this->event_start = new \DateTime($datetime_start, $this->event_timezone);
    $this->event_start_ical = clone $this->event_start;
    $this->event_start_ical->setTimezone(new \DateTimeZone('UTC'));
    $this->event_end = new \DateTime($datetime_end, $this->event_timezone);
    $this->event_end_ical = clone $this->event_end;
    $this->event_end_ical->setTimezone(new \DateTimeZone('UTC'));

    // populate variables for microdata output
    $event_dtstart = $this->event_start_ical->format(DATE_ISO8601);
    $event_dtend = $this->event_end_ical->format(DATE_ISO8601);

    // populate variables for iCal output
    $this->event_dtstart = $this->event_start_ical->format('Ymd').'T'.$this->event_start_ical->format('His').'Z';
    $this->event_dtend = $this->event_end_ical->format('Ymd').'T'.$this->event_end_ical->format('His').'Z';

    // check whether this is a future event
    $datetime_now = new \DateTime('now');
    $this->is_future_event = ($this->event_end > $datetime_now) ? true : false;

    // calculate distance of event from now
    $__minutes_to_start_of_event = $datetime_now->diff($this->event_start);
    $__minutes_to_end_of_event = $datetime_now->diff($this->event_end);
    $this->minutes_to_start_of_event = ($__minutes_to_start_of_event->d * 24 * 60 + $__minutes_to_start_of_event->h * 60 + $__minutes_to_start_of_event->i);
    if($datetime_now > $this->event_start) $this->minutes_to_start_of_event *= -1;
    $this->minutes_to_end_of_event = ($__minutes_to_end_of_event->d * 24 * 60 + $__minutes_to_end_of_event->h * 60 + $__minutes_to_end_of_event->i);
    if($datetime_now > $this->event_end) $this->minutes_to_end_of_event *= -1;

    // check whether the event starts and ends on same day
    $this->event_starts_and_ends_on_same_day = $this->event_start->format('Y-m-d') != $this->event_end->format('Y-m-d');

    /**
     * if the free_form_dates field is filled in and the event is a
     * future event, this means that the event is planned for some
     * approximate time in the future but an exact date/time hasn't been
     * set yet, we just use the value of this field as event_date_string
     */
    $this->event_free_form_dates = $free_form_event_dates;
    if(!empty($this->event_free_form_dates)) {
      $this->event_date_string = $this->event_free_form_dates;
    } else {
      // depending on whether event starts and ends on the
      // same day or on distinct days (see above), generate strings
      // for human-readable output, with microdata embedded in as appropriate
      if($this->event_starts_and_ends_on_same_day) {
        $this->event_date_string = '<time class="dt-start dtstart" itemprop="startDate" datetime="' . $event_dtstart . '">' . $this->event_start->format("l j F Y") . '</time>';
        $this->event_date_string .= ' to ';
        $this->event_date_string .= '<time class="dt-end dtend" itemprop="endDate" datetime="' . $event_dtend . '">' . $this->event_end->format("l j F Y") . '</time>';
      } else {
        $this->event_date_string = $this->event_start->format("l j F Y") . ' | ';
        $this->event_date_string .= '<time class="dt-start dtstart" itemprop="startDate" datetime="' . $event_dtstart . '">' . $this->event_start->format("H:i") . '</time>';
        $this->event_date_string .=  '-' . '<time class="dt-end dtend" itemprop="endDate" datetime="' . $event_dtend . '">' . $this->event_end->format("H:i") . '</time>';
      }

      // AddToCalendar URIs
      $this->addtocal_uri_google = 'http://www.google.com/calendar/event?action=TEMPLATE&text='.
        $this->title
        .'&dates=' . $this->event_dtstart.'/'.$this->event_dtend
        .'&location=' . urlencode($this->event_location)
        .'&sprop=' . urlencode($this->event_page_uri).'&sprop=name:';
    }

  }

  /**
   * Given a number of minutes of tolerance before the start and after the end
   * of the timespan of the object, if current time is within this interval,
   * consider the event as 'live'
   * @param Array $tolerance Two integers, expressing the minutes of tolerance
   *   before the start and after the end of a timespan; for minutes to start,
   *   negative values are for times after the start of the timespan (i.e.
   *   the object with timespan is considered live only some time *after* it
   *   has started); for minutes to end, positive values are for times before
   *   the end of the timespan (i.e. the object is considered live only until
   *   some time before its end); if no $tolerance parameter is provided,
   *   zero tolerance for start and end is assumed.
   * @return Boolean Whether the object is to be considered live
   */
  public function is_live($tolerance = [0, 0]) {
    $datetime_now = new \DateTime('now');
    $start = clone $this->event_start;
    $end = clone $this->event_end;
    $start->add(\DateInterval::createFromDateString($tolerance[0] * -1 . ' minutes'));
    $end->add(\DateInterval::createFromDateString($tolerance[1] * -1 . ' minutes'));

    return ($start < $datetime_now and $end > $datetime_now) ? TRUE : FALSE;
  }
}
