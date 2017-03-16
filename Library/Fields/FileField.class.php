<?php
namespace Library\Fields;

use Library\Field;

class FileField
    extends Field
{

  protected $help;

  public function buildWidget()
  {
    $widget = "<div class=\"form-group";

    if (empty($this->errorMessage) == false)
    {
      $widget .= " has-error";
    }

    $widget .= "\">";
    $widget .= "<label class=\"col-lg-2 control-label\" for=\"" . $this->name . "\">" . $this->label . "</label>";
    $widget .= "<div class=\"col-lg-3\">";
    $widget .= "<input type=\"file\" name=\"" . $this->name . "\"";
    $widget .= " />";

    if (empty($this->help) == false)
    {
      $widget .= "<span class=\help-block\">";
      $widget .= $this->help;
      $widget .= "</span>";
    }

    if (empty($this->errorMessage) == false)
    {
      $widget .= "<span class=\"help-block\">";
      $widget .= $this->errorMessage;
      $widget .= "</span>";
    }

    $widget .= "</div></div>";

    return $widget;
  }

  public function setHelp($help)
  {
    $this->help = $help;
  }

}
