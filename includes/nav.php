<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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

            <!-- Top Menu Items -->
            <?php

            if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {

                if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
                    echo <<<END
                        <ul class='nav navbar-right top-nav'>
                            <li class='dropdown'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-user'></i>
                        END;
                    echo $_SESSION['username'];
                    echo <<< EOL

                        <b class='caret'></b></a>
                        <ul class='dropdown-menu'>
                            <li>
                                <a href='admin/profile.php?username=
                        EOL;
                    echo $_SESSION['username'];
                    echo ">";
                    echo <<<END
                            <i class='fa fa-fw fa-user'></i> Profile</a>
                            </li>
                            <li>
                            <a href='../../cms/index.php'><i class='fa fa-fw fa-home'></i> Home</a>
                            </li>
                            <li class='divider'></li>
                            <li>
                            <a href='/cms/includes/logout.php'><i class='fa fa-fw fa-power-off'></i> Log Out</a>
                            </li>
                            </ul>
                            </li>
                            </ul>
                        END;
                }
            }

            ?>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>