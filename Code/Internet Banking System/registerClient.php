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

    $firstnamespecialchars=preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $firstName);
    $lastnamespecialchars=preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lastName);
    $firstnamenums=preg_match('@[0-9]@', $firstName);
    $lastnamenums=preg_match('@[0-9]@', $lastName);
    // Validate password strength
    
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    $firstNamespaces=preg_match('/^\S.*\S$/', $firstName);
    $lasttNamespaces=preg_match('/^\S.*\S$/', $lastName);
    $clienttable="select * from client where (email='$email');";
    $res=mysqli_query($connection,$clienttable);

    if (mysqli_num_rows($res) > 0) {
    
    $row = mysqli_fetch_assoc($res);
    if($email==isset($row['email']))
    {
        echo '<script>
        alert("email already exists");
        window.location.href="register.php";
        </script>';
        
    }
    
    }
    else{

        if(!$firstnamespecialchars && !$lastnamespecialchars && !$firstnamenums && !$lastnamenums && $firstNamespaces && $lasttNamespaces){
            if($lowercase && $number && $specialChars){
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
                }//**** */
                else{
                    
                    echo '<script>
                    alert("confirm password and password are not the same");
                    window.location.href="register.php";
                    </script>';
                            }
            }
            else{
                
                echo '<script>
                alert("password must have special characters, numbers and letters");
                window.location.href="register.php";
                </script>';
        }
            
    
    }
    else{
        
        echo '<script>
        alert("invalid first name or last name");
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