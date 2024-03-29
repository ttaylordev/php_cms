<?php

if (isset($_POST['create_comment'])) {

    $post_id = $_GET['view_by_post'];

    $comment_author = mysqli_real_escape_string($connection, $_POST['comment_author']);
    $comment_email = mysqli_real_escape_string($connection, $_POST['comment_email']); //
    $comment_content = mysqli_real_escape_string($connection, $_POST['comment_content']);
    $comment_in_response_to = $post_id;

    if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, in_response_to_id, comment_status, comment_date) ";
        $query .= "VALUES ($post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', '{$post_id}', 'pending',now())";

        $submit_query = mysqli_query($connection, $query);

        if (!$submit_query) {
            die("The comment failed to submit to the database" . mysqli_error($connection));
        }
    } else {
        echo "<script>alert('Fields cannot be empty')</script>";
    }
} else {
    
    // redirect(location: "/cms/post.php?p_id=$post_id");
}



?>

<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <!-- <form role="form"> -->
    <form action="/cms/post.php?view_by_post=<?php echo $post_id; ?>" method="post" role="form">

        <div class="form-group">
            <label for="Author"> Enter your name</label>
            <input type="text" class="form-control" name="comment_author">
        </div>

        <div class="form-group">
            <label for="Email"> Enter your email</label>
            <input type="email" class="form-control" name="comment_email">
        </div>

        <div class="form-group">
            <label for="Comment"> Comment below</label>
            <textarea class="form-control" rows="3" name="comment_content"></textarea>
        </div>

        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>

    </form>
</div>

<hr>

<!-- Posted Comments -->

<?php

$query = "SELECT * FROM  comments WHERE comment_post_id = {$post_id} ";
$query .= "AND comment_status = 'approved' ";
$query .= "ORDER BY comment_id DESC ";
$select_comment_query = mysqli_query($connection, $query);

if (!$select_comment_query) {
    die('Query Failed' . mysqli_error($connection));
}

while ($row = mysqli_fetch_array($select_comment_query)) {
    $comment_date = $row['comment_date'];
    $comment_content = $row['comment_content'];
    $comment_author = $row['comment_author'];


?>

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?php echo $comment_author; ?>
                <small><?php echo $comment_date; ?></small>
            </h4>
            <?php echo $comment_content; ?>
        </div>
    </div>
<?php } ?>