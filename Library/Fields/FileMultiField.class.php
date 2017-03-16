<?php
namespace Library\Fields;

class FileMultiField
    extends \Library\Field
{

  public function buildWidget()
  {
    $widget = "";

    if (!empty($this->errorMessage))
    {
      $widget .= "<tr><td colspan=\"2\" class=\"flashError\">";
      $widget .= $this->errorMessage;
      $widget .= "</td></tr>";
    }

    $widget .= "<tr><td><label>" . $this->label . " :</label></td>";
    $widget .= "<td><input type=\"file\" name=\"" . $this->name . "[]\" id=\"fileMultiField\" class=\"multi accept-png|jpg|jpeg\"";
    $widget .= " />";

    $widget .= "</td></tr>";

    return $widget;
  }

}
