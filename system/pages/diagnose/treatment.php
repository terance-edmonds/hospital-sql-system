<?php $active = "5";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "2";
include($_SERVER['DOCUMENT_ROOT'] . "/components/diagnostics-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("treatment", "insert"); ?>" >
        <h3 class="title">Add New Treatment Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO treatment(doctor_id, patient_id, type, date_time) VALUES (
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
                    ',
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
                    <select class="input form-select" name="type" value="Diagnostic Test" placeholder="Type">
                        <option value="Diagnostic Test" selected>Diagnostic Test</option>
                        <option value="Lipid Profiler">Lipid Profiler</option>
                        <option value="CBC">CBC</option>
                        <option value="Liver function Tests">Liver Function Tests</option>
                        <option value="MRI">MRI</option>
                        <option value="X-rays">X-rays</option>
                    </select>
                    ',
                    '<input class="input form-control mx" name="date_time" type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s', time()); ?>" placeholder="Date & Time" />'
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO treatment(doctor_id, patient_id, type, date_time) VALUES (
                            '" . $_POST['doctor_id'] . "',
                            '" . $_POST['patient_id'] . "',
                            '" . $_POST['type'] . "',
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

    <section class="section" data-active="<?php echo check_section_privilege("treatment", "select"); ?>">
        <h3 class="title">Get All Treatment Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM treatment_view;
                </div>
                <input name="fetch_all" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Treatment ID</th>
                        <th scope="col">Doctor ID</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_all'])) {

                        $sql = "SELECT * FROM treatment_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["treatment_id"]; ?></td>
                                <td><?php echo $row["doctor_id"]; ?></td>
                                <td><?php echo $row["patient_id"]; ?></td>
                                <td><?php echo $row["type"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("treatment", "select"); ?>">
        <h3 class="title">Get Patient Treatment Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM treatment_view WHERE patient_id="
                    <?php
                    $sql = "SELECT * FROM treatment_view GROUP BY patient_id;";
                    $name = "patient_id";
                    $value = "1";
                    $column = "patient_id";
                    $placeholder = "Patient ID";
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
                        <th scope="col">Treatment ID</th>
                        <th scope="col">Doctor ID</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_where'])) {

                        $sql = "SELECT * FROM treatment_view WHERE patient_id='" . $_POST['patient_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["treatment_id"]; ?></td>
                                <td><?php echo $row["doctor_id"]; ?></td>
                                <td><?php echo $row["patient_id"]; ?></td>
                                <td><?php echo $row["type"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("treatment", "update"); ?>">
        <h3 class="title">Update Treatment Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE treatment SET doctor_id=
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
                    , patient_id=
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
                    , type=
                </span>
                <div class="row-inputs">
                    '
                    <select class="input form-select" name="type" value="Diagnostic Test" placeholder="Type">
                        <option value="Diagnostic Test" selected>Diagnostic Test</option>
                        <option value="Lipid Profiler">Lipid Profiler</option>
                        <option value="CBC">CBC</option>
                        <option value="Liver function Tests">Liver Function Tests</option>
                        <option value="MRI">MRI</option>
                        <option value="X-rays">X-rays</option>
                    </select>
                    '
                </div>
                <span class="query">
                    , date_time=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control mx" name="date_time" type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s', time()); ?>" placeholder="Date & Time" />'
                </div>
                <span class="query">
                    WHERE treatment_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM treatment_view;";
                    $name = "treatment_id";
                    $value = "1";
                    $column = "treatment_id";
                    $placeholder = "Treatment ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_employee" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_employee'])) {

                    $sql = "UPDATE treatment SET 
                            doctor_id= '" . $_POST['doctor_id'] . "',
                            patient_id= '" . $_POST['patient_id'] . "',
                            type= '" . $_POST['type'] . "',
                            date_time= '" . $_POST['date_time'] . "'
                            WHERE treatment_id='" . $_POST['treatment_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("treatment", "delete"); ?>">
        <h3 class="title">Delete Treatment Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM treatment WHERE treatment_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM treatment_view;";
                    $name = "treatment_id";
                    $value = "1";
                    $column = "treatment_id";
                    $placeholder = "Treatment ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_record'])) {

                    $sql = "DELETE from treatment WHERE treatment_id='" . $_POST['treatment_id'] . "'";

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