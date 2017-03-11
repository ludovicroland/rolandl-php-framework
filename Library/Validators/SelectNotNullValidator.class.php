<?php
  namespace Library\Validators;

  class SelectNotNullValidator 
    extends \Library\Validator 
  {

		public function isValid($value)
    { 
      return (int)$value != 0;
    }
    
  }
