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


    <h1>User Profile</h1>
    <table id="profile-table">
        <tr>
            <td><img src="img.jpg" alt=""></td>
        </tr>
        <tr>
            <td>JohnDoe</td>
        </tr>
        <tr>
            <td>John@email.com</td>
        <tr>
    </table>
    <hr>
    <h5>Create a post</h5>
    <form class="profile-form" action="" method="post">
        <textarea name="post" rows="8" id="" placeholder="Text"></textarea>
        <button type="button" class="btn btn-light">Post</button>
    </form>

    <?php require_once 'footer.php'; ?>
</body>

</html>