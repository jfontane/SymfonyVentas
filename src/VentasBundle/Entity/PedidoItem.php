<?php
namespace VentasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pedido_item")
 */
class PedidoItem
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
    private $precio;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $porcentajeRecargo;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantidad;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\OneToOne(targetEntity="pedido", inversedBy="itemPedidos")
     * @ORM\JoinColumn(name="pedido_id", referencedColumnName="id")
     */
    private $pedido;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\OneToOne(targetEntity="articulo", inversedBy="itemsPedidos")
     * @ORM\JoinColumn(name="articulo_id", referencedColumnName="id")
     */
    private $articulo;





}
