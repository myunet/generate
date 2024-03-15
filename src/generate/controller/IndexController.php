<?php

namespace myunet\generate\controller;

class IndexController extends BaseController{

    public function index(){
        dump($this->request->param());
        return view("index/index");
    }

}