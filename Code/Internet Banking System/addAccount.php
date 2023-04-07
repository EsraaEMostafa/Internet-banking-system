<?php

function add_account(){
    session_start();
    $connection=mysqli_connect("localhost","root","","internetbankingsystem");
    if($connection) {
        //echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
    }
    if(!empty($_SESSION['clientID'])){
        $balance=0;
        $query="INSERT INTO account(client_ID,currentBalance) VALUES('".$_SESSION['clientID']."','".$balance."')";
        $result = mysqli_query($connection, $query);
            //Test if there was a query error
            if ($result) {
                //SUCCESS
                $accountNo = mysqli_insert_id($connection);
                echo '<script> alert("your account Number is '.$accountNo.'");
                    window.location.href="viewAccount.php";
                    </script>';
            } else {
                //FAILURE
                die("Database query failed. " . mysqli_error($connection)); 
                //last bit is for me, delete when done
            }
    }
    mysqli_close($connection);
}

add_account();
?>