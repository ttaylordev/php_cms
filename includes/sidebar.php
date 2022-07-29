<div class="col-md-4">

    <!-- Blog Search -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post" ;>
            <div class="input-group">
                <input type="text" class="form-control" name="search">
                <span class="input-group-btn">
                    <button class="btn btn-default" name="submit" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
    </div>

    <!-- login form -->
    <div class="well">
        <h4>Login</h4>
        <form action="includes/login.php" method="post" ;>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Enter username" autocomplete="username">
            </div>

            <div class="input-group">
                <input type="password" class="form-control" name="password" placeholder="Enter password" autocomplete="current-password">
                <span class="input-group-btn">
                    <button class="btn btn-primary" id="login-btn" name="login_btn" type="submit">Login</button>
                    <a href="./registration.php">
                        <div class="btn btn-primary" id="register-btn" name="register_btn">Register</div>
                    </a>
                </span>
            </div>
        </form>
    </div>

    <!-- Blog Categories -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    DisplayCategories();
                    ?>
                </ul>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget -->
    <?php include "includes/widget.php" ?>
</div>