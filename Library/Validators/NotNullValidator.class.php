<?php
namespace Library\Validators;

use Library\Validator;

class NotNullValidator
    extends Validator
{

  public function isValid($value)
  {
    return trim($value) != "";
  }

}
