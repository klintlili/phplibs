<?php
include_once 'common/libs.php';
include_once 'common/webbasic.php';
include_once 'common/config.inc';

/*有一个需求，把所有子文件下的文件，都拿到上一级，同时删除所有子文件夹。即该文件夹下只有文件。*/
function getfiles($path){
	$file_arr=array();
	if(!$fp=opendir($path))
	{
		return '';
	}
	while($file=readdir($fp))
	{
		if($file !='.' && $file !='..')
		{
			if(is_dir($path."/$file"))
			{
				$file_arr[]=getfiles($path."/$file");
			}elseif(is_file($path."/$file"))
			{
				//是文件的直接获得绝对路径
				$file_arr[]=$path."/$file";
			}else 
			{
				
			}
		}
	}
	closedir($fp);
	return $file_arr;
}
$path='C:\Documents and Settings\21\My Documents\Tencent Files\All Users\QQ\Misc\QQSkin';
$path2='C:\Documents and Settings\21\My Documents\Tencent Files\All Users\QQ\Misc\QQSkin\AAAAAAA';
$arr=getfiles($path);
foreach($arr as $filepath2)
{
	if(is_array($filepath2))
	{
		foreach($filepath2 as $sub_k=>$sub_v)
		{
			$bname=basename($sub_v);
			//从最后开始的话，是从-1开始的
			if(substr($bname,-3,3)=='xml')
				continue;
			//重名的文件，就要另起别名，为了不覆盖
			if(file_exists($path2."/".$bname))
			{
				$bname=rand(1000,3000).rand(5000,9999).$bname;
			}
			if(!copy($sub_v,$path2."/".$bname))
			{
				echo "copy failed $sub_v<BR>";
			}
		}
	}
}


$str=<<<HOST
{"programmers":[ {"firstName":"Brett","lastName":"McLaughlin","email":"aaaa"}, {"firstName":"Jason","lastName":"Hunter","email":"bbbb"}, {"firstName":"Elliotte","lastName":"Harold","email":"cccc"} ], "authors":[ {"firstName":"Isaac","lastName":"Asimov","genre":"sciencefiction"}, {"firstName":"Tad","lastName":"Williams","genre":"fantasy"}, {"firstName":"Frank","lastName":"Peretti","genre":"christianfiction"} ], "musicians":[ {"firstName":"Eric","lastName":"Clapton","instrument":"guitar"}, {"firstName":"Sergei","lastName":"Rachmaninoff","instrument":"piano"} ]} 
HOST;
//如果不包含MMM，则返回false
$p=strstr($str,'MMM');
$arr=json_decode($str,true);



//密码加密格式
$a=md5('english555');
$b=md5($a.'d5ff1e');
//e158d2018ae79b93f945b5ad8bf4c313  
//e158d2018ae79b93f945b5ad8bf4c313


#转换格式
$zone_street=$zone_name[26];
$zoneID=array();

/*由config.inc生成zoneid.php的方法
 * 生成AAAzone.php后，还得使用正则替换掉[]*/
foreach($zone_street as $zone=>$sub)
{
	foreach($sub as $key=>$value)
	{
		if($key=='name')
		{
			$a=$value;
			$zoneID[$a]=array('ID'=>"$zone,");
			continue;
		}else
		{
			$zoneID[$a]=array_merge($zoneID[$a],array($value=>"$key,"));
		}
	}
}
$filename='AAAzone.php';
//按照ZoneID.php的格式输出到一个文件中
foreach($zoneID as $zone_name=>$sub_v)
{
	error_log("'$zone_name'=>Array\n(\n",3,$filename);
	foreach($sub_v as $sub2_k=>$sub2_v)
	{
		error_log("\t'$sub2_k'=>$sub2_v\n",3,$filename);
	}
	error_log("),\n",3,$filename);
}





$pop_conn=pfsockopen('pop.126.com','110',$errno,$errstr,'10');
$res_line=@fgets($pop_conn,515);
$a=fputs($pop_conn,"user wlgc090102@126.com\r\n");
$res_line=@fgets($pop_conn,515);
$b=fputs($pop_conn,"pass <wlgc123456>\r\n");
$res_line=@fgets($pop_conn,515);
$c=fputs($pop_conn,'retr 1\r\n');
$str=fgets($pop_conn);
$str=<<<HOST
{"programmers":[ {"firstName":"Brett","lastName":"McLaughlin","email":"aaaa"}, {"firstName":"Jason","lastName":"Hunter","email":"bbbb"}, {"firstName":"Elliotte","lastName":"Harold","email":"cccc"} ], "authors":[ {"firstName":"Isaac","lastName":"Asimov","genre":"sciencefiction"}, {"firstName":"Tad","lastName":"Williams","genre":"fantasy"}, {"firstName":"Frank","lastName":"Peretti","genre":"christianfiction"} ], "musicians":[ {"firstName":"Eric","lastName":"Clapton","instrument":"guitar"}, {"firstName":"Sergei","lastName":"Rachmaninoff","instrument":"piano"} ]} 
HOST;
$user=base64_encode('wlgc090102@126.com');
$pass=base64_encode('wlgc123456');
$pData['Total']='530';
$pData['Square']='135';
$ave=$pData['Total']*10000/$pData['Square'];
		if($ave<5000 || $ave>300000)
		{
			$errInfo .='发布失败，均价范围在5000-300000';
			return FALSE;
		}

$os=PHP_OS;
//竟然有php内置函数，可以验证邮箱和ip。这下就不用写正则了
if(filter_var('192.168.2.22', FILTER_VALIDATE_IP) === FALSE)
if(filter_var('872140945@ddd.com', FILTER_VALIDATE_EMAIL) === FALSE)
{
     $a=FALSE;
}else{
     $a=true;
}

$a=date('H:i:s','60975');
$directory='./';
$dir=opendir($directory);
while($a=readdir($dir))
{
	if(!is_dir($a))
		echo "$a<br>";
	else
		echo "$a is directory";
}

closedir($dir);


$filename='http://www.baidu.com';
$opt=array('http'=>array(
					'header'=>'Content-type: application/x-www-form-urlencoded',
					'method'=>'POST',
					'content'=>'a=b&c=d',
					)
);
$contents=stream_context_create($opt);
$fp=fopen($filename,'r','',$contents);


