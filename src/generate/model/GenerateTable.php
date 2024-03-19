<?php

namespace myunet\generate\model;


use think\facade\Db;

class GenerateTable extends BaseModel {

    /**
     * 查询表
     * @param $param
     * @return \think\Paginator
     * @throws \think\db\exception\DbException
     */
    public function list($param){
        return $this->order('create_time','desc')
            ->withSearch(['table_name','table_comment'],$param)
            ->paginate(set_page($param,$param['page'],$param['limit']));
    }


    /**
     * 查询数据库所有表
     * @param $params
     * @return mixed
     */
    public function queryResult($params){
        $sql = 'SHOW TABLE STATUS WHERE 1=1 ';
        if (!empty($params['table_name'])) {
            $sql .= "AND name LIKE '%" . $params['table_name'] . "%'";
        }
        if (!empty($params['table_comment'])) {
            $sql .= "AND comment LIKE '%" . $params['table_comment'] . "%'";
        }
        return Db::query($sql);
    }

    public function searchTableNameAttr($q,$v){
        if (!empty($v)){
            $q->whereLike('table_name',"%{$v}%");
        }
    }

    public function searchTableCommentAttr($q,$v){
        if (!empty($v)){
            $q->whereLike('table_comment',"%{$v}%");
        }
    }

}