<?php 
include_once './db.php';
$db=new DB($dsn,$user,$password);
$ret = $db->getArr();
//开启ob缓存
$i=0;
foreach($ret as $one) {
 	//$str="/usr/bin/curl  --connect-time 10  -x {$one[2]} https://www.baidu.com/index.php &> /dev/null";
 	$str="/usr/bin/curl  --connect-time 10  -x {$one[2]} http://www.anchong.net/index.php &> /dev/null";
    passthru($str,$retcode);
	if($retcode) {
		$db->delip($one[0]);
	}
	#break; 
	if ($i==333333335) {
		break;
	}
	$i++;
}

var_dump($one);
exit;
var_dump($ret);
//first filter


//two filter

