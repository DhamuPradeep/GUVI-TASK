<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$password = $_POST['password'];

$con = mysqli_connect("localhost","root","","guvi");

if (!$con){
    die(0);
}

if(isset($email) !== null && isset($password) !==null && isset($firstName) != null && isset($lastName) && isset($phonenumber)){
    
    $stmt=$con->prepare("SELECT email From users Where email='$email'  Limit 1");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rows=$stmt->num_rows;
    if($rows > 0){
        echo "User Already Exist";
        die(0);
    }else{
        $stmt->close();
        $stmt=$con->prepare("INSERT Into users(firstName,lastName,email,password,phonenumber) values(?,?,?,?,?)");
        $stmt->bind_param("sssss",$firstName,$lastName,$email,$password,$phonenumber);
        $stmt->execute();
        echo "User Details Added Successfully";
    }
    $stmt->close();
    $con->close();
}
else{
    echo "All the details are required";
}
exit;

?>
