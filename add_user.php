<?php include 'database.php';
if(isset($_POST["add"]) ){
    $add_article= $conn->prepare("INSERT INTO wuc353_1.User (U_ID,citizenship,firstName,lastName,phoneNumber,email,dateOfbirth,username,pass, privilege)
                                                        VALUES ( :U_ID, :citizenship, :firstName, :lastName, :phoneNumber, :email, :dateOfbirth,  :username,:pass,privilege);" );
    $add_article->bindParam(':phoneNumber', $_POST["phoneNumber"]);
    $add_article->bindParam(':firstName', $_POST["firstName"]);
    $add_article->bindParam(':lastName', $_POST["lastName"]);
    $add_article->bindParam(':dateOfbirth', $_POST["dateOfbirth"]);
    $add_article->bindParam(':email', $_POST["email"]);
    $add_article->bindParam(':U_ID', $_POST["U_ID"]);
    $add_article->bindParam(':citizenship', $_POST["citizenship"]);
    $add_article->bindParam(':username', $_POST["username"]);
    $add_article->bindParam(':password', $_POST["password"]);
    $add_article->bindParam(':privilege', $_POST["privilege"]);





 #   $add_article->bindParam(':article_id', $_POST["article"]);
    if($add_article->execute()){
        header("Location: .");
    }
    else{
        
    }
}
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
                        <form class="p-3 p-xl-4" action="./add_user.php" method="post">
                            <div class="mb-3"><input class="form-control" type="number" id="U_ID" name="U_ID" placeholder="U_ID"></div>
                            <div class="mb-3"><input class="form-control" type="text" id="citizenship" name="citizenship" placeholder="citizenship"></div>
                            <div class="mb-3"><input class="form-control" type="text" id="firstName" name="firstName" placeholder="first Name"></div>
                            <div class="mb-3"><input class="form-control" type="text" id="lastName" name="lastName" placeholder="last Name"></div>
                            <div class="mb-3"><input class="form-control" type="number" id="phoneNumber" name="phoneNumber" placeholder="phoneNumber"></div>
                            <div class="mb-3"><input class="form-control" type="email" id="email" name="email" placeholder="email"></div>

                            <div class="mb-3"> <input class="form-control" id="dateOfbirth" type="date"></div>

                            <div class="mb-3"><input class="form-control" type="text" id="username" name="username" placeholder="username"></div>
                            <div class="mb-3"><input class="form-control" type="text" id="password" name="password" placeholder="password"></div>
                            <div class="mb-3">
                            <input type="text" list="privilege" />
                            <datalist id="privilege" name="privilege">
                            <option>admin</option>
                            <option>user</option>
                            <option>delegate</option>
                            <option>researcher</option>
                            <option>organisation</option>
                            </datalist>
                            </div>
                            <div><button class="btn btn-primary shadow d-block w-100" type="submit" name="add">add</button></div>
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