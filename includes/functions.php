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

// function SessionTimedRenew()
// {

//     if (!isset($_SESSION['CREATED'])) {
//         $_SESSION['CREATED'] = time();
//     } else if (time() - $_SESSION['CREATED'] > 1800) {
//         // session started more than 30 minutes ago
//         session_regenerate_id(true);    // change session ID & invalidate old session ID
//         $_SESSION['CREATED'] = time();  // update creation time
//     }
// }
// TODO: setcookie with expire time()+60*30
