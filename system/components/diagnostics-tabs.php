<div class="tabs">
    <ul class="nav nav-pills justify-content-end">
        <li class="nav-item">
            <a class="nav-link <?php if ($active == "1") echo "active"; ?>" aria-current="page" href="/pages/diagnose">Diagnostics</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($active == "2") echo "active"; ?>" aria-current="page" href="/pages/diagnose/treatment.php">Treatment</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($active == "3") echo "active"; ?>" aria-current="page" href="/pages/diagnose/drug.php">Drug Treatment</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($active == "4") echo "active"; ?>" aria-current="page" href="/pages/diagnose/test.php">Test Treatment</a>
        </li>
    </ul>
</div>