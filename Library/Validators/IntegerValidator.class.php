<?php
  namespace Library\Validators;

  class IntegerValidator 
    extends \Library\Validator  
  {

    public function isValid($value) 
    {
			return preg_match("#^[1-9]+$#", $value);
    }
    
  }
