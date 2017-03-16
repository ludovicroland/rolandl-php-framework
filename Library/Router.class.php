<?php
namespace Library;

class Router
{

  const NO_ROUTE = 1;
  protected $routes = array();

  public function addRoute(Route $route)
  {
    if (in_array($route, $this->routes) == false)
    {
      $this->routes[] = $route;
    }
  }

  public function getRoute($url)
  {
    foreach ($this->routes as $route)
    {
      if (($varsValues = $route->match($url)) !== false)
      {
        if ($route->hasVars() == true)
        {
          $varsNames = $route->varsNames();
          $listVars = array();

          foreach ($varsValues as $key => $match)
          {
            if ($key !== 0)
            {
              $listVars[$varsNames[$key - 1]] = $match;
            }
          }

          $route->setVars($listVars);
        }

        return $route;
      }
    }

    throw new \RuntimeException("No URLs match", self::NO_ROUTE);
  }

}
