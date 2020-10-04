<?php
namespace VentasBundle\Entity\Carro;

use VentasBundle\Entity\Articulo;

class ItemCarro {

  private $product = null;
  private $quantity = 0;
  private $SubTotal = null;

public function __construct(Articulo $product = null, $qty) {
  if ($product != null && $qty != null) {
     $this->product = $product;
     $this->quantity = (int) $qty;
     $this->calculateImporte();
  }
}

public function setProduct(Articulo $product) {
  $this->product = $product;
  $this->calculateImporte();
}

public function getId() {
  return $this->product->getId();
}

public function getName() {
  return $this->product->getNombre();
}

public function getPrice() {
  return $this->product->getPrecio();
}

public function getQuantity() {
  return $this->quantity;
}

public function setQuantity($value) {
  $this->quantity = (int) $value;
  $this->calculateImporte();
}

public function calculateImporte() {
  $this->getSubTotal();
}

public function getImporte() {
  return $this->subTotal;
}

public function getSubTotal() {
  if ($this->getPrice()!=0 && null !==$this->getPrice()) {
     $this->setSubTotal($this->getQuantity() * $this->getPrice());
     return $this->subTotal;
  }
  return 0;
}


}
