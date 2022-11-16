<?php
session_start();
if (isset($_SESSION["username"])) {
} else {
    header("location:.\login.php");
}
require_once 'database.php';
$permissions = $conn->prepare($users = $conn->prepare('SELECT * FROM wuc353_1.User as users'));
$users = $conn->prepare('SELECT * FROM wuc353_1.User as users');
$articles = $conn->prepare('SELECT * FROM wuc353_1.Article as article');

$users->execute();
$articles->execute();

$query10 = $conn->prepare('SELECT User.privilege , User.username, User.firstName, User.lastName, User.citizenship,User.email, User.phoneNumber
from User
Order by User.privilege asc, User.citizenship asc;');
$query10->execute();



$query11 = $conn->prepare("SELECT 
IF(User.privilege ='delegate',Organisation.org_name, concat(Article.author,' ',User.lastName)) as name,
IF(User.privilege ='delegate',ProStaTer.PSTCountry_Name,User.citizenship) as citizenship, 
Article.majorTopic, Article.minorTopic, Article.dateOfpublication
from Article, User,ProStaTer, Organisation 
where Article.author_ID = User.U_ID AND Article.author=User.firstName 
and Organisation.org_name = ProStaTer.AgencyName
Group by article_id
order by User.citizenship asc, Article.dateOfpublication;

");
$query11->execute();




$query12 = $conn->prepare("SELECT 
IF(User.privilege ='delegate',Organisation.org_name, concat(DeletedArticle.author,' ',User.lastName)) as name,
IF(User.privilege ='delegate',ProStaTer.PSTCountry_Name,User.citizenship) as citizenship,
DeletedArticle.majorTopic, DeletedArticle.minorTopic, DeletedArticle.dateOfpublication
from DeletedArticle, User,ProStaTer, Organisation 
where DeletedArticle.author_ID = User.U_ID AND DeletedArticle.author=User.firstName and Organisation.org_name = ProStaTer.AgencyName
Group by article_id
order by User.citizenship asc, DeletedArticle.dateOfRemoval asc;
");
$query12->execute();



$query13 = $conn->prepare("SELECT distinct SuspendedUsers.privilege,SuspendedUsers.username,SuspendedUsers.firstName,SuspendedUsers.lastName,SuspendedUsers.citizenship,SuspendedUsers.email,SuspendedUsers.phoneNumber,
SuspendedUsers.dateOfSuspension
from SuspendedUsers
Order by dateOfSuspension asc ; 

");
$query13->execute();












?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body style="/*background: url(&quot;design.jpg&quot;);*/background-position: 0 -60px;">
    <nav class="navbar navbar-dark navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                        <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                        <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                    </svg></span><span><strong>Comp353 Best group ever</strong><br></span></a><button class="navbar-toggler" data-bs-toggle="collapse"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
    </nav>
    <header class="bg-dark pt-5"></header>
    <section>
        <div class="container bg-dark py-5">
            <section class="py-5"></section>
            <div class="py-5 p-lg-5">
                <section class="py-5">
                    <div class="container py-5">
                        <div class="row mb-4 mb-lg-5">
                            <div class="col-md-8 col-xl-6 text-center mx-auto">
                                <h1>Querry 10</h1>
                                <table>
                                    <tr>
                                        <td>privilege</td>
                                        <td>username</td>
                                        <td>firstname</td>
                                        <td>lastname</td>
                                        <td>citizenship</td>
                                        <td>email</td>
                                        <td>phoneNumber</td>
                                    </tr>
                                    <?php
                                    while ($row3 = $query10->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                                        <tr>
                                            <td><?= $row3['privilege'] ?></td>
                                            <td><?= $row3['username'] ?></td>
                                            <td><?= $row3['firstName'] ?></td>
                                            <td><?= $row3['lastName'] ?></td>
                                            <td><?= $row3['citizenship'] ?></td>
                                            <td><?= $row3['email'] ?></td>
                                            <td><?= $row3['phoneNumber'] ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                </table>


                                <h1>Querry 11</h1>
                                <table>
                                    <tr>
                                        <td>name</td>
                                        <td>citizenship</td>
                                        <td>major topic</td>
                                        <td>minor topic</td>
                                        <td>date of Publication</td>
                                    </tr>
                                    <?php
                                    while ($row4 = $query11->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                                        <tr>
                                            <td><?= $row4['name'] ?></td>
                                            <td><?= $row4['citizenship'] ?></td>
                                            <td><?= $row4['majorTopic'] ?></td>
                                            <td><?= $row4['minorTopic'] ?></td>
                                            <td><?= $row4['dateOfpublication'] ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                </table>




                                <h1>Querry 12</h1>
                                <table>
                                    <tr>
                                        <td>name</td>
                                        <td>citizenship</td>
                                        <td>major topic</td>
                                        <td>minor topic</td>
                                        <td>date of Publication</td>
                                    </tr>
                                    <?php
                                    while ($row5 = $query12->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                                        <tr>
                                            <td><?= $row5['name'] ?></td>
                                            <td><?= $row5['citizenship'] ?></td>
                                            <td><?= $row5['majorTopic'] ?></td>
                                            <td><?= $row5['minorTopic'] ?></td>
                                            <td><?= $row5['dateOfpublication'] ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                </table>


<!--- Please fix querry 13 ---->
                                <h1>Querry 13</h1>
                                <table>
                                    <tr>
                                        <td>name</td>
                                        <td>citizenship</td>
                                        <td>username</td>
                                        <td>email</td>
                                        <td>firstName</td>
                                        <td>lastName</td>
                                        <td>phoneNumber</td>
                                        <td>dateOfSuspension</td>
                                    </tr>
                                    <?php
                                    while ($row6 = $query13->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                                        <tr>
                                            <td><?= $row6['name'] ?></td>
                                            <td><?= $row6['citizenship'] ?></td>
                                            <td><?= $row6['username'] ?></td>
                                            <td><?= $row6['firstname'] ?></td>
                                            <td><?= $row6['lastname'] ?></td>
                                            <td><?= $row6['phoneNumber'] ?></td>
                                            <td><?= $row6['dateOfSuspension'] ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                </table>



                            </div>
                        </div>
                        <div class="row row-cols-2 row-cols-md-3 mx-auto" style="max-width: 700px;">

                            <footer class="bg-dark"></footer>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                            <script src="assets/js/bold-and-dark.js"></script>
</body>

</html>