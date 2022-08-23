<div>
    <h2>
        <!-- pass the post_id to post.php -->
        <a href=<?php echo "post.php?view_by_post={$post_id}" ?>><?php echo $post_title; ?></a>
    </h2>
    <!-- <?php echo 'adm_categories.php?delete={$cat_id}'; ?> -->

    <p class="lead">
        <!-- source variable passing the authors name or id -->
        <!-- <?php echo $post_author; ?> -->
        by <a href="author_posts.php?view_by_author=<?php echo $post_author ?>&view_by_post=<?php echo $post_id ?>"><?php echo $post_author; ?></a>
    </p>

    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
    <hr>
    <a href=<?php echo "post.php?view_by_post={$post_id}" ?>><img class="img-responsive" src="<?php echo "./images/" . $post_image; ?>" alt="<?php echo $post_image; ?>"></a>
    <hr>
    <p> <?php echo $post_content; ?> </p>
    <a class="btn btn-primary" href=<?php echo "post.php?view_by_post={$post_id}" ?>>Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
    <hr>
</div>