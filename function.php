<?php
require 'connection.php';

function checkLogin(){
    if (empty($_SESSION['info'])) {
        header('Location: login.php');
        die;
    }
}
?>