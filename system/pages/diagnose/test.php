<?php $active = "5";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "4";
include($_SERVER['DOCUMENT_ROOT'] . "/components/diagnostics-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("treatment_test", "insert"); ?>">
        <h3 class="title">Add New Test Treatment Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO treatment_test(test_name, treatment_id, test_cost) VALUES (
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="test_name" type="text" value="Test 1" placeholder="Test Name" />',
                    '
                    <?php
                    $sql = "SELECT * FROM treatment_view;";
                    $name = "treatment_id";
                    $value = "1";
                    $column = "treatment_id";
                    $placeholder = "Patient ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    ',
                    '<input class="input form-control mx" name="test_cost" type="number" value="105" placeholder="Test Cost ($)" />'
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO treatment_test(test_name, treatment_id, test_cost) VALUES (
                            '" . $_POST['test_name'] . "',
                            '" . $_POST['treatment_id'] . "',
                            '" . $_POST['test_cost'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("treatment_test", "select"); ?>">
        <h3 class="title">Get All Test Treatment Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM treatment_test_view;
                </div>
                <input name="fetch_all" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Test Treatment ID</th>
                        <th scope="col">Test Name</th>
                        <th scope="col">Treatment ID</th>
                        <th scope="col">Type</th>
                        <th scope="col">Test Cost ($)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_all'])) {

                        $sql = "SELECT * FROM treatment_test_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["test_id"]; ?></td>
                                <td><?php echo $row["test_name"]; ?></td>
                                <td><?php echo $row["treatment_id"]; ?></td>
                                <td><?php echo $row["type"]; ?></td>
                                <td><?php echo $row["test_cost"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("treatment_test", "select"); ?>">
        <h3 class="title">Get Patient Test Treatment Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM treatment_test_view WHERE treatment_id="
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
                        <th scope="col">Test Treatment ID</th>
                        <th scope="col">Test Name</th>
                        <th scope="col">Treatment ID</th>
                        <th scope="col">Type</th>
                        <th scope="col">Test Cost ($)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_where'])) {

                        $sql = "SELECT * FROM treatment_test_view WHERE treatment_id='" . $_POST['treatment_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["test_id"]; ?></td>
                                <td><?php echo $row["test_name"]; ?></td>
                                <td><?php echo $row["treatment_id"]; ?></td>
                                <td><?php echo $row["type"]; ?></td>
                                <td><?php echo $row["test_cost"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("treatment_test", "update"); ?>">
        <h3 class="title">Update Test Treatment Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE treatment_test SET test_name=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="test_name" type="text" value="Test 1" placeholder="Test Name" />'
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
                    , test_cost=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control mx" name="test_cost" type="number" value="105" placeholder="Test Cost ($)" />'
                </div>
                <span class="query">
                    WHERE test_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM treatment_test_view;";
                    $name = "test_id";
                    $value = "1";
                    $column = "test_id";
                    $placeholder = "Test Treatment ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_employee" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_employee'])) {

                    $sql = "UPDATE treatment_test SET 
                            test_name= '" . $_POST['test_name'] . "',
                            treatment_id= '" . $_POST['treatment_id'] . "',
                            test_cost= '" . $_POST['test_cost'] . "'
                            WHERE test_id='" . $_POST['test_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("treatment_test", "delete"); ?>">
        <h3 class="title">Delete Test Treatment Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM treatment_test WHERE test_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM treatment_test_view;";
                    $name = "test_id";
                    $value = "1";
                    $column = "test_id";
                    $placeholder = "Test Treatment ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_record'])) {

                    $sql = "DELETE from treatment_test WHERE test_id='" . $_POST['test_id'] . "'";

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