//用于百度乐居 从数据库中读取出数据，方便查看使用
$arr=base64_decode('YTo3Njp7czo2OiJzdGF0dXMiO3M6MToiMiI7czoxMjoiZ19hdXRvX3RvcGljIjtzOjE6IjAiO3M6MTM6Imdfdl90b3BpY19udW0iO3M6MDoiIjtzOjE3OiJoYXZpbmdfdl90b3BpY251bSI7czowOiIiO3M6MTE6IklucHV0U291cmNlIjtzOjU6ImFnZW50IjtzOjY6InVzZXJpZCI7czo3OiI4MDcyODAxIjtzOjY6InNob3BpZCI7czowOiIiO3M6OToiY29tcGFueWlkIjtzOjA6IiI7czo5OiJBZ2VudE5hbWUiO3M6NjoizfWwrMGrIjtzOjg6IlNob3BOYW1lIjtzOjc6IsjzvdxB1+kiO3M6MTE6IkNvbXBhbnlOYW1lIjtzOjMyOiKxsb6pytDS17rPt7+12LL6vq28zdPQz97U8MjOuavLviI7czoxMDoiZGVsZWdhdGVpZCI7czowOiIiO3M6MTE6IkNvbW11bml0eUlkIjtzOjM2OiI3ZDM2MGZhOC1hMTllLTExZGYtYmZhYS0wMDI2Yjk1ZGI1OWEiO3M6MTU6InRtcF9jb21tdW5pdHlpZCI7czowOiIiO3M6MTc6InRtcF9jb21tdW5pdHluYW1lIjtzOjA6IiI7czoxMjoidG1wX2Rpc3RyaWN0IjtzOjA6IiI7czo5OiJ0bXBfYmxvY2siO3M6MDoiIjtzOjIwOiJ0bXBfY29tbXVuaXR5YWRkcmVzcyI7czowOiIiO3M6MTU6InRtcF9kZWxpdmVyZGF0ZSI7czowOiIiO3M6MTM6IkNvbW11bml0eU5hbWUiO3M6NzoiuavUsDW6xSI7czoxMjoiSG91c2VBZGRyZXNzIjtzOjI2OiKzr9H0x/i98MyowrfKrtfWwre/2s73sbG9xyI7czo5OiJkcmFmdG5hbWUiO3M6MDoiIjtzOjExOiJkZWxldGVkcmFmdCI7czowOiIiO3M6OToiaGlkX3NuX2lkIjtzOjY2OiJ8fDI4OTYyNDU2M3x8Mjg5NjI0NTgwfHwyODk2MjQ1OTV8fDI4OTYyNDYyOHx8Mjg5NjI0NjM1fHwyODk2MjQ2NDkiO3M6MTI6ImhpZF9zbl9waWNpZCI7czowOiIiO3M6MTA6ImhpZF9zbl90eHQiO3M6NTcyOiImJjI4OTYyNDU2M3x8aHR0cDovL2k1LmVzZmltZy5jb20vaW1wLzUzNDhhZGQ2Yzc4NTdiNWNhMzdiNWM4MTZmYWNiNDA3X3MxMTBYODBfb3M4NjA0OWIuanBnfHwxJiYyODk2MjQ1ODB8fGltZ19iai8yMDE1LzA1LzA1L2U3L2Q0LzgwNzI4MDFfdGh1bV8xNDE1NTNfYjcxNjRhNTVhY2I2NGU2ZWMxYzYwZTkwYTc4YzA5ZGYuanBnfHwxJiYyODk2MjQ1OTV8fGltZ19iai8yMDE1LzA1LzA1L2U3L2Q0LzgwNzI4MDFfdGh1bV8xNDE1NTVfZmFkMjFmMTUyMzRmZGMwYjAwZTU3NmUyZGE2ZjgwZjIuanBnfHwxJiYyODk2MjQ2Mjh8fGltZ19iai8yMDE1LzA1LzA1L2U3L2Q0LzgwNzI4MDFfdGh1bV8xNDE1NTlfMWYwZWE4MTQ1ZmViNTk4MTg3MmNlYzFiM2I0YjJlN2IuanBnfHwxJiYyODk2MjQ2MzV8fGh0dHA6Ly9pNi5lc2ZpbWcuY29tL2ltcC81MzQ4YWRlMDI3MDVhZjE3ZTIyYTM3ZDAyYzk3ZWI3MF9zMTEwWDgwX29zZDhlNGNmLmpwZ3x8MSYmMjg5NjI0NjQ5fHxpbWdfYmovMjAxNS8wNS8wNS9lNy9kNC84MDcyODAxX3RodW1fMTQxNjAyXzY5YWNiNjYzZTQ4NTJhODQzODFjZTAzNWMzYzRjZmU0LmpwZ3x8MSI7czo5OiJoaWRfZnhfaWQiO3M6MTE6Inx8Mjg5NjI0NTU5IjtzOjEwOiJoaWRfZnhfdHh0IjtzOjk2OiImJjI4OTYyNDU1OXx8aW1nX2JqLzIwMTUvMDUvMDUvZTcvZDQvODA3MjgwMV90aHVtXzE0MTU1MF82ZmY2ZDJhODIyMWVhZTkxZWZkNDRiMGQ0NzQ3NzdiOS5qcGd8fDEiO3M6OToiaGlkX3hxX2lkIjtzOjMzOiJ8fDI4OTYyNDY2OHx8Mjg5NjI0Njc4fHwyODk2MjQ2ODMiO3M6MTA6ImhpZF94cV90eHQiO3M6Mjg2OiImJjI4OTYyNDY2OHx8aW1nX2JqLzIwMTUvMDUvMDUvZTcvZDQvODA3MjgwMV90aHVtXzE0MTYwNl82OWQzZjgxNWY2YzU5MWUzMzk2N2Q5NjhlMWJkZDkzNC5qcGd8fDEmJjI4OTYyNDY3OHx8aW1nX2JqLzIwMTUvMDUvMDUvZTcvZDQvODA3MjgwMV90aHVtXzE0MTYwNl9iNTViNjI5N2EwMzc4ZWVkMjM1MGU2ZDQ4ZWU5MTk3Mi5qcGd8fDImJjI4OTYyNDY4M3x8aHR0cDovL2k0LmVzZmltZy5jb20vaW1wLzUzNDhhZGU2NDMwNTY3NmY2YTg5MjU4OTc4OWY4MmJjX3MxMTBYODBfb3NhNWRlMGMuanBnfHwzIjtzOjk6ImhpZHVzZXJpZCI7czowOiIiO3M6OToiaGlkc2hvcGlkIjtzOjA6IiI7czoxMjoiaGlkY29tcGFueWlkIjtzOjA6IiI7czoxMjoiaGlkQWdlbnROYW1lIjtzOjA6IiI7czoxMToiaGlkU2hvcE5hbWUiO3M6MDoiIjtzOjE0OiJoaWRDb21wYW55TmFtZSI7czowOiIiO3M6OToic2VsdXNlcmlkIjtzOjA6IiI7czoxMDoiZGVmYXVsdHBpYyI7czo5OiIyODk2MjQ2NDkiO3M6OToiY29tbXBpY18xIjtzOjA6IiI7czo3OiJjb21tcGljIjtzOjA6IiI7czo5OiJzaG93X3NpbmEiO3M6MToiMSI7czoxNjoiU3VnQ29tbXVuaXR5TmFtZSI7czo3OiK5q9SwNbrFIjtzOjE1OiJTdWdIb3VzZUFkZHJlc3MiO3M6MjY6IrOv0fTH+L3wzKjCt8qu19bCt7/azvexsb3HIjtzOjg6IkRpc3RyaWN0IjtzOjY6IrOv0fTH+CI7czo0OiJjaXR5IjtzOjQ6IrGxvqkiO3M6NToiYmxvY2siO3M6NjoizPDLrtSwIjtzOjU6IkJsb2NrIjtzOjY6Iszwy67UsCI7czoxMjoiQ29tcGxldGVEYXRlIjtzOjQ6IjIwMTIiO3M6MTE6IkFkZHJlc3NQYXJ0IjtzOjA6IiI7czoxMjoiQnVpbGRpbmdBcmVhIjtzOjM6IjEyNSI7czo4OiJDdXJGbG9vciI7czoyOiIyMCI7czoxMDoiVG90YWxGbG9vciI7czoyOiIyOCI7czo5OiJIb3VzZUNvZGUiO3M6MDoiIjtzOjk6IkRpcmVjdGlvbiI7czo0OiK2q8TPIjtzOjc6IkZpdG1lbnQiO3M6NDoiusDXsCI7czoxNDoiSG91c2VBY3R1YWxpdHkiO3M6NDoiv9W3vyI7czoxMDoiSG91c2VUaXRsZSI7czowOiIiO3M6OToiTG9va0hvdXNlIjtzOjQ6ItaxvdMiO3M6NDoiTWVtbyI7czowOiIiO3M6MTA6Ik1vZGVsX0hhbGwiO3M6MToiMiI7czoxMDoiTW9kZWxfUm9vbSI7czoxOiIzIjtzOjEyOiJNb2RlbF9Ub2lsZXQiO3M6MToiMiI7czoyMToiUHJvcGVydHlNYW5hZ2VtZW50RmVlIjtzOjA6IiI7czoxMzoiUHJvcGVydHlSaWdodCI7czo2OiLJzMa3t78iO3M6MTY6InByb3BlcnR5dHlwZWxpc3QiO3M6ODoixtXNqNeh1awiO3M6NzoidXNlYXJlYSI7czowOiIiO3M6MTI6IlByb3BlcnR5VHlwZSI7czoxOiIxIjtzOjEyOiJCdWlsZGluZ1R5cGUiO3M6MToiMSI7czoxNjoiaG91c2VfZmVhdHVyZXNbXSI7YToyOntpOjA7czoxOiIzIjtpOjE7czoxOiI2Ijt9czo5OiJTYWxlUHJpY2UiO3M6MzoiMjYyIjtzOjU6ImJlaWFuIjtzOjA6IiI7czoxMjoidXBsb2FkaWZ5X3hxIjtzOjA6IiI7czoxMjoidXBsb2FkaWZ5X2Z4IjtzOjA6IiI7czoxMjoidXBsb2FkaWZ5X3NuIjtzOjA6IiI7czo4OiJkaXN0cmljdCI7czo2OiKzr9H0x/giO3M6ODoiRmlsZWRhdGEiO2E6Mzp7aTowO3M6MDoiIjtpOjE7czowOiIiO2k6MjtzOjA6IiI7fX0=');
$a=unserialize($arr);

