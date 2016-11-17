<?php
    session_start();
    if (isset($_SESSION['logedin'])){
        session_unset();
        session_destroy();
        header("Location: index.php");
        die();
    }
/**
 * Created by PhpStorm.
 * User: Pedro Santos
 * Date: 17/11/2016
 * Time: 11:40
 */