<?php 

$dsn = 'mysql:dbname=test;host=localhost';
$user = 'YW5jaG9uZ25ldA==';
$password = 'YW5jaG9uZ25ldDIwMTY=';
$ret=[];

try {
    $dbh = new PDO($dsn, base64_decode($user), base64_decode($password));
} catch (PDOException $e) {
    echo 'Connection failed: '.$e->getMessage();
}
//var_dump($dbh);exit;
$sql = 'insert into `t2` (`name`, `ip`) values(:name,:value)';
//$f1[0]=['192.168.1.1:332'];
$sth = $dbh->prepare($sql);
foreach ($f1[0] as $i) {
	$ret[] = $sth->execute([':name'=>$site['fname'], ':value'=>trim($i)]);	
}
//var_dump($ret);

