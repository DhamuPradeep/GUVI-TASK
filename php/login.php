<?php
$email = $_POST['email'];
$password = $_POST['password'];

if(isset($email) !== null && isset($password) !==null){
    $hostname = 'localhost';
    $username = 'root';
    $userpassword ='';
    $dbname = 'guvi';
    $con = new mysqli($hostname,$username,$userpassword,$dbname);
    if (!$con){
        die(0);
    }
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'"; 
    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
        echo "Login";
      } else {
        echo "Login failed";
    }
}
else{
    echo "All the details are required";
}
exit;
?>