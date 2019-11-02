<?php
include_once('header.php');


?>

<body>

    <?php

    include('nav.php');



    ?>

    <!-- body Content -->
    <div class="container panel panel-primary">
        <div class="panel-heading">
            <h1>LOGIN</h1>
        </div>
        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            $msg2 = $_GET['msg2'];

            ?>

        <div class="alert alert-<?php echo $msg ?>" role="alert">
            <strong><?php echo $msg2; ?></strong>
        </div>

        <?php
        }
        ?>

        <div class="panel-body">
            <section id="login">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <form role="form" action="/cms/includes/login.php" method="post" id="login-form"
                            autocomplete="off">
                            <div class="form-group panel panel-default panel-body">
                                <label for="username"><i class="fa fa-fw fa-user"></i>Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Enter Your Username">
                            </div>
                            <div class="form-group panel panel-default panel-body">
                                <label for="password"><i class="fa fa-fw fa-key"></i>Password</label>
                                <input type="password" name="password" id="key" class="form-control"
                                    placeholder="Enter Your Password">
                            </div>

                            <input type="submit" name="login" id="btn btn-login" class="btn btn-custom btn-lg btn-block"
                                value="Login">

                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>



    <?php

    include('footer.php');

    ?>

</body>

</html>