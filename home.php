<?php
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
 }  
 else  
 {  
      header("location:pdo_login.php");  
 }  
require_once 'database.php';

$users = $conn->prepare('SELECT * FROM wuc353_1.User as users');
$articles = $conn->prepare('SELECT * FROM wuc353_1.Article as article');

$users->execute();
$articles->execute();





if(isset($_POST['title']) && $_POST['majorTopic'] && $_POST['author'] && $_POST['minorTopic'] && $_POST['author']&& $_POST['dateOfpublication']&& $_POST['summary'] ){
    $add_article= $conn->prepare("INSERT INTO wuc353_1.Article (majorTopic,author,minorTopic,author,dateOfpublication,summary)
                                                        VALUES (:majorTopic, :author, :minorTopic, :author, :dateOfpublication, :summary)" );
    $add_article->bindParam(':author', $_POST["author_name"]);
    $add_article->bindParam(':summary', $_POST["summary"]);
    $add_article->bindParam(':majorTopic', $_POST["major_topic"]);
    $add_article->bindParam(':minorTopic', $_POST["minor_topic"]);
    $add_article->bindParam(':title', $_POST["author_name"]);
    $add_article->bindParam(':dateOfpublication', $_POST["date"]);
 #   $add_article->bindParam(':title', $_POST["article"]);
};

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
                                <h2 class="fw-bold">Users</h2>
                            </div>
                        </div>
                        <div class="row row-cols-2 row-cols-md-3 mx-auto" style="max-width: 700px;">
                    <!--    *****************************PHP CODE****************************   -->
                            <?php
                            while ($row = $users->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT) ) {
                                ?>
                                <div class="col mb-4">
                                    <div class="text-center"><img class="rounded mb-3 fit-cover" width="150" height="150" src="assets/img/clipboard-image.png">
                                        <h5 class="fw-bold mb-0"><strong><?= $row['username'] ?></strong></h5>
                                        <p class="text-muted mb-2"><?= $row['privilege'] ?></p>
                                        <a href="./edit_user?U_ID<?=$row['U_ID']?> ">Edit user</a>
                                        <a href="./edit_user?U_ID<?=$row['U_ID']?> ">Delete user</a>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    <!--    *****************************PHP CODE****************************   -->
                    </div>
                    <div class="row" style="padding-left: 0px;margin-left: -52px;">
                        <div class="col ps-xxl-5" style="margin-left: 507px;padding-left: 7px;padding-right: 85px;margin-right: 62px;">
                            <div class="btn-group" role="group"></div><button class="btn btn-primary" type="button">View more users</button>
                        </div>
                    </div>
                </section>




                <div class="row">
                    <div class="col">
                        <div class="row mb-4 mb-lg-5">
                            <div class="col-md-8 col-xl-6 text-center mx-auto">
                                <h2 class="fw-bold">Articles</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
                    <!--    *****************************PHP CODE****************************   -->
                    <?php
                    while ($row2 = $articles->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
                         ?>
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-5 px-md-5">
                                <div class="bs-icon-lg d-flex justify-content-center align-items-center mb-3 bs-icon" style="top: 1rem;right: 1rem;position: absolute;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier text-success">
                                        <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                                        <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                                    </svg></div>
                                <h5 class="fw-bold card-title"><?= $row2['article_id'] ?>&nbsp;</h5>
                                <p class="text-muted card-text mb-4"><?= $row2['summary'] ?></p>
                                <a href="./edit_article.php?article_id=<?=$row2['article_id']?> ">Edit article</a>
                                <a href="./edit_article.php?article_id=<?=$row2['article_id']?> ">Delete article</a>
                            </div>
                        </div> 
                                        
                    <?php } ?>
                    <!--    *****************************PHP CODE****************************   -->
                </div>
            </div>
        </div>
    </section>





    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold text-success mb-2">add article</p>
                    <h2 class="fw-bold">Add Article</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div>
                        <form class="p-3 p-xl-4" method="post">
                            <div class="mb-3"><input class="form-control" type="text" id="title" name="title" placeholder="Title"></div>
                            <div class="mb-3"><input class="form-control" type="text" id="summary" name="summary" placeholder="Summary"></div>
                            <div class="mb-3"><input class="form-control" type="text" id="major_topic" name="major_topic" placeholder="Major Topic"></div>
                            <div class="mb-3"><input class="form-control" type="text" id="minor_topic" name="minor_topic" placeholder="Minor Topic"></div>
                            <div class="mb-3"><input class="form-control" type="text" id="author_name" name="author_name" placeholder="author"></div>
                            <div class="mb-3"> <input class="form-control" id="date" type="date"></div>
                            <div class="mb-3"><textarea class="form-control" id="message-1" name="article" rows="3" placeholder="article"></textarea></div>
                            <div><button class="btn btn-primary shadow d-block w-100" type="submit">add</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        
        <section class="py-5">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-8 col-xl-6 text-center mx-auto">
                        <p class="fw-bold text-success mb-2">add user</p>
                        <h2 class="fw-bold">Add User</h2>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 col-xl-4">
                        <div>
                            <form class="p-3 p-xl-4" method="post">
                                <div class="mb-3"><input class="form-control" type="text" id="username" name="username" placeholder="username"></div><input class="form-control" type="text" id="firstname" name="firstname" placeholder="firstname">
                                <div class="mb-3"></div><input class="form-control" type="text" id="lastname" name="lastname" placeholder="last name">
                                <div class="mb-3"><input class="form-control" type="password" placeholder="Password"><input class="form-control" type="text" id="privilege" name="privilege" placeholder="privilege"><input class="form-control" type="email" id="email" placeholder="Email"><input class="form-control" type="text" id="phone_number" name="phone_number" placeholder="phone number"><input class="form-control" type="text" id="citizenship" name="citizenship" placeholder="citizenship"><input class="form-control" type="text" id="author_name-4" name="author_name" placeholder="author"><input class="form-control" id="date-1" type="date"><textarea class="form-control" id="message-2" name="article" rows="3" placeholder="article"></textarea></div>
                                <div><button class="btn btn-primary shadow d-block w-100" type="submit">add</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <footer class="bg-dark"></footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bold-and-dark.js"></script>
</body>

</html>