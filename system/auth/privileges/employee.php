<?php

$role = $_SESSION['role'];

if ($role == "Administrator") {
    switch ($dml) {
        case 'insert':
            return false;
        case 'update':
            return false;
        case 'delete':
            return false;
        default:
            return true;
    }
} else if ($role == "Attendant") {
    switch ($dml) {
        case 'insert':
            return false;
        case 'update':
            return false;
        case 'delete':
            return false;
        default:
            return true;
    }
} else if ($role == "Doctor") {
    switch ($dml) {
        case 'insert':
            return false;
        case 'update':
            return false;
        case 'delete':
            return false;
        default:
            return true;
    }
} else if ($role == "Nurse") {
    switch ($dml) {
        case 'insert':
            return false;
        case 'update':
            return false;
        case 'delete':
            return false;
        default:
            return true;
    }
} else if ($role == "Cleaner") {
    switch ($dml) {
        case 'insert':
            return false;
        case 'update':
            return false;
        case 'delete':
            return false;
        default:
            return false;
    }
} else {
    return true;
}
