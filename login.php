<?php
include(join(DIRECTORY_SEPARATOR, array('includes', 'init.php')));

if ($session->isLoggedIn()) {
    redirectTo("index.php");
}

if (isset($_POST["checklogin"]) ) {
    $currentuser = getuserbyusername($_POST["username"]);
    if (crypt($_POST["password"],$salt) == $currentuser->password) {
        $session->login($currentuser);
        redirectTo("index.php");

    } else {
        echo "Losa lozinka!!!";
    }
}

include $headLayout;

?>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <img src="img/logo-boost.png">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Uloguj se</p>

        <form form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Username" name="username" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <a href="register.php" class="text-center">Registruj se</a>

                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="checklogin">Uloguj se</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3.1.1 -->
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
