<?php $active = "4";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("drug", "insert"); ?>">
        <h3 class="title">Add New Drug Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO drug(drug_type, drug_name, unit_cost) VALUES (
                </span>
                <div class="row-inputs">
                    '
                    <select class="input form-select" name="drug_type" value="Pills" placeholder="Drug Type">
                        <option value="Pills" selected>Pills</option>
                        <option value="Liquid">Liquid</option>
                        <option value="Powder">Powder</option>
                    </select>
                    ',
                    '<input class="input form-control" name="drug_name" type="text" value="Paracetamol" placeholder="Drug Name" />',
                    '<input class="input form-control" name="unit_cost" type="number" value="2.5" placeholder="Unit Cost (USD)" />'
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO drug(drug_type, drug_name, unit_cost) VALUES (
                            '" . $_POST['drug_type'] . "',
                            '" . $_POST['drug_name'] . "',
                            '" . $_POST['unit_cost'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("drug", "select"); ?>">
        <h3 class="title">Get All Drugs Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM drug_view;
                </div>
                <input name="fetch_all" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Drug ID</th>
                        <th scope="col">Type</th>
                        <th scope="col">Name</th>
                        <th scope="col">Unit Cost ($)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_all'])) {

                        $sql = "SELECT * FROM drug_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["drug_id"]; ?></td>
                                <td><?php echo $row["drug_type"]; ?></td>
                                <td><?php echo $row["drug_name"]; ?></td>
                                <td><?php echo $row["unit_cost"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("drug", "select"); ?>">
        <h3 class="title">Get Drug Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM drug_view WHERE drug_id="
                    <?php
                    $sql = "SELECT * FROM drug_view;";
                    $name = "drug_id";
                    $value = "1";
                    $column = "drug_id";
                    $placeholder = "Drug ID";
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
                        <th scope="col">Drug ID</th>
                        <th scope="col">Type</th>
                        <th scope="col">Name</th>
                        <th scope="col">Unit Cost ($)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_where'])) {

                        $sql = "SELECT * FROM drug_view WHERE drug_id='" . $_POST['drug_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["drug_id"]; ?></td>
                                <td><?php echo $row["drug_type"]; ?></td>
                                <td><?php echo $row["drug_name"]; ?></td>
                                <td><?php echo $row["unit_cost"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("drug", "update"); ?>">
        <h3 class="title">Update Drug Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE drug SET drug_type=
                </span>
                <div class="row-inputs">
                    '
                    <select class="input form-select" name="drug_type" value="Pills" placeholder="Drug Type">
                        <option value="Pills" selected>Pills</option>
                        <option value="Liquid">Liquid</option>
                        <option value="Powder">Powder</option>
                    </select>
                    '
                </div>
                <span class="query">
                    , drug_name=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="drug_name" type="text" value="Paracetamol" placeholder="Drug Name" />'
                </div>
                <span class="query">
                    , unit_cost=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="unit_cost" type="number" value="1.5" placeholder="Unit Cost ($)" />',
                </div>
                <span class="query">
                    WHERE drug_id=
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
                    ;
                </span>
                <input name="update_employee" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_employee'])) {

                    $sql = "UPDATE drug SET 
                            drug_type= '" . $_POST['drug_type'] . "',
                            drug_name= '" . $_POST['drug_name'] . "',
                            unit_cost= '" . $_POST['unit_cost'] . "'
                            WHERE drug_id='" . $_POST['drug_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("drug", "delete"); ?>">
        <h3 class="title">Delete Drug Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM drug WHERE drug_id=
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
                    ;
                </span>
                <input name="delete_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_record'])) {

                    $sql = "DELETE from drug WHERE drug_id='" . $_POST['drug_id'] . "'";

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