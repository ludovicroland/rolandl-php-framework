<?php
namespace Library;

class Config
    extends ApplicationComponent
{

  protected $vars = array();

  public function get($var)
  {
    if ($this->vars == false)
    {
      $xml = new \DOMDocument;
      $xml->load(__DIR__ . "/../Applications/" . $this->app->name() . "/Config/app.xml");

      $elements = $xml->getElementsByTagName("define");

      foreach ($elements as $element)
      {
        $this->vars[$element->getAttribute("var")] = $element->getAttribute("value");
      }
    }

    if (isset($this->vars[$var]) == true)
    {
      return $this->vars[$var];
    }

    return null;
  }

}
