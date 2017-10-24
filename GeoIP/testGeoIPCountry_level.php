<?php
//include("GeoIP.inc.php");
//include("geoip.inc");
include("geoipcity.inc");
include("geoipregionvars.php");
// 打开数据文件
//$gi = geoip_open("GeoIP.dat",GEOIP_STANDARD);
$gi = geoip_open("GeoIPCity.dat",GEOIP_STANDARD);
// 获取国家代码
//$_SERVER['REMOTE_ADDR']="103.30.233.241";//HongKong 检查不出来
$_SERVER['REMOTE_ADDR']='45.62.106.216';//America
$_SERVER['REMOTE_ADDR']='111.202.176.237';//BeiJing
$_SERVER['REMOTE_ADDR']='221.226.110.198';//南京
$country_code = geoip_country_code_by_addr($gi, $_SERVER['REMOTE_ADDR']);
echo "Your country code is: $country_code </br>";
// 获取国家名称
$country_name = geoip_country_name_by_addr($gi, $_SERVER['REMOTE_ADDR']);
echo "Your country name is: $country_name </br>";
// 获取地区名称
$region_name = geoip_region_by_addr($gi, $_SERVER['REMOTE_ADDR']);
echo "Your region name is: </br>";
print_r($region_name);
// 关闭文件
geoip_close($gi);