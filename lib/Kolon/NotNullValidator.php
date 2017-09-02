<?php

namespace Kolon;

class NotNullValidator extends Validator
{
  public function isValid($value)
  {
    return $value != '';
  }
}