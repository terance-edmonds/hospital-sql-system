<?php $active = "7";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "1";
include($_SERVER['DOCUMENT_ROOT'] . "/components/pcu-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("patient_care_unit", "insert"); ?>">
        <h3 class="title">Add New Patient Care Unit</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO patient_care_unit(employee_id, name, type) VALUES (
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employees_view;";
                    $name = "employee_id";
                    $value = "1";
                    $column = "employee_id";
                    $placeholder = "Employee ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ',
                    '<input class="input form-control" name="name" type="text" value="Patient Care Unit 1" placeholder="Patient Care Unit Name" />',
                    '
                    <select class="input form-select" name="type" value="Ward" placeholder="Patient Care Unit Type">
                        <option value="Ward" selected>Ward</option>
                        <option value="Diagnostic Unit">Diagnostic Unit</option>
                    </select>
                    '
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO patient_care_unit(employee_id, name, type) VALUES (
                            '" . $_POST['employee_id'] . "',
                            '" . $_POST['name'] . "',
                            '" . $_POST['type'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("patient_care_unit", "select"); ?>">
        <h3 class="title">Get All Patient Care Units Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM patient_care_unit_view;
                </div>
                <input name="fetch_all" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Patient Care Unit ID</th>
                        <th scope="col">Patient Care Unit Name</th>
                        <th scope="col">Patient Care Unit Type</th>
                        <th scope="col">Supervisor Employee ID</th>
                        <th scope="col">Supervisor Employee Name</th>
                        <th scope="col">Supervisor Employee Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_all'])) {

                        $sql = "SELECT * FROM patient_care_unit_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["patient_care_unit_id"]; ?></td>
                                <td><?php echo $row["patient_care_unit_name"]; ?></td>
                                <td><?php echo $row["patient_care_unit_type"]; ?></td>
                                <td><?php echo $row["employee_id"]; ?></td>
                                <td><?php echo $row["employee_name"]; ?></td>
                                <td><?php echo $row["employee_role"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("patient_care_unit", "select"); ?>">
        <h3 class="title">Get Patient Care Unit</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM patient_care_unit_view WHERE patient_care_unit_id="
                    <?php
                    $sql = "SELECT * FROM patient_care_unit_view;";
                    $name = "patient_care_unit_id";
                    $value = "1";
                    $column = "patient_care_unit_id";
                    $placeholder = "Patient Care Unit ID";
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
                        <th scope="col">Patient Care Unit ID</th>
                        <th scope="col">Patient Care Unit Name</th>
                        <th scope="col">Patient Care Unit Type</th>
                        <th scope="col">Supervisor Employee ID</th>
                        <th scope="col">Supervisor Employee Name</th>
                        <th scope="col">Supervisor Employee Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_where'])) {

                        $sql = "SELECT * FROM patient_care_unit_view WHERE patient_care_unit_id='" . $_POST['patient_care_unit_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["patient_care_unit_id"]; ?></td>
                                <td><?php echo $row["patient_care_unit_name"]; ?></td>
                                <td><?php echo $row["patient_care_unit_type"]; ?></td>
                                <td><?php echo $row["employee_id"]; ?></td>
                                <td><?php echo $row["employee_name"]; ?></td>
                                <td><?php echo $row["employee_role"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("patient_care_unit", "update"); ?>">
        <h3 class="title">Update Patient Care Unit</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE patient_care_unit SET employee_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employees_view;";
                    $name = "employee_id";
                    $value = "1";
                    $column = "employee_id";
                    $placeholder = "Employee ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    , name=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="name" type="text" value="Patient Care Unit 1" placeholder="Patient Care Unit Name" />'
                </div>
                <span class="query">
                    , type=
                </span>
                <div class="row-inputs">
                    '
                    <select class="input form-select" name="type" value="Ward" placeholder="Patient Care Unit Type">
                        <option value="Ward" selected>Ward</option>
                        <option value="Diagnostic Unit">Diagnostic Unit</option>
                    </select>
                    '
                </div>
                <span class="query">
                    WHERE patient_care_unit_id=
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
                    ;
                </span>
                <input name="update_employee" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_employee'])) {

                    $sql = "UPDATE patient_care_unit SET 
                            employee_id= '" . $_POST['employee_id'] . "',
                            name= '" . $_POST['name'] . "',
                            type= '" . $_POST['type'] . "'
                            WHERE patient_care_unit_id='" . $_POST['patient_care_unit_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("patient_care_unit", "delete"); ?>">
        <h3 class="title">Delete Patient Care Unit</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM patient_care_unit WHERE patient_care_unit_id=
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
                    ;
                </span>
                <input name="delete_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_record'])) {

                    $sql = "DELETE from patient_care_unit WHERE patient_care_unit_id='" . $_POST['patient_care_unit_id'] . "'";

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