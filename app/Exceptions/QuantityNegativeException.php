<?php

namespace Iutrds\Tp42\Exceptions;

class QuantityNegativeException extends \Exception{

  protected $message = "La quantité doit être supérieur à 0";
}