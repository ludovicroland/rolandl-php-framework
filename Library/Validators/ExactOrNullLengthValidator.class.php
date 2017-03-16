<?php
namespace Library\Validators;

use Library\Validator;

class ExactOrNullLengthValidator
    extends Validator
{

  protected $length;

  public function __construct($errorMessage, $length)
  {
    parent::__construct($errorMessage);
    $this->setLength($length);
  }

  public function setLength($length)
  {
    $length = (int)$length;

    if ($length > 0)
    {
      $this->length = $length;
    }
    else
    {
      throw new \RuntimeException("The length has to be greater than 0");
    }
  }

  public function isValid($value)
  {
    return (strlen($value) == $this->length || strlen($value) == 0);
  }

}
