<?php
namespace Library;

class Route
{

  protected $action;

  protected $module;

  protected $url;

  protected $loadTemplate;

  protected $contentType;

  protected $varsNames;

  protected $vars = array();

  public function __construct($url, $module, $action, array $varsNames, $loadTemplate, $contentType)
  {
    $this->setUrl($url);
    $this->setModule($module);
    $this->setAction($action);
    $this->setVarsNames($varsNames);
    $this->setLoadTemplate($loadTemplate);
    $this->setContentType($contentType);
  }

  public function setUrl($url)
  {
    if (is_string($url) == true)
    {
      $this->url = $url;
    }
  }

  public function setModule($module)
  {
    if (is_string($module) == true)
    {
      $this->module = $module;
    }
  }

  public function setAction($action)
  {
    if (is_string($action) == true)
    {
      $this->action = $action;
    }
  }

  public function setVarsNames(array $varsNames)
  {
    $this->varsNames = $varsNames;
  }

  public function setLoadTemplate($loadTemplate)
  {
    if (is_bool($loadTemplate) == true)
    {
      $this->loadTemplate = $loadTemplate;
    }
  }

  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }

  public function hasVars()
  {
    return !empty($this->varsNames);
  }

  public function match($url)
  {
    if (preg_match("`^" . $this->url . "$`", $url, $matches) == true)
    {
      return $matches;
    }

    return false;
  }

  public function setVars(array $vars)
  {
    $this->vars = $vars;
  }

  public function action()
  {
    return $this->action;
  }

  public function module()
  {
    return $this->module;
  }

  public function loadTemplate()
  {
    return $this->loadTemplate;
  }

  public function contentType()
  {
    return $this->contentType;
  }

  public function vars()
  {
    return $this->vars;
  }

  public function varsNames()
  {
    return $this->varsNames;
  }

}
