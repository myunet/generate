<?php

namespace myunet\generate;

use myunet\generate\controller\IndexController;
use think\facade\Env;
use think\Route;
use think\Service as BaseService;

class Service extends BaseService
{
    public function register()
    {

    }

    public function boot()
    {
        //$routes = $this->app->config->get( 'generate');
        //获取是否开启debug模式，开启则注册路由
        $app_debug = Env::get('APP_DEBUG');
        if ($app_debug){
            $this->registerRoutes( function (Route $route){
                $route->group('index',function () use ($route) {
                    $route->get( "index",IndexController::class."@index" );
                } );
            } );
        }
    }
}
