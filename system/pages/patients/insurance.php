<?php $active = "2";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "3";
include($_SERVER['DOCUMENT_ROOT'] . "/components/patient-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("patient_insurance", "insert"); ?>">
        <h3 class="title">Add New Insurance</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO patient_insurance(patient_emg_id, company_name, branch, subscriber_first_name, subscriber_last_name, subscriber_relationship, subscriber_address, subscriber_contact_no) VALUES (
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
                    ',
                    '<input class="input form-control" name="company_name" type="text" value="Insurance" placeholder="Company Name" />',
                    '<input class="input form-control" name="branch" type="text" value="Colombo" placeholder="Branch Location" />',
                    '<input class="input form-control" name="subscriber_first_name" type="text" value="John" placeholder="Contact's First Name" />',
                    '<input class="input form-control" name="subscriber_last_name" type="text" value="Smith" placeholder="Contact's Last Name" />',
                    '<input class="input form-control" name="subscriber_address" type="text" value="Sri Lanka" placeholder="Contact's Address" />',
                    '<input class="input form-control" name="subscriber_contact_no" type="text" value="0760000000" placeholder="Contact's Contact Number" />'
                    '<input class="input form-control" name="subscriber_relationship" type="text" value="Guardian" placeholder="Relationship to Patient" />',
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO patient_insurance(patient_emg_id, company_name, branch, subscriber_first_name, subscriber_last_name, subscriber_address, subscriber_contact_no, subscriber_relationship) VALUES (
                            '" . $_POST['patient_emg_id'] . "',
                            '" . $_POST['company_name'] . "',
                            '" . $_POST['branch'] . "',
                            '" . $_POST['subscriber_first_name'] . "',
                            '" . $_POST['subscriber_last_name'] . "',
                            '" . $_POST['subscriber_address'] . "',
                            '" . $_POST['subscriber_contact_no'] . "',
                            '" . $_POST['subscriber_relationship'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("patient_insurance", "select"); ?>">
        <h3 class="title">Get All Insurances</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM patient_insurance_view;
                </div>
                <input name="fetch_patients" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Patient Insurance ID</th>
                        <th scope="col">Emergency Contact ID</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Subscriber's First Name</th>
                        <th scope="col">Subscriber's Last Name</th>
                        <th scope="col">Subscriber's Address</th>
                        <th scope="col">Subscriber's Contact Number</th>
                        <th scope="col">Relationship to Patient</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patients'])) {

                        $sql = "SELECT * FROM patient_insurance_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["patient_insurance_id"]; ?></td>
                                <td><?php echo $row["patient_emg_id"]; ?></td>
                                <td><?php echo $row["patient_id"]; ?></td>
                                <td><?php echo $row["company_name"]; ?></td>
                                <td><?php echo $row["branch"]; ?></td>
                                <td><?php echo $row["subscriber_first_name"]; ?></td>
                                <td><?php echo $row["subscriber_last_name"]; ?></td>
                                <td><?php echo $row["subscriber_address"]; ?></td>
                                <td><?php echo $row["subscriber_contact_no"]; ?></td>
                                <td><?php echo $row["subscriber_relationship"]; ?></td>
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
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("patient_insurance", "select"); ?>">
        <h3 class="title">Get Patient Insurance</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM patient_insurance WHERE patient_id="
                    <?php
                    $sql = "SELECT * FROM patient_insurance_view;";
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
                        <th scope="col">Patient Insurance ID</th>
                        <th scope="col">Emergency Contact ID</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Subscriber's First Name</th>
                        <th scope="col">Subscriber's Last Name</th>
                        <th scope="col">Subscriber's Address</th>
                        <th scope="col">Subscriber's Contact Number</th>
                        <th scope="col">Relationship to Patient</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patient'])) {

                        $sql = "SELECT * FROM patient_insurance_view WHERE patient_id='" . $_POST['patient_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["patient_insurance_id"]; ?></td>
                                <td><?php echo $row["patient_emg_id"]; ?></td>
                                <td><?php echo $row["patient_id"]; ?></td>
                                <td><?php echo $row["company_name"]; ?></td>
                                <td><?php echo $row["branch"]; ?></td>
                                <td><?php echo $row["subscriber_first_name"]; ?></td>
                                <td><?php echo $row["subscriber_last_name"]; ?></td>
                                <td><?php echo $row["subscriber_address"]; ?></td>
                                <td><?php echo $row["subscriber_contact_no"]; ?></td>
                                <td><?php echo $row["subscriber_relationship"]; ?></td>
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
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("patient_insurance", "update"); ?>">
        <h3 class="title">Update Patient Insurance Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE patient_insurance SET patient_emg_id=
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
                    , company_name=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="company_name" type="text" value="Insurance" placeholder="Company" />',
                </div>
                <span class="query">
                    , branch=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="branch" type="text" value="Colombo" placeholder="Branch" />',
                </div>
                <span class="query">
                    , subscriber_first_name=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="subscriber_first_name" type="text" value="John" placeholder="Contact's First Name" />',
                </div>
                <span class="query">
                    , subscriber_last_name=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="subscriber_last_name" type="text" value="Smith" placeholder="Contact's Last Name" />',
                </div>
                <span class="query">
                    , subscriber_address=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="subscriber_address" type="text" value="Sri Lanka" placeholder="Patient ID" />'
                </div>
                <span class="query">
                    , subscriber_contact_no=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="subscriber_contact_no" type="text" value="0760000000" placeholder="Contact's Contact Number" />'
                </div>
                <span class="query">
                    , subscriber_relationship=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="subscriber_relationship" type="text" value="Guardian" placeholder="Relationship to Patient" />',
                </div>
                <span class="query">
                    WHERE patient_insurance_id=
                </span>
                <div class="row-inputs">
                    '<?php
                        $sql = "SELECT * FROM patient_insurance_view;";
                        $name = "patient_insurance_id";
                        $value = "1";
                        $column = "patient_insurance_id";
                        $placeholder = "Insurance ID";
                        include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>'
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_record'])) {

                    $sql = "UPDATE patient_insurance SET 
                            patient_emg_id= '" . $_POST['patient_emg_id'] . "',
                            company_name= '" . $_POST['company_name'] . "',
                            branch= '" . $_POST['branch'] . "',
                            subscriber_first_name= '" . $_POST['subscriber_first_name'] . "',
                            subscriber_last_name= '" . $_POST['subscriber_last_name'] . "',
                            subscriber_address= '" . $_POST['subscriber_address'] . "',
                            subscriber_contact_no= '" . $_POST['subscriber_contact_no'] . "',
                            subscriber_relationship= '" . $_POST['subscriber_relationship'] . "'
                            WHERE patient_insurance_id='" . $_POST['patient_insurance_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("patient_insurance", "delete"); ?>">
        <h3 class="title">Delete an Emergency Contact</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM patient_insurance WHERE patient_insurance_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                        $sql = "SELECT * FROM patient_insurance_view;";
                        $name = "patient_insurance_id";
                        $value = "1";
                        $column = "patient_insurance_id";
                        $placeholder = "Insurance ID";
                        include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                        '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_patient" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_patient'])) {

                    $sql = "DELETE from patient_insurance WHERE patient_insurance_id='" . $_POST['patient_insurance_id'] . "'";

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