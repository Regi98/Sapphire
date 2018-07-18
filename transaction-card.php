<?php
    session_start();
    include('shop/includes/db.php');
    include('includes/config.php'); 

    $code=$_POST['code'];
    $pin=$_POST['pin']; 

    $id = $_SESSION['id'];
    $current_ewallet = $_SESSION['ewallet'];

    $stmt = $DBcon->prepare("SELECT * FROM scratch_cards WHERE code = :code and pin = :pin");
    $stmt->bindparam(':code', $code);
    $stmt->bindparam(':pin', $pin);

    if($stmt->execute()) {

        $results = mysqli_query($con, "SELECT * FROM scratch_cards WHERE code = '$code' and pin = $pin");
        $numResults = mysqli_num_rows($results);
        $rowcard = mysqli_fetch_assoc($results);
        //variables
        $time = time();
        $current_date = date("Y-m-d",$time);
        $expiration = $rowcard['card_expiration'];
        $status = $rowcard['status'];

    if ($numResults == 1) {
        if ($status != 'A') { 
            $response = 1;
            echo json_encode($response);
        } else if ($current_date >  $expiration) { 
            $response = 2;
            echo json_encode($response);
        } else {
            $response = 3; 

            $amount = $rowcard['amount'];
            $updated_ewallet = $current_ewallet + $amount;

            $sql = "UPDATE shopusers SET ewallet=$updated_ewallet WHERE id=$id";
            if(mysqli_query($con, $sql)){
                echo json_encode($response);
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        }
    } else {
        $response = 7;
        echo json_encode($response);
    }
    }
    else {
        $error="Not Inserted,Some Probelm occur.";
        echo json_encode($error);
    }



?>