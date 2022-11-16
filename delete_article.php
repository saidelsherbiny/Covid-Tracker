<?php require_once 'database.php';
 session_start();  
 $del=$conn->prepare("DELETE FROM wuc353_1.Article WHERE Article.article_id =:article_id; ");
$del->bindParam(':article_id',$_GET["article_id"]);
$del->execute();
header("Location:.");
?>