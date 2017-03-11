<?php
  namespace Library;

  abstract class Validator
  {
    
    protected $errorMessage;
        
    public function __construct($errorMessage)
    {
      $this->setErrorMessage($errorMessage);
    }
    
    public function setErrorMessage($errorMessage)
    {
      if (is_string($errorMessage) == true)
      {
        $this->errorMessage = $errorMessage;
      }
    }
    
    public function errorMessage()
    {
      return $this->errorMessage;
    }
        
    abstract public function isValid($value);
         
  }
