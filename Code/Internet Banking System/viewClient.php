<?php 
function viewClientNameandDate(){
    if (isset($_SESSION['firstName'])) {
        echo '<script>document.querySelector(".welcomeTitle").innerHTML = "Welcome, '.$_SESSION['firstName'].'";</script>';
    }
    echo '<script>document.querySelector(".date").innerHTML = "'.date('Y-m-d').'";</script>';


    
}
function viewTransactions(){
    
    
    
    $connection=mysqli_connect("localhost","root","","internetbankingsystem");
    if($connection) {
        //echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
    }
    

     
    if(isset($_SESSION['accountNumber'])){
        $trans_table="select * from transactions where (accountnum='$_SESSION[accountNumber]') order by trans_date desc;";
        $res2=mysqli_query($connection,$trans_table) or die ( mysqli_error($connection));  
        if ($res2->num_rows > 0){
            while ($row2 = $res2->fetch_assoc()){
            
                echo "<div class='movements__row'>";
                echo "<div class='movements__type movements__type--$row2[transactionType]'>$row2[transactionType]</div>";
                echo "<div class='movements__date'>$row2[trans_date]</div>";
                echo "<div class='movements__value'>$row2[amount]LE</div>";
                echo"</div>";
                echo "</script>";
            }
        }
        echo"<script>
                
            
                document.querySelector('.movements').insertAdjacentHTML('afterbegin', html);

                </script>";
    
    }
    mysqli_close($connection);
}
// document.querySelector('.movements').innerHTML.insertAdjacentHTML('afterbegin', html);
function getBalance(){
    $connection=mysqli_connect("localhost","root","","internetbankingsystem");
    if($connection) {
        //echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
    }
    if(isset($_SESSION['accountNumber'])){
        $accounttable="select currentBalance from account where (accountNo='$_SESSION[accountNumber]');";
        $res=mysqli_query($connection,$accounttable) or die ( mysqli_error($connection));  
        $row = $res->fetch_assoc();
        $balance=$row['currentBalance'];
        echo '<script>document.querySelector(".balance__value").innerHTML = "<b>'.$balance.' LE</b>";</script>';
    }

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
    $sender=$_SESSION['accountNumber'];
    $receiverValidation=preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $account_number);
    $moneyValidation=preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $money_amount);
  
    if($_SESSION['accountNumber']!=null && $sender!= $account_number){
    
    $accountt="select * from account where (accountNo='$account_number');";
    $res=mysqli_query($connection,$accountt) or die ( mysqli_error($connection));  
    
    if($res->num_rows ==1){
        $accounttt="select * from account where (accountNo='$sender');";
        $res2=mysqli_query($connection,$accounttt) or die ( mysqli_error($connection)); 
        $row2 = $res2->fetch_assoc();
        if($row2['currentBalance'] >= $money_amount){
            if(!$receiverValidation && !$moneyValidation && $money_amount!=0){

                updateBalancesAndTransactions($sender, $account_number, $money_amount, $connection);
                
        }
            else{
                echo '<script>
                alert("invalid input, please enter only numbers excluding - or zero");
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
                alert("You entered your own account number, please enter the recipient account number");
                window.location.href="viewAccount.php";
                </script>';

    }
    mysqli_close($connection);
}

function viewAccountNumber(){
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
            
            echo '<script>document.querySelector(".accountNumber").innerHTML = "&nbsp;&nbsp;Account Number: '.$row['accountNo'].'";</script>';
            $_SESSION['accountNumber']=$row['accountNo'];
            
            }   
    }
    else{
        echo '<script>document.querySelector(".accountNumber").innerHTML = "&nbsp;&nbsp;No Account";</script>';
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
        $query2="SELECT * FROM account WHERE client_ID= '".$_SESSION['clientID']."'";
        $result4 = mysqli_query($connection, $query2) or die ( mysqli_error($connection)); 
        if ($result4->num_rows == 0){
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
        else{
            echo '<script> alert("You already have an account, You cannot create another one.");
                            window.location.href="viewAccount.php";
                            </script>';
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





?>

