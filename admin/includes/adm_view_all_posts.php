<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php
       
       $query = "SELECT * FROM posts";
       $posts_query = mysqli_query($connection, $query);
        
        if(!$posts_query){
            echo "Query unsuccessful";
        } else {
        

            while($row = mysqli_fetch_assoc($posts_query)){
                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                $post_title = $row['post_title'];
                $post_cat_id = $row['post_cat_id'];
                $post_category = $row['post_category'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_date = $row['post_date'];
                $post_comment_count = $row['post_comment_count'];
                $post_views_count = $row['post_views_count'];
                $post_content = $row['post_content'];

                $query = "SELECT * FROM categories WHERE cat_id = $post_cat_id ";
                $select_update_cat_id = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($select_update_cat_id)){
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];

                echo
                "<tr>
                    <td>'{$post_id}'</td>
                    <td>'{$post_author}'</td>
                    <td>'{$post_title}'</td>

                    <td>'{$cat_title}'</td>
                    <td>'{$post_status}'</td>
                    <td>'<img src='../images/{$post_image}' alt='{$post_image}' width='100'</td>
                    <td>'{$post_tags}'</td>
                    <td>'{$post_comment_count}'</td>
                    <td>'{$post_date}'</td>
                    <td><a href='posts.php?source=edit_post&p_id={$post_id}'><i class='far fa-edit'></i> Edit</a></td> 
                    <td><a href='posts.php?delete={$post_id}'> Delete</a></td>
                </tr>";
                
                }// the & divides values for multiple parameters
            }
        }

        if(isset($_GET['delete'])){

            $del_post_id = $_GET['delete'];

            $query = "DELETE FROM posts WHERE post_id = {$del_post_id}";
            $delete_query = mysqli_query($connection, $query);

            confirm_query($delete_query);
        }

    ?> 
    </tbody>
</table>