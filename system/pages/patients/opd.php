<?php $active = "2";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "7";
include($_SERVER['DOCUMENT_ROOT'] . "/components/patient-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("patient_opd", "insert"); ?>">
        <h3 class="title">Add New Patient To OPD</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO patient_opd(patient_id, arrival_datetime) VALUES (
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM patients_view WHERE patient_type='Out Patient';";
                    $name = "patient_id";
                    $value = "1";
                    $column = "patient_id";
                    $placeholder = "Patient ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ',
                    '<input class="input form-control" name="arrival_datetime" type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s', time()); ?>" placeholder="Arrival Date & Time" />',
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO patient_opd(patient_id, arrival_datetime) VALUES (
                            '" . $_POST['patient_id'] . "',
                            '" . $_POST['arrival_datetime'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("patient_opd", "select"); ?>">
        <h3 class="title">Get All Patients of OPD</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM patient_opd_view;
                </div>
                <input name="fetch_patients" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Patient OPD ID</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Arrival Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patients'])) {

                        $sql = "SELECT * FROM patient_opd_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["patient_opd_id"]; ?></td>
                                <td><?php echo $row["patient_id"]; ?></td>
                                <td><?php echo $row["patient_name"]; ?></td>
                                <td><?php echo $row["arrival_datetime"]; ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td>No data</td>
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

    <section class="section" data-active="<?php echo check_section_privilege("patient_opd", "select"); ?>">
        <h3 class="title">Get OPD Patient</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM patient_opd_view WHERE patient_id="
                    <?php
                    $sql = "SELECT * FROM patient_opd_view;";
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
                        <th scope="col">Patient OPD ID</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Arrival Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patient'])) {

                        $sql = "SELECT * FROM patient_opd_view WHERE patient_id='" . $_POST['patient_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["patient_opd_id"]; ?></td>
                                <td><?php echo $row["patient_id"]; ?></td>
                                <td><?php echo $row["patient_name"]; ?></td>
                                <td><?php echo $row["arrival_datetime"]; ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td>No data</td>
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

    <section class="section" data-active="<?php echo check_section_privilege("patient_opd", "update"); ?>">
        <h3 class="title">Update OPD Patient</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE patient SET patient_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM patients_view WHERE patient_type='Out Patient';";
                    $name = "patient_id";
                    $value = "1";
                    $column = "patient_id";
                    $placeholder = "Patient ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    , arrival_datetime=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="arrival_datetime" type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s', time()); ?>" placeholder="Arrival Date & Time" />'
                </div>
                <span class="query">
                    WHERE patient_opd_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM patient_opd_view;";
                    $name = "patient_opd_id";
                    $value = "1";
                    $column = "patient_opd_id";
                    $placeholder = "Patient OPD ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_record'])) {

                    $sql = "UPDATE patient_opd SET 
                            patient_id= '" . $_POST['patient_id'] . "',
                            arrival_datetime= '" . $_POST['arrival_datetime'] . "'
                            WHERE patient_opd_id='" . $_POST['patient_opd_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("patient_opd", "delete"); ?>">
        <h3 class="title">Delete OPD Patient</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM patient WHERE patient_opd_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM patient_opd_view;";
                    $name = "patient_opd_id";
                    $value = "1";
                    $column = "patient_opd_id";
                    $placeholder = "Patient ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_patient" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_patient'])) {

                    $sql = "DELETE from patient WHERE patient_id='" . $_POST['patient_id'] . "'";

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