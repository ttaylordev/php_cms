<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Role</th>
            <th>Status</th>
            <th>Member Since</th>
            <th>Post Count</th>
            <th>Comment Count</th>
            <th>Approve</th>
            <th>Deny</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php

        $query = "SELECT * FROM users";
        $get_all_users = mysqli_query($connection, $query);

        if (!$get_all_users) {
            echo "Query unsuccessful";
        } else {

            while ($row = mysqli_fetch_assoc($get_all_users)) {
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];
                $user_date = $row['user_date'];
                $user_status = $row['user_status'];
                $user_post_count = $row['user_post_count'];
                $user_comment_count = $row['user_comment_count'];

                echo
                "<tr>
                <td>'{$user_id}'</td>
                <td>'{$user_name}'</td>
                <td>'{$user_firstname}'</td>
                <td>'{$user_lastname}'</td>
                <td>'{$user_email}'</td>
                <td>'{$user_image}'</td>
                <td>'{$user_role}'</td>
                <td>'{$user_status}'</td>
                <td>'{$user_date}'</td>
                <td>'{$user_post_count}'</td>
                <td>'{$user_comment_count}'</td>
                
                <td><a href='users.php?approve={$user_id}'><i class='far fa-thumbs-up'></i> Approve</a></td> 
                <td><a href='users.php?deny={$user_id}'><i class='far fa-thumbs-down'></i> Suspend</a></td>
                <td><a href='users.php?source=edit_user&u_id={$user_id}'><i class='fas fa-trash'></i> Edit</a></td>
                <td><a href='users.php?delete={$user_id}'><i class='fas fa-trash'></i> Delete</a></td>
            </tr>";
            }
        }
        ?>

        <?php

        if (isset($_GET['deny'])) {

            $deny_user_id = $_GET['deny'];

            $query = "UPDATE users SET user_status = 'suspended' WHERE user_id = $deny_user_id ";
            $deny_query = mysqli_query($connection, $query);

            confirm_query($deny_query);
            // reload the page
            header("Location: users.php");
        }

        if (isset($_GET['approve'])) {

            $approve_user_id = $_GET['approve'];
            // echo "<br>" . $approve_user_id; // echo's won't work here because of the refresh.

            $query = "UPDATE users SET user_status = 'approved' WHERE user_id = $approve_user_id ";
            $approve_query = mysqli_query($connection, $query);

            confirm_query($approve_query);
            // reload the page
            header("Location: users.php");
        }


        if (isset($_GET['delete'])) {

            $del_user_id = $_GET['delete'];

            $query = "DELETE FROM users WHERE user_id = {$del_user_id}";
            $delete_query = mysqli_query($connection, $query);

            confirm_query($delete_query);
            // reload the page
            header("Location: users.php");
        }

        ?>
    </tbody>
</table>