$str=<<<HOST
(string:573) HTTP/1.1 302 Moved Temporarily
Server: nginx
Date: Tue, 12 May 2015 05:45:52 GMT
Content-Type: text/html
Transfer-Encoding: chunked
Connection: keep-alive
ajk: m=app10-034, pv=2015_20_01, jv=ga
Set-Cookie: aQQ_ajkauthinfos=jqFcaCeW1gYt2TlbHZ51arCHuKySA8ajLvzJwuYxTsvRNELJVx0sVjTvYOKOTdqh0L5pj8gTnaBK0Bz6OmmyS82owSD3tz1XuEGdjDwVnlViMQ; path=/; domain=.anjuke.com
Set-Cookie: ajk_member_id=10848696; expires=Wed, 13-May-2015 05:45:53 GMT; path=/; domain=.anjuke.com
Location: /ajkbroker/combo/broker/manage/hz/v2/?from=V1
Cache-Control: no-cache,must-revalidate


HOST;
//赶集的房源列表，延迟出现房源的情况
//二分法查找,
//适合查找和数组中某个值相等的。
$arr=array(3,4,5,8,10,11,11,13);
$key=BinarySearch($arr,'11');
$key2=BinarySearch2($arr,'11');
function BinarySearch($arr,$key)
{
	$count=count($arr);
	$low=0;
	$hig=$count-1;
	while($low<$hig)
	{
		//计算出中间位置的索引值
		$mid=ceil(($hig+$low)/2);
		//中间值大的，继续从左半部分查找
		if($arr[$mid]>$key)
		{
			$hig=$mid-1;
		//中间值小的，继续从右半部分查找
		}elseif($arr[$mid]<$key)
		{
			$low=$mid+1;
		}else 
			return $mid;
	}
	return -1;
}
function BinarySearch2($arr,$key)
{
	$count=count($arr);
	$low=0;
	$hig=$count-1;
	while($low<$hig)
	{
		//计算出中间位置的索引值
		$mid=floor(($hig+$low)/2);
		//中间值大的，继续从左半部分查找
		if($arr[$mid]>$key)
		{
			$hig=$mid-1;
		//中间值小的，继续从右半部分查找
		}elseif($arr[$mid]<$key)
		{
			$low=$mid+1;
		}else 
			return $mid;
	}
	return -1;
}


//酷房网的post前，有个check
$c=mb_convert_encoding('蹇揩銆併€併€佹姠璐?鍌插煄 鍌插煄鏅€氫綇瀹?闅忔椂鐪嬫埧','UTF-8','gb2312');
$a=zh_to_en('10');
$b=chr(hexdec(a1));
$c=chr(hexdec(b6));
$d=$b.$c;
$c=mb_convert_encoding($d,'UTF-8','gb2312');
/*
 * 原理：
 * GB2312规定 对任意一个图形字符都采用两个字节表示，每个字节均采用8位编码表示
 * 而一级汉字其编码范围是B0A1-D7F9，是按照拼音排序的
 * 汉字分级。一级在16-55区。56-87区为二级汉字。
 * 一级汉字是按照拼音的abcd排序的。这是非常重要的(我们可以利用这个顺序，确定一个一级简体中文的拼音首字母）。
 * 那么A肯定就是一个范围，b开头的就是一个范围，
 * 我们可以根据传入的gb2312的汉字，转换成高字节和低字节的十六进制位。
 * 比如汉字 啊 gb2312编码为B0A1.高位 B0,低位  A1。
 * 把B0A0转换成某一个数字（本例为$letter * 256 + $tmp - 65536），算出这个数字所在的范围即可。
 * 
 * 同理，汉字的全拼，也是一个有规律的顺序。ba，ban,bai这些拼音开头的汉字在gb2312编码表里的位置也是一个范围，只有全部把这些范围确定了。
 * 所以，根据汉字的位置，就知道这个汉字的首字母 和 全拼 了。
 * 
 * 当然，二级汉字就不适用了。这是有缺陷的。
 * */
