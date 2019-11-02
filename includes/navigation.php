<?php include('topbar.php'); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" role="navigation">
    <div class="container  d-flex align-items-center">
        <a class="navbar-brand" href="index.php">AN-NURSCHOLAR’S ACADEMY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <!-- Brand and toggle get grouped for better mobile display -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="ftco-nav"">
            <ul class=" navbar-nav ml-auto">
            <?php


            $query = "SELECT * FROM categories ORDER BY cat_id DESC LIMIT 5";
            $select_all_categories_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                $cat_class = '';
                $reg_class = '';
                $contact_class = '';

                $pageName = basename($_SERVER['PHP_SELF']);
                if (isset($_GET['category']) && $_GET['category'] == $cat_id) {
                    $cat_class = 'active';
                    $login_class = '';
                } else if ($pageName == 'registration.php') {
                    $reg_class = 'active';
                    $login_class = '';
                } elseif ($pageName == 'contact.php') {
                    $contact_class = 'active';
                    $login_class = '';
                } else if ($pageName == 'login.php') {
                    $login_class = 'active';
                } else {
                    $cat_class = '';
                    $reg_class = '';
                    $login_class = '';
                    $contact_class = '';
                }

                echo "<li class='nav-item active'><a href='blog.php' class='nav-link'>Blog</a></li>";
            }
            $login_class = '';
            $cat_class = '';
            $reg_class = '';
            $contact_class = '';
            ?>
            <?php
            if (isset($_SESSION['user_role'])) {
                $user_role = $_SESSION['user_role'];
                if ($user_role == 'admin') {
                    echo "<li class='nav-item' ><a href='admin/index.php' class='nav-link'>Admin Panel</a></li>";
                } elseif (isset($_SESSION['user_role'])) {
                    $user_role = $_SESSION['user_role'];
                    if ($user_role == 'subscriber') {
                        echo "<li class='nav-item'><a href='users/index.php' class='nav-link'>User Panel</a></li>";
                    }
                }
            } else {
                echo "<li class='nav-item $login_class'><a href='login.php' class='nav-link'>Login</a></li>";
                echo "<li class='nav-item $reg_class'><a href='registration.php' class='nav-link'>Registation</a></li>";
            }
            ?>
            <?php
            if (isset($_SESSION['user_role'])) {
                $user_role = $_SESSION['user_role'];
                $username  = $_SESSION['username'];
                if ($user_role == 'admin') {
                    if (isset($_GET['p_id'])) {
                        $the_p_id = $_GET['p_id'];
                        echo "<li class='nav-item'><a href='admin/posts.php?source=edit_post&p_id={$the_p_id}' class='nav-link'>Edit Post</a></li>";
                    }
                }
            }
            ?>
            <?php
            if (isset($_SESSION['user_role'])) {
                $username  = $_SESSION['username'];
                if (isset($_GET['user'])) {
                    $user = $_GET['user'];
                    if ($username == $user) {
                        echo "<li class='nav-item'><a href='users/edit_profile.php' class='nav-link'>Edit Profile</a></li>";
                    }
                }
            }
            ?>

            </ul>
            <form class="navbar-form navbar-right" action="search.php" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit" name="search_submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>