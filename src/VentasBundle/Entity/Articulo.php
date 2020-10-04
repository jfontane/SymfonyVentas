<?php
namespace VentasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="articulo")
 */
class Articulo
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="text")
     */
    private $descripcion;

    /**
     * @ORM\Column(type="text")
     */
    private $empaque;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $precio;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $porcentajeRecargo;

    /**
     * @ORM\Column(type="text")
     */
    private $codigoBarra;

    /**
     * @ORM\Column(type="text")
     */
    private $imagen;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="categoria", inversedBy="articulos")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    private $categoria;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="pedidoItem", mappedBy="articulo")
     */
    private $itemsPedidos;




    /**
     * Constructor
     */
    public function __construct()
    {
        $this->itemsPedidos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Articulo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Articulo
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Articulo
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set empaque
     *
     * @param string $empaque
     *
     * @return Articulo
     */
    public function setEmpaque($empaque)
    {
        $this->empaque = $empaque;

        return $this;
    }

    /**
     * Get empaque
     *
     * @return string
     */
    public function getEmpaque()
    {
        return $this->empaque;
    }

    /**
     * Set precio
     *
     * @param string $precio
     *
     * @return Articulo
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set porcentajeRecargo
     *
     * @param string $porcentajeRecargo
     *
     * @return Articulo
     */
    public function setPorcentajeRecargo($porcentajeRecargo)
    {
        $this->porcentajeRecargo = $porcentajeRecargo;

        return $this;
    }

    /**
     * Get porcentajeRecargo
     *
     * @return string
     */
    public function getPorcentajeRecargo()
    {
        return $this->porcentajeRecargo;
    }

    /**
     * Set codigoBarra
     *
     * @param string $codigoBarra
     *
     * @return Articulo
     */
    public function setCodigoBarra($codigoBarra)
    {
        $this->codigoBarra = $codigoBarra;

        return $this;
    }

    /**
     * Get codigoBarra
     *
     * @return string
     */
    public function getCodigoBarra()
    {
        return $this->codigoBarra;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Articulo
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set categoria
     *
     * @param \VentasBundle\Entity\categoria $categoria
     *
     * @return Articulo
     */
    public function setCategoria(\VentasBundle\Entity\categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \VentasBundle\Entity\categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Add itemsPedido
     *
     * @param \VentasBundle\Entity\pedidoItem $itemsPedido
     *
     * @return Articulo
     */
    public function addItemsPedido(\VentasBundle\Entity\pedidoItem $itemsPedido)
    {
        $this->itemsPedidos[] = $itemsPedido;

        return $this;
    }

    /**
     * Remove itemsPedido
     *
     * @param \VentasBundle\Entity\pedidoItem $itemsPedido
     */
    public function removeItemsPedido(\VentasBundle\Entity\pedidoItem $itemsPedido)
    {
        $this->itemsPedidos->removeElement($itemsPedido);
    }

    /**
     * Get itemsPedidos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItemsPedidos()
    {
        return $this->itemsPedidos;
    }
}
