
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">CMS Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a> <!-- ! -->
                </li>
                <li>
                    <a href="../index.php"><i class="fa fa-fw fa-home"></i> Home</a> <!-- ! -->
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a> <!-- ! -->
                </li>
            </ul>
        </li>
    </ul>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#dropOne"><i class="far fa-newspaper"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="dropOne" class="collapse">
                    <li>    <!-- source variable default in posts.php  -->
                        <a href="./posts.php"><i class="fa fa-file"></i> View All Posts</a>
                    </li>
                    <li>    <!-- sets the source variable to be used in posts.php  -->
                        <a href="./posts.php?source=add_post"><i class="fa fa-file"></i> Add Post</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="./adm_categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
            </li>
            <li class="">
                <a href="./comments.php?source=view_comments"><i class="fa far fa-file"></i> Comments</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#dropTwo"><i class="fa fa-users"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="dropTwo" class="collapse">
                    <li>
                        <a href="./users.php?source=view_users"><i class="fa fa-fw fa-wrench"></i>View all users</a>
                    </li>
                    <li>
                        <a href="./users.php?source=add_user"><i class="fa fa-fw fa-wrench"></i>Add new user</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="blank-page.html"><i class="fa far fa-user"></i> Profile</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
