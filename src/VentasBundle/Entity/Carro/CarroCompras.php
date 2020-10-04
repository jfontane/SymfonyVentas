<?php
namespace VentasBundle\Entity\Carro;

use VentasBundle\Entity\Carro\ItemCarro;
use ArrayObject;
use ArrayAccess;

class CarroCompras {

  private $contents = null;
  private $total = 0;
  private $totalTax = 0;
  private $taxVlue = 19;

public function __construct() {
  $this->reset();
}

/* Limpia el Carro resetandolo */
public function reset() {
  $this->contents = new ArrayObject();
  $this->total = 0;
  if (isset($_SESSION['_sf2_attributes']['carro'])) {
      unset($_SESSION['_sf2_attributes']['carro']);
  }
}
/* Agrega un Item al Carro */
public function addCart(ItemCarro $item) {
  if ($this->inCart($item->getId())) { // si ya existe en el carro actualiza la cantidad
      $this->updateQuantity($item->getId(),$item->getQuantity());
  } else { // si es un elemento nuevo lo agrega
      $this->contents->offsetSet($item->getId(),$item);
      $this->cleanUp();
  }
}

/* Actualiza la cantidad de un item dentro del Carro */
public function updateQuantity($productoId, $cantidad, $qtyFromPost) {
  $em = $this->findProducto($productoId);
  if ($item !== null) {
     $cantidad = ($qtyFromPost === true)?$cantidad:$item->getQuantity();
     $item->setQuantity($cantidad);
     $this->cleanUp();
  }
}

/* Elimina todos los elementos del carro de compras que tengan cantidad = 0 */
public function cleanUp($productoId, $cantidad, $qtyFromPost) {
  $arrClean = array();
  foreach ($this->contents as $key => $value) {
    if ($this->getQuantity($key) < 1) {
       $arrClean[] = $key;
    }
  }
  foreach ($arrClean as $key) {
    unset($this->contents[$key]);
  }
}

/* Retorna la cantidad de items del Carro */
public function countContents() {
  return (int) $this->contents->count();
}

/* Retorna la Cantidad de un determinado producto dentro del Carro */
public function getQuantity($productoId) {
  if ($this->inCart($productoId)) {
     if ($this->contents->offsetSet($productoId,$item)) {
       return $item->getQuantity();
     }
     return 0;
   }  else {
     return 0;
  }
}

/* Determina si el producto esta en el Carro. */
public function inCart($productoId) {
  return $this->contents->offsetExists($productoId);
}

/* Determina si el producto esta en el Carro - Alias de inCart. */
public function has($productoId) {
  return $this->inCart($productoId);
}

/* Busca un producto por su Id en el Carro. */
public function findProducto($productoId) {
  if ($this->inCart($productoId)) {
     return $this->contents->offsetGet($productoId);
  }
  return null;
}

/* Elimina un item por su Id del Carro. */
public function remove($productoId) {
  if ($this->inCart($productoId)) {
     return $this->contents->offsetGet($productoId);
  }
  return null;
}

/* Elimina un conjunto de items por sus Ids, del Carro. */
/*
public function removeProductos(ArrayAccess $productoIds) {
  if ($productoIds !== null) {
     for ($iterator = $productoIds->getIterator(); $iterator->valid())
         $this->remove((string) $iterator->current());
     }
  }
}*/

/* Elimina todos los items del Carro. */
public function removeAll() {
  $this->reset();
}

/* Retorna todos los productos del Carro. */
public function getProducts() {
  $this->calculateTotals();
  return $this->contents;
}

/* Retorna todos los productos del Carro. */
public function calculateTotals() {
  $this->totals = 0;
  foreach ($this->contents as $productoId => $item) {
    $this->totals += $item->getImporte();
  }
}

/* Retorna los items del Carro. */
public function getContents() {
  return $this->contents;
}

/* Retorna los items del Carro. */
public function getTotal() {
  return (double) $this->total;
}



}
