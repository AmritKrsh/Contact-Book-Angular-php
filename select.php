<?php
include("config.php");

$sql ="SELECT * FROM users";

$result=mysqli_query($db,$sql);
                  
$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
     
?>