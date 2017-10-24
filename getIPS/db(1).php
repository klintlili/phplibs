<?php 

$dsn = 'mysql:dbname=test;host=localhost';
$user = 'YW5jaG9uZ25ldA==';
$password = 'YW5jaG9uZ25ldDIwMTY=';
$ret=[];
class DB
{
	private $conn=null;
	private $ret=[];
	public function __construct($dsn,$user,$password)
	{
		try {
		    $this->conn = new PDO($dsn, base64_decode($user), base64_decode($password));
		} catch (PDOException $e) {
		    echo 'Connection failed: '.$e->getMessage();
		}
	}
	//var_dump($dbh);exit;
	public function insert($f1) 
	{
		$sql = 'insert into `t2` (`name`, `ip`) values(:name,:value)';
		//$f1[0]=['192.168.1.1:332'];
		$sth = $this->conn->prepare($sql);
		foreach ($f1[0] as $i) {
			$this->ret[] = $sth->execute([':name'=>$site['fname'], ':value'=>trim($i)]);	
		}
		return $this->ret;
	}

	public function getArr()
	{
		$sql = 'select * from  `t2`';
		//$f1[0]=['192.168.1.1:332'];
		$sth = $this->conn->prepare($sql);
		$sth->execute();	
		$sth->setFetchMode(PDO::FETCH_NUM);
		return $sth->fetchAll();
		#return $this->ret;
		
	}
	public function delip($id)
	{
		$this->conn->exec("delete from `t2` where id='$id'");
	}
}

