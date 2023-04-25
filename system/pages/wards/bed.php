<?php $active = "3";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "2";
include($_SERVER['DOCUMENT_ROOT'] . "/components/wards-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("ward_patient_bed", "insert"); ?>">
        <h3 class="title">Add New Ward Patient's Bed Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO ward_patient_bed(ward_bed_id, patient_id) VALUES (
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM ward_bed_view;";
                    $name = "ward_bed_id";
                    $value = "1";
                    $column = "ward_bed_id";
                    $placeholder = "Ward ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ',
                </div>
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
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO ward_patient_bed(ward_bed_id, patient_id) VALUES (
                            '" . $_POST['ward_bed_id'] . "',
                            '" . $_POST['patient_id'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("ward_patient_bed", "select"); ?>">
        <h3 class="title">Get All Wards Patients Beds Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM ward_patient_bed_view;
                </div>
                <input name="fetch_employees" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Ward Patient Bed ID</th>
                        <th scope="col">Ward Bed ID</th>
                        <th scope="col">Ward ID</th>
                        <th scope="col">Ward Name</th>
                        <th scope="col">Bed Code</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Patient Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_employees'])) {

                        $sql = "SELECT * FROM ward_patient_bed_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["ward_patient_bed_id"]; ?></td>
                                <td><?php echo $row["ward_bed_id"]; ?></td>
                                <td><?php echo $row["ward_id"]; ?></td>
                                <td><?php echo $row["ward_name"]; ?></td>
                                <td><?php echo $row["bed_code"]; ?></td>
                                <td><?php echo $row["patient_id"]; ?></td>
                                <td><?php echo $row["patient_name"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("ward_patient_bed", "select"); ?>">
        <h3 class="title">Get Ward Patient Bed Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM ward_patient_bed_view WHERE ward_bed_id="
                    <?php
                    $sql = "SELECT * FROM ward_patient_bed_view GROUP BY ward_bed_id;";
                    $name = "ward_bed_id";
                    $value = "1";
                    $column = "ward_bed_id";
                    $placeholder = "Ward ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ";
                </div>
                <input name="fetch_staff_employee" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>

        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Ward Patient Bed ID</th>
                        <th scope="col">Ward Bed ID</th>
                        <th scope="col">Ward ID</th>
                        <th scope="col">Ward Name</th>
                        <th scope="col">Bed Code</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Patient Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_staff_employee'])) {

                        $sql = "SELECT * FROM ward_patient_bed_view WHERE ward_bed_id='" . $_POST['ward_bed_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["ward_patient_bed_id"]; ?></td>
                                <td><?php echo $row["ward_bed_id"]; ?></td>
                                <td><?php echo $row["ward_id"]; ?></td>
                                <td><?php echo $row["ward_name"]; ?></td>
                                <td><?php echo $row["bed_code"]; ?></td>
                                <td><?php echo $row["patient_id"]; ?></td>
                                <td><?php echo $row["patient_name"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("ward_patient_bed", "update"); ?>">
        <h3 class="title">Update Ward Patient Bed Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE ward_patient_bed SET ward_bed_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM ward_bed_view;";
                    $name = "ward_bed_id";
                    $value = "1";
                    $column = "ward_bed_id";
                    $placeholder = "Ward ID";
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
                    WHERE ward_patient_bed_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM ward_patient_bed_view;";
                    $name = "ward_patient_bed_id";
                    $value = "1";
                    $column = "ward_patient_bed_id";
                    $placeholder = "Ward Patient Bed ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_employee" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_employee'])) {

                    $sql = "UPDATE ward_patient_bed SET 
                            ward_bed_id= '" . $_POST['ward_bed_id'] . "',
                            patient_id= '" . $_POST['patient_id'] . "'
                            WHERE ward_patient_bed_id='" . $_POST['ward_patient_bed_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("ward_patient_bed", "delete"); ?>">
        <h3 class="title">Delete Ward Patient Bed Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM ward_patient_bed WHERE bed_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM ward_patient_bed_view;";
                    $name = "ward_patient_bed_id";
                    $value = "1";
                    $column = "ward_patient_bed_id";
                    $placeholder = "Ward Patient Bed ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_record'])) {

                    $sql = "DELETE from ward_patient_bed WHERE ward_patient_bed_id='" . $_POST['ward_patient_bed_id'] . "'";

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