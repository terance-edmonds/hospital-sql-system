<?php $active = "2";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "4";
include($_SERVER['DOCUMENT_ROOT'] . "/components/patient-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("patient_visit", "insert"); ?>">
        <h3 class="title">Add New Patient Visit Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO patient_visit(patient_id, nurse_id, weight, blood_pressure, pulse, temperature, symptoms, date_time) VALUES (
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM patients_view;";
                    $name = "patient_id";
                    $value = "1";
                    $column = "patient_id";
                    $placeholder = "Patient ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ',
                    '
                    <?php
                    $sql = "SELECT * FROM employee_medical_view WHERE role='Nurse';";
                    $name = "employee_id";
                    $value = "1";
                    $column = "employee_id";
                    $placeholder = "Employee ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ',
                    '<input class="input form-control" name="weight" type="text" value="50 Kg" placeholder="Weight" />',
                    '<input class="input form-control" name="blood_pressure" type="text" value="120" placeholder="Blood Pressure" />',
                    '<input class="input form-control" name="pulse" type="text" value="75" placeholder="Pulse (Per Minute)" />',
                    '<input class="input form-control" name="temperature" type="text" value="37 Celsius" placeholder="Temperature" />',
                    '<textarea class="input form-control" name="symptoms" type="text" placeholder="Symptoms" rows="1">Fever, Cough</textarea>'
                    '<input class="input form-control mx" name="date_time" type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s', time()); ?>" placeholder="Date & Time" />',
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO patient_visit(patient_id, nurse_id, weight, blood_pressure, pulse, temperature, symptoms, date_time) VALUES (
                            '" . $_POST['patient_id'] . "',
                            '" . $_POST['nurse_id'] . "',
                            '" . $_POST['weight'] . "',
                            '" . $_POST['blood_pressure'] . "',
                            '" . $_POST['pulse'] . "',
                            '" . $_POST['temperature'] . "',
                            '" . $_POST['symptoms'] . "',
                            '" . $_POST['date_time'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("patient_visit", "select"); ?>">
        <h3 class="title">Get All Patients Visits Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM patient_visit_view;
                </div>
                <input name="fetch_patients" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Patient Visit ID</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Nurse ID</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Blood Pressure</th>
                        <th scope="col">Pulse (Per Minute)</th>
                        <th scope="col">Temperature</th>
                        <th scope="col">Symptoms</th>
                        <th scope="col">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patients'])) {

                        $sql = "SELECT * FROM patient_visit_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["patient_visit_id"]; ?></td>
                                <td><?php echo $row["patient_id"]; ?></td>
                                <td><?php echo $row["nurse_id"]; ?></td>
                                <td><?php echo $row["weight"]; ?></td>
                                <td><?php echo $row["blood_pressure"]; ?></td>
                                <td><?php echo $row["pulse"]; ?></td>
                                <td><?php echo $row["temperature"]; ?></td>
                                <td><?php echo $row["symptoms"]; ?></td>
                                <td><?php echo $row["date_time"]; ?></td>
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
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("patient_visit", "select"); ?>">
        <h3 class="title">Get Patient Visits Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM patient_visit WHERE patient_id="
                    <?php
                    $sql = "SELECT * FROM patient_visit_view;";
                    $name = "patient_id";
                    $value = "1";
                    $column = "patient_id";
                    $placeholder = "Patient ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ";
                </div>
                <input name="fetch_patient" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>

        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Patient Visit ID</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Nurse ID</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Blood Pressure</th>
                        <th scope="col">Pulse (Per Minute)</th>
                        <th scope="col">Temperature</th>
                        <th scope="col">Symptoms</th>
                        <th scope="col">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patient'])) {

                        $sql = "SELECT * FROM patient_visit WHERE patient_id='" . $_POST['patient_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["patient_visit_id"]; ?></td>
                                <td><?php echo $row["patient_id"]; ?></td>
                                <td><?php echo $row["nurse_id"]; ?></td>
                                <td><?php echo $row["weight"]; ?></td>
                                <td><?php echo $row["blood_pressure"]; ?></td>
                                <td><?php echo $row["pulse"]; ?></td>
                                <td><?php echo $row["temperature"]; ?></td>
                                <td><?php echo $row["symptoms"]; ?></td>
                                <td><?php echo $row["date_time"]; ?></td>
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
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("patient_visit", "update"); ?>">
        <h3 class="title">Update Patient Visit Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE patient_visit SET patient_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM patients_view;";
                    $name = "patient_id";
                    $value = "1";
                    $column = "patient_id";
                    $placeholder = "Patient ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ',
                </div>
                <span class="query">
                    , nurse_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM employee_medical_view WHERE role='Nurse';";
                    $name = "employee_id";
                    $value = "1";
                    $column = "employee_id";
                    $placeholder = "Employee ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ',
                </div>
                <span class="query">
                    , weight=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="weight" type="text" value="50 Kg" placeholder="Weight" />'
                </div>
                <span class="query">
                    , blood_pressure=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="blood_pressure" type="text" value="120" placeholder="Blood Pressure" />',
                </div>
                <span class="query">
                    , pulse=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="pulse" type="text" value="75" placeholder="Pulse (Per Minute)" />',
                </div>
                <span class="query">
                    , temperature=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="temperature" type="text" value="37 Celsius" placeholder="Temperature" />',
                </div>
                <span class="query">
                    , symptoms=
                </span>
                <div class="row-inputs">
                    '<textarea class="input form-control" name="symptoms" type="text" placeholder="Symptoms" rows="1">Fever, Cough</textarea>'
                </div>
                <span class="query">
                    , date_time=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control mx" name="date_time" type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s', time()); ?>" placeholder="Date & Time" />',
                </div>
                <span class="query">
                    WHERE patient_visit_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM patient_visit_view;";
                    $name = "patient_visit_id";
                    $value = "1";
                    $column = "patient_visit_id";
                    $placeholder = "Patient Visit ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_record'])) {

                    $sql = "UPDATE patient_visit SET 
                            patient_id= '" . $_POST['patient_id'] . "',
                            nurse_id= '" . $_POST['nurse_id'] . "',
                            weight= '" . $_POST['weight'] . "',
                            blood_pressure= '" . $_POST['blood_pressure'] . "',
                            pulse= '" . $_POST['pulse'] . "',
                            temperature= '" . $_POST['temperature'] . "',
                            symptoms= '" . $_POST['symptoms'] . "',
                            date_time= '" . $_POST['date_time'] . "'
                            WHERE patient_visit_id='" . $_POST['patient_visit_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("patient_visit", "delete"); ?>">
        <h3 class="title">Delete Patient Visit Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM patient_visit WHERE patient_visit_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM patient_visit_view;";
                    $name = "patient_visit_id";
                    $value = "1";
                    $column = "patient_visit_id";
                    $placeholder = "Patient Visit ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_patient" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_patient'])) {

                    $sql = "DELETE from patient_visit WHERE patient_visit_id='" . $_POST['patient_visit_id'] . "'";

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