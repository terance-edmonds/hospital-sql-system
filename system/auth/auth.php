<?php
function check_section_valid($type)
{
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "Cleaner") {
            if (
                $type == "Employee" ||
                $type == "Patients" ||
                $type == "Drugs" ||
                $type == "Vendors" ||
                $type == "Diagnostics"
            ) {
                return false;
            }
        } else if ($_SESSION['role'] == "Doctor") {
            if ($type == "Attendance") {
                return false;
            }
        } else if ($_SESSION['role'] == "Nurse") {
            if ($type == "Attendance") {
                return false;
            }
        }

        return true;
    }

    return false;
}

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "Doctor") {
        if (strpos($_SERVER['REQUEST_URI'], "/pages/attendance") !== false) {
            if ($_SERVER['REQUEST_URI'] != "/pages/employees") header("location: /pages/employees");
        }
    } else if ($_SESSION['role'] == "Nurse") {
        if (strpos($_SERVER['REQUEST_URI'], "/pages/attendance") !== false) {
            if ($_SERVER['REQUEST_URI'] != "/pages/employees") header("location: /pages/employees");
        }
    } else if ($_SESSION['role'] == "Cleaner") {
        if (
            strpos($_SERVER['REQUEST_URI'], "/pages/employees") !== false ||
            strpos($_SERVER['REQUEST_URI'], "/pages/patients") !== false ||
            strpos($_SERVER['REQUEST_URI'], "/pages/drugs") !== false ||
            strpos($_SERVER['REQUEST_URI'], "/pages/vendors") !== false ||
            strpos($_SERVER['REQUEST_URI'], "/pages/diagnose") !== false
        ) {
            if ($_SERVER['REQUEST_URI'] != "/pages/attendance") header("location: /pages/attendance");
        }
    }
}

function check_section_privilege($table, $dml)
{
    if (isset($_SESSION['role'])) {
        return include($_SERVER['DOCUMENT_ROOT'] . "/auth/privileges/$table.php");
    }

    return false;
}
