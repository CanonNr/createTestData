<?php 

include './testData.php';




$config = [];
$conn = NULL;

echo "请输入导入结果 [d:直接导入数据库/f:生成SQL文件,default:d]> ";
$data_type = trim(fgets(STDIN));
$data_type = empty($data_type) ? "d" : strtolower($data_type);

echo "请输入数据条数/万条 [default:1]> ";
$data_num = trim(fgets(STDIN));
$data_num= (empty($config['data_num']) || !is_numeric($config['data_num'])) ? 10000 : $config['data_num']*10000;

if($data_type == 'd'){
	$conn = db_config();
	insert_db($conn,$data_num);
}else{
	//文件
	$data_type == 'f'
}




function db_config(){

	echo "请输入数据库地址 [default:localhost]> ";
	$config['db_host'] = trim(fgets(STDIN));
	$config['db_host'] = empty($config['db_host']) ? "localhost" : $config['db_host'];

	echo "请输入数据库端口 [default:3306]> ";
	$config['db_port'] = trim(fgets(STDIN));
	$config['db_port'] = empty($config['db_port']) ? "3306" : $config['db_port'];

	echo "请输入数据库账号 [default:root]> ";
	$config['db_user'] = trim(fgets(STDIN));
	$config['db_user'] = empty($config['db_user']) ? "root" : $config['db_user'];

	echo "请输入数据库密码 [default:root]> ";
	$config['db_pass'] = trim(fgets(STDIN));
	$config['db_pass'] = empty($config['db_pass']) ? "root" : $config['db_pass'];

	echo "请输入数据库名称 [default:test]> ";
	$config['db_name'] = trim(fgets(STDIN));
	$config['db_name'] = empty($config['db_name']) ? "test" : $config['db_name'];

	echo "请输入数据表名称 [default:s_users]> ";
	$config['db_tablename'] = trim(fgets(STDIN));
	$config['db_tablename'] = empty($config['db_tablename']) ? "s_users" : $config['db_tablename'];

	$conn = mysqli_connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name'], $config['db_port']);
	if(!$conn) {
		exit("无法连接到数据库主机！错误：" . mysqli_error($conn));
	}else{
		mysqli_query($conn, "DROP TABLE IF EXISTS `{$config['db_tablename']}`;") or die("error\n错误代码：" . mysqli_error($conn) . "\n");
		mysqli_query($conn, "CREATE TABLE `{$config['db_tablename']}` (
		  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
		  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮箱',
		  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
		  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'token',
		  `realname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '真实姓名',
		  `sex` tinyint(1) DEFAULT '0' COMMENT '0未知,1男,2女',
		  `birthday` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '生日',
		  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
		  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;") or die("安装出错，请反馈给作者。\n错误代码：" . mysqli_error($conn) . "\n");
		return $conn;
	}

}


function insert_db(){
	
}