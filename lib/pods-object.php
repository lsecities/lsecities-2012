<?php

namespace LSECitiesWPTheme;

class PodsObject {

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
