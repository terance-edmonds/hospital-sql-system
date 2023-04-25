<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<div class="content">
    <div class="top">
        <h1 class="main-title">Suwa Sahana Hospital</h1>
    </div>

    <div class="body">
        <form class="sign-card" method="POST">
            <h2 class="title">Register</h2>

            <div class="input-wrap">
                <p class="text">Username</p>
                <input type="text" class="input form-control" name="username">
            </div>

            <div class="input-wrap">
                <p class="text">Password</p>
                <input type="password" class="input form-control" name="password">
            </div>

            <div class="input-wrap">
                <p class="text">Confirm Password</p>
                <input type="password" class="input form-control" name="confirm-password">
            </div>

            <div class="input-wrap">
                <p class="text">User Role</p>
                <select name="role" class="form-select" aria-label="Select User level">
                    <option value='Administrator' selected>Administrator</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Nurse">Nurse</option>
                    <option value="Nurse">Attendant</option>
                    <option value="Nurse">Cleaner</option>
                </select>
            </div>

            <input name="register_user" type="submit" class="button" value="Register" />

            <p class="bottom">
                Already have an account ? <a class="link" href="/pages/login">Sign In</a>
            </p>
        </form>
    </div>
</div>

<?php

if (isset($_SESSION['id'])) {
    header('location: http://' . $_SERVER['HTTP_HOST'] . '/pages/employees');
}

if (isset($_POST['register_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['confirm-password'];
    $role = $_POST['role'];

    if ($password !== $c_password) {
        return notify("error", "Passwords doesn't match");
    }

    try {
        $sql = "INSERT INTO users(username, password, role) VALUES (
                                '" . $_POST['username'] . "',
                                '" . $_POST['password'] . "',
                                '" . $_POST['role'] . "'
                                ); ";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            notify("success", "User registered");

            echo "<script> setTimeout(() => { window.location.assign('/pages/login') }, 500); </script>";
        } else {
            if (mysqli_errno($conn) == 1062) {
                notify("error", "Username already exists");
            } else {
                notify("error", "User registration failed");
            }

            console("Error: " . $sql . "<br>" . $conn->error);
        }
    } catch (\Throwable $th) {
        throw $th;
    }
} ?>

<script src="/js/script.js"></script>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/layout/footer.php') ?>