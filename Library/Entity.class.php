<?php
namespace Library;

abstract class Entity
    implements \ArrayAccess
{

  protected $errors = array();

  protected $id;

  public function __construct(array $data = array())
  {
    if (empty($data) == false)
    {
      $this->hydrate($data);
    }
  }

  public function hydrate(array $data)
  {
    foreach ($data as $attribut => $value)
    {
      $method = "set" . ucfirst($attribut);

      if (is_callable(array($this, $method)) == true)
      {
        $this->$method($value);
      }
    }
  }

  public function isNew()
  {
    return empty($this->id);
  }

  public function errors()
  {
    return $this->errors;
  }

  public function id()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = (int)$id;
  }

  public function offsetGet($var)
  {
    if (isset($this->$var) == true && is_callable(array($this, $var)) == true)
    {
      return $this->$var();
    }
  }

  public function offsetSet($var, $value)
  {
    $method = "set" . ucfirst($var);

    if (isset($this->$var) == true && is_callable(array($this, $method)) == true)
    {
      $this->$method($value);
    }
  }

  public function offsetExists($var)
  {
    return isset($this->$var) == true && is_callable(array($this, $var) == true);
  }

  public function offsetUnset($var)
  {
    throw new \Exception("Cannot delete the value");
  }

}
