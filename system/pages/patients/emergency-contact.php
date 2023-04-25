<?php $active = "2";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "2";
include($_SERVER['DOCUMENT_ROOT'] . "/components/patient-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("patient_emergency_contact", "insert"); ?>">
        <h3 class="title">Add New Emergency Contact</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO patient_emergency_contact(patient_id, pec_first_name, pec_last_name, pec_relationship, pec_address, pec_contact_no) VALUES (
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
                    '<input class="input form-control" name="pec_first_name" type="text" value="John" placeholder="Contact's First Name" />',
                    '<input class="input form-control" name="pec_last_name" type="text" value="Smith" placeholder="Contact's Last Name" />',
                    '<input class="input form-control" name="pec_address" type="text" value="Sri Lanka" placeholder="Contact's Address" />',
                    '<input class="input form-control" name="pec_contact_no" type="text" value="0760000000" placeholder="Contact's Contact Number" />'
                    '<input class="input form-control" name="pec_relationship" type="text" value="Guardian" placeholder="Relationship to Patient" />',
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO patient_emergency_contact(patient_id, pec_first_name, pec_last_name, pec_address, pec_contact_no, pec_relationship) VALUES (
                            '" . $_POST['patient_id'] . "',
                            '" . $_POST['pec_first_name'] . "',
                            '" . $_POST['pec_last_name'] . "',
                            '" . $_POST['pec_address'] . "',
                            '" . $_POST['pec_contact_no'] . "',
                            '" . $_POST['pec_relationship'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("patient_emergency_contact", "select"); ?>">
        <h3 class="title">Get All Emergency Contacts</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM patients_emergency_contacts_view;
                </div>
                <input name="fetch_patients" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Emergency Contact ID</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Contact's First Name</th>
                        <th scope="col">Contact's Last Name</th>
                        <th scope="col">Contact's Address</th>
                        <th scope="col">Contact's Contact Number</th>
                        <th scope="col">Relationship to Patient</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patients'])) {

                        $sql = "SELECT * FROM patients_emergency_contacts_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["patient_emg_id"]; ?></td>
                                <td><?php echo $row["patient_id"]; ?></td>
                                <td><?php echo $row["pec_first_name"]; ?></td>
                                <td><?php echo $row["pec_last_name"]; ?></td>
                                <td><?php echo $row["pec_address"]; ?></td>
                                <td><?php echo $row["pec_contact_no"]; ?></td>
                                <td><?php echo $row["pec_relationship"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("patient_emergency_contact", "select"); ?>">
        <h3 class="title">Get Patient Emergency Contact</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM patient_emergency_contact WHERE patient_id="
                    <?php
                    $sql = "SELECT * FROM patients_emergency_contacts_view;";
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
                        <th scope="col">Emergency Contact ID</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Contact's First Name</th>
                        <th scope="col">Contact's Last Name</th>
                        <th scope="col">Contact's Address</th>
                        <th scope="col">Contact's Contact Number</th>
                        <th scope="col">Relationship to Patient</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patient'])) {

                        $sql = "SELECT * FROM patient_emergency_contact WHERE patient_id='" . $_POST['patient_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["patient_emg_id"]; ?></td>
                                <td><?php echo $row["patient_id"]; ?></td>
                                <td><?php echo $row["pec_first_name"]; ?></td>
                                <td><?php echo $row["pec_last_name"]; ?></td>
                                <td><?php echo $row["pec_address"]; ?></td>
                                <td><?php echo $row["pec_contact_no"]; ?></td>
                                <td><?php echo $row["pec_relationship"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("patient_emergency_contact", "update"); ?>">
        <h3 class="title">Update an Emergency Contact</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE patient_emergency_contact SET patient_id=
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
                    , pec_first_name=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="pec_first_name" type="text" value="John" placeholder="Contact's First Name" />',
                </div>
                <span class="query">
                    , pec_last_name=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="pec_last_name" type="text" value="Smith" placeholder="Contact's Last Name" />',
                </div>
                <span class="query">
                    , pec_address=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="pec_address" type="text" value="Sri Lanka" placeholder="Patient ID" />'
                </div>
                <span class="query">
                    , pec_contact_no=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="pec_contact_no" type="text" value="0760000000" placeholder="Contact's Contact Number" />'
                </div>
                <span class="query">
                    , pec_relationship=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="pec_relationship" type="text" value="Guardian" placeholder="Relationship to Patient" />',
                </div>
                <span class="query">
                    WHERE patient_emg_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM patients_emergency_contacts_view;";
                    $name = "patient_emg_id";
                    $value = "1";
                    $column = "patient_emg_id";
                    $placeholder = "Emergency Contact ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_record'])) {

                    $sql = "UPDATE patient_emergency_contact SET 
                            patient_id= '" . $_POST['patient_id'] . "',
                            pec_first_name= '" . $_POST['pec_first_name'] . "',
                            pec_last_name= '" . $_POST['pec_last_name'] . "',
                            pec_address= '" . $_POST['pec_address'] . "',
                            pec_contact_no= '" . $_POST['pec_contact_no'] . "',
                            pec_relationship= '" . $_POST['pec_relationship'] . "'
                            WHERE patient_emg_id='" . $_POST['patient_emg_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("patient_emergency_contact", "delete"); ?>">
        <h3 class="title">Delete an Emergency Contact</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM patient_emergency_contact WHERE patient_emg_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM patients_emergency_contacts_view;";
                    $name = "patient_emg_id";
                    $value = "1";
                    $column = "patient_emg_id";
                    $placeholder = "Emergency Contact ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_patient" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_patient'])) {

                    $sql = "DELETE from patient_emergency_contact WHERE patient_emg_id='" . $_POST['patient_emg_id'] . "'";

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