<?php

namespace LSECitiesWPTheme;

class PodsObject {

  /**
   * Given a Pods pick field's name, read the related
   * table and return it as an array.
   * @param Object $pod The Pod object
   * @param string $field_name The related table's field name
   * @return array The related table values
   */
  public function initialize_related_object($pod, $field_name) {
    $related = $pod->field($field_name);

    if(!empty($related) and is_array($related)) {
      return $related;
    }

    return null;
  }
}
