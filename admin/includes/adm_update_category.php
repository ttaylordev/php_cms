<!-- updating categories -->
<form class="" action="" method="post">

    <div class="form-group">
        <label for="cat_title">Update Category</label>
        <?php
        if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
            $select_update_cat_id = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_update_cat_id)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
            }
        }
        ?>
        <input class="form-control" value="<?php if (isset($cat_title)) {
                                                echo $cat_title;
                                            } ?>" type="text" name="cat_title">

        <?php
        // update query 
        if (isset($_POST['update_category'])) {
            $update_cat_title = $_POST['cat_title'];
            $upQuery = "UPDATE categories SET cat_title = '{$update_cat_title}' WHERE cat_id = {$cat_id} ";
            $update_query = mysqli_query($connection, $upQuery);

            if (!$update_cat_title) {
                die("the update query failed" . mysqli_error($connection));
            }
        }
        ?>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>

</form>