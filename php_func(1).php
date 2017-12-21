<?php
//林客给我的一个框架中的方法，关于处理数组里每个参数的方法
//关键php的内置函数是array_map(callback,arr1....)非常棒！ public function parseValue($value) {
		if(is_string($value)) {
			$value = '\''.$this->escape($value).'\'';
		//这是以前做项目时留下的
		}elseif(isset($value[0]) && is_string($value[0]) && strtolower($value[0]) == 'exp'){
			$value   =  $this->escape($value[1]);
		}elseif(is_array($value)) {
		    //作用于数组每一个元素的回调函数，简直太棒了
			$value   =  array_map(array($this, 'parseValue'),$value);
		}elseif(is_null($value)){
			$value   =  'null';
		}
		return $value;
}

//在查看cig框架时，发现了php的一个extract()函数，是处理数组的一个函数，非常棒
//可以将$_POST数组变成变量，键名是变量名，键值是变量值。对于冲突的键名，还可以设置第二个参数，
//告诉函数如何处理冲突，具体还是看看手册吧
extract($_POST);

//一个永远延迟的header()函数
header('Refresh:4;url=http://www.baidu.com');
echo "延迟的跳转";
exit();

//最大公约数
//http://localhost/Mytest/index.php?a=1033333320&b=500320
function MaxMode($A,$B){
    $arrA=array(1,$A);
    $arrB=array(1,$B);
    for($i=2;$i<$A;$i++)
    {
        if($A%$i===0)
            $arrA[]=$i;
    }
    for($i=2;$i<$B;$i++)
    {
        if($B%$i===0)
            $arrB[]=$i;
    }
    $tmp=array_intersect($arrA,$arrB);
    return array_pop($tmp);
}
echo MaxMode($_GET['a'], $_GET['b']);
exit;

//第二种方法，暂时不清楚原理
//出自九章算术，特牛的“更相减损法”
function MaxMode2($a,$b){
    while($a != $b){
        if($a>$b){
            $a-=$b;
        }else{
            $b-=$a;
        }
    }
    return $a;
}
//猴子数数问题，竟然和上一个更相减损法的程序非常相似
//都是while+if else
function DiuShouJuan($arr,$num){
    $i=1;
    while(count($arr)>1){
        if($i%$num){
            array_push($arr,array_shift($arr));
        }else{
            $tmp=array_shift($arr);
        }
        $i++;
    }
    return $arr[0];
}
//位运算判断奇偶数的应用
$arr=range(1,30);
foreach ($arr as $v)
{
    if($v & 1 == 1)
        echo "奇数是".$v."<br>";
}

//位运算关于交换两个变量，不用第三个变量
//位运算中有个总结的理论
//任何数（0或1）与1相抑或（^），都与原来相反，即0^1=1;1^1=0;这里所说的相反，是二进制意义上的相反，
//也就是1变0,0变1
//任何数（0或者1）与0相抑或，都与原来相同，即0^0=0;1^0=1;
$a='a';
$b='b';
$a^=$b;
$b^=$a;//因为第一步的时候，$a=$a^$b,所以第二步时，$b=$b^$a=$b^($a^$b)=$a^$b^$b=$a^0=$a;
$a^=$b;
echo "$a---$b";


/*
	进制转换的函数，实现二进制，十六进制，八进制，十进制之间的转换。
	感觉有点蒙了，把我以前使用的bindec,decbin,bin2hex,hex2bin等函数都不对。
	有必要重新认识一下这些函数了。

*/
base_convert("CE",16,2)

/*
	十进制转二进制，
	参数是整型，但是字符串也行。
*/

decbin(5)

//不能单纯地认为是decbin的反函数。
//这个函数的参数必须是字符串。
//返回值是number型，也就是说，在有些情况下，返回的值类型是float。
echo bindec("100");

//类似的还有十进制和十六进制数之间的互转
dechex(50);

/*十六进制的纯数字，或者字符串(含abcdef这样的),转十进制.等值转换,
	hexdec() 会忽略它遇到的任意非十六进制的字符。 比如hexdec("See")和hexdec("ee")是一样的
*/
hexdec("32af");

/*
以上的函数，都是在数字进制之间转换，
0b101代表二进制，转成十进制是5。
总结：输入的参数和返回值都是数字（只是数字本身的进制不同而已)
而下面的函数，并不是数字进制之间的转换。
而是字符编码和最终显示字符的转换。比如
a的ascii是97.换成十六进制就是61.
同理，”你好"的UTF-8码是E4 BD A0  E5 A5 BD 。
*/
//这两个函数是真正的，互为反函数（字符和字符编码（十六进制)的转换）
//比如某个汉字的gb2312或者utf-8的表示是什么。具体看文件的编码。
//类似于ord()和chr()函数，这两个也是互补地。
//但是,chr()，只解释第一个字符，返回十进制的ascii值。而bin2hex()可以传入多个字符，并分别解释为每个字符的十六进制
bin2hex();
hex2bin();


