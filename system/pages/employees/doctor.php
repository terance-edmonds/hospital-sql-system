<?php $active = "1";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "4";
include($_SERVER['DOCUMENT_ROOT'] . "/components/employee-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("doctor", "insert"); ?>">
        <h3 class="title">Add New Doctor Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO doctor(doctor_id, dea_no, specialty_area) VALUES (
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employees_view WHERE role='Doctor';";
                    $name = "employee_id";
                    $value = "1";
                    $column = "employee_id";
                    $placeholder = "Doctor ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                    '<input class="input form-control" name="dea_no" type="text" value="1" placeholder="DEA Number" />',
                    '<input class="input form-control" name="specialty_area" type="text" value="Heart Surgery" placeholder="Specialty Area" />'
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO doctor(doctor_id, dea_no, specialty_area) VALUES (
                            '" . $_POST['employee_id'] . "',
                            '" . $_POST['dea_no'] . "',
                            '" . $_POST['specialty_area'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("doctor", "select"); ?>">
        <h3 class="title">Get All Doctors Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM employee_doctor_view;
                </div>
                <input name="fetch_all" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Doctor ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">DEA Number</th>
                        <th scope="col">Specialty Area</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_all'])) {

                        $sql = "SELECT * FROM employee_doctor_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["doctor_id"]; ?></td>
                                <td><?php echo $row["employee_name"]; ?></td>
                                <td><?php echo $row["contact_number"]; ?></td>
                                <td><?php echo $row["dea_no"]; ?></td>
                                <td><?php echo $row["specialty_area"]; ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td>No data</td>
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

    <section class="section" data-active="<?php echo check_section_privilege("doctor", "select"); ?>">
        <h3 class="title">Get Doctor Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM employee_doctor_view WHERE doctor_id="
                    <?php
                    $sql = "SELECT * FROM employee_doctor_view;";
                    $name = "doctor_id";
                    $value = "1";
                    $column = "doctor_id";
                    $placeholder = "Doctor ID";
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
                        <th scope="col">Doctor ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">DEA Number</th>
                        <th scope="col">Specialty Area</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_where'])) {

                        $sql = "SELECT * FROM employee_doctor_view WHERE doctor_id='" . $_POST['doctor_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["doctor_id"]; ?></td>
                                <td><?php echo $row["employee_name"]; ?></td>
                                <td><?php echo $row["contact_number"]; ?></td>
                                <td><?php echo $row["dea_no"]; ?></td>
                                <td><?php echo $row["specialty_area"]; ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td>No data</td>
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

    <section class="section" data-active="<?php echo check_section_privilege("doctor", "update"); ?>">
        <h3 class="title">Update Doctor Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE doctor SET dea_no=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="dea_no" type="text" value="1" placeholder="DEA Number" />'
                </div>
                <span class="query">
                    , specialty_area=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="specialty_area" type="text" value="Heart Surgery" placeholder="Specialty Area" />',
                </div>
                <span class="query">
                    WHERE doctor_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employee_doctor_view;";
                    $name = "doctor_id";
                    $value = "1";
                    $column = "doctor_id";
                    $placeholder = "Doctor ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_employee" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_employee'])) {

                    $sql = "UPDATE doctor SET 
                            dea_no= '" . $_POST['dea_no'] . "',
                            specialty_area= '" . $_POST['specialty_area'] . "'
                            WHERE doctor_id='" . $_POST['doctor_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("doctor", "delete"); ?>">
        <h3 class="title">Delete Doctor Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM doctor WHERE doctor_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employee_doctor_view;";
                    $name = "doctor_id";
                    $value = "1";
                    $column = "doctor_id";
                    $placeholder = "Doctor ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_record'])) {

                    $sql = "DELETE from doctor WHERE doctor_id='" . $_POST['doctor_id'] . "'";

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