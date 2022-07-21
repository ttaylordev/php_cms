<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Tech Snippets</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <?php
                DisplayCategories();
                ?>

                <?php
                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                        echo "<li><a href='admin/index.php'>Admin</a></li>";
                    
                    }
                ?>

                <?php
                if (isset($_SESSION['role'])) {
                    if (isset($_GET['view_by_post'])) {
                        $the_post_id = $_GET['view_by_post'];
                        echo "<li><a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";
                    }
                }
                ?>

                <li>
                    <a href="index.php">Home</a>
                </li>
                <!-- <li>
                    <a href="#">Contact</a>
                </li> -->

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>