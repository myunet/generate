<?php


if (!function_exists('GetRootPath')) {
    /**
     * 获取扩展根目录
     * @return string
     */
    function GetRootPath(): string
    {
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
    function format_bytes(int $size, string $delimiter = '', int $precision = 2): string
    {
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
    function format_units(int $size): string
    {
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
    function get_mysql_param(array $data, string $param_name): string
    {
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