<?php
use think\facade\Db;

if (!function_exists('format_bytes')) {
    /**
     * 获取扩展根目录
     * @return string
     */
    function GetRootPath(): string{
        return __DIR__;
    }
}

if (!function_exists('format_bytes')) {

    /**
     * 将字节转换为可读文本
     * @param int $size      大小
     * @param string $delimiter 分隔符
     * @param int $precision 小数位数
     * @return string
     */
    function format_bytes(int $size, string $delimiter = '', int $precision = 2): string{
        $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
        for ($i = 0; $size >= 1024 && $i < 6; $i++) {
            $size /= 1024;
        }
        return round($size, $precision) . $delimiter . $units[$i];
    }
}

if (!function_exists('format_units')) {

    /**
     * 获取字节单位
     * @param int $size   字节
     * @return string
     */
    function format_units(int $size): string{
        $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
        for ($i = 0; $size >= 1024 && $i < 6; $i++) {
            $size /= 1024;
        }
        return $units[$i];
    }
}

if (!function_exists('get_mysql_param')) {

    /**
     * @param array $data
     * @param string $param_name
     * @return string
     */
    function get_mysql_param(array $data, string $param_name): string{
        $targetValue = "";
        foreach ($data as $item) {
            if ($item["Variable_name"] === $param_name) {
                $targetValue = $item["Value"];
                break;
            }
        }
        return $targetValue;
    }

}
if (!function_exists('install_sql')) {
    /**
     * 安装sql
     * @return void
     */
    function install_sql(): void{
        try {
            $dbFile = GetRootPath().'\\db\\db.sql';
            $content = str_replace(";\r\n", ";\n", file_get_contents($dbFile));
            $tables = explode(";\n", $content);
            $prefix = env('database.prefix', '');
            $database = env('database.database', '');
            foreach ($tables as $table) {
                $table = trim($table);
                if (empty($table)) continue;
                $table = str_replace('`myunet_',   $database.'.`myunet_', $table);
                $table = str_replace('`myunet_', '`' . $prefix, $table);
                Db::query($table);
            }
            touch(GetRootPath() . '\\db\\install.lock');
        }catch (Exception $e){
            echo $e->getMessage();
            die;
        }
    }
}


if (!function_exists('app_is_installed')) {
    /**
     * 检查是否安装sql
     * @return void
     */
    function app_is_installed(): void{
        if (!file_exists(GetRootPath() . '\\db\\install.lock')){
            install_sql();
        }
    }
}

if (!function_exists('set_page')) {
    /**
     * 设置分页
     * @return array
     */
    function set_page($data, $page = 1, $list_rows = 10): array {
        $defaults = [
            'page' => $page,
            'list_rows' => $list_rows
        ];
        return array_merge($defaults, $data);
    }
}

if (!function_exists('page')) {
    /**
     * 分页
     * @return array
     */
    function page($data, $page = 1, $limit = 10): array {
        $total = count($data);
        $last_page = (string)ceil($total - $limit);
        $start = ($page - 1) * $limit;
        return array_slice($data,$start,$limit);
    }
}

if (!function_exists('get_layui_page')) {
    /**
     * 设置分页
     * @return array
     */
    function get_layui_page($page,$params = null,$msg = "获取成功"): array {
        if (is_object($page) && empty($params)){
            $count = $page->total();
            $data = $page->all();
        }else{
            $count = count($page);
            $data = page($page,$params['page'],$params['limit']);
        }
        return  [
            'code'=>0,
            'msg'=>$msg,
            'count'=>$count,
            'data'=>$data,
        ];
    }
}

