<?php

    function confirm_query($result){
        global $connection;
        if(!$result){
            die("Query failed to submit: " . mysqli_error($connection));
        }
    }

    // create new categories
    function insert_categories(){
        global $connection;
        if(isset($_POST['submit'])){
            $cat_title = $_POST['cat_title'];
            
            if($cat_title == "" || empty($cat_title)){
                echo " This field should not be empty";
            } else {
                $catQuery = "INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
                $catQuerySubmission = mysqli_query($connection, $catQuery);

                confirm_query($catQuerySubmission);
            }
        }
    }

    // populate categories table
    function find_all_categories(){
        global $connection;
        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection, $query);

        confirm_query($select_categories);

        while($row = mysqli_fetch_assoc($select_categories)){
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];

            echo "<tr>";
            echo "<td>{$cat_id} </td>";
            echo "<td>{$cat_title} </td>";
            echo "<td><a href='adm_categories.php?delete={$cat_id}'><i class='fas fa-trash'></i> Delete</a></td>";
            echo "<td><a href='adm_categories.php?edit={$cat_id}'><i class='far fa-edit'></i> Edit</a></td>";
            echo "</tr>";
        }
    }

    // deletion of categories
    function delete_category(){
        global $connection;
        if(isset($_GET['delete'])){
            $del_cat_id = $_GET['delete'];
            $delQuery = "DELETE FROM categories WHERE cat_id = {$del_cat_id} ";
            $delete_query = mysqli_query($connection, $delQuery); 
            header("Location: adm_categories.php");

            confirm_query($delete_query);
        }
    }


?>