function zh_to_en($string,$top=false)
	{
	    $return_str = "";
	 	$string = mb_convert_encoding($string,'GB2312','UTF-8');//转换编码：utf-8->gbk
	    for ($i=0; $i < strlen($string); $i++)
		{
			//高位字节
	        $letter = ord(substr($string, $i, 1));
	        $h1=dechex($letter);
	        //如果字节代表的数字大于160，则是汉字，当前为高位字节，继续读取低字节；否则属于ASCII范围的a-z，0-9等
	        if($letter > 160)
			{
				//低位字节
	            $tmp = ord(substr($string, ++$i, 1));
	            $h2=dechex($tmp);
	            //计算编码所代表的位置编号。
	            $letter = $letter * 256 + $tmp;
	            //计算和11111111 11111111的差距。（二级制16个1等于十进制的65536）
	            $letter = $letter - 65536;
	 	    }
			if($top)
			{
				$return_str .= switch_val_en_top($letter);//获得拼音头字母
		    }else
		    {
				 $return_str .=switch_val_en_all($letter);//获得中文（汉字全拼）
			}
	    }
	    return $return_str;
	}
//用于计算脚本运行时间的函数
function  microtime_float()
{
	//单位都是秒
    list( $usec ,  $sec ) =  explode ( " " ,  microtime ());
    return ((float) $usec  + (float) $sec );
}

$a=microtime_float();
$b=microtime_float();
$spend=$b-$a;

//zend,studio查看不到二维数组
$arr=array('南北大厦'=>array('ID'=>'1','北大'=>'2','南北大厦'=>'5'));

$a=str_replace($arr,'','南北大厦');

$a=array();
$b=array();
$len=strlen($str);
for($i=0;$i<$len;$i++)
{
	//用十进制看字符
	//$a[]=ord(substr($str,$i,1));
	//用十六进制看字符
	$b[]=bin2hex(substr($str,$i,1));
}
//十六进制转字符串
$hex=array("e3","80","80");
$hex=array("c2","a0");
$s=hexToStr($hex);
//传入数组
function hexToStr($hex)
{   
	$string=""; 
	for($i=0;$i<count($hex);$i++)
	//把单个字节的拼在一起就行，很好
	$string.=chr(hexdec($hex[$i]));
	return  $string;
}

$s='n你说谁呢a';
//截取五个字节，如果某个多字节的字符被拆成了畸形，那么将舍弃。
$newComm=mb_strcut($s,0,5,'utf-8');//nia
//截取五个字符
$newComm2=mb_substr($s,0,5,'utf-8');//nia你说
$ab=array_flip($a);
$str='';
foreach($ab as $k=>$v)
	$str .="'$k'=>$v,\r\n";

$a=str_split('你好，在哪呢？abcd','3');
//这样解析的host，是my.anjuke.com不含有http：//
$refer = parse_url('http://my.anjuke.com/usercenter/login') ;
foreach($arr as $value)
{
	$comm[]='curl -x '.$value.' www.baidu.com';
}

//过滤重复的标签
$tmp_tags=array('好','别墅','weyi','别墅');
$tmp_tags =array_unique($tmp_tags);

$a3=json_decode('{"status":1,"msg":"\u4e2d\u51b6\u00b7\u5fb7\u8d24\u516c\u9986","data":[]}',true);
$con=array();
#房源编号，15位数字和字母
$a=preg_match("/[^0-9a-zA-Z]+/",'asdfasd2323');
$a=1426576169;
$am=date('Y-m-d H:i:s',$a);
$a=getthemonth('201403');
function getthemonth($date)
  
    {
  
    $firstday = date('Y-m-01', strtotime($date));
  
    $lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day"));
  
    return array($firstday, $lastday);
  
    }
$str=<<<HOST
HOST;
    $ar=unserialize($str);
$curMac = '00E031001774';
$preMac = '00E012013732';
if($curMac != $preMac){
    echo 'not not';
}else{
    echo 'yes yes';
}
$a=pathinfo($path,PATHINFO_EXTENSION);
$pData=array();
$zone='开发3区';
$a=urldecode('%B8%F6%C8%CB');
$b=mb_convert_encoding($a,'utf-8','gbk');
$rData['Zone'] = strstr($zone,'区')?$zone:$zone.'区';	//区域
date_default_timezone_set('Asia/Hong_Kong');
$ar=array('asdf13','asdf12','asdf23','asdf22','asdf20');
$am=urldecode('-%E5%90%88%E8%B5%A2%E5%9C%B0%E4%BA%A7');
asort($ar);
$pData['Thumbnail']='aaaaasdfld.jpg';
$str=<<<HOST
 <td width="65" height="30"><span class="c999">联系人：</span></td>
										<td>王先生</td>
									  </tr>

HOST;
if(preg_match_all('/联\s*系\s*人：<\/span><\/td>\s*<td>([^<]*)<\/td>/isU' , $str , $view))
{
	echo 'good';
	
}
$zone='朝阳';
//只有北京
$a=range(1,8);
$b=array(1,1,1,1,1,1,1,1,1);
$testarr=array(array('id'=>'4','reftime'=>'0'),array('id'=>'3','reftime'=>'0'),array('id'=>'2','reftime'=>'0'),array('id'=>'1','reftime'=>'0'));
//usort($testarr , "focus2post") ;
usort($testarr , "focus2refresh") ;
$Thumbnail_tmp=str_replace('_wm','',$pData['Thumbnail']);
if($Thumbnail_tmp==$str)
{
	$value=$pData['Thumbnail'];
}
$str='\u5f53\u65e5\u9884\u7ea6\u5237\u65b0\u5269\u4f590\u6b2';
//未开通套餐
$str='\u60a8\u8fd8\u6ca1\u6709\u8d2d\u4e70\u5957\u9910\uff0c\u8d2d\u4e70\u540e\u624d\u80fd\u63a8\u5e7f\u623f\u6e90\u3002';
//请至少选择
$str='\u8bf7\u81f3\u5c11\u9009\u62e9\u4e00\u5957\u623f\u6e90\u3002';
//最多只能推广40套房源
//$str='\u6700\u591a\u53ea\u80fd\u63a8\u5e7f 40 \u5957\u623f\u6e90\u3002';
//成功推广一套房源
//$str='\u6210\u529f\u63a8\u5e7f 1 \u5957\u623f\u6e90\u3002';
//
$str='\u60a8\u8fd8\u6ca1\u6709\u8d2d\u4e70\u5957\u9910\uff0c\u8d2d\u4e70\u540e\u624d\u80fd\u63a8\u5e7f\u623f\u6e90';
$a=getUTF8FromStringUnicode($str,'\u');
$con=strip_tags($str);
$zone='庐阳';
preg_match('/"id":([0-9]*),"name":"'.$zone.'(区|)"}/isU',$str,$view);
$arr=base64_decode($str);
$arr2=unserialize($arr);
$str=<<<HOST
%E9%AA%8C%E8%AF%81%E7%A0%81%E9%94%99%E8%AF%AF
HOST;
$a=urldecode($str);
$b=mb_convert_encoding($a,'utf-8','gb2312');
$str=<<<HOST
何俊　言
HOST;
$str=<<<HOST
区　　域
HOST;
$str=<<<HOST
 杨彪 
