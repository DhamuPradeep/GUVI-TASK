<?php

require '../assets/vendor/autoload.php';

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$password = $_POST['password'];

$con = mysqli_connect("localhost","root","","guvi");

if(mysqli_connect_error()){
    die(0);
}

if(isset($email) !== null && isset($password) !==null && isset($firstName) != null && isset($lastName) && isset($phonenumber)){
    
    $stmt=$con->prepare("SELECT email FROM users WHERE email = ? Limit 1 ");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rows=$stmt->num_rows;
    if($rows > 0){
        echo "User Already Exist";
        $stmt->close();
        $con->close();
        die(0);
    }else{
        $stmt->close();
        $stmt=$con->prepare("INSERT Into users(firstname,lastname,email,phonenumber,password) values(?,?,?,?,?)");
        $stmt->bind_param("sssss",$firstName,$lastName,$email,$phonenumber,$password);
        $stmt->execute();
      //  $uri ='mongodb+srv://dhamupradeep2610:4405iezdbjNP39e9@cluster0.ojymx1j.mongodb.net/?retryWrites=true&w=majority';
        $uri = "mongodb+srv://dhamupradeep:4405iezdbjNP39e9@cluster0.mtzek67.mongodb.net/?retryWrites=true&w=majority";
        $manager = new MongoDB\Client($uri);
        // $database = "guvi";
        // $collection = "users";
        $collections = $manager->guvi->users;
        $insertOneResult = $collections->insertOne([
            'email' => $email,
            'phone' => $phonenumber,
            'firstname'=> $firstName,
            'lastname' => $lastName,
            'password' => $password
        ]);
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
