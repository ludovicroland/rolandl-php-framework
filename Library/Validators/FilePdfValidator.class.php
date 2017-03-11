<?php
  namespace Library;
  
  class FilePdfValidator 
    extends Validator 
  {
      
    protected $name;

    public function __construct($errorMessage, $name) 
    {
      parent::__construct($errorMessage);
      $this->setName($name);
    }
      
    public function isValid($value) 
    {
      if(isset($_FILES[$this->name]) == true AND $_FILES[$this->name]["name"] != "") 
      {
        if($_FILES[$this->name]["error"] == 0) 
        {
          $formats = array("application/pdf");
          
          return in_array($_FILES[$this->name]["type"], $formats);
        }
      
        return false;
      }
    
      return true;
    }
      
    public function setName($name) 
    {
      $this->name = $name;
    }
    
  }