HOST;
$a=array();
$b=array();
$c=bin2hex(' ');
$c2=bin2hex('　');
$s=chr(hexdec($c));
$len=strlen($str);
for($i=0;$i<$len;$i++)
{
	//用十进制看字符
	//$a[]=ord(substr($str,$i,1));
	//用十六进制看字符
	$b[]=bin2hex(substr($str,$i,1));
}
//十六进制转字符串
$hex=array("e3","80","80");
$hex=array("c2","a0");
$s=hexToStr($hex);

//$rDa=2.28;
$a=date('M');
$c=date('m');
$p=date('m',strtotime('2014-10-15 21:14:26'));
if(preg_match_all('/autocomplete="off" type="checkbox" name="prop_ids\[\]" value="(\d*)">.*listhead-time line-mid\s*">\s*<em>(\d{0,3})<\/em>/isU' ,$str , $view))
{
	echo 'gg';
}
$str=<<<HOST
\u4f60\u4e0a\u4f20\u4e86\u9ad8\u5c0f\u4e8e300\u50cf\u7d20\u7684\u56fe\u7247\uff01
HOST;
$str=<<<HOST
\u64cd\u4f5c\u6210\u529f
HOST;
//$chekpostinfo = base64_decode($str);
//$souarr=unserialize($chekpostinfo);
$a=getUTF8FromStringUnicode($str,'\u');
preg_match('#http://[^/]*/[^/]*/.{0,15}(\d$)#iU' , $str , $user_arr);
$sArray = getArray($sArray);
while(!empty($sArray))
		{
			$k=count($sArray);
			$string='' ;
			foreach($sArray as $i =>$key)
			{
				$string = $string.$key ;
			}
			unset($sArray[$i]) ;
		}

$str='{"ok":1,"msg":"\u53ea\u80fd\u572809:18\u5237\u65b0\u4e00\u6b21","premier":{"leftRefresh":116,"clickRefresh_num":4},"status":{"show":"\u624b\u52a8","lastTime":"09:18","count":1,"release":0,"total":1}}';
$ut=getUTF8FromStringUnicode($str,'\u');

$case=unserialize($a['case']);
//赶集没有改变前
//if(preg_match('/还可刷新[^\[]*id="surplus_refresh" class="fc-f60"[^>]*>([^>]*)[^<^0-9]*</isU' , $this->content , $view) > 0)
//没有改变前
if(preg_match('/还可刷新.{0,80}id="surplus_refresh" class="fc-f60">\s*(\d*)\s*</isU' , $str , $view) > 0)
//if(preg_match('/还可刷新<[^\>]*id="surplus_refresh" class="fc-f60"[^>]*>([^>]*)[^<^0-9]*</isU' , $str , $view) > 0)
{
	echo '';
	if(intval($view[1])<=0)
				$res['use'] = 0;
			else
				$res['use'] = $view[1] ;
}
if(preg_match_all('/<input\s(?:id=.*)?\s*name="(.*)"\s*type="hidden"\s*value="(.*)"/isU',$str,$view))
{
		echo '';
}
$a=preg_quote('店长推荐！海逸半岛260+110平749万元黄金角！千年等一回别错过');
$b=htmlentities ($a,ENT_COMPAT,'UTF-8');
if(preg_match('#target="_blank"\s*href="(http.{1,30}(\d*)\.html)">'.htmlentities(preg_quote('店长推荐！海逸半岛260+110平749万元黄金角！千年等一回别错过'),ENT_COMPAT,'UTF-8').'<\/a>#isU',$str,$view))
{
	echo '';
}
if(preg_match('/target="_blank"\s*href="(http.{1,30}(\d*)\.html)">'.htmlentities ('南北"通透/非常,的好’我是“ni ne',ENT_COMPAT,'UTF-8').'<\/a>/isU',$str,$view1))
{
	echo '';
}
$c=html_entity_decode($b);
$a=json_decode('{"a":"%25u98CE"}');
if(preg_match_all('/name="ids\[\]".*;">编辑/isU',$str,$con)<=0)
{
	
}
foreach ($con[0] as $key=>$value)
			{
				//独家(dujia_s.gif)，急售（F_Urgent.gif），精品（jingpin.png），新房（F_New.gif）   新房免佣（is_now_home_02.jpg）
				//店铺推荐的可以下架（jing.jpg)
				//特色标签（产证，低价，随时看房）
				if(strstr($value , '社区竞价中') || strstr($value , 'F_Urgent.gif') || strstr($value , 'dujia_s.gif') || strstr($value , 'is_now_home_02.jpg')  || strstr($value , 'jingpin.png') || strstr($value , 'F_New.gif'))
					continue;
				if(preg_match('/name="ids\[\]" value="([^"]*)"/isU',$value,$view)<=0)
				{
					$this->errInfo .="发布失败,网站接口繁忙,请稍后再试。@发布失败,房源已满，请进行手动下架1";
	             	return FALSE;
				}
				break;
			}
$a=mb_convert_encoding('鏃犳硶鏄剧ず椤甸潰锛屽洜涓哄彂鐢熷唴閮ㄦ湇鍔″櫒閿欒?銆########','gbK','utf-8');
if(strstr('set-cookie: 58passport=14128323481378440813485702','et-cookie: 58passport=1'))
{
	echo 'yes';
}else
{
	echo 'no';
}
$a=array(1,3,5,7,9,11,13,15,17,19,21,23,25,27,0,2,4,6,8,10,12,14,16,18,20,22,24,26);
$b=shuffle($a);
//弹出数组的最后一个元素，并删除该单元
$now=array_pop($a);
//放入数组的最后，并返回该值的键
$b=array_push($a,'9');
$delIparr[]=$a;

$a=json_decode($str);
if(preg_match('/今日刷新[^\(]*\([^\(]*td><span>([0-9]*)<[^\(]*\(([0-9]*)\)/isU' , $str , $view) == FALSE)
		{
			$ret['isF5'] = 0;
			$ret['ClickSum'] = 0;
		}else
		{
			$ret['ClickSum'] = $view[1];
			$ret['isF5'] = $view[2];
		}
