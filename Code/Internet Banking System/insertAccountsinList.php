<?php
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
?>