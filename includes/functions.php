<?php
function DisplayCategories()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $category_title = $row['cat_title'];
        $category_id = $row['cat_id'];
        echo "<li><a href='category.php?category=$category_id'>{$category_title}</a></li>";
    }
    
}
