<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/' ?>">
    <title>SCS 1203 - Database 1</title>

    <!-- Tab Icon -->
    <link rel="icon" href="/public/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/styles/bootstrap.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/styles/styles.css">

    <!-- toastr notification -->
    <link rel="stylesheet" href="/styles/toastr.min.css">
</head>

<body>

    <!-- Jquery -->
    <script src="/js/jquery-3.6.0.min.js"></script>

    <!-- Toastr Notification -->
    <script src="/js/toastr.min.js"></script>


    <?php session_start(); ?>
    
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/auth/auth.php'); ?>