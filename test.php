<?php
class person{
	public $name;
	public $gender;
	public function say(){
		echo $this->name,"\tis ",$this->gender,"\r\n";
	}
	public function __get($name){
		if(!isset($this->$name)){
			echo 'δ����';
			$this->$name="����Ϊ������Ĭ��ֵ";
		}
		return $this->$name;
	}
}
$student = new person();
$student->name='Tom';
$student->gender='male';
$student->age=24;

//���ഴ���������
$obj = new ReflectionClass('person');
$className = $obj->getName();
$Methods = $Properties = array();
//�õ�������������Ϣ����һ������������
foreach($obj->getProperties() as $v){
$Properties[$v->getName()] = $v;
}
//�õ������ķ�����Ϣ����һ�����䷽����
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