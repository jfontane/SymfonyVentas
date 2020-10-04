<?php
namespace VentasBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use \Symfony\Component\DependencyInjection\Container;

class CarroComprasListener {
  private $container;

  public function __construct(Container $container) {
    $this->container = $container;
  }

  public function onKernelController(FilterControllerEvent $event) {
    $request = $event->getRequest();
    $session = $request->getSession();
    if ($session->has('carro') && $session->get('carro')!==null) {
      $carro = $session->get('carro');
    } else {
      $carro = $this->container->get('app.carro_compras');
      $session->set('carro',$carro);
    }
    $templating = $this->container->get('twig');
    $templating->addGlobal('countCarro', $carro->countContents());
  }




}
