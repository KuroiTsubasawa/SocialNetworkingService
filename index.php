<?php
require "function.php";

checkLogin();

print_r($_GET);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social networking service</title>
    <link rel="stylesheet" href="./style/style.css">

</head>

<?php require_once 'header.php'; ?>

<?php require_once 'footer.php'; ?>

</html>