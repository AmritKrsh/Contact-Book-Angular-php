<?php
include ("config.php");

$data= json_decode(file_get_contents("php://input"));
$id=($data->id);
$name= ($data->name);
$city= ($data->city);
$phone= ($data->phone);
$addr= ($data->addr);
$condi = ($data->btn_name);

if($condi=="Submit"){

	$sql ="INSERT INTO users (`name`,`city`,`phone`,`addr`)  VALUES ('".$name."','".$city."','".$phone."','".$addr."') " ;
	mysqli_query($db,$sql);
}

else{

	$sql="UPDATE users SET name='$name', city='$city', phone='$phone', addr='$addr' WHERE id='$id' ";	
	mysqli_query($db,$sql);
}

?>