<?php
namespace Library\Validators;

use Library\Validator;

class SelectNotNullValidator
    extends Validator
{

  public function isValid($value)
  {
    return (int)$value != 0;
  }

}
