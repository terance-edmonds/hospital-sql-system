<?php $active = "1";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "2";
include($_SERVER['DOCUMENT_ROOT'] . "/components/employee-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("medical_staff", "insert"); ?>">
        <h3 class="title">Add Medical Staff Employee Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO medical_staff(employee_id, mcr_number, joined_date, resigned_date) VALUES (
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employees_view WHERE category='Medical';";
                    $name = "employee_id";
                    $value = "1";
                    $column = "employee_id";
                    $placeholder = "Employee ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ',
                    '<input class="input form-control" name="mcr_number" type="text" value="000001" placeholder="MCR number" />',
                    '<input class="input form-control" name="joined_date" type="date" value="<?php echo Date('Y-m-d'); ?>" placeholder="Joined Date" />',
                    '<input class="input form-control" name="resigned_date" type="date" value="<?php echo Date('Y-m-d'); ?>" placeholder="Resigned Date" />'
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO medical_staff(employee_id, mcr_number, joined_date, resigned_date) VALUES (
                            '" . $_POST['employee_id'] . "',
                            '" . $_POST['mcr_number'] . "',
                            '" . $_POST['joined_date'] . "',
                            '" . $_POST['resigned_date'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("medical_staff", "select"); ?>">
        <h3 class="title">Get All Medical Staff Employees Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM employee_medical_view;
                </div>
                <input name="fetch_all" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Medical Staff ID</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">MCR Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Working Status</th>
                        <th scope="col">Joined Date</th>
                        <th scope="col">Resigned Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_all'])) {

                        $sql = "SELECT * FROM employee_medical_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["medical_staff_id"]; ?></td>
                                <td><?php echo $row["employee_id"]; ?></td>
                                <td><?php echo $row["mcr_number"]; ?></td>
                                <td><?php echo $row["employee_name"]; ?></td>
                                <td><?php echo $row["role"]; ?></td>
                                <td><?php echo $row["working_status"]; ?></td>
                                <td><?php echo $row["joined_date"]; ?></td>
                                <td><?php echo $row["resigned_date"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("medical_staff", "select"); ?>">
        <h3 class="title">Get Medical Staff Employee Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM employee_medical_view WHERE employee_id="
                    '
                    <?php
                    $sql = "SELECT * FROM employee_medical_view;";
                    $name = "employee_id";
                    $value = "1";
                    $column = "employee_id";
                    $placeholder = "Employee ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                    ";
                </div>
                <input name="fetch_where" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>

        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Medical Staff ID</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">MCR Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Working Status</th>
                        <th scope="col">Joined Date</th>
                        <th scope="col">Resigned Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_where'])) {

                        $sql = "SELECT * FROM employee_medical_view WHERE employee_id='" . $_POST['employee_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["medical_staff_id"]; ?></td>
                                <td><?php echo $row["employee_id"]; ?></td>
                                <td><?php echo $row["mcr_number"]; ?></td>
                                <td><?php echo $row["employee_name"]; ?></td>
                                <td><?php echo $row["role"]; ?></td>
                                <td><?php echo $row["working_status"]; ?></td>
                                <td><?php echo $row["joined_date"]; ?></td>
                                <td><?php echo $row["resigned_date"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("medical_staff", "update"); ?>">
        <h3 class="title">Update a Medical Staff Employee Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE medical_staff SET employee_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employees_view WHERE category='Medical';";
                    $name = "employee_id";
                    $value = "1";
                    $column = "employee_id";
                    $placeholder = "Employee ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    , mcr_number=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="mcr_number" type="text" value="000001" placeholder="MCR number" />',
                </div>
                <span class="query">
                    , joined_date=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="joined_date" type="date" value="<?php echo Date('Y-m-d'); ?>" placeholder="Joined Date" />',
                </div>
                <span class="query">
                    , resigned_date=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="resigned_date" type="date" value="<?php echo Date('Y-m-d'); ?>" placeholder="Resigned Date" />',
                </div>
                <span class="query">
                    WHERE medical_staff_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employee_medical_view;";
                    $name = "medical_staff_id";
                    $value = "1";
                    $column = "medical_staff_id";
                    $placeholder = "Medical Staff ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_employee" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_employee'])) {

                    $sql = "UPDATE medical_staff SET 
                            employee_id= '" . $_POST['employee_id'] . "',
                            mcr_number= '" . $_POST['mcr_number'] . "',
                            joined_date= '" . $_POST['joined_date'] . "',
                            resigned_date= '" . $_POST['resigned_date'] . "'
                            WHERE medical_staff_id='" . $_POST['medical_staff_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("medical_staff", "delete"); ?>">
        <h3 class="title">Delete a Medical Staff Employee Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM medical_staff WHERE employee_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employee_medical_view;";
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

                    $sql = "DELETE from medical_staff WHERE employee_id='" . $_POST['employee_id'] . "'";

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