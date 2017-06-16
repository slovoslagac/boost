<?php
include(join(DIRECTORY_SEPARATOR, array('includes', 'init.php')));
if (!$session->isLoggedIn() and $session != '') {
    redirectTo("login.php");
}

if (!in_array($session->userid, $adminarray)) {
    redirectTo("index.php");
}
$currentuser = getuserbyuserid($session->userid);
$allordertypes = getAllOrderTypes();
$allorders = getDetailedOrders();
$ordertypes = array();
$ordertypesbyname = array();
$ordertypesbyid = array();
foreach ($allordertypes as $item) {
    if ($item->APIname != '') {
        $ordertypes[$item->id] = $item->APIname;
    }
    $ordertypesbyname[$item->name] = $item->id;
    $ordertypesbyid[$item->id] = $item->shortname;
}

if(isset($_POST['verify'])){
    $verifyid=$_POST["verify"];
    verifyorder($verifyid);
    $slackmessage = "$currentuser->username je verifikovao order br : $verifyid";
    sendSlackFinancialInfo($slackmessage, $financialChanel);
    header("Location:adminverif.php");
}

include $headLayout;
?>
<body class="hold-transition skin-blue sidebar-mini" xmlns="http://www.w3.org/1999/html">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>B</b>R</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Boost</b>Room</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">Konstantin Stikić</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    Konstantin Stikić - Booster
                                    <small>Member since Jun. 2017</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Odjavi se</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">


            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">LINKOVI</li>
                <!-- Optionally, you can add icons to the links -->
                <li><a href="#"><i class="fa fa-gamepad"></i> <span>Orderi</span></a></li>
                <li><a href="calendar.html"><i class="fa fa-calendar-plus-o"></i> <span>Rezervacije</span></a></li>
                <li class="active"><a href="history.html"><i class="fa fa-history"></i> <span>Istorija</span></a></li>
                <li><a href="http://www.ggboost.com" target="_blank"><i class="fa fa-bullseye"></i> <span>GGBoost</span></a></li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Istorija ordera</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <table class="table table-hover">
                            <tr>
                                <th>#</th>
                                <th>Order</th>
                                <th>Mušterija</th>
                                <th>Igrač</th>
                                <th>Datum</th>
                                <th>Server</th>
                                <th>Start</th>
                                <th>Kraj</th>
                                <th>W/L</th>
                                <th>Cena</th>
                                <th>Zarada</th>
                                <th>Status</th>
                            </tr>
                            <?php foreach ($allorders as $item) {
                                $currencyid = $item->currency;
                                $bgclassordertype = $ordertypeclass[$ordertypesbyid[$item->ordertype]];
                                ?>
                                <tr style="background:#f7fafc;">
                                    <td><?php echo $item->oid?></td>
                                    <input type="hidden" name="oid" value="<?php echo $item->oid?>">
                                    <td style="text-align:center;" class="bg-<?php echo $bgclassordertype ?>" title="Solo Net Wins"><?php echo $ordertypesbyid[$item->ordertype] ?> </td>
                                    <td><b><?php echo $item->name; ?></b></td>
                                    <td><?php echo $item->playername; ?></td>
                                    <td><?php echo date('d.m.Y', strtotime($item->createtime)); ?></td>
                                    <td><?php echo $item->server; ?></td>
                                    <td><?php echo ($item->start != '') ? "$item->start ($item->points)" : ""; ?></td>
                                    <td><?php echo "$item->end"; ?></td>
                                    <td>13/3 (80%)</td>
                                    <td><?php echo "$item->price $currenciessign[$currencyid]"; ?></td>
                                    <td><b><?php echo "$item->profit $currenciessign[$currencyid]"; ?></b></td>
                                    <?php echo ($item->status == 0) ? '<td style="width:51px;"><a class="btn btn-social-icon btn-google"><button type="submit" name="verify" value="'.$item->oid.'" class="fa fa-close"></button></a></td>' : '<td style="width:51px;"><a class="btn btn-social-icon btn-dropbox"><i class="fa fa-check"></i></a></td>'; ?>
                                </tr>
                            <?php } ?>

                        </table>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>


        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
<span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3.1.1 -->
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>