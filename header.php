<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <header>
        <div><a href="index.php">Home</a></div>
        <div><a href="profile.php">Profile</a></div>
        <?php if (empty($_SESSION['info'])) : ?>
            <div><a href="login.php">Login</a></div>
            <div><a href="signup.php">Signup</a></div>

        <?php else : ?>
            <div><a href="logout.php">Logout</a></div>
        <?php endif; ?>
    </header>
</body>

</html>