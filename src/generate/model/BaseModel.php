<?php

namespace myunet\generate\model;

use think\Model;

class BaseModel extends Model{
    protected $error;

    public function getError(){
        return $this->error;
    }

    protected function setError($msg){
        $this->error = $msg;
        return false;
    }
}