<?php
  namespace Library\Fields;

  class StringField 
    extends \Library\Field  
  {
    protected $maxLength;
		
    protected $readonly;
		
    protected $id;
        
    public function buildWidget() 
    {
      $widget = "<div class=\"form-group";
      
      if (empty($this->errorMessage) == false) 
      {
        $widget .= " has-error";
      }
			
			$widget .= "\">";            
      $widget .= "<label class=\"col-lg-2 control-label\" for=\"".$this->name."\">".$this->label."</label>";
			$widget .= "<div class=\"col-lg-3\">";
			$widget .= "<input class=\"form-control input-sm\" type=\"text\" name=\"".$this->name."\"";
            
      if (empty($this->value) == false) 
      {
        $widget .= " value=\"".htmlspecialchars($this->value)."\"";
      }
			
			if (empty($this->id) == false) 
      {
        $widget .= " id=\"".htmlspecialchars($this->id)."\"";
      }
            
      if (empty($this->maxLength) == false)
      {
        $widget .= " maxlength=\"".$this->maxLength."\"";
      }
			
			if (empty($this->readonly) == false) 
      {
        $widget .= " readonly=\"".$this->readonly."\"";
      }

      $widget .= " />";
			
			if (empty($this->errorMessage) == false) 
      {
        $widget .= "<span class=\"help-block\">";
				$widget .= $this->errorMessage;
				$widget .= "</span>";
      }
			
			return $widget .= "</div></div>";
    }
        
    public function setMaxLength($maxLength)
    {
      $maxLength = (int) $maxLength;
      
      if ($maxLength > 0)
      {
        $this->maxLength = $maxLength;
      } 
      else 
      {
        throw new \RuntimeException("The max length has to be greater than 0");
      }
    }
		
		public function setId($id) 
    {
			$this->id = $id;
    }
		
		public function setReadonly($readonly) 
    {
      $this->readonly = $readonly;
    }
    
  }
