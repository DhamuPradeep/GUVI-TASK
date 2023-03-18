<?php
require '../assets/vendor/autoload.php';


  $redis = new Redis();
  $email = $_POST['Email'];
    $uri = "mongodb+srv://dhamupradeep:4405iezdbjNP39e9@cluster0.mtzek67.mongodb.net/?retryWrites=true&w=majority";
    $manager = new MongoDB\Client($uri);
    $collection = $manager->guvi->Users;
   
    $cursor = $collection->find([
      'email' => $email
    ]);

    $data = array();

    foreach ($cursor as $document) {
        $data[] = $document;
    }

    $json =  json_encode($data);

    echo $json;

    exit;

?>
