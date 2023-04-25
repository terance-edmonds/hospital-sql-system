<?php $active = "2";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "5";
include($_SERVER['DOCUMENT_ROOT'] . "/components/patient-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("patient_admit", "insert"); ?>">
        <h3 class="title">Add New Patient Admit Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO patient_admit(patient_id, ward_id, doctor_id, admit_datetime) VALUES (
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
                    $sql = "SELECT * FROM ward_view;";
                    $name = "ward_id";
                    $value = "1";
                    $column = "ward_id";
                    $placeholder = "Ward ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ',
                    '
                    <?php
                    $sql = "SELECT * FROM doctor_view;";
                    $name = "doctor_id";
                    $value = "1";
                    $column = "doctor_id";
                    $placeholder = "Doctor ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ',
                    '<input class="input form-control mx" name="admit_datetime" type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s', time()); ?>" placeholder="Date & Time" />'
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO patient_admit(patient_id, ward_id, doctor_id, admit_datetime) VALUES (
                            '" . $_POST['patient_id'] . "',
                            '" . $_POST['ward_id'] . "',
                            '" . $_POST['doctor_id'] . "',
                            '" . $_POST['admit_datetime'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("patient_admit", "select"); ?>">
        <h3 class="title">Get All Patients Admit Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM patient_admit_view;
                </div>
                <input name="fetch_patients" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Patient Admit ID</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Ward ID</th>
                        <th scope="col">Doctor ID</th>
                        <th scope="col">Admit Date & Time</th>
                        <th scope="col">Discharged Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patients'])) {

                        $sql = "SELECT * FROM patient_admit_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["patient_admit_id"]; ?></td>
                                <td><?php echo $row["patient_id"]; ?></td>
                                <td><?php echo $row["patient_name"]; ?></td>
                                <td><?php echo $row["ward_id"]; ?></td>
                                <td><?php echo $row["doctor_id"]; ?></td>
                                <td><?php echo $row["admit_datetime"]; ?></td>
                                <td><?php echo $row["discharged_datetime"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("patient_admit", "select"); ?>">
        <h3 class="title">Get Patient Admit Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM patient_admit_view WHERE patient_id="<input class="input form-control" name="patient_id" type="text" value="1" placeholder="Patient Admit ID" />";
                </div>
                <input name="fetch_patient" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>

        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Patient Admit ID</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Ward ID</th>
                        <th scope="col">Doctor ID</th>
                        <th scope="col">Admit Date & Time</th>
                        <th scope="col">Discharged Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patient'])) {

                        $sql = "SELECT * FROM patient_admit_view WHERE patient_id='" . $_POST['patient_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["patient_admit_id"]; ?></td>
                                <td><?php echo $row["patient_id"]; ?></td>
                                <td><?php echo $row["patient_name"]; ?></td>
                                <td><?php echo $row["ward_id"]; ?></td>
                                <td><?php echo $row["doctor_id"]; ?></td>
                                <td><?php echo $row["admit_datetime"]; ?></td>
                                <td><?php echo $row["discharged_datetime"]; ?></td>
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
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("patient_admit", "update"); ?>">
        <h3 class="title">Update Patient Admit Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE patient_admit SET patient_id=
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
                    '
                </div>
                <span class="query">
                    , ward_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM ward_view;";
                    $name = "ward_id";
                    $value = "1";
                    $column = "ward_id";
                    $placeholder = "Ward ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    , doctor_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM doctor_view;";
                    $name = "doctor_id";
                    $value = "1";
                    $column = "doctor_id";
                    $placeholder = "Doctor ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    , admit_datetime=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control mx" name="admit_datetime" type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s', time()); ?>" placeholder="Admit Date & Time" />'
                </div>
                <span class="query">
                    , discharged_datetime=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control mx" name="discharged_datetime" type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s', time()); ?>" placeholder="Discharged Date & Time" />'
                </div>
                <span class="query">
                    WHERE patient_admit_id=
                </span>
                <div class="row-inputs">
                    '
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
                    ;
                </span>
                <input name="update_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_record'])) {

                    $sql = "UPDATE patient_admit SET 
                            patient_id= '" . $_POST['patient_id'] . "',
                            ward_id= '" . $_POST['ward_id'] . "',
                            doctor_id= '" . $_POST['doctor_id'] . "',
                            admit_datetime= '" . $_POST['admit_datetime'] . "',
                            discharged_datetime= '" . $_POST['discharged_datetime'] . "'
                            WHERE patient_admit_id='" . $_POST['patient_admit_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("patient_admit", "delete"); ?>">
        <h3 class="title">Delete Patient Admit Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM patient_admit WHERE patient_admit_id=
                </span>
                <div class="row-inputs">
                    '
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
                    ;
                </span>
                <input name="delete_patient" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_patient'])) {

                    $sql = "DELETE from patient_admit WHERE patient_admit_id='" . $_POST['patient_admit_id'] . "'";

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