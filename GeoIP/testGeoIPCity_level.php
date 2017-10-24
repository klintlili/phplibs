<?php
include("geoipcity.inc");
include("geoipregionvars.php");
$gi = geoip_open("GeoIPCity.dat",GEOIP_STANDARD);
$_SERVER['REMOTE_ADDR']='221.226.110.198';//南京

$record = geoip_record_by_addr($gi,$_SERVER['REMOTE_ADDR']);
//var_dump($record);
//exit;
print $record->continent_code . "<br>";//洲简写 AS
print $record->country_code . " " . $record->country_code3 . " " . $record->country_name . "<br>";//国家
print $record->region . " " . $GEOIP_REGION_NAME[$record->country_code][$record->region] . "<br>";//省
print $record->city . "<br>";//城市
print $record->postal_code . "<br>";
print $record->latitude . "<br>";
print $record->longitude . "<br>";
print $record->metro_code . "<br>";
print $record->area_code . "<br>";
// 关闭文件
geoip_close($gi);