<?php
function updateBalancesAndTransactions($sender, $account_number, $money_amount, $connection){
    $query="INSERT INTO transactions(accountnum,transactionType,amount,trans_date) VALUES('".$account_number."','received','".$money_amount."','".date('Y-m-d H:i:s')."');";
                $query.="INSERT INTO transactions(accountnum,transactionType,amount,trans_date) VALUES('".$sender."','sent','".$money_amount."','".date('Y-m-d H:i:s')."');";
                 $query .= "UPDATE account SET currentBalance = currentBalance - " . $money_amount . " WHERE accountNo = " . $sender . ";";
        
                $query .= "UPDATE account SET currentBalance = currentBalance + " . $money_amount . " WHERE accountNo = " . $account_number . ";";
        
                if (mysqli_multi_query($connection, $query)) {
                    echo '<script>
                    alert("successfully transferred");
                    window.location.href="viewAccount.php";
                    </script>';
               
                
              } else {
                echo "Error: " . $query . "<br>" . mysqli_error($connection);
              }
}
function transfer_money($account_number,$money_amount){
    session_start();

    $connection=mysqli_connect("localhost","root","","internetbankingsystem");
    if($connection) {
        //echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
    }
    $sender=$_SESSION['accountNo'];
    $receiverValidation=preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $account_number);
    $moneyValidation=preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $money_amount);
    if($_SESSION['accountNo']!=null && $sender!= $account_number){
    
    $accountt="select * from account where (accountNo='$account_number');";
    $res=mysqli_query($connection,$accountt) or die ( mysqli_error($connection));  
    
    if($res->num_rows ==1){
        $accounttt="select * from account where (accountNo='$sender');";
        $res2=mysqli_query($connection,$accounttt) or die ( mysqli_error($connection)); 
        $row2 = $res2->fetch_assoc();
        if($row2['currentBalance'] >= $money_amount){
            if(!$receiverValidation && !$moneyValidation){

                updateBalancesAndTransactions($sender, $account_number, $money_amount, $connection);
        }
            else{
                echo '<script>
                alert("invalid input");
                window.location.href="viewAccount.php";
                </script>';
            }

        }else{
            echo '<script>
                alert("you do not have enough money for this transaction");
                window.location.href="viewAccount.php";
                </script>';

        }
    }
    else{
        echo '<script>
                alert("this account number is not found");
                window.location.href="viewAccount.php";
                </script>';
    }

    }else{
        echo '<script>
                alert("cannot transfer");
                window.location.href="viewAccount.php";
                </script>';

    }
    mysqli_close($connection);
}

$receiver=intval($_REQUEST['accnum']);
$money=intval($_REQUEST['amount']);

transfer_money($receiver,$money);


?>