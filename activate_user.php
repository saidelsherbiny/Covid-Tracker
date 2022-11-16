<?php require_once 'database.php';
 session_start();  
 $del=$conn->prepare("DELETE FROM wuc353_1.SuspendedUsers WHERE User.SuspendedUsers =:U_ID; ");
$del->bindParam(':U_ID',$_GET["U_ID"]);
$del->execute();
header("Location:.");
?>