if(preg_match_all('/class="tips-lease2">\s*([0-9\-\: ]*)\s*<\/li>.*javascript\:delfy\(([0-9]*)\)/isU',$str,$view))
{
	if(strstr(end($view[0]),date('Y-m-d')))
				{
					$this->errInfo .='发布失败,今日房源发布条数已满。';
					return FALSE;
				}
}

//ini_set('pcre.backtrack_limit', -1); 
		if(preg_match_all('/name="selectitem"(.*)gray6 ft12">/isU' , $str , $view))
		{
			foreach($view[1] as $key=>$value)
			{
				if(strstr($value, '放心房'))
					continue;
				if(strstr($value, '新推') || strstr($value, '十万火急') || strstr($value, '定投房源'))
				{
					continue;
				}else
				{
					if(preg_match('/value=\'([0-9]*)\'/isU' , $value , $view1) == FALSE)
					{
						$this->errInfo .= '获取id';
						return FALSE;
					}else
					{
						$tmpID = $view1[1] ;
						break;
					}
				}
			}
		}

//ini_set('pcre.backtrack_limit', -1); 
if(preg_match('/<body>(.*)<\/body>/isU',$str ,$con_d))
{
	echo $con_d;
}
exit;
if(preg_match('/(定价){0,1}推广房源<\/strong>.*未推广房源/isU',$str ,$con_d))
{
	echo $con_d;
}
$key['classname'] = 'cla';
		$key['city'] = 'city';
		$key['company'] = 'company';
		$key['wid'] = 'wid';
	while(list($k,$v)=each($key))
	{
		echo 'whart';
	}
$url=parse_url($str);

$zone_street=$zone_name[16];
$zoneID=array();

/*由config.inc生成zoneid.php的方法
 * 生成AAAzone.php后，还得使用正则替换掉[]*/
foreach($zone_street as $zone=>$sub)
{
	foreach($sub as $key=>$value)
	{
		if($key=='name')
		{
			$a=$value;
			$zoneID[$a]=array('ID'=>"$zone,");
			continue;
		}else
		{
			$zoneID[$a]=array_merge($zoneID[$a],array($value=>"$key,"));
		}
	}
}
error_log(print_r($zoneID,true),3,'AAA2zone.php');

