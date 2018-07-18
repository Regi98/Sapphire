<?php
    session_start();
    include('includes/db.php');

    $code=$_POST['code'];
    $pin=$_POST['pin']; 

    $id = $_SESSION['id'];
    $current_ewallet = $_SESSION['ewallet'];

    $stmt = $DBcon->prepare("SELECT * FROM scratch_cards WHERE code = :code and pin = :pin");
    $stmt->bindparam(':code', $code);
    $stmt->bindparam(':pin', $pin);

    $response;

    if($stmt->execute()) {

        $results = mysqli_query($con, "SELECT * FROM scratch_cards WHERE code = :code and pin = :pin");
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
        } else if ($current_date >  $expiration) { 
            $response = 2;
        } else {
            $response = 3; 

            $current_ewallet = $num['ewallet'];
            $amount = $rowcard['amount'];
            $updated_ewallet = $current_ewallet + $amount;
            // $delsql = "DELETE * FROM scratch_cards WHERE code = $code and pin = $pin";
        }
    } else {
        $response = 4;

    }
        echo json_encode($response);
    }
    else {
        $error="Not Inserted,Some Probelm occur.";
        echo json_encode($error);
    }



?>