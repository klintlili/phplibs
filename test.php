<?php
class person{
	public $name;
	public $gender;
	public function say(){
		echo $this->name,"\tis ",$this->gender,"\r\n";
	}
	public function __get($name){
		if(!isset($this->$name)){
			echo '未设置';
			$this->$name="正在为你设置默认值";
		}
		return $this->$name;
	}
}
$student = new person();
$student->name='Tom';
$student->gender='male';
$student->age=24;

//由类创建反射对象
$obj = new ReflectionClass('person');
$className = $obj->getName();
$Methods = $Properties = array();
//得到这个类的属性信息，是一个反射属性类
foreach($obj->getProperties() as $v){
$Properties[$v->getName()] = $v;
}
//得到这个类的方法信息，是一个反射方法类
foreach($obj->getMethods() as $v){
$Methods[$v->getName()] = $v;
}
echo "class {$className}\n { \n";
is_array($Properties) && ksort($Properties);

foreach($Properties as $k => $v)
{
echo "\t";
echo $v->isPublic() ? 'public':'',$v->isPrivate()?'private':'',
$v->isProtected()  ? 'protected':'',
$v->isStatic() ? 'static':'';
echo "\t{$k}\n";
}
echo "\n";
if(is_array($Methods)) ksort($Methods);
foreach($Methods as $k=>$v){
echo "\tfunction {$k}(){}\n";
}
echo "} \n";