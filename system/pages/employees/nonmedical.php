<?php $active = "1";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "3";
include($_SERVER['DOCUMENT_ROOT'] . "/components/employee-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("non_medical_staff", "insert"); ?>">
        <h3 class="title">Add Non-Medical Staff Employee Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO non_medical_staff(employee_id, contract_no, start_date, end_date) VALUES (
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
                    '<input class="input form-control" name="contract_no" type="text" value="1" placeholder="Contract No" />',
                    '<input class="input form-control" name="start_date" type="date" value="<?php echo Date('Y-m-d'); ?>" placeholder="Start Date" />',
                    '<input class="input form-control" name="end_date" type="date" value="<?php echo Date('Y-m-d'); ?>" placeholder="End Date" />'
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO non_medical_staff(employee_id, contract_no, start_date, end_date) VALUES (
                            '" . $_POST['employee_id'] . "',
                            '" . $_POST['contract_no'] . "',
                            '" . $_POST['start_date'] . "',
                            '" . $_POST['end_date'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("non_medical_staff", "select"); ?>">
        <h3 class="title">Get All Non-Medical Staff Employees Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM employee_nonmedical_view;
                </div>
                <input name="fetch_all" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Non Medical Staff ID</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Contract No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Working Status</th>
                        <th scope="col">Role</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_all'])) {

                        $sql = "SELECT * FROM employee_nonmedical_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["non_medical_staff_id"]; ?></td>
                                <td><?php echo $row["employee_id"]; ?></td>
                                <td><?php echo $row["contract_no"]; ?></td>
                                <td><?php echo $row["employee_name"]; ?></td>
                                <td><?php echo $row["working_status"]; ?></td>
                                <td><?php echo $row["role"]; ?></td>
                                <td><?php echo $row["start_date"]; ?></td>
                                <td><?php echo $row["end_date"]; ?></td>
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
                            <td></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("non_medical_staff", "select"); ?>">
        <h3 class="title">Get Non-Medical Staff Employee Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM employee_nonmedical_view WHERE employee_id="
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
                        <th scope="col">Non Medical Staff ID</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Contract No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Working Status</th>
                        <th scope="col">Role</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_where'])) {

                        $sql = "SELECT * FROM employee_nonmedical_view WHERE employee_id='" . $_POST['employee_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["non_medical_staff_id"]; ?></td>
                                <td><?php echo $row["employee_id"]; ?></td>
                                <td><?php echo $row["contract_no"]; ?></td>
                                <td><?php echo $row["employee_name"]; ?></td>
                                <td><?php echo $row["working_status"]; ?></td>
                                <td><?php echo $row["role"]; ?></td>
                                <td><?php echo $row["start_date"]; ?></td>
                                <td><?php echo $row["end_date"]; ?></td>
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
                            <td></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("non_medical_staff", "update"); ?>">
        <h3 class="title">Update a Non-Medical Staff Employee Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE non_medical_staff SET employee_id=
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
                    , contract_no=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="contract_no" type="text" value="1" placeholder="Contract No" />',
                </div>
                <span class="query">
                    , start_date=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="start_date" type="date" value="<?php echo Date('Y-m-d'); ?>" placeholder="Start Date" />',
                </div>
                <span class="query">
                    , end_date=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="end_date" type="date" value="<?php echo Date('Y-m-d'); ?>" placeholder="End Date" />',
                </div>
                <span class="query">
                    WHERE non_medical_staff_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employee_nonmedical_view;";
                    $name = "non_medical_staff_id";
                    $value = "1";
                    $column = "non_medical_staff_id";
                    $placeholder = "Non Medical Staff ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_employee" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_employee'])) {

                    $sql = "UPDATE non_medical_staff SET 
                            non_medical_staff_id= '" . $_POST['non_medical_staff_id'] . "',
                            contract_no= '" . $_POST['contract_no'] . "',
                            start_date= '" . $_POST['start_date'] . "',
                            end_date= '" . $_POST['end_date'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("non_medical_staff", "delete"); ?>">
        <h3 class="title">Delete a Non-Medical Staff Employee Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM non_medical_staff WHERE employee_id=
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

                    $sql = "DELETE from non_medical_staff WHERE employee_id='" . $_POST['employee_id'] . "'";

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