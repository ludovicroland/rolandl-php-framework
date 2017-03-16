<?php
namespace Library\Entities\API;

class BaseResponse
    implements \JsonSerializable
{

  protected $code;

  protected $message;

  public function __construct(array $attributs = array())
  {
    foreach ($attributs as $attribut => $value)
    {
      $method = "set" . ucfirst($attribut);

      if (is_callable(array($this, $method)) == true)
      {
        $this->$method($value);
      }
    }
  }

  function jsonSerialize()
  {
    return get_object_vars($this);
  }

  public function code()
  {
    return $this->code;
  }

  public function setCode($code)
  {
    $this->code = (int)$code;
  }

  public function message()
  {
    return $this->message;
  }

  public function setMessage($message)
  {
    $this->message = $message;
  }

}