<?php 
include_once  './https.php';

$url=[['url'=>'www.89ip.cn/tiqu.php?sxb=&tqsl=30&ports=&ktip=&xl=on&submit=%CC%E1++%C8%A1','fname'=>'89ip']];
$site = $url[$argv['1']];
$output = httpget('http://'.$site['url']);
if ($output == false) {
	exit('nooutput');
}

include_once './websites/'.$site['fname'].'.php';

$f1 = filter($output);
if (!$f1) {
	exit('nof1');
}
#insert db
include_once './db.php';


var_dump($ret);
//first filter


//two filter

