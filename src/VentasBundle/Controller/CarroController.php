<?php

namespace VentasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use VentasBundle\Entity\Carro\ItemCarro;
use ArrayObject;
use ArrayAccess;

class CarroController extends Controller
{
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        return $this->render('@Ventas/Carro/index.html.twig', array(
            'productos' => $session->get('carro')->getProductos(),
            'total' => $session->get('carro')->getTotal(),
            'titulo' => 'Carro de Compras'
        ));
    }
}
