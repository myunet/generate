<?php

namespace myunet\generate\controller;

use think\facade\Db;
use think\facade\View;

class IndexController extends BaseController{

    public function index(){
        return view("index/index");
    }

    public function workplace(){
        //查询表列表
        $dbTableList = Db::query("SHOW TABLE STATUS");
        //数据库信息
        $db_data = Db::query("SHOW GLOBAL STATUS");
        // 获取当前数据库的总发送数据量
        $sentData = get_mysql_param($db_data,'Bytes_sent');
        // 获取当前数据库的总接收数据量
        $receivedData = get_mysql_param($db_data,'Bytes_received');
        //总链接数
        $connections = get_mysql_param($db_data,'Connections');
        //总查询数
        $queries = get_mysql_param($db_data,'Queries');
        //数据库启动时间
        $start_time = get_mysql_param($db_data,'Uptime');
        //数据库版本信息
        $version = Db::query("SELECT VERSION() as version")[0]['version'];
        //启动信息
        $processlist = Db::query("SHOW PROCESSLIST");
        View::assign([
            'db_host'=>$processlist[0]['Host'],
            'db_user'=>$processlist[0]['User'],
            'db_database'=>$processlist[0]['db'],
            'db_sent_data'=>$sentData,
            'db_received_data'=>$receivedData,
            'db_connections'=>$connections,
            'db_queries'=>$queries,
            'db_version'=>$version,
            'db_start_time'=>date('Y-m-d H:i:s', time() - $start_time),
            'db_table_count'=>count($dbTableList),
            'db_size'=>array_sum(array_map(function ($item) {
                return $item['Data_length'] + $item['Index_length'];
            }, $dbTableList)),
        ]);
        return view("console/workplace");
    }

    public function tplTheme(){
        return view("tpl/tpl-theme");
    }

    public function tplNote(){
        return view("tpl/tpl-note");
    }

}