<?php
namespace Library\Fields;

use Library\Field;

class HiddenField
    extends Field
{

  public function buildWidget()
  {
    $widget = "<input type=\"hidden\" name=\"" . $this->name . "\"";

    if (empty($this->value) == false)
    {
      $widget .= " value=\"" . htmlspecialchars($this->value) . "\"";
    }

    $widget .= " />";

    return $widget;
  }

}
