<?php
require "function.php";

checkLogin();


if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['username'])) {
    $image_added = false;
    if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] == 0) {
        //file was uploaded
        $folder = "uploads/";
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        $image = $folder . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $image);

        if (file_exists($_SESSION['info']['image'])) {
            unlink($_SESSION['info']['image']);
        }
        $image_added = true;
    }

    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    $id = $_SESSION['info']['user_id'];

    if ($image_added == true) {
        $query = "UPDATE users SET username = '$username', email = '$email', password = '$password', image='$image' WHERE user_id = $id limit 1";
    } else {
        $query = "UPDATE users SET username = '$username', email = '$email', password = '$password' WHERE user_id = $id limit 1";
    }
    $result = mysqli_query($conn, $query);
    $query = "SELECT * FROM users WHERE user_id = $id limit 1";
    $result = mysqli_query($conn, $query);
    if (($result->num_rows) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['info'] = $row;
    }
    header('Location: login.php');
    die;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/profile.css">
</head>

<body>
    <?php require_once 'header.php'; ?>

    <?php
    if (!empty($_GET['action']) && $_GET['action'] == 'edit') : ?>

        <div id="edit-profile-form" class="d-flex justify-content-center flex-column align-items-center">
            <h2>Edit Profile</h2>
            <form class="" action="" method="post" enctype="multipart/form-data">
                <img src="<?php echo $_SESSION['info']['image']; ?>" alt="">
                <div class="mb-3">
                    <label for="exampleInputImg" class="form-label d-flex align-items-start">Image</label>
                    <input type="file" class="form-control" id="exampleInputImg" name="image" required>
                </div>
                <div class="mb-3">
                    <input value="<?php echo $_SESSION['info']['username']; ?>" type="text" class="form-control" id="exampleInputName" aria-describedby="usernameHelp" name="username" placeholder="Username:" required>
                </div>
                <div class="mb-3">
                    <input value="<?php echo $_SESSION['info']['email']; ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Email address:" required>
                </div>
                <div class="mb-3">
                    <input value="<?php echo $_SESSION['info']['password']; ?>" type="text" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password:" required>
                </div>
                <div class="mb-3">
                    <input type="hidden" value="profile_edit" name="action">
                </div>
                <button type="submit" class="btn btn-success">Save</button>
                <a href="profile.php">
                    <button type="button" class="btn btn-danger">Cancel</button>
                </a>
            </form>
        </div>

    <?php else : ?>
        <h1>User Profile</h1>
        <table id="profile-table">
            <tr>
                <td><img src="<?php echo $_SESSION['info']['image']; ?>" alt=""></td>
            </tr>
            <tr>
                <td><?php
                    echo $_SESSION['info']['username'];
                    ?></td>
            </tr>
            <tr>
                <td><?php
                    echo $_SESSION['info']['email'];
                    ?></td>
            <tr>
        </table>
        <a href="profile.php?action=edit">
            <button type="button" class="btn btn-success">Edit Profile</button>
        </a>
        <hr>
        <h5>Create a post</h5>
        <form class="profile-form" action="" method="post">
            <textarea name="post" rows="8" id="" placeholder="Text"></textarea>
            <button type="button" class="btn btn-light">Post</button>
        </form>

    <?php endif; ?>

    <?php require_once 'footer.php'; ?>
</body>

</html>