<?php
namespace Library\Validators;

use Library\Validator;

class IntegerValidator
    extends Validator
{

  public function isValid($value)
  {
    return preg_match("#^[1-9]+$#", $value);
  }

}
