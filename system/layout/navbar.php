<div id="navbar">
    <h1 class="main-title">Suwa Sahana Hospital</h1>

    <form class="user-details-form" action="" method="post">
        <div class="user-details">
            <div class="details-wrap">
                <p class="title">Username: </p>
                <p class="value"><?php echo $_SESSION['username'] ?></p>
            </div>
            <div class="details-wrap">
                <p class="title">Role: </p>
                <p class="value"><?php echo $_SESSION['role'] ?></p>
            </div>
        </div>
        <input name="user_logout" type="submit" class="btn btn-danger" value="Logout" />
    </form>

    <ul class="nav nav-tabs" role="tablist">
        <?php if (check_section_valid("Employee")) { ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?php if ($active == "1") echo "active"; ?>" href="/pages/employees">Employees</a>
            </li>
        <?php } ?>
        <?php if (check_section_valid("Patients")) { ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?php if ($active == "2") echo "active"; ?>" href="/pages/patients">Patients</a>
            </li>
        <?php } ?>
        <?php if (check_section_valid("Wards")) { ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?php if ($active == "3") echo "active"; ?>" href="/pages/wards">Wards & Beds</a>
            </li>
        <?php } ?>
        <?php if (check_section_valid("Drugs")) { ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?php if ($active == "4") echo "active"; ?>" href="/pages/drugs">Drugs</a>
            </li>
        <?php } ?>
        <?php if (check_section_valid("Diagnostics")) { ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?php if ($active == "5") echo "active"; ?>" href="/pages/diagnose">Diagnostics & Treatments</a>
            </li>
        <?php } ?>
        <?php if (check_section_valid("Vendors")) { ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?php if ($active == "6") echo "active"; ?>" href="/pages/vendors">Vendors</a>
            </li>
        <?php } ?>
        <?php if (check_section_valid("Patient Care Unit")) { ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?php if ($active == "7") echo "active"; ?>" href="/pages/patient-care-unit">Patient Care Unit</a>
            </li>
        <?php } ?>
        <?php if (check_section_valid("Beds")) { ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?php if ($active == "8") echo "active"; ?>" href="/pages/beds">Beds</a>
            </li>
        <?php } ?>
        <?php if (check_section_valid("Attendance")) { ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?php if ($active == "9") echo "active"; ?>" href="/pages/attendance">Attendance & Work Hours</a>
            </li>
        <?php } ?>
    </ul>
</div>

<?php
if (!isset($_SESSION['id'])) {
    header('location: http://' . $_SERVER['HTTP_HOST'] . '/pages/login');
}

if (isset($_POST['user_logout'])) {
    session_destroy();

    header('location: http://' . $_SERVER['HTTP_HOST'] . '/pages/login');
}
?>