<?php 
function viewTransactions($q){
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



$q = intval($_REQUEST['q']);
viewTransactions($q);

?>

