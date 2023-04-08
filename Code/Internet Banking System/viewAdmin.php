<?php
function viewAllAccountsAdmin(){
    session_start();
    $connection=mysqli_connect("localhost","root","","internetbankingsystem");
    if($connection) {
        //echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
    }
    $clienttables="select clientID, IFNULL(accountNo,'No account') as accountNo, CONCAT(firstName, ' ', lastName) as Name, email
    from client left join account
    on client.clientID=account.client_ID";
    $res2=mysqli_query($connection,$clienttables) or die ( mysqli_error($connection));  
    if ($res2->num_rows > 0){
        while ($row2 = $res2->fetch_assoc()){
            echo "<tr>";
            
            echo "<td>$row2[accountNo]</td>";
            echo "<td>$row2[clientID]</td>";
            echo "<td>$row2[Name]</td>";
            echo "<td>$row2[email]</td>";
            echo "</tr>";
        }
    }

    mysqli_close($connection);
}
function updateAccountsInDatabase($accnum,$connection){
    $delete="DELETE FROM account WHERE accountNo = $accnum";
            if (mysqli_query($connection, $delete)) {
                echo '<script>
                alert("deleted successfully");
                window.location.href="admin.php";
                </script>';
        } else {
            echo "Error deleting record: " . mysqli_error($connection);
        }
}
function close_account($accnum){
    session_start();
    $connection=mysqli_connect("localhost","root","","internetbankingsystem");
    if($connection) {
        //echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
    }
    
    $accValidation=preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $accnum);
    if(!$accValidation){
        $accs ="select * from account where accountNo=$accnum";
        $res2=mysqli_query($connection,$accs) or die ( mysqli_error($connection));  
        if ($res2->num_rows > 0){
            $row3=$res2->fetch_assoc();
            if($row3['currentBalance']==0){
                // The user confirmed the action
                updateAccountsInDatabase($accnum,$connection);

            }
            else{
                echo '<script>
                alert("Cannot delete the account as the current balance is greater than zero");
                window.location.href="admin.php";
                </script>';
            }
    
        
        }else{
            echo '<script>
            alert("account does not exist");
            window.location.href="admin.php";
            </script>';
        }
    }else{
        echo '<script>
        alert("invalid input");
        window.location.href="admin.php";
        </script>';
    }

    mysqli_close($connection);
}


if(isset($_REQUEST['closeAccountButton'])){
    $accnum=$_REQUEST['closeAccount'];
    close_account($accnum);
}
    


?>