<?php
  namespace Library\Fields;

  class HiddenField 
    extends \Library\Field 
  {      

    public function buildWidget() 
    {
      $widget = "<input type=\"hidden\" name=\"".$this->name."\"";
        
      if (empty($this->value) == false) 
      {
        $widget .= " value=\"".htmlspecialchars($this->value)."\"";
      }

      return $widget .= " />";
    }
    
  }
