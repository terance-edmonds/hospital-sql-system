<?php $active = "6";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "2";
include($_SERVER['DOCUMENT_ROOT'] . "/components/vendors-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("vendors_drug", "insert"); ?>">
        <h3 class="title">Add New Vendor Drug Supply</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO vendors_drug(vendor_id, drug_id, quantity, supplied_date) VALUES (
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
                    ',
                    '
                    <?php
                    $sql = "SELECT * FROM drug_view;";
                    $name = "drug_id";
                    $value = "1";
                    $column = "drug_id";
                    $placeholder = "Drug ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ',
                    '<input class="input form-control" name="quantity" type="number" value="1" placeholder="Quantity" />',
                    '<input class="input form-control" name="supplied_date" type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="Supplied Date" />'
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO vendors_drug(vendor_id, drug_id, quantity, supplied_date) VALUES (
                            '" . $_POST['vendor_id'] . "',
                            '" . $_POST['drug_id'] . "',
                            '" . $_POST['quantity'] . "',
                            '" . $_POST['supplied_date'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("vendors_drug", "select"); ?>">
        <h3 class="title">Get All Vendors Drugs Supply</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM vendors_drug_view;
                </div>
                <input name="fetch_patients" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Vendor Drug ID</th>
                        <th scope="col">Vendor ID</th>
                        <th scope="col">Vendor Name</th>
                        <th scope="col">Drug ID</th>
                        <th scope="col">Drug Name</th>
                        <th scope="col">Drug Unit Cost ($)</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Cost ($)</th>
                        <th scope="col">Supplied Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patients'])) {

                        $sql = "SELECT * FROM vendors_drug_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["vendors_drug_id"]; ?></td>
                                <td><?php echo $row["vendor_id"]; ?></td>
                                <td><?php echo $row["vendor_name"]; ?></td>
                                <td><?php echo $row["drug_id"]; ?></td>
                                <td><?php echo $row["drug_name"]; ?></td>
                                <td><?php echo $row["drug_unit_cost"]; ?></td>
                                <td><?php echo $row["quantity"]; ?></td>
                                <td><?php echo $row["quantity"] * $row["drug_unit_cost"]; ?></td>
                                <td><?php echo $row["supplied_date"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("vendors_drug", "select"); ?>">
        <h3 class="title">Get Vendor Drugs Supply Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM vendors_drug_view WHERE vendor_id="
                    '
                    <?php
                    $sql = "SELECT * FROM vendors_drug_view GROUP BY vendor_id;";
                    $name = "vendor_id";
                    $value = "1";
                    $column = "vendor_id";
                    $placeholder = "Vendor ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                    ";
                </div>
                <input name="fetch_patient" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>

        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Vendor Drug ID</th>
                        <th scope="col">Vendor ID</th>
                        <th scope="col">Vendor Name</th>
                        <th scope="col">Drug ID</th>
                        <th scope="col">Drug Name</th>
                        <th scope="col">Drug Unit Cost ($)</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Cost ($)</th>
                        <th scope="col">Supplied Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_patient'])) {

                        $sql = "SELECT * FROM vendors_drug_view WHERE vendor_id='" . $_POST['vendor_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["vendors_drug_id"]; ?></td>
                                <td><?php echo $row["vendor_id"]; ?></td>
                                <td><?php echo $row["vendor_name"]; ?></td>
                                <td><?php echo $row["drug_id"]; ?></td>
                                <td><?php echo $row["drug_name"]; ?></td>
                                <td><?php echo $row["drug_unit_cost"]; ?></td>
                                <td><?php echo $row["quantity"]; ?></td>
                                <td><?php echo $row["quantity"] * $row["drug_unit_cost"]; ?></td>
                                <td><?php echo $row["supplied_date"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("vendors_drug", "update"); ?>">
        <h3 class="title">Update Vendor Drug Supply Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE vendors_drug SET vendor_id=
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
                    , drug_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM drug_view;";
                    $name = "drug_id";
                    $value = "1";
                    $column = "drug_id";
                    $placeholder = "Drug ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    , quantity=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="quantity" type="number" value="1" placeholder="Quantity" />'
                </div>
                <span class="query">
                    , supplied_date=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="supplied_date" type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="Supplied Date" />'
                </div>
                <span class="query">
                    WHERE vendors_drug_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM vendors_drug_view;";
                    $name = "vendors_drug_id";
                    $value = "1";
                    $column = "vendors_drug_id";
                    $placeholder = "Vendor Drug ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_record'])) {

                    $sql = "UPDATE vendors_drug SET 
                            vendor_id= '" . $_POST['vendor_id'] . "',
                            drug_id= '" . $_POST['drug_id'] . "',
                            quantity= '" . $_POST['quantity'] . "',
                            supplied_date= '" . $_POST['supplied_date'] . "'
                            WHERE vendors_drug_id='" . $_POST['vendors_drug_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("vendors_drug", "delete"); ?>">
        <h3 class="title">Delete Vendor Drug Supply Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM vendors_drug WHERE vendors_drug_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM vendors_drug_view;";
                    $name = "vendors_drug_id";
                    $value = "1";
                    $column = "vendors_drug_id";
                    $placeholder = "Vendor Drug ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_patient" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_patient'])) {

                    $sql = "DELETE from vendors_drug WHERE vendors_drug_id='" . $_POST['vendors_drug_id'] . "'";

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