<?php
	namespace Library;
	
  class ExceptionManager 
    extends ErrorException 
  {
  
    public function __toString() 
    {
      switch ($this->severity) 
      {
        case E_USER_ERROR :
          $type = "Fatal error";
          break;
        
        case E_WARNING :
        case E_USER_WARNING :
          $type = "Warning";
          break;
        
        case E_NOTICE :
        case E_USER_NOTICE :
          $type = "Note";
          break;
        
        default :
          $type = "Unknown issue";
          break;
      }
      
      return "<strong>" . $type . "</strong> : [" . $this->code . "] " . $this->message . "<br /><strong>" . $this->file . "</strong> at the line <strong>" . $this->line . "</strong>";
    }
    
  }
  
  function error2exception ($code, $message, $fichier, $ligne) 
  {
    throw new ExceptionManager ($message, 0, $code, $fichier, $ligne);
  }
  
  function customException ($e) 
  {
    echo "Line ", $e->getLine(), " in ", $e->getFile(), "<br /><strong>Exception</strong> : ", $e->getMessage();
  }
  
  set_error_handler ("error2exception");
  
  set_exception_handler ("customException");
  
?>
