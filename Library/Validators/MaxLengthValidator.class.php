<?php
  namespace Library\Validators;

  class MaxLengthValidator 
    extends \Library\Validator  
  {
    
    protected $maxLength;

    public function __construct($errorMessage, $maxLength) 
    {
      parent::__construct($errorMessage);
      $this->setMaxLength($maxLength);
    }
        
    public function isValid($value) 
    {
      return strlen($value) <= $this->maxLength;
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
    
  }