function switch_val_en_all($number)//传入编码GB2312编码的中文值，返回对应的拼音“全拼”
	{
		 $en_full = array(
			  array("a", -20319),
			  array("ai", -20317),
			  array("an", -20304),
			  array("ang", -20295),
			  array("ao", -20292),
			  array("ba", -20283),
			  array("bai", -20265),
			  array("ban", -20257),
			  array("bang", -20242),
			  array("bao", -20230),
			  array("bei", -20051),
			  array("ben", -20036),
			  array("beng", -20032),
			  array("bi", -20026),
			  array("bian", -20002),
			  array("biao", -19990),
			  array("bie", -19986),
			  array("bin", -19982),
			  array("bing", -19976),
			  array("bo", -19805),
			  array("bu", -19784),
			  array("ca", -19775),
			  array("cai", -19774),
			  array("can", -19763),
			  array("cang", -19756),
			  array("cao", -19751),
			  array("ce", -19746),
			  array("ceng", -19741),
			  array("cha", -19739),
			  array("chai", -19728),
			  array("chan", -19725),
			  array("chang", -19715),
			  array("chao", -19540),
			  array("che", -19531),
			  array("chen", -19525),
			  array("cheng", -19515),
			  array("chi", -19500),
			  array("chong", -19484),
			  array("chou", -19479),
			  array("chu", -19467),
			  array("chuai", -19289),
			  array("chuan", -19288),
			  array("chuang", -19281),
			  array("chui", -19275),
			  array("chun", -19270),
			  array("chuo", -19263),
			  array("ci", -19261),
			  array("cong", -19249),
			  array("cou", -19243),
			  array("cu", -19242),
			  array("cuan", -19238),
			  array("cui", -19235),
			  array("cun", -19227),
			  array("cuo", -19224),
			  array("da", -19218),
			  array("dai", -19212),
			  array("dan", -19038),
			  array("dang", -19023),
			  array("dao", -19018),
			  array("de", -19006),
			  array("deng", -19003),
			  array("di", -18996),
			  array("dian", -18977),
			  array("diao", -18961),
			  array("die", -18952),
			  array("ding", -18783),
			  array("diu", -18774),
			  array("dong", -18773),
			  array("dou", -18763),
			  array("du", -18756),
			  array("duan", -18741),
			  array("dui", -18735),
			  array("dun", -18731),
			  array("duo", -18722),
			  array("e", -18710),
			  array("en", -18697),
			  array("er", -18696),
			  array("fa", -18526),
			  array("fan", -18518),
			  array("fang", -18501),
			  array("fei", -18490),
			  array("fen", -18478),
			  array("feng", -18463),
			  array("fo", -18448),
			  array("fou", -18447),
			  array("fu", -18446),
			  array("ga", -18239),
			  array("gai", -18237),
			  array("gan", -18231),
			  array("gang", -18220),
			  array("gao", -18211),
			  array("ge", -18201),
			  array("gei", -18184),
			  array("gen", -18183),
			  array("geng", -18181),
			  array("gong", -18012),
			  array("gou", -17997),
			  array("gu", -17988),
			  array("gua", -17970),
			  array("guai", -17964),
			  array("guan", -17961),
			  array("guang", -17950),
			  array("gui", -17947),
			  array("gun", -17931),
			  array("guo", -17928),
			  array("ha", -17922),
			  array("hai", -17759),
			  array("han", -17752),
			  array("hang", -17733),
			  array("hao", -17730),
			  array("he", -17721),
			  array("hei", -17703),
			  array("hen", -17701),
			  array("heng", -17697),
			  array("hong", -17692),
			  array("hou", -17683),
			  array("hu", -17676),
			  array("hua", -17496),
			  array("huai", -17487),
			  array("huan", -17482),
			  array("huang", -17468),
			  array("hui", -17454),
			  array("hun", -17433),
			  array("huo", -17427),
			  array("ji", -17417),
			  array("jia", -17202),
			  array("jian", -17185),
			  array("jiang", -16983),
			  array("jiao", -16970),
			  array("jie", -16942),
			  array("jin", -16915),
			  array("jing", -16733),
			  array("jiong", -16708),
			  array("jiu", -16706),
			  array("ju", -16689),
			  array("juan", -16664),
			  array("jue", -16657),
			  array("jun", -16647),
			  array("ka", -16474),
			  array("kai", -16470),
			  array("kan", -16465),
			  array("kang", -16459),
			  array("kao", -16452),
			  array("ke", -16448),
			  array("ken", -16433),
			  array("keng", -16429),
			  array("kong", -16427),
			  array("kou", -16423),
			  array("ku", -16419),
			  array("kua", -16412),
			  array("kuai", -16407),
			  array("kuan", -16403),
			  array("kuang", -16401),
			  array("kui", -16393),
			  array("kun", -16220),
			  array("kuo", -16216),
			  array("la", -16212),
			  array("lai", -16205),
			  array("lan", -16202),
			  array("lang", -16187),
			  array("lao", -16180),
			  array("le", -16171),
			  array("lei", -16169),
			  array("leng", -16158),
			  array("li", -16155),
			  array("lia", -15959),
			  array("lian", -15958),
			  array("liang", -15944),
			  array("liao", -15933),
			  array("lie", -15920),
			  array("lin", -15915),
			  array("ling", -15903),
			  array("liu", -15889),
			  array("long", -15878),
			  array("lou", -15707),
			  array("lu", -15701),
			  array("lv", -15681),
			  array("luan", -15667),
			  array("lue", -15661),
			  array("lun", -15659),
			  array("luo", -15652),
			  array("ma", -15640),
			  array("mai", -15631),
			  array("man", -15625),
			  array("mang", -15454),
			  array("mao", -15448),
			  array("me", -15436),
			  array("mei", -15435),
			  array("men", -15419),
			  array("meng", -15416),
			  array("mi", -15408),
			  array("mian", -15394),
			  array("miao", -15385),
			  array("mie", -15377),
			  array("min", -15375),
			  array("ming", -15369),
			  array("miu", -15363),
			  array("mo", -15362),
			  array("mou", -15183),
			  array("mu", -15180),
			  array("na", -15165),
			  array("nai", -15158),
			  array("nan", -15153),
			  array("nang", -15150),
			  array("nao", -15149),
			  array("ne", -15144),
			  array("nei", -15143),
			  array("nen", -15141),
			  array("neng", -15140),
			  array("ni", -15139),
			  array("nian", -15128),
			  array("niang", -15121),
			  array("niao", -15119),
			  array("nie", -15117),
			  array("nin", -15110),
			  array("ning", -15109),
			  array("niu", -14941),
			  array("nong", -14937),
			  array("nu", -14933),
			  array("nv", -14930),
			  array("nuan", -14929),
			  array("nue", -14928),
			  array("nuo", -14926),
			  array("o", -14922),
			  array("ou", -14921),
			  array("pa", -14914),
			  array("pai", -14908),
			  array("pan", -14902),
			  array("pang", -14894),
			  array("pao", -14889),
			  array("pei", -14882),
			  array("pen", -14873),
			  array("peng", -14871),
			  array("pi", -14857),
			  array("pian", -14678),
			  array("piao", -14674),
			  array("pie", -14670),
			  array("pin", -14668),
			  array("ping", -14663),
			  array("po", -14654),
			  array("pu", -14645),
			  array("qi", -14630),
			  array("qia", -14594),
			  array("qian", -14429),
			  array("qiang", -14407),
			  array("qiao", -14399),
			  array("qie", -14384),
			  array("qin", -14379),
			  array("qing", -14368),
			  array("qiong", -14355),
			  array("qiu", -14353),
			  array("qu", -14345),
			  array("quan", -14170),
			  array("que", -14159),
			  array("qun", -14151),
			  array("ran", -14149),
			  array("rang", -14145),
			  array("rao", -14140),
			  array("re", -14137),
			  array("ren", -14135),
			  array("reng", -14125),
			  array("ri", -14123),
			  array("rong", -14122),
			  array("rou", -14112),
			  array("ru", -14109),
			  array("ruan", -14099),
			  array("rui", -14097),
			  array("run", -14094),
			  array("ruo", -14092),
			  array("sa", -14090),
			  array("sai", -14087),
			  array("san", -14083),
			  array("sang", -13917),
			  array("sao", -13914),
			  array("se", -13910),
			  array("sen", -13907),
			  array("seng", -13906),
			  array("sha", -13905),
			  array("shai", -13896),
			  array("shan", -13894),
			  array("shang", -13878),
			  array("shao", -13870),
			  array("she", -13859),
			  array("shen", -13847),
			  array("sheng", -13831),
			  array("shi", -13658),
			  array("shou", -13611),
			  array("shu", -13601),
			  array("shua", -13406),
			  array("shuai", -13404),
			  array("shuan", -13400),
			  array("shuang", -13398),
			  array("shui", -13395),
			  array("shun", -13391),
			  array("shuo", -13387),
			  array("si", -13383),
			  array("song", -13367),
			  array("sou", -13359),
			  array("su", -13356),
			  array("suan", -13343),
			  array("sui", -13340),
			  array("sun", -13329),
			  array("suo", -13326),
			  array("ta", -13318),
			  array("tai", -13147),
			  array("tan", -13138),
			  array("tang", -13120),
			  array("tao", -13107),
			  array("te", -13096),
			  array("teng", -13095),
			  array("ti", -13091),
			  array("tian", -13076),
			  array("tiao", -13068),
			  array("tie", -13063),
			  array("ting", -13060),
			  array("tong", -12888),
			  array("tou", -12875),
			  array("tu", -12871),
			  array("tuan", -12860),
			  array("tui", -12858),
			  array("tun", -12852),
			  array("tuo", -12849),
			  array("wa", -12838),
			  array("wai", -12831),
			  array("wan", -12829),
			  array("wang", -12812),
			  array("wei", -12802),
			  array("wen", -12607),
			  array("weng", -12597),
			  array("wo", -12594),
			  array("wu", -12585),
			  array("xi", -12556),
			  array("xia", -12359),
			  array("xian", -12346),
			  array("xiang", -12320),
			  array("xiao", -12300),
			  array("xie", -12120),
			  array("xin", -12099),
			  array("xing", -12089),
			  array("xiong", -12074),
			  array("xiu", -12067),
			  array("xu", -12058),
			  array("xuan", -12039),
			  array("xue", -11867),
			  array("xun", -11861),
			  array("ya", -11847),
			  array("yan", -11831),
			  array("yang", -11798),
			  array("yao", -11781),
			  array("ye", -11604),
			  array("yi", -11589),
			  array("yin", -11536),
			  array("ying", -11358),
			  array("yo", -11340),
			  array("yong", -11339),
			  array("you", -11324),
			  array("yu", -11303),
			  array("yuan", -11097),
			  array("yue", -11077),
			  array("yun", -11067),
			  array("za", -11055),
			  array("zai", -11052),
			  array("zan", -11045),
			  array("zang", -11041),
			  array("zao", -11038),
			  array("ze", -11024),
			  array("zei", -11020),
			  array("zen", -11019),
			  array("zeng", -11018),
			  array("zha", -11014),
			  array("zhai", -10838),
			  array("zhan", -10832),
			  array("zhang", -10815),
			  array("zhao", -10800),
			  array("zhe", -10790),
			  array("zhen", -10780),
			  array("zheng", -10764),
			  array("zhi", -10587),
			  array("zhong", -10544),
			  array("zhou", -10533),
			  array("zhu", -10519),
			  array("zhua", -10331),
			  array("zhuai", -10329),
			  array("zhuan", -10328),
			  array("zhuang", -10322),
			  array("zhui", -10315),
			  array("zhun", -10309),
			  array("zhuo", -10307),
			  array("zi", -10296),
			  array("zong", -10281),
			  array("zou", -10274),
			  array("zu", -10270),
			  array("zuan", -10262),
			  array("zui", -10260),
			  array("zun", -10256),
			  array("zuo", -10254)//昨 左 佐 柞 做 作 坐 座 gb2312里一级汉字的最后的8个简体中文
		 );//全拼数据集数组
		 //ASCII范围的
	    if ($number > 0 && $number < 160)
		{
	        return chr($number);
	    //不是一级汉字的范围
	    }elseif ($number < -20319 || $number > -10247)
		{
	        return '';
	    }else 
		{
			//GB2312一级汉字范围的
			//用for循环是不是效率太低了呢？
	        for ($i = count($en_full) - 1; $i >= 0; $i--)
			{
	  			 if ($en_full[$i][1] <= $number)
	   			{
	   				 break;
	            }
	        }
	        return $en_full[$i][0];
	    }
	}
	/*
 * face="\楷体_GB2312\"
 * face="\宋体\"
 * clear"=""
 * ke-zeroborder"=""
 * 
 * */
