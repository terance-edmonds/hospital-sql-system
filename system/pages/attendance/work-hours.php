<?php $active = "9";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "2";
include($_SERVER['DOCUMENT_ROOT'] . "/components/attendance-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("employee_work_hours", "insert"); ?>" >
        <h3 class="title">Add Non-Medical Staff Employee Work Hours Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO employee_work_hours(employee_id, work_hours_per_week, patient_care_unit_id) VALUES (
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
                    ',
                    '<input class="input form-control" name="work_hours_per_week" type="text" value="40" placeholder="Work Hours Per Week" />',
                    '<input class="input form-control" name="patient_care_unit_id" type="text" value="1" placeholder="Patient Care Unit ID" />'
                    '
                    <?php
                    $sql = "SELECT * FROM patient_care_unit_view;";
                    $name = "patient_care_unit_id";
                    $value = "1";
                    $column = "patient_care_unit_id";
                    $placeholder = "Patient Care Unit ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO employee_work_hours(employee_id, work_hours_per_week, patient_care_unit_id) VALUES (
                            '" . $_POST['employee_id'] . "',
                            '" . $_POST['work_hours_per_week'] . "',
                            '" . $_POST['patient_care_unit_id'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("employee_work_hours", "select"); ?>" >
        <h3 class="title">Get All Non-Medical Staff Employees Work Hours Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM employee_work_hours_view;
                </div>
                <input name="fetch_all" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Work Hours ID</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Patient Care Unit ID</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Patient Care Unit Name</th>
                        <th scope="col">Work Hours Per Week</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_all'])) {

                        $sql = "SELECT * FROM employee_work_hours_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["work_hours_id"]; ?></td>
                                <td><?php echo $row["employee_id"]; ?></td>
                                <td><?php echo $row["patient_care_unit_id"]; ?></td>
                                <td><?php echo $row["employee_name"]; ?></td>
                                <td><?php echo $row["patient_care_unit_name"]; ?></td>
                                <td><?php echo $row["work_hours_per_week"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("employee_work_hours", "select"); ?>" >
        <h3 class="title">Get Non-Medical Staff Employee Work Hours Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM employee_work_hours_view WHERE employee_id="
                    <?php
                    $sql = "SELECT * FROM employee_work_hours_view;";
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
                        <th scope="col">Work Hours ID</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Patient Care Unit ID</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Patient Care Unit Name</th>
                        <th scope="col">Work Hours Per Week</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_where'])) {

                        $sql = "SELECT * FROM employee_work_hours_view WHERE employee_id='" . $_POST['employee_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["work_hours_id"]; ?></td>
                                <td><?php echo $row["employee_id"]; ?></td>
                                <td><?php echo $row["patient_care_unit_id"]; ?></td>
                                <td><?php echo $row["employee_name"]; ?></td>
                                <td><?php echo $row["patient_care_unit_name"]; ?></td>
                                <td><?php echo $row["work_hours_per_week"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("employee_work_hours", "update"); ?>">
        <h3 class="title">Update Non-Medical Staff Employee Work Hours Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE employee_work_hours SET employee_id=
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
                    , work_hours_per_week=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="work_hours_per_week" type="text" value="40" placeholder="Work Hours Per Week" />'
                </div>
                <span class="query">
                    , patient_care_unit_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM patient_care_unit_view;";
                    $name = "patient_care_unit_id";
                    $value = "1";
                    $column = "patient_care_unit_id";
                    $placeholder = "Patient Care Unit ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    WHERE work_hours_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employee_work_hours_view;";
                    $name = "work_hours_id";
                    $value = "1";
                    $column = "work_hours_id";
                    $placeholder = "Work Hours ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_employee" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_employee'])) {

                    $sql = "UPDATE employee_work_hours SET 
                            employee_id= '" . $_POST['employee_id'] . "',
                            patient_care_unit_id= '" . $_POST['patient_care_unit_id'] . "',
                            work_hours_per_week= '" . $_POST['work_hours_per_week'] . "'
                            WHERE work_hours_id='" . $_POST['work_hours_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("employee_work_hours", "delete"); ?>" >
        <h3 class="title">Delete Non-Medical Staff Employee Work Hours Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM employee_work_hours WHERE work_hours_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employee_work_hours_view;";
                    $name = "work_hours_id";
                    $value = "1";
                    $column = "work_hours_id";
                    $placeholder = "Work Hours ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_record'])) {

                    $sql = "DELETE from employee_work_hours WHERE work_hours_id='" . $_POST['work_hours_id'] . "'";

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