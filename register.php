<?php
include(join(DIRECTORY_SEPARATOR, array('includes', 'init.php')));


if (isset($_POST["saveuser"]) and $_POST["name"] != ''  and $_POST["username"] != '') {
  if ($_POST["password"] == $_POST["passwordagain"]) {
    $user = new user($_POST["name"], $_POST["username"], $_POST["email"], crypt($_POST["password"], $salt), $_POST["gguname"], $_POST["ggpassword"]);
    $user->addnewuser();
    redirectTo("login.php");
  }
}



include $headLayout;

?>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <img src="img/logo-boost.png">
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Registracija novog boostera</p>

    <form action="<?php echo $_SERVER["PHP_SELF"] ;?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Ime i prezime" name="name" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password" required onchange="checkinsert()">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" id="passwordagain" name="passwordagain" required onchange="checkinsert()">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="GGBoost username" name="gguname" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>    
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="GGBoost password" name="ggpassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>    
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" required> Prihvatam <a href="rules.html">pravila korišćenja</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" id="saveuser" name="saveuser" disabled>Registruj se</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <a href="login.php" class="text-center">Već imam nalog</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

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

<script>
  function checkinsert(){
    var pass = document.getElementById("password").value;
    var repass = document.getElementById("passwordagain").value;
    if(pass == repass && pass != '' && repass !=''){
      document.getElementById("saveuser").disabled = false;
    } else {
      document.getElementById("saveuser").disabled = true;
    }
  }
</script>
</body>
</html>
