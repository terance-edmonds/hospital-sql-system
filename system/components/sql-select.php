<select class="input form-select" name="<?php echo $name ?>" value="<?php echo $value ?>" placeholder="<?php echo $placeholder ?>">
    <option value="" disabled>None</option>
    <?php
    $result = $conn->query($sql) or notify("error", $conn->error);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <option value="<?php echo $row["$column"] ?>" <?php if ($value == $row["$column"]) echo "selected"; ?>>
            <?php if (isset($display_column)) {
                echo $row["$display_column"];
            } else {
                echo $row["$column"];
            } ?>
        </option>

    <?php } ?>
</select>