$str=<<<HOST
<p style="text-indent: 28pt; background-color: rgb(230, 215, 159); background-position: initial initial; background-repeat: initial initial; "></p><div style="text-align: center;"><font color="#ff0000" face="\宋体\"><span style="font-size: 22px; line-height: 35px;"><b><br></b></span></font></div><span style="font-size: 16.5pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(255, 0, 0); font-weight: bold;"><div style="text-align: center;"><span style="font-size: 16.5pt; text-indent: 28pt; ">​成业地产 家的温暖 &nbsp;海晟名苑租售</span></div>​房源介绍：</span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(255, 0, 0); font-weight: bold;"><br>​1、</span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(255, 0, 0); font-weight: bold;">价格</span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(0, 0, 0); font-weight: bold;"><span style="line-height:35px; FONT-WEIGHT: bold; FONT-SIZE: 14pt;FONT-FAMILY: \'宋体\';COLOR: #ff0000">：</span>满五年，可以省去部分营业税，而且此房业主当时买入时原值特别高，所以个税也少</span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(0, 0, 0); font-weight: bold;">，南向一居室这个价格真心便宜</span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(0, 0, 0); font-weight: bold;">！<br></span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(255, 0, 0); font-weight: bold;">2、户型</span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(0, 0, 0); font-weight: bold;"><span style="line-height:35px; FONT-WEIGHT: bold; FONT-SIZE: 14pt;FONT-FAMILY: \'宋体\';COLOR: #ff0000">：</span>海晟名苑一居室中最好的户型，唯一在售南向一居，酒店式公寓一般对门都有其他住户，此房对面是露台，观景无敌，休息安静！</span><span style="font-size: 12pt; line-height: 35px; font-family: \'\'宋体\'\'; "><br></span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(255, 0, 0); font-weight: bold;">3、朝向：</span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(0, 0, 0); font-weight: bold;">南向户型、卧室双面窗（另有朝东窗户一扇），超级稀缺的</span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(0, 0, 0); font-weight: bold;">朝向，高层观泳池。</span><span style="font-size: 12pt; line-height: 35px; font-family: \'\'宋体\'\'; "><br></span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(255, 0, 0); font-weight: bold;">5、小区：</span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(0, 0, 0); font-weight: bold;">东城区样板楼盘，北京十大明星楼盘！</span><span style="font-size: 12pt; line-height: 35px; font-family: \'\'宋体\'\'; "><br></span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(255, 0, 0); font-weight: bold;">6、学区：</span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(0, 0, 0); font-weight: bold;">是西中街小学的学区房！</span><span style="font-size: 12pt; line-height: 35px; font-family: \'\'宋体\'\'; "><br></span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(255, 0, 0); font-weight: bold;">7、回报：</span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(0, 0, 0); font-weight: bold;">投资回报率极高，目前在售南向中价格蕞低的，现在此户型每月可以出租到</span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(0, 0, 0); font-weight: bold;">10000</span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(0, 0, 0); font-weight: bold;">元/月</span><span style="font-size: 12pt; line-height: 35px; font-family: \'\'宋体\'\'; "><br></span><span style="font-size: 16.5pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(255, 0, 0); font-weight: bold;"><br>&nbsp;&nbsp; 业主情况：</span><span style="font-size: 12pt; line-height: 35px; font-family: \'\'宋体\'\'; "><br></span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(0, 0, 0); font-weight: bold;">业主是需要周转一笔资金，所以出售此房，二环边上南北通透的一居室，高层没有遮挡，可遇不可求！<br>​</span><span style="font-size: 12pt; line-height: 35px; font-family: \'\'宋体\'\'; "><br></span><span style="font-size: 16.5pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(255, 0, 0); font-weight: bold;">&nbsp;&nbsp; 经纪人声明：</span><span style="font-size: 12pt; line-height: 35px; font-family: \'\'宋体\'\'; "><br></span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(0, 0, 0); font-weight: bold;">您如果考虑海晟名苑的一居室一定不能错过这套房子，实话实说南向的一居室不管哪号楼的从下午3:00之后一定会有遮挡，而这套房子不同，此房南向全天采光，而且是观景最好的，曾经有客户只看了顶层同户型一眼，就直接定了，此房次顶层绝对更佳优质！<br>​</span><span style="font-size: 12pt; line-height: 35px; font-family: \'\'宋体\'\'; "><br></span><span style="font-size: 16.5pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(255, 0, 0); font-weight: bold;">&nbsp;&nbsp; 本人介绍：</span><span style="font-size: 12pt; line-height: 35px; font-family: \'\'宋体\'\'; "><br></span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(0, 0, 0); font-weight: bold;">本人从事房产经纪行业2年，帮助许多客户业主达成他们的需求！热情真诚服务一直是我的宗旨，诚实守信是我的做人标准！&nbsp;</span><span style="font-size: 12pt; line-height: 35px; font-family: \'\'宋体\'\'; "><br></span><span style="font-size: 12pt; line-height: 35px; font-family: \'\'宋体\'\'; "><br></span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(0, 0, 0); font-weight: bold;">更多优质房源请致电 <span style="color:#ff0000;">海晟名苑物业租售 成业地产 姚艳玲</span></span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(255, 0, 0); font-weight: bold;">：</span><span style="font-size: 14pt; line-height: 35px; font-family: \'\'\'宋体\'\'\'; color: rgb(255, 0, 0); font-weight: bold;">152-0147-9593</span><p style="font-size:16px;margin:0;padding:0;"></p>

<div style="height:0px;font-size:0px;"></div>

HOST;
	
	
?>