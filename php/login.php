<?php
$email = $_POST['email'];
$password = $_POST['password'];

$hostname = 'localhost';
$username = 'root';
$userpassword ='';
$dbname = 'guvi';
$con =  mysqli_connect($hostname,$username,$userpassword,$dbname);
if(mysqli_connect_error()){
    die(0);
}

if(isset($email) !== null && isset($password) !==null){
    
    $stmt = $con->prepare("SELECT * FROM users WHERE email=(?)and password=(?)");
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();
    $result=$stmt->get_result();
    $rows=$result->num_rows;
    $stmt->close();
    $con->close();
    if ($rows==1) {
        $message = "success";
        $response = array("usermail" => $email,"message"=>$message);
        echo json_encode($response);
    } else {
        $message = "Login Failed";
        $response = array("message"=>$message);
        echo json_encode($response);
    }
}
else{
    echo "All the details are required";
}
exit;
?>
