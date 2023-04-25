<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<div class="content">
    <div class="top">
        <h1 class="main-title">Suwa Sahana Hospital</h1>
    </div>

    <div class="body">
        <form class="sign-card" method="POST">
            <h2 class="title">Login</h2>
    
            <div class="input-wrap">
                <p class="text">Username</p>
                <input type="text" class="input form-control" name="username">
            </div>
    
            <div class="input-wrap">
                <p class="text">Password</p>
                <input type="password" class="input form-control" name="password">
            </div>
    
            <input name="login_user" type="submit" class="button" value="Login" />
    
            <p class="bottom">
                Don't have an account ? <a class="link" href="/pages/register">Sign Up</a>
            </p>
        </form>
    </div>
</div>

<?php

if (isset($_SESSION['id'])) {
    header('location: http://' . $_SERVER['HTTP_HOST'] . '/pages/employees');
}

if (isset($_POST['login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        return notify("error", "Username is required");
    }
    if (empty($password)) {
        return notify("error", "Password is required");
    }

    try {
        $sql = "SELECT * FROM users WHERE username='" . $username . "' and password='" . $password . "';";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            notify("success", "User logged In");

            $row = $result->fetch_assoc();

            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            echo "<script> setTimeout(() => { window.location.assign('/pages/employees') }, 500); </script>";
        } else {
            console("Error: " . $sql . "<br>" . $conn->error);

            notify("error", "Username not found");
        }
    } catch (\Throwable $th) {
        throw $th;
    }
} ?>

<script src="/js/script.js"></script>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/layout/footer.php') ?>