<?php 
function viewClientNameandDate(){
    if (isset($_SESSION['firstName'])) {
        echo '<script>document.querySelector(".welcomeTitle").innerHTML = "Welcome, '.$_SESSION['firstName'].'";</script>';
    }
    echo '<script>document.querySelector(".date").innerHTML = "'.date('Y-m-d').'";</script>';

    
}
function viewTransactions($q){
    getBalance($q);
    session_start();
    
    $connection=mysqli_connect("localhost","root","","internetbankingsystem");
    if($connection) {
        //echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
    }
    mysqli_select_db($connection,"ajax_demo");

    $_SESSION['accountNo']=$q;  

    $trans_table="select * from transactions where (accountnum='$q') order by trans_date desc;";
    $res2=mysqli_query($connection,$trans_table) or die ( mysqli_error($connection));  
    if ($res2->num_rows > 0){
        while ($row2 = $res2->fetch_assoc()){
            echo "<div class='movements__row'>";
            echo "<div class='movements__type movements__type--$row2[transactionType]'>$row2[transactionType]</div>";
            echo "<div class='movements__date'>$row2[trans_date]</div>";
            echo "<div class='movements__value'>$row2[amount]LE</div>";
            echo"</div>";
        }
    }
    echo"<script>
            
           
            document.querySelector('.movements').insertAdjacentHTML('afterbegin', html);

            </script>";
    

    mysqli_close($connection);
}
// document.querySelector('.movements').innerHTML.insertAdjacentHTML('afterbegin', html);
function getBalance($accountnum){
    

    $connection=mysqli_connect("localhost","root","","internetbankingsystem");
    if($connection) {
        //echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
    }
    mysqli_select_db($connection,"ajax_demo");


    $accounttable="select currentBalance from account where (accountNo='$accountnum');";
    $res=mysqli_query($connection,$accounttable) or die ( mysqli_error($connection));  
    $row = $res->fetch_assoc();
    $balance=$row['currentBalance'];
    echo "<h2><b>Current Balance: $balance LE</b></h2>";
    

    mysqli_close($connection);
}
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
  
    if($_SESSION['accountNo']!=null && $sender!= $account_number &&$account_number!=null && $money_amount!=null){
    
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

function viewAccountsList(){
    session_start();
    $connection=mysqli_connect("localhost","root","","internetbankingsystem");
    if($connection) {
        //echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
    }

    if(!empty($_SESSION['clientID'])){
        $accounttable="select * from account where (client_ID = '$_SESSION[clientID]')";
        $res=mysqli_query($connection,$accounttable) or die ( mysqli_error($connection));  

        if ($res->num_rows > 0) {
        
        //$row = mysqli_fetch_assoc($res);
        while ($row = $res->fetch_assoc()){
            
            echo "<option value='". $row['accountNo'] ."'>" .$row['accountNo'] ."</option>" ;
            
            }   
    }
}
    mysqli_close($connection);
}
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




if(isset($_REQUEST['transferMoney']))
{
    $receiver=intval($_REQUEST['accnum']);
    $money=intval($_REQUEST['amount']);
    
    transfer_money($receiver,$money);
} 
else if(isset($_REQUEST['addNewAccount'])){
    add_account();
}


else{
    $q = intval($_REQUEST['q']);
    viewTransactions($q);

}




?>

