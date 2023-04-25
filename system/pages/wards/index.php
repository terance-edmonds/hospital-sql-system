<?php $active = "3";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<?php $active = "1";
include($_SERVER['DOCUMENT_ROOT'] . "/components/wards-tabs.php"); ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("ward", "insert"); ?>">
        <h3 class="title">Add New Ward Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO ward(name) VALUES (
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="name" type="text" value="Ward 1" placeholder="Ward Name" />'
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $sql = "INSERT INTO ward(name) VALUES (
                            '" . $_POST['name'] . "'
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

    <section class="section" data-active="<?php echo check_section_privilege("ward", "select"); ?>">
        <h3 class="title">Get All Ward Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM ward_view;
                </div>
                <input name="fetch_all" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Ward ID</th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_all'])) {

                        $sql = "SELECT * FROM ward_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["ward_id"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td>No data</td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("ward", "select"); ?>">
        <h3 class="title">Get Ward Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM ward_view WHERE ward_id="
                    <?php
                    $sql = "SELECT * FROM ward_view;";
                    $name = "ward_id";
                    $value = "1";
                    $column = "ward_id";
                    $placeholder = "Ward ID";
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
                        <th scope="col">Ward ID</th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_where'])) {

                        $sql = "SELECT * FROM ward_view WHERE ward_id='" . $_POST['ward_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["ward_id"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td>No data</td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("ward", "update"); ?>">
        <h3 class="title">Update Ward Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE ward SET name=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="name" type="text" value="Ward 1" placeholder="Ward Name" />'
                </div>
                <span class="query">
                    WHERE ward_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM ward_view;";
                    $name = "ward_id";
                    $value = "1";
                    $column = "ward_id";
                    $placeholder = "Ward ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_employee" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_employee'])) {

                    $sql = "UPDATE ward SET 
                            name= '" . $_POST['name'] . "'
                            WHERE ward_id='" . $_POST['ward_id'] . "' ; ";

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

    <section class="section" data-active="<?php echo check_section_privilege("ward", "delete"); ?>">
        <h3 class="title">Delete Ward Details</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM ward WHERE ward_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM ward_view;";
                    $name = "ward_id";
                    $value = "1";
                    $column = "ward_id";
                    $placeholder = "Ward ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_record'])) {

                    $sql = "DELETE from ward WHERE ward_id='" . $_POST['ward_id'] . "'";

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