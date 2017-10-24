<?php 
$A =['Mozilla/5.0 (Windows NT 6.1;WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36 )','Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0); 360Spider(compatible; HaosouSpider; http://www.haosou.com/help/help_3_2.html)','Mozilla/5.0 (Macintosh; Intel Mac OS X 8_8_8) AppleWebKit/356.22 (KHTML, like Gecko)','Mozilla/5.0 (compatible;MSIE 9.0; rv:49.0) Gecko/20100101 Firefox/49.0'];
$P = ['123.165.117.192:8118','119.254.92.52:80','124.88.67.52:843','27.197.68.179:8118','124.88.67.10:80'];
function httpget($url)
{
	global $A;
	global $P;
	$ch = curl_init();
    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
    //curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 9.1;WOW64) AppleWebKit/412.28 (KHTML, like Gecko) Chrome/42.0.2704.103 Safari/537.36' );
    curl_setopt( $ch, CURLOPT_USERAGENT , $A[mt_rand(0, count($A) - 1)]);
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 10 );
    //curl_setopt( $ch, CURLOPT_TIMEOUT , 60);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
    curl_setopt( $ch , CURLOPT_POST , true );
    curl_setopt( $ch , CURLOPT_POSTFIELDS , '' );
    curl_setopt( $ch , CURLOPT_URL , $url);
    //curl_setopt($ch,CURLOPT_PROXY,$P[mt_rand(0, count($P) - 1)]);
    //curl_setopt( $ch , CURLOPT_URL , 'http://192.168.1.101/phptest/test3.php' );
    $o = curl_exec( $ch );
    if ($o === FALSE) {
        return false;
    }
    return $o;
}
#$output = httpget('http://www.baidu.com');
#echo mb_substr($output,0,10,'utf-8');