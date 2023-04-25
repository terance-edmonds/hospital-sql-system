<?php $active = "2";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "6";
include($_SERVER['DOCUMENT_ROOT'] . "/components/patient-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("patient_diagnose", "insert"); ?>">
        <h3 class="title">Add New Patient Diagnose</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO patient_diagnose(patient_admit_id, diagnose_id, date_time, description) VALUES (
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM patient_admit_view;";
                    $name = "patient_admit_id";
                    $value = "1";
                    $column = "patient_admit_id";
                    $display_column = "name";
                    $placeholder = "Patient Admit ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ',
                    '
                    <?php
                    $sql = "SELECT * FROM diagnose_view;";
                    $name = "diagnose_id";
                    $value = "1";
                    $column = "diagnose_id";
                    $display_column = "name";
                    $placeholder = "Diagnose ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ',
                    '<input class="input form-control mx" name="date_time" type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s', time()); ?>" placeholder="Date & Time" />',
                    '<textarea class="input form-control" name="description" type="text" placeholder="description" rows="1">Assign to a Private Ward</textarea>'
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO patient_diagnose(patient_admit_id, diagnose_id, date_time, description) VALUES (
                            '" . $_POST['patient_admit_id'] . "',
                            '" . $_POST['diagnose_id'] . "',
                            '" . $_POST['date_time'] . "',
                            '" . $_POST['description'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("patient_diagnose", "select"); ?>">
        <h3 class="title">Get All Patients Diagnose</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM patient_diagnose_view;
                </div>
                <input name="fetch_patients" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Patient Diagnose ID</th>
                        <th scope="col">Patient Admit ID</th>
                        <th scope="col">Diagnosis ID</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patients'])) {

                        $sql = "SELECT * FROM patient_diagnose_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["patient_diagnose_id"]; ?></td>
                                <td><?php echo $row["patient_admit_id"]; ?></td>
                                <td><?php echo $row["diagnose_id"]; ?></td>
                                <td><?php echo $row["description"]; ?></td>
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
                        </tr>
                    <?php } ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("patient_diagnose", "select"); ?>">
        <h3 class="title">Get Admit Patient Diagnosis</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM patient_diagnose WHERE patient_admit_id="<input class="input form-control" name="patient_admit_id" type="text" value="1" placeholder="Patient Admit ID" />";
                </div>
                <input name="fetch_patient" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>

        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Patient Diagnose ID</th>
                        <th scope="col">Patient Admit ID</th>
                        <th scope="col">Diagnosis ID</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patient'])) {

                        $sql = "SELECT * FROM patient_diagnose WHERE patient_admit_id='" . $_POST['patient_admit_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["patient_diagnose_id"]; ?></td>
                                <td><?php echo $row["patient_admit_id"]; ?></td>
                                <td><?php echo $row["diagnose_id"]; ?></td>
                                <td><?php echo $row["description"]; ?></td>
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
                        </tr>
                    <?php } ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("patient_diagnose", "update"); ?>">
        <h3 class="title">Update Patient Diagnose</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE patient_diagnose SET patient_admit_id=
                </span>
                <div class="row-inputs">
                    ''
                    <?php
                    $sql = "SELECT * FROM patient_admit_view;";
                    $name = "patient_admit_id";
                    $value = "1";
                    $column = "patient_admit_id";
                    $placeholder = "Patient Admit ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    , diagnose_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM diagnose_view;";
                    $name = "diagnose_id";
                    $value = "1";
                    $column = "diagnose_id";
                    $placeholder = "Diagnose ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    , description=
                </span>
                <div class="row-inputs">
                    '<textarea class="input form-control" name="description" type="text" placeholder="description" rows="1">Assign to a Private Ward</textarea>'
                </div>
                <span class="query">
                    , date_time=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control mx" name="date_time" type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s', time()); ?>" placeholder="Date & Time" />'
                </div>
                <span class="query">
                    WHERE patient_diagnose_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM patient_diagnose_view;";
                    $name = "patient_diagnose_id";
                    $value = "1";
                    $column = "patient_diagnose_id";
                    $placeholder = "Patient Diagnose ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_record'])) {

                    $sql = "UPDATE patient_diagnose SET 
                            patient_admit_id= '" . $_POST['patient_admit_id'] . "',
                            diagnose_id= '" . $_POST['diagnose_id'] . "',
                            description= '" . $_POST['description'] . "',
                            date_time= '" . $_POST['date_time'] . "'
                            WHERE patient_diagnose_id='" . $_POST['patient_diagnose_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("patient_diagnose", "delete"); ?>">
        <h3 class="title">Delete Patient Diagnose</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM patient_diagnose WHERE patient_diagnose_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM patient_diagnose_view;";
                    $name = "patient_diagnose_id";
                    $value = "1";
                    $column = "patient_diagnose_id";
                    $placeholder = "Patient Diagnose ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_patient" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_patient'])) {

                    $sql = "DELETE from patient_diagnose WHERE patient_diagnose_id='" . $_POST['patient_diagnose_id'] . "'";

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