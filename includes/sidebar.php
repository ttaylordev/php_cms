<div class="col-md-4">

    <!-- Blog Search -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post";>
        <div class="input-group">
            <input type="text" class="form-control"name= "search">
            <span class="input-group-btn">
                <button class="btn btn-default" name = "submit" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
        </form> <!-- search form -->
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
    <?php include "includes/widget.php"?>
</div>

