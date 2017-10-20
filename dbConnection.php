<?php

$servername = 'localhost';
$username = 'muhammed';
$password = 'muhammed';
$dbname = 'pdo';


try{

    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


//echo 'Connected';

}catch(PDOException $e){
echo 'Error : '. $e->getMessage();
}


include_once 'person.php';

$person = new PersonDB($conn); 


?>


