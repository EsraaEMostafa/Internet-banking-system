<?php

function redirectToViewAccount($clientid) {
    echo '<script> alert("your ID is '.$clientid.'");
    window.location.href="viewAccount.php";
    </script>';
    
    
}


function validate_Register_data($firstName,$lastName, $email,$password,$confirmPassword){
    session_start();
    $connection=mysqli_connect("localhost","root","","internetbankingsystem");
    if($connection) {
        //echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
    }

    
    $emailFormat=filter_var($email, FILTER_VALIDATE_EMAIL);
    // Validate password strength
    
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    
    $firstNameValidate=preg_match('/[^A-Za-z]/', $firstName);
    $lastNameValidate=preg_match('/[^A-Za-z]/', $lastName);
    $clienttable="select * from client where (email='$email');";
    $res=mysqli_query($connection,$clienttable);

    if (mysqli_num_rows($res) > 0) {
    
    $row = mysqli_fetch_assoc($res);
    if($email==isset($row['email']))
    {
        echo '<script>
        //alert("email already exists");
        alert("invalid data")
        window.location.href="register.php";
        </script>';
        
    }
    
    }
    else{
       
        if(!$firstNameValidate && !$lastNameValidate && strlen($firstName)>=2 && strlen($lastName)>=2 && $emailFormat){
            if($lowercase && $number && $specialChars && strlen($password) >= 8){
                if($confirmPassword==$password){
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $query="INSERT INTO client(firstName,lastName,email,passwords) VALUES('".$firstName."','".$lastName."','".$email."','".$hashed_password."')";
                    $result = mysqli_query($connection, $query);
            //Test if there was a query error
                     if ($result) {
                //SUCCESS
                      $clientid = mysqli_insert_id($connection);
                      redirectToViewAccount($clientid);
                      $_SESSION['clientID']= $clientid;
                      $_SESSION['firstName']=$firstName;
                      
                      
                     
                      
                     } else {
                //FAILURE
                        die("Database query failed. " . mysqli_error($connection)); 
                //last bit is for me, delete when done
                    }
                }
                else{
                    
                    echo '<script>
                    //alert("confirm password and password are not the same");
                    alert("invalid data");
                    window.location.href="register.php";
                    </script>';
                            }
            }
            else{
                
                echo '<script>
                //alert("password must have special characters, numbers and letters");
                alert("invalid data");
                window.location.href="register.php";
                </script>';
        }
            
    
    }
    else{
        
        echo '<script>
        //alert("invalid first name or last name, they should contains letters only");
        alert("invalid data");
        window.location.href="register.php";
        </script>';
    }
        
      }

      mysqli_close($connection);
}

$first_name=$_REQUEST['fname'];
$last_name=$_REQUEST['lname'];
$email=$_REQUEST['email'];
$password=$_REQUEST['psw'];
$confirm_password=$_REQUEST['confirmpsw'];
validate_Register_data($first_name,$last_name,$email,$password,$confirm_password);

?>