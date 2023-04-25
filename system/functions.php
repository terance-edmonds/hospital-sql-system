<?php
    function notify($status, $message) {
        echo "<script> toastr['$status'](`$message`); </script>";
    }

    function console($message) {
        echo "<script> console.log(`$message`); </script>";
    }
?>