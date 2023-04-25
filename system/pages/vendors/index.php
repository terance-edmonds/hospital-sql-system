<?php $active = "6";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "1";
include($_SERVER['DOCUMENT_ROOT'] . "/components/vendors-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("vendors", "insert"); ?>">
        <h3 class="title">Add New Vendor</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO vendors(vendor_name, vendor_address, vendor_contact_no, vendor_register_no) VALUES (
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="vendor_name" type="text" value="Med Care" placeholder="Vendor Name" />',
                    '<input class="input form-control" name="vendor_address" type="text" value="Colombo 7" placeholder="Vendor Address" />',
                    '<input class="input form-control" name="vendor_contact_no" type="text" value="0760000000" placeholder="Vendor Contact No" />',
                    '<input class="input form-control" name="vendor_register_no" type="text" value="1" placeholder="Vendor Registration No" />'
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO vendors(vendor_name, vendor_address, vendor_contact_no, vendor_register_no) VALUES (
                            '" . $_POST['vendor_name'] . "',
                            '" . $_POST['vendor_address'] . "',
                            '" . $_POST['vendor_contact_no'] . "',
                            '" . $_POST['vendor_register_no'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("vendors", "select"); ?>">
        <h3 class="title">Get All Vendors</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM vendors_view;
                </div>
                <input name="fetch_patients" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Vendor ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Registration Number</th>
                        <th scope="col">Contact Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patients'])) {

                        $sql = "SELECT * FROM vendors_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["vendor_id"]; ?></td>
                                <td><?php echo $row["vendor_name"]; ?></td>
                                <td><?php echo $row["vendor_address"]; ?></td>
                                <td><?php echo $row["vendor_register_no"]; ?></td>
                                <td><?php echo $row["vendor_contact_no"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("vendors", "select"); ?>">
        <h3 class="title">Get Admit Patient Diagnosis</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM vendors WHERE vendor_id="<input class="input form-control" name="vendor_id" type="text" value="1" placeholder="Vendor ID" />";
                </div>
                <input name="fetch_patient" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>

        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Vendor ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Registration Number</th>
                        <th scope="col">Contact Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patient'])) {

                        $sql = "SELECT * FROM vendors WHERE vendor_id='" . $_POST['vendor_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["vendor_id"]; ?></td>
                                <td><?php echo $row["vendor_name"]; ?></td>
                                <td><?php echo $row["vendor_address"]; ?></td>
                                <td><?php echo $row["vendor_register_no"]; ?></td>
                                <td><?php echo $row["vendor_contact_no"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("vendors", "update"); ?>">
        <h3 class="title">Update Vendor</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE vendors SET vendor_name=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="vendor_name" type="text" value="Med Care" placeholder="Vendor Name" />'
                </div>
                <span class="query">
                    , vendor_address=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="vendor_address" type="text" value="Colombo 7" placeholder="Vendor Address" />'
                </div>
                <span class="query">
                    , vendor_register_no=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="vendor_register_no" type="text" value="1" placeholder="Vendor Registration No" />'
                </div>
                <span class="query">
                    , vendor_contact_no=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="vendor_contact_no" type="text" value="0760000000" placeholder="Vendor Contact No" />'
                </div>
                <span class="query">
                    WHERE vendor_id=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="vendor_id" type="text" value="1" placeholder="Vendor ID" />'
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_record'])) {

                    $sql = "UPDATE vendors SET 
                            vendor_name= '" . $_POST['vendor_name'] . "',
                            vendor_address= '" . $_POST['vendor_address'] . "',
                            vendor_register_no= '" . $_POST['vendor_register_no'] . "',
                            vendor_contact_no= '" . $_POST['vendor_contact_no'] . "'
                            WHERE vendor_id='" . $_POST['vendor_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("vendors", "delete"); ?>">
        <h3 class="title">Delete Vendor</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM vendors_view WHERE vendor_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM vendors_view;";
                    $name = "vendor_id";
                    $value = "1";
                    $column = "vendor_id";
                    $placeholder = "Vendor ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_patient" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_patient'])) {

                    $sql = "DELETE from vendors WHERE vendor_id='" . $_POST['vendor_id'] . "'";

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