<?php
namespace Library;

class BackController
    extends ApplicationComponent
{

  protected $action = "";

  protected $module = "";

  protected $page = null;

  protected $view = "";

  protected $loadTemplate = true;

  protected $contentType = "default";


  public function __construct(Application $app, $module, $action, $loadTemplate, $contentType)
  {
    parent::__construct($app);

    $this->page = new Page($app);
    $this->setModule($module);
    $this->setAction($action);
    $this->setView($action);
    $this->setLoadTemplate($loadTemplate);
    $this->setContentType($contentType);
  }

  private function setModule($module)
  {
    if (is_string($module) == false || empty($module) == true)
    {
      throw  new \InvalidArgumentException("The module has to be a valid string");
    }

    $this->module = $module;
  }

  private function setAction($action)
  {
    if (is_string($action) == false || empty($action) == true)
    {
      throw  new \InvalidArgumentException("The action has to be a valid string");
    }

    $this->module = $action;
  }

  private function setView($view)
  {
    if (is_string($view) == false || empty($view) == true)
    {
      throw  new \InvalidArgumentException("The view has to be a valid string");
    }

    $this->view = $view;
    $this->page->setContentFile(__DIR__ . "/../Applications/" . $this->app->name() . "/Modules/" . $this->module . "/Views/" . $this->view . ".php");
  }

  private function setLoadTemplate($loadTemplate)
  {
    if (is_bool($loadTemplate) == false)
    {
      throw  new \InvalidArgumentException("The 'loadTemplate' parameter has to be a boolean");
    }

    $this->module = $loadTemplate;
  }

  private function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }

  public function page()
  {
    return $this->page;
  }

  public function loadTemplate()
  {
    return $this->loadTemplate;
  }

  public function contentType()
  {
    return $this->contentType;
  }

}