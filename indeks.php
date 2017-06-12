<?php
include(join(DIRECTORY_SEPARATOR, array('includes', 'init.php')));

if(isset($_POST["saveorder"])) {
    echo $_POST["boost"].'-'.$_POST["soloduo"].'<br>';
}



?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Boost Room</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
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
                <li class="active"><a href="#"><i class="fa fa-gamepad"></i> <span>Orderi</span></a></li>
                <li><a href="calendar.html"><i class="fa fa-calendar-plus-o"></i> <span>Rezervacije</span></a></li>
                <li><a href="history.html"><i class="fa fa-history"></i> <span>Istorija</span></a></li>
                <li><a href="http://www.ggboost.com" target="_blank"><i class="fa fa-bullseye"></i> <span>GGBoost</span></a></li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Aktivni orderi</h3>
                    <div class="new_order">
                        <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#novi-order">Dodaj novi order</button>
                    </div>
                </div>
                <div class="modal fade" id="novi-order">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Dodaj novi order</h4>
                            </div>
                            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group order-line">
                                    <label>Sajt</label>
                                    <select class="form-control" style="display:inline; width:250px;float:right;">
                                        <option>GGBoost</option>
                                        <option>EloBoost24</option>
                                    </select>
                                </div>
                                <div class="form-group order-line">
                                    <label for="exampleInputEmail1">Boost</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="boost" id="division" value="Division" onclick="radioClick(1)" checked>
                                            Division
                                        </label>
                                        <label>
                                            <input type="radio" name="boost" id="placement" value="Placement" onclick="radioClick(2)">
                                            Placement
                                        </label>
                                        <label>
                                            <input type="radio" name="boost" id="netwins" value="Net Wins" onclick="radioClick(3)">
                                            Net Wins
                                        </label>
                                        <label>
                                            <input type="radio" name="boost" id="normal" value="Normal" onclick="radioClick(4)">
                                            Normal
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="soloduo" id="solo" value="Solo" onclick="radioClick(5)" checked>
                                            Solo
                                        </label>
                                        <label>
                                            <input type="radio" name="soloduo" id="duo" value="Duo" onclick="radioClick(6)">
                                            Duo
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group order-line" id="jsplayerSummonerName" style="display: none;">
                                    <label for="exampleInputEmail1">Summoner name Duo naloga</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Unesi tvoj summoner name" style="float:right; width:250px;">
                                </div>
                                <div class="form-group order-line">
                                    <label for="exampleInputEmail1">Summoner name mušterije</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Unesi summoner name mušterije" style="float:right; width:250px;">
                                </div>
                                <div class="form-group order-line">
                                    <label for="exampleInputEmail1">Server</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                            Europe West
                                        </label>
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            Europe North East
                                        </label>
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                            North America
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group order-line" id="jsstartdivision">
                                    <label>Početna divizija</label>
                                    <select class="form-control" style="float:right; width:250px;">
                                        <option>Gold 1</option>
                                        <option>Gold 2</option>
                                        <option>Gold 3</option>
                                        <option>Gold 4</option>
                                        <option>Gold 5</option>
                                    </select>
                                </div>
                                <div class="form-group order-line" id="jslppoints">
                                    <label for="exampleInputEmail1">Broj LP poena</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Unesi broj LP poena na početku" style="display:inline; width:250px; float:right">
                                </div>
                                <div class="form-group order-line" id="jsenddivision">
                                    <label>Krajnja divizija</label>
                                    <select class="form-control" style="display:inline; width:250px;float:right;">
                                        <option>Gold 1</option>
                                        <option>Gold 2</option>
                                        <option>Gold 3</option>
                                        <option>Gold 4</option>
                                        <option>Gold 5</option>
                                    </select>
                                </div>
                                <div class="form-group order-line" id="jsgejnumber" style="display: none;">
                                    <label for="exampleInputEmail1">Broj gejmova</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Unesi broj traženih gejmova" style="display:inline; width:250px; float:right">
                                </div>
                                <div class="form-group order-line" id="jswinnumber" style="display: none;">
                                    <label for="exampleInputEmail1">Broj pobeda</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Unesi broj traženih pobeda" style="display:inline; width:250px; float:right">
                                </div>
                                <div class="form-group order-line">
                                    <label for="exampleInputEmail1">Cena ordera</label>
                                    <div class="form-group" style="margin-top:10px; display:inline;">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="money" id="eur" value="eur" checked>
                                                EUR
                                            </label>
                                            <label>
                                                <input type="radio" name="money" id="usd" value="usd">
                                                USD
                                            </label>
                                            <label>
                                                <input type="radio" name="money" id="gbp" value="gbp">
                                                GBP
                                            </label>
                                        </div>
                                    </div>
                                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Unesi cenu boosta" style="float:right; width:250px;">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Zatvori</button>
                                <button type="submit" class="btn btn-primary" name="saveorder">Dodaj order</button>
                            </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width:10px; text-align:center;">#</th>
                            <th style="text-align:center;">Order</th>
                            <th style="text-align:center;">Server</th>
                            <th style="text-align:center;">Start</th>
                            <th style="text-align:center;">Now</th>
                            <th style="text-align:center;">End</th>
                            <th style="text-align:center;">W/L</th>
                            <th style="text-align:center;">Cena</th>
                            <th style="text-align:center;">Zarada</th>
                            <th></th>

                        </tr>
                        <tr>
                            <td style="line-height:32px; text-align:center; width:20px;" class="bg-olive"><span title="Solo Net Wins">SNW</span></td>
                            <td style="line-height:32px;"><b>RedBullManiac</b></td>
                            <td style="line-height:32px; text-align:center; width:70px;">EUW</td>
                            <td style="line-height:32px; text-align:center; width:70px;">D5 (33)</td>
                            <td style="line-height:32px; text-align:center; width:70px;">D4 (14)</td>
                            <td style="line-height:32px; text-align:center; width:70px;">D1</td>
                            <td style="line-height:32px; text-align:center; width:94px;">12/1 (90%)</td>
                            <td style="line-height:32px; text-align:center; width:60px;"><span class="badge bg-yellow">45€</span></td>
                            <td style="line-height:32px; text-align:center; width:60px;"><span class="badge bg-blue">27€</span></td>

                            <td style="width:51px;"><a class="btn btn-social-icon btn-google"><i class="fa fa-close"></i></a></td>
                        </tr>
                        <tr>
                            <td style="line-height:32px; text-align:center; width:20px;" class="bg-navy"><span title="Duo Placement">DP</span></td>
                            <td style="line-height:32px;"><b>RedBullManiac</b></td>
                            <td style="line-height:32px; text-align:center; width:70px;">EUW</td>
                            <td style="line-height:32px; text-align:center; width:70px;">D5 (33)</td>
                            <td style="line-height:32px; text-align:center; width:70px;">D4 (14)</td>
                            <td style="line-height:32px; text-align:center; width:70px;">D1</td>
                            <td style="line-height:32px; text-align:center; width:94px;">12/1 (90%)</td>
                            <td style="line-height:32px; text-align:center; width:60px;"><span class="badge bg-yellow">45€</span></td>
                            <td style="line-height:32px; text-align:center; width:60px;"><span class="badge bg-blue">27€</span></td>

                            <td style="width:51px;"><a class="btn btn-social-icon btn-google"><i class="fa fa-close"></i></a></td>
                        </tr>
                        <tr>
                            <td style="line-height:32px; text-align:center; width:20px;" class="bg-blue"><span title="Solo Division">SD</span></td>
                            <td style="line-height:32px;"><b>RedBullManiac</b></td>
                            <td style="line-height:32px; text-align:center; width:70px;">EUW</td>
                            <td style="line-height:32px; text-align:center; width:70px;">D5 (33)</td>
                            <td style="line-height:32px; text-align:center; width:70px;">D4 (14)</td>
                            <td style="line-height:32px; text-align:center; width:70px;">D1</td>
                            <td style="line-height:32px; text-align:center; width:94px;">12/1 (90%)</td>
                            <td style="line-height:32px; text-align:center; width:60px;"><span class="badge bg-yellow">45€</span></td>
                            <td style="line-height:32px; text-align:center; width:60px;"><span class="badge bg-blue">27€</span></td>

                            <td style="width:51px;"><a class="btn btn-social-icon btn-dropbox"><i class="fa fa-check"></i></a></td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>


            <!-- /.box -->
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

