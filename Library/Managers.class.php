<?php
namespace Library;

class Managers
    extends Manager
{

  protected $api = null;

  protected $managers = array();

  public function __construct($api, $dao)
  {
    parent::__construct($dao);

    $this->api = $api;
  }

  public function getManagerOf($module)
  {
    if (is_string($module) == false || empty($module) == true)
    {
      throw new \InvalidArgumentException("The specified module is invalid");
    }

    if (isset($this->managers[$module]) == false)
    {
      $manager = "\\Library\\Models\\" . $module . "Manager_" . $this->api;
      $this->managers[$module] = new $manager($this->dao);
    }

    return $this->managers[$module];
  }

}