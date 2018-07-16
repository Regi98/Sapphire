<?php
session_start();
include('includes/db.php');
$methodone=$_POST['methodone'];
 
$stmt = $DBcon->prepare("insert into orders(userId,productId,quantity) values('".$_SESSION['id']."','$qty','$val34')");
 
$stmt->bindparam(':methodone', $methodone);
if($stmt->execute())
{
  $res="Data Inserted Successfully:";
  echo json_encode($res);

}
else {
  $error="Not Inserted,Some Probelm occur.";
  echo json_encode($error);
}

 ?>