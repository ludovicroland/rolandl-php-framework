<?php
namespace Library\Validators;

use Library\Validator;

class FileSizeValidator
    extends Validator
{

  protected $name;

  public function __construct($errorMessage, $name)
  {
    parent::__construct($errorMessage);
    $this->setName($name);
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function isValid($value)
  {
    if (isset($_FILES[$this->name]) == true AND $_FILES[$this->name]["name"] != "")
    {
      if ($_FILES[$this->name]["error"] == 0)
      {
        if ($_FILES[$this->name]["size"] <= 2097152)
        {
          return true;
        }

        return false;
      }

      return false;
    }

    return true;
  }

}