<script>
    //    document.getElementById("radioButton").click()
    function radioClick(val) {
        var option = val;

        switch (option) {
            case 1:
                document.getElementById("jsstartdivision").style.display = "" ;
                document.getElementById("jslppoints").style.display = "";
                document.getElementById("jsenddivision").style.display = "";
                document.getElementById("jsgejnumber").style.display = "none";
                document.getElementById("jswinnumber").style.display = "none";
                break;
            case 2:
                document.getElementById("jsstartdivision").style.display = "none";
                document.getElementById("jslppoints").style.display = "none";
                document.getElementById("jsenddivision").style.display = "none";
                document.getElementById("jsgejnumber").style.display = "";
                document.getElementById("jswinnumber").style.display = "";
                break;
            case 3:
                document.getElementById("jsstartdivision").style.display = "none";
                document.getElementById("jslppoints").style.display = "none";
                document.getElementById("jsenddivision").style.display = "none";
                document.getElementById("jsgejnumber").style.display = "none";
                document.getElementById("jswinnumber").style.display = "";
                break;
            case 4:
                if (document.getElementById("duo").checked) {
                    document.getElementById("jsstartdivision").style.display = "none";
                    document.getElementById("jslppoints").style.display = "none";
                    document.getElementById("jsenddivision").style.display = "none";
                    document.getElementById("jsgejnumber").style.display = "none";
                    document.getElementById("jswinnumber").style.display = "none";
                } else {
                    document.getElementById("jsstartdivision").style.display = "none";
                    document.getElementById("jslppoints").style.display = "none";
                    document.getElementById("jsenddivision").style.display = "none";
                    document.getElementById("jsgejnumber").style.display = "";
                    document.getElementById("jswinnumber").style.display = "";
                }
                break;
            case 5:
                document.getElementById("jsplayerSummonerName").style.display = "none";
                if(document.getElementById("normal").checked) {
                    document.getElementById("jsstartdivision").style.display = "none";
                    document.getElementById("jslppoints").style.display = "none";
                    document.getElementById("jsenddivision").style.display = "none";
                    document.getElementById("jsgejnumber").style.display = "";
                    document.getElementById("jswinnumber").style.display = "";
                }
                break;
            case 6:
                document.getElementById("jsplayerSummonerName").style.display = "";
                if(document.getElementById("normal").checked) {
                    document.getElementById("jsstartdivision").style.display = "none";
                    document.getElementById("jslppoints").style.display = "none";
                    document.getElementById("jsenddivision").style.display = "none";
                    document.getElementById("jsgejnumber").style.display = "none";
                    document.getElementById("jswinnumber").style.display = "none";
                }
                break;
        }
    }

</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>