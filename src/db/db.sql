DROP TABLE IF EXISTS `myunet_generate_column`;
CREATE TABLE `myunet_generate_column`  (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
    `table_id` int(11) NOT NULL DEFAULT 0 COMMENT '表id',
    `column_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '字段名称',
    `column_comment` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '字段描述',
    `column_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '字段类型',
    `is_required` tinyint(1) NULL DEFAULT 0 COMMENT '是否必填 0-非必填 1-必填',
    `is_pk` tinyint(1) NULL DEFAULT 0 COMMENT '是否为主键 0-不是 1-是',
    `is_insert` tinyint(1) NULL DEFAULT 0 COMMENT '是否为插入字段 0-不是 1-是',
    `is_update` tinyint(1) NULL DEFAULT 0 COMMENT '是否为更新字段 0-不是 1-是',
    `is_lists` tinyint(1) NULL DEFAULT 0 COMMENT '是否为列表字段 0-不是 1-是',
    `is_query` tinyint(1) NULL DEFAULT 0 COMMENT '是否为查询字段 0-不是 1-是',
    `query_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '=' COMMENT '查询类型',
    `view_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'input' COMMENT '显示类型',
    `dict_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '字典类型',
    `create_time` int(10) NOT NULL COMMENT '创建时间',
    `update_time` int(10) NULL DEFAULT NULL COMMENT '修改时间',
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '代码生成表字段信息表';


DROP TABLE IF EXISTS `myunet_generate_table`;
CREATE TABLE `myunet_generate_table`  (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
    `table_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '表名称',
    `table_comment` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '表描述',
    `template_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '模板类型 0-单表(curd) 1-树表(curd)',
    `author` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '作者',
    `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '备注',
    `generate_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '生成方式  0-压缩包下载 1-生成到模块',
    `module_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '模块名',
    `class_dir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '类目录名',
    `class_comment` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '类描述',
    `menu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '菜单配置',
    `delete` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '删除配置',
    `tree` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '树表配置',
    `relations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '关联配置',
    `create_time` int(10) NOT NULL COMMENT '创建时间',
    `update_time` int(10) NULL DEFAULT NULL COMMENT '修改时间',
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '代码生成表信息表';
