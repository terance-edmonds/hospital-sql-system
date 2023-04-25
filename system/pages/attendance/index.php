<?php $active = "9";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "1";
include($_SERVER['DOCUMENT_ROOT'] . "/components/attendance-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("non_medical_attendance", "insert"); ?>">
        <h3 class="title">Add Non-Medical Staff Employee Attendance</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO non_medical_attendance(employee_id, hourly_charge_rate) VALUES (
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employee_nonmedical_view;";
                    $name = "employee_id";
                    $value = "1";
                    $column = "employee_id";
                    $placeholder = "Employee ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                    '<input class="input form-control" name="hourly_charge_rate" type="text" value="1" placeholder="Contract No" />'
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_employee_attendance" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_employee_attendance'])) {

                    $sql = "INSERT INTO non_medical_attendance(employee_id, hourly_charge_rate) VALUES (
                            '" . $_POST['employee_id'] . "',
                            '" . $_POST['hourly_charge_rate'] . "'
                            ); ";
                    $result = $conn->query($sql);

                    if ($result === TRUE) {
                        notify("success", "New record created");
                    } else {
                        notify("error", "New record creation failed");
                        console("Error: " . $sql . "<br>" . $conn->error);
                    }
                } ?>
            </div>
        </form>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("non_medical_attendance", "select"); ?>">
        <h3 class="title">Get All Non-Medical Staff Employees Attendance Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM employee_nonmedical_attendance_view;
                </div>
                <input name="fetch_all" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Non Medical Staff ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Hourly Rate Charge</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_all'])) {

                        $sql = "SELECT * FROM employee_nonmedical_attendance_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["employee_id"]; ?></td>
                                <td><?php echo $row["non_medical_staff_id"]; ?></td>
                                <td><?php echo $row["employee_name"]; ?></td>
                                <td><?php echo $row["hourly_charge_rate"]; ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td>No data</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("non_medical_attendance", "select"); ?>">
        <h3 class="title">Get Non-Medical Staff Employee Attendance Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM employee_nonmedical_attendance_view WHERE employee_id="
                    <?php
                    $sql = "SELECT * FROM employee_nonmedical_view;";
                    $name = "employee_id";
                    $value = "1";
                    $column = "employee_id";
                    $placeholder = "Employee ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ";
                </div>
                <input name="fetch_where" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>

        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Non Medical Staff ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Hourly Rate Charge</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_where'])) {

                        $sql = "SELECT * FROM employee_nonmedical_attendance_view WHERE employee_id='" . $_POST['employee_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["employee_id"]; ?></td>
                                <td><?php echo $row["non_medical_staff_id"]; ?></td>
                                <td><?php echo $row["employee_name"]; ?></td>
                                <td><?php echo $row["hourly_charge_rate"]; ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td>No data</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("non_medical_attendance", "update"); ?>">
        <h3 class="title">Update a Non-Medical Staff Employee Attendance Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE non_medical_attendance SET hourly_charge_rate=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="hourly_charge_rate" type="text" value="1" placeholder="Hourly Rate Charge" />'
                </div>
                <span class="query">
                    WHERE employee_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employee_nonmedical_view;";
                    $name = "employee_id";
                    $value = "1";
                    $column = "employee_id";
                    $placeholder = "Employee ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_employee" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_employee'])) {

                    $sql = "UPDATE non_medical_attendance SET 
                            hourly_charge_rate= '" . $_POST['hourly_charge_rate'] . "'
                            WHERE employee_id='" . $_POST['employee_id'] . "' ; ";

                    $result = $conn->query($sql);

                    if ($result === TRUE) {
                        notify("success", "Record updated");
                    } else {
                        notify("error", "Record update failed");
                        console("Error: " . $sql . "<br>" . $conn->error);
                    }
                } ?>
            </div>
        </form>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("non_medical_attendance", "delete"); ?>">
        <h3 class="title">Delete a Non-Medical Staff Employee Attendance Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM non_medical_attendance WHERE employee_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employee_nonmedical_view;";
                    $name = "employee_id";
                    $value = "1";
                    $column = "employee_id";
                    $placeholder = "Employee ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_record'])) {

                    $sql = "DELETE from non_medical_attendance WHERE employee_id='" . $_POST['employee_id'] . "'";

                    $result = $conn->query($sql);

                    if ($result === TRUE) {
                        notify("success", "Record deleted");
                    } else {
                        notify("error", "Record deletion failed");
                        console("Error: " . $sql . "<br>" . $conn->error);
                    }
                } ?>
            </div>
        </form>
    </section>
</div>

<script src="/js/script.js"></script>