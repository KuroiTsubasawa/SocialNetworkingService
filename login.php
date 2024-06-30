<?php
require "function.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";

    $result = mysqli_query($conn, $query);

    if (($result->num_rows) > 0) {
        header('Location: profile.php');
        exit;
    } else {
        $error =  "Invalid email or password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to website</title>
    <link rel="stylesheet" href="./style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <?php require_once 'header.php'; ?>

    <div id="login-form" class="d-flex justify-content-center flex-column align-items-center">


        <div class='alert alert-danger' role='alert'>
            <?php
            if (!empty($error)) {
                echo "$error";
            }
            ?>
        </div>



        <form class="" action="" method="post">
            <h2><b>Login</b></h2>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" require>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="password" require>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <?php require_once 'footer.php'; ?>
</body>

</html>