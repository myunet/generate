<?php

namespace myunet;

use myunet\controller\LoginController;
use think\Route;
use think\Service as BaseService;

class Service extends BaseService
{
    public function register()
    {

    }

    public function boot()
    {
        /*$routes = $this->app->config->get( 'generate');
        if ($routes) {

        }*/
        $this->registerRoutes( function (Route $route){
            $route->group('generate',function () use ($route) {
                $route->get( "login",LoginController::class."@login" );
            } );
        } );
    }
}
