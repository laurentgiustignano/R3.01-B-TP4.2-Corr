<?php

namespace Iutrds\Tp42;

use Iutrds\Tp42\Exceptions\QuantityNegativeException;

class Cart {
  private array $items = [];

  /**
   * @throws QuantityNegativeException
   */
  public function addItem(string $product, int $quantity) : void {
    if($quantity < 1) {
      throw new QuantityNegativeException();
    }
    if(isset($this->items[$product])) {
      $this->items[$product] += $quantity;
    }
    else {
      $this->items[$product] = $quantity;
    }
  }

  public function getTotalProducts() : int {
    return count($this->items);
  }

  public function removeItem(string $product) : void {
    unset($this->items[$product]);
  }

  public function getTotalItems() : int {
    return array_sum($this->items);
  }

  public function __toString() {
    if($this->getTotalItems() > 0) {
      $retour = "Votre panier contient : " . PHP_EOL;
      foreach($this->items as $product => $quantity) {
        $retour .= "$product : $quantity" . PHP_EOL;
      }
      return $retour;
    }
    return "Votre panier est vide.";
  }
}
