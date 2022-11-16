<?php 
$SERVER= '*****************************';
$username='******';
$password='*******';
$database= '*****';
try{
    $conn =new PDO("mysql:host=$SERVER;dbname=$database;",$username, $password);

}
catch(PDOException $e){
    die('Connection Failed' . $e->getMessage());
}

?>
