<?php

namespace App\Kernel\Container;

use App\Kernel\Auth\Auth;
use App\Kernel\Auth\AuthInterface;
use App\Kernel\Config\Config;
use App\Kernel\Config\ConfigInterface;
use App\Kernel\Database\Database;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Http\Request;
use App\Kernel\Http\RequestInterface;
use App\Kernel\Router\Router;
use App\Kernel\Router\RouterInterface;
use App\Kernel\Session\Session;
use App\Kernel\Session\SessionInterface;

class Container
{
    public readonly RequestInterface $request;

    public readonly RouterInterface $router;

    public readonly SessionInterface $session;

    public readonly ConfigInterface $config;

    public readonly DatabaseInterface $database;

    public readonly AuthInterface $auth;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices(): void
    {
        $this->request = Request::createFromGlobals();
        $this->session = new Session();
        $this->config = new Config();
        $this->database = new Database($this->config);
        $this->auth = new Auth($this->database, $this->session, $this->config);
        $this->router = new Router(
            $this->request,
            $this->session,
            $this->database,
            $this->auth
        );
    }
}
