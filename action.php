<?php 

include './testData.php';

$config = [];

echo "请输入导入结果 [d:直接导入数据库/f:生成SQL文件,default:d]> ";
$data_type = trim(fgets(STDIN));
$data_type = empty($data_type) ? "d" : strtolower($data_type);
if($data_type == 'd'){
	db_config();
}



echo "请输入数据条数/万条[default:1]> ";
$config['data_num'] = trim(fgets(STDIN));
$config['data_num'] = (empty($config['data_num']) || !is_int($config['data_num'])) ? "1" : $config['data_num'];

echo $config['data_num'];
echo "是否需要主键id[y/n,default:y]> ";
$config['primary_key'] = trim(fgets(STDIN));
$config['primary_key'] = (empty($config['primary_key'])) ? 'y' : strtolower($config['primary_key']);

echo $config['primary_key'];


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

	$conn = mysqli_connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name'], $config['db_port']);
	if(!$conn) {
		exit("无法连接到数据库主机！错误：" . mysqli_error($conn));
	}else{
		mysqli_query($conn, "DROP TABLE IF EXISTS `users`;") or die("error\n错误代码：" . mysqli_error($conn) . "\n");
		mysqli_query($conn, "SQL"）
	}

}
