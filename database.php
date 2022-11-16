<?php 
$SERVER= 'wuc353.encs.concordia.ca:3306';
$username='wuc353_1';
$password='pro353sq';
$database= 'wuc353_1';
try{
    $conn =new PDO("mysql:host=$SERVER;dbname=$database;",$username, $password);

}
catch(PDOException $e){
    die('Connection Failed' . $e->getMessage());
}

?>