<?php

namespace App\Core\Container;
use App\Core\Http\Request\Request;
use App\Core\Http\Request\RequestInterface;
use App\Core\Http\Response\Response;
use App\Core\Http\Response\ResponseInterface;
use App\Core\Routes\RouteInterface;
use App\Core\Routes\Router;

class Container
{
    public readonly RouteInterface $router;
    public readonly RequestInterface $request;
    public readonly ResponseInterface $response;
    public function __construct()
    {
        $this->createDependencies();
    }

    private function createDependencies(): void
    {
        $this->request = Request::createFromGlobals();
        $this->response = new Response();
        $this->router = new Router(
          $this->request,
          $this->response
        );
    }
}