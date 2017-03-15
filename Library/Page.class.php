<?php
  namespace Library;

  class Page 
    extends ApplicationComponent 
  {
    
    protected $contentFile;
    
    protected $vars = array();
      
    public function addVar($var, $value)
    {
      if (is_string($var) == false || is_numeric($var) == true || empty($var) == true) 
      {
        throw new \InvalidArgumentException("The nam of the variable has to be a non null string");
      }
      
      $this->vars[$var] = $value;
    }

    public function getGeneratedPage($loadTemplate) 
    {
      if (file_exists($this->contentFile) == false) 
      {
        throw new \RuntimeException("The specified view does not exist");
      }
  
      $user = $this->app->user();
      extract($this->vars);

      ob_start();
      require $this->contentFile;
      $content = ob_get_clean();
        
      ob_start();
      
      if($loadTemplate == true) 
      {
        require __DIR__."/../Applications/".$this->app->name()."/Templates/layout.php";
      }
      else
      {
        require __DIR__."/layout.php";
      }
      
      return ob_get_clean();
    }

    public function setContentFile($contentFile) 
    {
      if (is_string($contentFile) == false || empty($contentFile) == true)
      {
        throw new \InvalidArgumentException("The specified view is not valid");
      }
      
      $this->contentFile = $contentFile;
    }
    
  }
