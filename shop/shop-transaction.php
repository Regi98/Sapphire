<?php
session_start();
include('includes/db.php');
include('includes/config.php');



$id = $_SESSION['id'];
$query = "SELECT * FROM shopusers WHERE id='$id'";
$results = mysqli_query($con, $query);
$num=mysqli_fetch_assoc($results);
$method=$_POST['method'];
if($method == 'E Wallet'){
  $balance=$num['ewallet'];
} else{
  $balance=$num['tokens'];
}
$firstname = $_SESSION['name'];
$lastname = $_SESSION['lname'];
$totalpprice=$_POST['totalpprice'];
$remainingbal = $balance - $totalpprice;
$fullname = $firstname.' '.$lastname;
$trantype = "Bought in shop with ".$method; 
$trancode = $_POST['method'];
$t_in = 0;
$t_out = $totalpprice;
// $movieid=$_POST['movieid'];
// $movietitle=$_POST['movietitle'];
 
//UPDATE IN ORDERS
 if($balance >= $totalpprice){
  $DBcon->beginTransaction();
  $stmt = $DBcon->prepare("update orders set paymentMethod=:method where userId='".$_SESSION['id']."' and paymentMethod is null ");
  
  $stmt->bindparam(':method', $method);
  if($stmt->execute())
  {
    
      //INSERT IN LEDGERS
    $stmt2 = $DBcon->prepare("insert into ledger(idno, name, trantype, trancode, t_in, t_out, balance) values(:idno, :fullname, :trantype, :trancode, :t_in, :t_out, :remainingbal)");

    $stmt2->bindparam(':idno', $id);
    $stmt2->bindparam(':fullname', $fullname);
    $stmt2->bindparam(':trantype', $trantype);
    $stmt2->bindparam(':trancode', $trancode);
    $stmt2->bindparam(':t_in', $t_in);
    $stmt2->bindparam(':t_out', $t_out);
    $stmt2->bindparam(':remainingbal', $remainingbal);
  


  if($stmt2->execute()){
      
      //UPDATE IN BALANCE
      $stmt1 = $DBcon->prepare("update shopusers SET ewallet=:balance WHERE id=:id");


      $stmt1->bindparam(':id', $id);
      $stmt1->bindparam(':balance', $balance);

      if($stmt1->execute())
      {
        $DBcon->commit();
        $res="1";
        echo json_encode($res);

      }
      else {
        $error="Not Inserted,Some Problem occur.";
        echo json_encode($error);
      }

    }
    else {
      $error="Not Inserted,Some Problem occur.";
      echo json_encode($error);
    }

  }
  else {
    $error="Not Inserted,Some Probelm occur.";
    echo json_encode($error);
  }


  // $stmt2 = $DBcon->prepare("insert into mvownership(user_id, user, movie_id, movie_title) values(:idno, :fullname, :movieid, :movietitle)");

  // $stmt2->bindparam(':idno', $id);
  // $stmt2->bindparam(':fullname', $fullname);
  // $stmt2->bindparam(':movieid', $movieid);
  // $stmt2->bindparam(':movietitle', $movietitle);
  


  // if($stmt2->execute())
  // {
  //   $res="Data Inserted Successfully:";
  //   echo json_encode($res);

  // }
  // else {
  //   $error="Not Inserted,Some Problem occur.";
  //   echo json_encode($error);
  // }
 } else {
  $error="2";
  echo json_encode($error);
}

 ?>