/**
*laravel的模板引擎是blade
这个方法是为了修改html文件
为.blade.php而写的
*$path  String  像 D:/a/b
*/
function getDirectory($path){
	$path = rtrim($path,'/');
	$files = scandir($path);
	foreach($files as $file){
		//跳过一些目录和文件
	    if($file =='.' || $file =='..' || $file =='test.php')
	        continue;
		if(is_dir($path.'/'.$file)){
			//递归
			getDirectory($path.'/'.$file);
		}else{
			//文件的后四位
    		if(substr($file,-4)!='html'){
    			continue;
    		}else{
				//xxx.html---->xxx.blade.php
    			if($flag = rename($path.'/'.$file,$path.'/'.substr($file,0,-4).'blade.php')){
					echo "OK<br>";
				}else{
					echo "Not<br>";
				}
    		}
		}
	}
}

/*虽说已经有函数实现了目录遍历，但是面试时那些40岁的老手仍然会可能考到的*/
function scandir($dir)
{
    $tmpfiles=array();
    if (is_dir($dir)) {
		//打开目录获得目录句柄
        $handle=opendir($dir);
        if (!$handle) {
            return null;
        }
		//用readdir遍历句柄，得到一个个的文件
        while (($f = readdir($handle)) !==false) {
            if (in_array($f,['.','..'])) {
               continue; 
            }
            if (is_dir($dir.'/'.$f)) {
                $tmpfiles[] = ss($dir.'/'.$f);
            } elseif (is_file($dir.'/'.$f)) {
                $tmpfiles[] = $f;
            }
        }
		//记得关闭句柄
        closedir($handle);
    } elseif (is_file($dir)) {
                $tmpfiles[] = $dir;
    } else {
        return null;
    }
    return $tmpfiles;
}

//另一个比较简单点的，代码较少的，使用了scandir，php 5.4提供的内置函数
function list_dir($dir) {
    $files = scandir($dir);
    foreach ($files as $item) {
        if (is_dir($item) && !in_array($item,['.','..'])) {
            $files[]=list_dir("$dir/$item");
        }
    }
    return $files;
}

//面试时碰到的一个问题：有两个数组，都是整数数组且有序，不使用php函数，使得它们合并后，还是有序的
//还有一个要求，尽量节省空间，就是不需要使用第三个变量或者数组这样的。最好就利用$a,$b即可。
//下面是我自己的一个实现。
function merge(array $a, array $b) {
    $an = count($a);
    $bn = count($b);
    $n1 = $n2  =0;
    //while这种循环的好处，再次见到了吧？想想，使用for循环，能不能实现呢？  
    while( ($n1 < $an) && ($n2 < $bn) ) {
        if ($a[$n1] <= $b[$n2])
            $c[]=$a[$n1++];
        else
            $c[]=$b[$n2++];
    }
        //经过上述的循环，肯定有一个已经先循环到最后了,下面只需把剩下的，添加到$c后面即可
        while($n1<$an)
            $c[]=$a[$n1++];
        while($n2<$bn)
            $c[]=$b[$n2++];
        return $c;
}

/*
曾经面试遇到过，一直没有解出来，今天应勇又把它拿来给我，我一用力就解开了
数组合并的题
$A = ['1'=>"a1",
    '2'=>'a2',
    '3'=>['31'=>"a31",'32'=>"a32",'a'=>['10'=>10,'12'=>12]],
    '5'=>"b5",
];
$B = ['1'=>"b1",
    '3'=>['31'=>"b31",'33'=>"b33",'a'=>['11'=>23,'13'=>['14'=>14]]],
    '4'=>"b4",
    '5'=>['51'=>"a51"],
];

//$A与$B合并后的结果
$C = ['1'=>"a1",
    '2'=>"a2",
    '3'=>['31'=>"a31",'32'=>"a32",'33'=>"b33",'a'=>['10'=>10,'11'=>23,'12'=>12,'13'=>['14'=>14]]],
    '4'=>"b4",
    '5'=>['51'=>"a51"],
];
当数组的key不同时，这个好理解，保留这个key就行；
当数组的key都存在时，如果key的值，一个是数组，一个不是数组，则保留key是数组的，如果上例的key=5
如果key都存在，且都是数组。则进行递归合并，重复的key保留A数组的,如果上例的key=3.

*/


function customMerge($A,$B)
{
    foreach($A as $k=>$v) {
        //A中是标量，B中是数组
        if (!is_array($v) && is_array($B[$k])) {
            unset($A[$k]);
        }
    }
    return array_replace_recursive($B,$A);
    
}


//计算本周开始（周一）的日期和本周结束（周日）的日期
//可以用于统计本周的一些业务
function getMonAndSun()
{
	//date函数的w参数返回0-6，其中0表示周日。1-6表示周一和周日
	$today=date('w');
	$offset= $today?(1-$today):(-6);
	$MonDay=date('Y-m-d',strtotime("$offset day"));
	$SunDay=date('Y-m-d',strtotime("$MonDay +6 day"));
	return [$MonDay,$SunDay];
}