<?php
namespace VentasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pedido")
 */
class Pedido
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $descuento;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $importeTotal;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaCreacion;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaModificacion;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $estado;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="cliente", inversedBy="pedidos")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    private $cliente;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="pedidoItem", mappedBy="pedido")
     */
    private $itemPedidos;





}
