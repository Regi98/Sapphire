<?php
session_start();
include('includes/db.php');
$episodeid=$_POST['episodeid'];
$userID=$_SESSION['id'];
 
$stmt = $DBcon->prepare("SELECT * FROM epiownership WHERE user_id = :userID AND episode_id = :episodeid");
 
$stmt->bindparam(':episodeid', $episodeid);
$stmt->bindparam(':userID', $userID);
if($stmt->execute())
{
  $res="Episode bought";
  echo json_encode($res);

}
else {
  $error="Not Inserted,Some Problem occur.";
  echo json_encode($error);
}

 
?>