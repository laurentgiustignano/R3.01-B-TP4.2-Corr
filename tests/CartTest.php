<?php

namespace Iutrds\Tp42;

use Iutrds\Tp42\Exceptions\QuantityNegativeException;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase {


  /**
   * @throws QuantityNegativeException
   */
  public function testFailAjoutQuantiteNegative() : void {
    $panier = new Cart();
    $this->expectException(QuantityNegativeException::class);
    $panier->addItem("truc", -1);
  }

  public function testAjoutDUnSeulProduit() : void {
    $panier = new Cart();

    $panier->addItem("truc", 1);
    $this->assertEquals(1, $panier->getTotalProducts());
    $this->assertEquals(1, $panier->getTotalItems());
  }

  public function testAjoutPlusieursProduits() : void{
    $panier = new Cart();

    $panier->addItem("truc", 1);
    $this->assertEquals(1, $panier->getTotalProducts());

    $panier->addItem("truc", 1);
    $panier->addItem("truc", 1);
    $this->assertEquals(3, $panier->getTotalItems());
  }
}
