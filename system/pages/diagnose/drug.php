<?php $active = "5";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "3";
include($_SERVER['DOCUMENT_ROOT'] . "/components/diagnostics-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("treatment_drug", "insert"); ?>">
        <h3 class="title">Add New Drug Treatment Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO treatment_drug(drug_id, treatment_id, drug_cost) VALUES (
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
                    ',
                    '
                    <?php
                    $sql = "SELECT * FROM treatment_view;";
                    $name = "treatment_id";
                    $value = "1";
                    $column = "treatment_id";
                    $placeholder = "Patient ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ',
                    '<input class="input form-control mx" name="drug_cost" type="number" value="105" placeholder="Drug Cost ($)" />'
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO treatment_drug(drug_id, treatment_id, drug_cost) VALUES (
                            '" . $_POST['drug_id'] . "',
                            '" . $_POST['treatment_id'] . "',
                            '" . $_POST['drug_cost'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("treatment_drug", "select"); ?>">
        <h3 class="title">Get All Drug Treatment Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM treatment_drug_view;
                </div>
                <input name="fetch_all" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Drug Treatment ID</th>
                        <th scope="col">Drug ID</th>
                        <th scope="col">Treatment ID</th>
                        <th scope="col">Type</th>
                        <th scope="col">Drug Cost ($)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_all'])) {

                        $sql = "SELECT * FROM treatment_drug_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["drug_test_id"]; ?></td>
                                <td><?php echo $row["drug_id"]; ?></td>
                                <td><?php echo $row["treatment_id"]; ?></td>
                                <td><?php echo $row["type"]; ?></td>
                                <td><?php echo $row["drug_cost"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("treatment_drug", "select"); ?>">
        <h3 class="title">Get Patient Drug Treatment Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM treatment_drug_view WHERE treatment_id="
                    <?php
                    $sql = "SELECT * FROM treatment_view;";
                    $name = "treatment_id";
                    $value = "1";
                    $column = "treatment_id";
                    $placeholder = "Treatment ID";
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
                        <th scope="col">Drug Treatment ID</th>
                        <th scope="col">Drug ID</th>
                        <th scope="col">Treatment ID</th>
                        <th scope="col">Type</th>
                        <th scope="col">Drug Cost ($)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_where'])) {

                        $sql = "SELECT * FROM treatment_drug_view WHERE treatment_id='" . $_POST['treatment_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["drug_test_id"]; ?></td>
                                <td><?php echo $row["drug_id"]; ?></td>
                                <td><?php echo $row["treatment_id"]; ?></td>
                                <td><?php echo $row["type"]; ?></td>
                                <td><?php echo $row["drug_cost"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("treatment_drug", "update"); ?>">
        <h3 class="title">Update Drug Treatment Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE treatment_drug SET drug_id=
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
                    , treatment_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM treatment_view;";
                    $name = "treatment_id";
                    $value = "1";
                    $column = "treatment_id";
                    $placeholder = "Patient ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    , drug_cost=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control mx" name="drug_cost" type="number" value="105" placeholder="Drug Cost ($)" />'
                </div>
                <span class="query">
                    WHERE drug_test_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM treatment_drug_view;";
                    $name = "drug_test_id";
                    $value = "1";
                    $column = "drug_test_id";
                    $placeholder = "Drug Treatment ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_employee" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_employee'])) {

                    $sql = "UPDATE treatment_drug SET 
                            drug_id= '" . $_POST['drug_id'] . "',
                            treatment_id= '" . $_POST['treatment_id'] . "',
                            drug_cost= '" . $_POST['drug_cost'] . "'
                            WHERE drug_test_id='" . $_POST['drug_test_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("treatment_drug", "delete"); ?>">
        <h3 class="title">Delete Drug Treatment Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM treatment_drug WHERE drug_test_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM treatment_drug_view;";
                    $name = "drug_test_id";
                    $value = "1";
                    $column = "drug_test_id";
                    $placeholder = "Drug Treatment ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_record'])) {

                    $sql = "DELETE from treatment_drug WHERE drug_test_id='" . $_POST['drug_test_id'] . "'";

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