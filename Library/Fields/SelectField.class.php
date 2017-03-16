<?php
namespace Library\Fields;

use Library\Field;
use Library\PDOFactory;

class SelectField
    extends Field
{

  protected $sql;

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
    $widget .= "<select class=\"form-control\" name=\"" . $this->name . "\"";

    if (empty($this->classStyle) == false)
    {
      $widget .= " class=\"" . $this->classStyle . "\"";
    }

    $widget .= ">";

    $requete = PDOFactory::getMysqlConnexion()->query($this->sql);

    while ($item = $requete->fetch(\PDO::FETCH_ASSOC))
    {
      $widget .= "<option value=\"" . $item["value"] . "\"";

      if ($this->value == $item["value"])
      {
        $widget .= " selected";
      }

      $widget .= ">" . $item["libelle"] . "</option>";
    }

    $widget .= "</select>";

    if (empty($this->errorMessage) == false)
    {
      $widget .= "<span class=\"help-block\">";
      $widget .= $this->errorMessage;
      $widget .= "</span>";
    }

    $widget .= "</div></div>";

    return $widget;
  }

  public function setSql($sql)
  {
    $this->sql = $sql;
  }

}
