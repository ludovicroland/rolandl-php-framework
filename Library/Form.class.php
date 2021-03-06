<?php
namespace Library;

class Form
{

  protected $entity;

  protected $fields;

  public function __construct(Entity $entity)
  {
    $this->setEntity($entity);
  }

  public function setEntity(Entity $entity)
  {
    $this->entity = $entity;
  }

  public function add(Field $field)
  {
    $attr = $field->name();
    $field->setValue($this->entity->$attr());
    $this->fields[] = $field;

    return $this;
  }

  public function createView()
  {
    $view = "";

    foreach ($this->fields as $field)
    {
      $view .= $field->buildWidget();
    }

    return $view;
  }

  public function isValid()
  {
    $valid = true;

    foreach ($this->fields as $field)
    {
      if ($field->isValid() == false)
      {
        $valid = false;
      }
    }

    return $valid;
  }

  public function entity()
  {
    return $this->entity;
  }

}
