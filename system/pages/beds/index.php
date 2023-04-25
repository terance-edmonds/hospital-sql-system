<?php $active = "8";
include($_SERVER['DOCUMENT_ROOT'] . "/layout/header.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/layout/navbar.php"); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/connection.php') ?>

<div class="custom-container">
    <section class="section" data-active="<?php echo check_section_privilege("ward_bed", "insert"); ?>" >
        <h3 class="title">Add New Ward Bed</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    INSERT INTO ward_bed(ward_id, bed_code) VALUES (
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
                    ',
                </div>
                <div class="row-inputs">
                    '<input class="input form-control" name="bed_code" type="text" value="1" placeholder="Bed Code" />'
                </div>
                <span class="query">
                    );
                </span>
                <input name="insert_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['insert_record'])) {

                    $exist_sql = "SELECT * FROM ward_bed where ward_id='" . $_POST['ward_id'] . "' and bed_code='" . $_POST['bed_code'] . "'; ";
                    $exist_result = $conn->query($exist_sql);

                    if ($exist_result->num_rows > 0) {
                        notify("error", "This ward already has the given bed code");
                    } else {
                        $sql = "INSERT INTO ward_bed(ward_id, bed_code) VALUES (
                                '" . $_POST['ward_id'] . "',
                                '" . $_POST['bed_code'] . "'
                                ); ";
                        $result = $conn->query($sql);

                        if ($result === TRUE) {
                            notify("success", "New record created");
                        } else {
                            notify("error", "New record creation failed");
                            console("Error: " . $sql . "<br>" . $conn->error);
                        }
                    }
                } ?>
            </div>
        </form>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("ward_bed", "select"); ?>">
        <h3 class="title">Get All Wards Beds</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query">
                    SELECT * FROM ward_bed_view;
                </div>
                <input name="fetch_employees" type="submit" value="Execute" class="btn btn-outline-primary" />
            </div>
        </form>
        <div class="view">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Ward Bed ID</th>
                        <th scope="col">Ward ID</th>
                        <th scope="col">Ward Name</th>
                        <th scope="col">Bed Code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_employees'])) {

                        $sql = "SELECT * FROM ward_bed_view";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["ward_bed_id"]; ?></td>
                                <td><?php echo $row["ward_id"]; ?></td>
                                <td><?php echo $row["ward_name"]; ?></td>
                                <td><?php echo $row["bed_code"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("ward_bed", "select"); ?>">
        <h3 class="title">Get Ward Beds</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <div class="query row-inputs">
                    SELECT * FROM ward_bed_view WHERE ward_id="
                    <?php
                    $sql = "SELECT * FROM ward_bed_view GROUP BY ward_id;";
                    $name = "ward_id";
                    $value = "1";
                    $column = "ward_id";
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
                        <th scope="col">Ward Bed ID</th>
                        <th scope="col">Ward ID</th>
                        <th scope="col">Ward Name</th>
                        <th scope="col">Bed Code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['fetch_staff_employee'])) {

                        $sql = "SELECT * FROM ward_bed_view WHERE ward_id='" . $_POST['ward_id'] . "'";
                        $result = $conn->query($sql) or notify("error", $conn->error);

                        while (($row = $result->fetch_assoc()) !== null) {
                    ?>
                            <tr>
                                <td><?php echo $row["ward_bed_id"]; ?></td>
                                <td><?php echo $row["ward_id"]; ?></td>
                                <td><?php echo $row["ward_name"]; ?></td>
                                <td><?php echo $row["bed_code"]; ?></td>
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

    <section class="section" data-active="<?php echo check_section_privilege("ward_bed", "update"); ?>">
        <h3 class="title">Update Ward Bed</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    UPDATE ward_bed SET ward_id=
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
                    , bed_code=
                </span>
                <div class="row-inputs">
                    '<input class="input form-control" name="bed_code" type="text" value="1" placeholder="Bed Code" />'
                </div>
                <span class="query">
                    WHERE ward_bed_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM ward_bed_view;";
                    $name = "ward_bed_id";
                    $value = "1";
                    $column = "ward_bed_id";
                    $placeholder = "Ward Bed ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="update_employee" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['update_employee'])) {

                    $exist_sql = "SELECT * FROM ward_bed where ward_id='" . $_POST['ward_id'] . "' and bed_code='" . $_POST['bed_code'] . "'; ";
                    $exist_result = $conn->query($exist_sql);

                    if ($exist_result->num_rows > 0) {
                        notify("error", "This ward already has the given bed code");
                    } else {
                        $sql = "UPDATE ward_bed SET 
                                ward_id= '" . $_POST['ward_id'] . "',
                                bed_code= '" . $_POST['bed_code'] . "'
                                WHERE ward_bed_id='" . $_POST['ward_bed_id'] . "' ; ";

                        $result = $conn->query($sql);

                        if ($result === TRUE) {
                            notify("success", "Record updated");
                        } else {
                            notify("error", "Record update failed");
                            console("Error: " . $sql . "<br>" . $conn->error);
                        }
                    }
                } ?>
            </div>
        </form>
    </section>

    <section class="section" data-active="<?php echo check_section_privilege("ward_bed", "delete"); ?>">
        <h3 class="title">Delete Ward Bed</h3>

        <form class="form" method="POST">
            <div class="query-wrap">
                <span class="query">
                    DELETE FROM ward_bed WHERE ward_bed_id=
                </span>
                <div class="row-inputs">
                    '
                    <?php
                    $sql = "SELECT * FROM ward_bed_view;";
                    $name = "ward_bed_id";
                    $value = "1";
                    $column = "ward_bed_id";
                    $placeholder = "Bed ID";
                    include($_SERVER['DOCUMENT_ROOT'] . '/components/sql-select.php')  ?>
                    '
                </div>
                <span class="query">
                    ;
                </span>
                <input name="delete_record" type="submit" value="Execute" class="btn btn-outline-primary" />

                <?php
                if (isset($_POST['delete_record'])) {

                    $sql = "DELETE from ward_bed WHERE ward_bed_id='" . $_POST['ward_bed_id'] . "'";

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