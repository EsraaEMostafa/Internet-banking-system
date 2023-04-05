<?php
session_start();

$connection=mysqli_connect("localhost","root","","internetbankingsystem");
if($connection) {
    //echo "success"; 
} 
else {
    die("Error". mysqli_connect_error()); 
}

$receiver=intval($_REQUEST['accnum']);
$money=intval($_REQUEST['amount']);
$sender=$_SESSION['accountNo'];
$receiverValidation=preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $receiver);
$moneyValidation=preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $money);
if($_SESSION['accountNo']!=null && $sender!= $receiver){
    
    $accountt="select * from account where (accountNo='$receiver');";
    $res=mysqli_query($connection,$accountt) or die ( mysqli_error($connection));  
    
    if($res->num_rows ==1){
        $accounttt="select * from account where (accountNo='$sender');";
        $res2=mysqli_query($connection,$accounttt) or die ( mysqli_error($connection)); 
        $row2 = $res2->fetch_assoc();
        if($row2['currentBalance'] >= $money){
            if(!$receiverValidation && !$moneyValidation){

                $query="INSERT INTO transactions(accountnum,transactionType,amount,trans_date) VALUES('".$receiver."','received','".$money."','".date('Y-m-d H:i:s')."');";
                $query.="INSERT INTO transactions(accountnum,transactionType,amount,trans_date) VALUES('".intval($_SESSION['accountNo'])."','sent','".$money."','".date('Y-m-d H:i:s')."');";
                 $query .= "UPDATE account SET currentBalance = currentBalance - " . $money . " WHERE accountNo = " . intval($_SESSION['accountNo']) . ";";
        
                $query .= "UPDATE account SET currentBalance = currentBalance + " . $money . " WHERE accountNo = " . $receiver . ";";
        
                if (mysqli_multi_query($connection, $query)) {
                    echo '<script>
                    alert("successfully transferred");
                    window.location.href="viewAccount.php";
                    </script>';
               
                
              } else {
                echo "Error: " . $query . "<br>" . mysqli_error($connection);
              }
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
?>