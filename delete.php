<?php
include("config.php");

$postdata = file_get_contents("php://input");

$data=json_decode($postdata);

$id = $data->id;

$sql= "DELETE FROM users WHERE id= '$id' ";

mysqli_query($db,$sql);

?>