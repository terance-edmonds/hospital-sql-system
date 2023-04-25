<?php $active = "1";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "1";
include($_SERVER['DOCUMENT_ROOT'] . "/components/employee-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("employee", "insert"); ?>">
        <h3 class="title">Add New Employee</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO employee(employee_name, employee_address, working_status, contact_number, category, role) VALUES (
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="employee_name" type="text" value="John" placeholder="Employee Name" />',
                    '<input class="input form-control" name="employee_address" type="text" value="Sri Lanka" placeholder="Employee Address" />',
                    '
                    <select class="input form-select" name="working_status" value="Full Time" placeholder="Working Status">
                        <option value="Full Time" selected>Full Time</option>
                        <option value="Part Time">Part Time</option>
                    </select>
                    '
                    '<input class="input form-control" name="contact_number" type="text" value="0760000000" placeholder="Contact Number" />',
                    '
                    <select class="input form-select" name="category" value="Medical" placeholder="Category" onchange="handleOnEmployeeCategory(event, 'insert')">
                        <option value="Medical" selected>Medical</option>
                        <option value="Non Medical">Non Medical</option>
                    </select>
                    ',
                    '
                    <select id="insert-medical-roles" class="input form-select roles-drop-down" data-active="true" name="role" value="Doctor" placeholder="Role">
                        <option value="Doctor" selected>Doctor</option>
                        <option value="Nurse">Nurse</option>
                    </select>

                    <select id="insert-nonmedical-roles" class="input form-select roles-drop-down" data-active="false" name="role" value="Administrator" placeholder="Role" disabled>
                        <option value="Administrator" selected>Administrator</option>
                        <option value="Cleaner">Cleaner</option>
                    </select>
                    '
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO employee(employee_name, employee_address, working_status, contact_number, category, role) VALUES (
                            '" . $_POST['employee_name'] . "',
                            '" . $_POST['employee_address'] . "',
                            '" . $_POST['working_status'] . "',
                            '" . $_POST['contact_number'] . "',
                            '" . $_POST['category'] . "',
                            '" . $_POST['role'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("employee", "select"); ?>">
        <h3 class="title">Get All Employees</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM employees_view;
                </div>
                <input name="fetch_all" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Working Status</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Category</th>
                        <th scope="col">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_all'])) {

                        $sql = "SELECT * FROM employees_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["employee_id"]; ?></td>
                                <td><?php echo $row["employee_name"]; ?></td>
                                <td><?php echo $row["employee_address"]; ?></td>
                                <td><?php echo $row["working_status"]; ?></td>
                                <td><?php echo $row["contact_number"]; ?></td>
                                <td><?php echo $row["category"]; ?></td>
                                <td><?php echo $row["role"]; ?></td>
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
                        </tr>
                    <?php } ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("employee", "select"); ?>">
        <h3 class="title">Get Employee</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM employees WHERE employee_id="
                    <?php
                    $sql = "SELECT * FROM employees_view;";
                    $name = "employee_id";
                    $value = "1";
                    $column = "employee_id";
                    $placeholder = "Employee ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ";
                </div>
                <input name="fetch_employee" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>

        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Working Status</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Category</th>
                        <th scope="col">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_employee'])) {

                        $sql = "SELECT * FROM employee WHERE employee_id='" . $_POST['employee_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["employee_id"]; ?></td>
                                <td><?php echo $row["employee_name"]; ?></td>
                                <td><?php echo $row["employee_address"]; ?></td>
                                <td><?php echo $row["working_status"]; ?></td>
                                <td><?php echo $row["contact_number"]; ?></td>
                                <td><?php echo $row["category"]; ?></td>
                                <td><?php echo $row["role"]; ?></td>
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
                        </tr>
                    <?php } ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("employee", "update"); ?>">
        <h3 class="title">Update an Employee</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE employee SET employee_name=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="employee_name" type="text" value="John" placeholder="Employee Name" />'
                </div>
                <span class="query">
                    , employee_address=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="employee_address" type="text" value="Sri Lanka" placeholder="Employee Address" />',
                </div>
                <span class="query">
                    , working_status=
                </span>
                <div class="row-inputs">
                    '
                    <select class="input form-select" name="working_status" value="Full Time" placeholder="Working Status">
                        <option value="Full Time" selected>Full Time</option>
                        <option value="Part Time">Part Time</option>
                    </select>
                    ',
                </div>
                <span class="query">
                    , contact_number=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="contact_number" type="text" value="0760000000" placeholder="Contact Number" />',
                </div>
                <span class="query">
                    , category=
                </span>
                <div class="row-inputs">
                    '
                    <select class="input form-select" name="category" value="Medical" placeholder="Category" onchange="handleOnEmployeeCategory(event, 'update')">
                        <option value="Medical" selected>Medical</option>
                        <option value="Non Medical">Non Medical</option>
                    </select>
                    '
                </div>
                <span class="query">
                    , role=
                </span>
                <div class="row-inputs">
                    '
                    <select id="update-medical-roles" class="input form-select roles-drop-down" data-active="true" name="role" value="Doctor" placeholder="Role">
                        <option value="Doctor" selected>Doctor</option>
                        <option value="Nurse">Nurse</option>
                    </select>

                    <select id="update-nonmedical-roles" class="input form-select roles-drop-down" data-active="false" name="role" value="Administrator" placeholder="Role" disabled>
                        <option value="Administrator" selected>Administrator</option>
                        <option value="Cleaner">Cleaner</option>
                    </select>
                    '
                </div>
                <span class="query">
                    WHERE employee_id=
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
                    ;
                </span>
                <input name="update_employee" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_employee'])) {

                    $sql = "UPDATE employee SET 
                            employee_name= '" . $_POST['employee_name'] . "',
                            employee_address= '" . $_POST['employee_address'] . "',
                            working_status= '" . $_POST['working_status'] . "',
                            contact_number= '" . $_POST['contact_number'] . "',
                            category= '" . $_POST['category'] . "',
                            role= '" . $_POST['role'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("employee", "delete"); ?>">
        <h3 class="title">Delete an Employee</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM employee WHERE employee_id=
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
                    ;
                </span>
                <input name="delete_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_record'])) {

                    $sql = "DELETE from employee WHERE employee_id='" . $_POST['employee_id'] . "'";

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

<?php include($_SERVER['DOCUMENT_ROOT'] . '/layout/footer.php') ?>