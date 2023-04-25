<div class="tabs">
    <ul class="nav nav-pills justify-content-end">
        <li class="nav-item">
            <a class="nav-link <?php if ($active == "1") echo "active"; ?>" aria-current="page" href="/pages/employees">Employees</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($active == "2") echo "active"; ?>" aria-current="page" href="/pages/employees/medical.php">Medical Staff</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($active == "3") echo "active"; ?>" aria-current="page" href="/pages/employees/nonmedical.php">Non Medical Staff</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($active == "4") echo "active"; ?>" aria-current="page" href="/pages/employees/doctor.php">Doctor</a>
        </li>
    </ul>
</div>