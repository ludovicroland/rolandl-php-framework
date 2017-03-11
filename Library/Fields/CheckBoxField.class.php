<?php
  namespace Library\Fields;

  class CheckboxField 
    extends \Library\Field 
  { 

    public function buildWidget() 
    {
      $widget = "<div class=\"form-group";
          
      if (empty($this->errorMessage) == false) 
      {
        $widget .= " has-error";
      }
    
      $widget .= "\"><div class=\"col-lg-2\"></div>";     
      $widget .= "<div class=\"col-lg-3 checkbox\">";			
      $widget .= "<label>";			
      $widget .= "<input type=\"checkbox\" name=\"".$this->name."\"";
    
      if (empty($this->value) == false) 
      {
        $widget .= " checked";	      
      }

      $widget .= " />";
      $widget .= $this->label;
      $widget .= "</label>";
    
      if (empty($this->errorMessage) == false) 
      {
        $widget .= "<span class=\"help-block\">";
        $widget .= $this->errorMessage;
        $widget .= "</span>";
      }
    
      return $widget .= "</div></div>";
    }
    
  }
