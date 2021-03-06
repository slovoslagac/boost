<?php
include(join(DIRECTORY_SEPARATOR, array('includes', 'init.php')));

if (!$session->isLoggedIn()) {
  redirectTo("login.php");
}


include $headLayout;

?>
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
                  <a href="logout.php" class="btn btn-default btn-flat">Odjavi se</a>
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
                <div class="new_order"><button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#novi-order">Dodaj novi order</button></div>
            </div>
              <div class="modal fade" id="novi-order">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Dodaj novi order</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Username accounta</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Unesi username mušterije">
                            </div>
                              <hr>
                              <label for="exampleInputEmail1">Server</label>
                            <div class="form-group" style="margin-top:10px;">
                              <div class="radio">
                                <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                  Europe West
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                  Europe North East
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                  North America
                                </label>
                              </div>
                            </div> 
                              <hr>
                            <div class="form-group">
                              <label>Početna divizija</label>
                              <select class="form-control">
                                <option>Gold 1</option>
                                <option>Gold 2</option>
                                <option>Gold 3</option>
                                <option>Gold 4</option>
                                <option>Gold 5</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Broj LP poena</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Unesi broj LP poena na početku">
                            </div>  
                            <div class="form-group">
                              <label>Krajnja divizija</label>
                              <select class="form-control">
                                <option>Gold 1</option>
                                <option>Gold 2</option>
                                <option>Gold 3</option>
                                <option>Gold 4</option>
                                <option>Gold 5</option>
                              </select>
                            </div>
                              <hr>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Cena ordera</label>
                              <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Unesi cenu boosta">
                            </div>  
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Zatvori</button>
                            <button type="button" class="btn btn-primary">Dodaj order</button>
                          </div>
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
                  <td style="line-height:32px; text-align:center; width:10px;">1.</td>
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
                  <td style="line-height:32px; text-align:center; width:10px;">2.</td>
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
                  <td style="line-height:32px; text-align:center; width:10px;">3.</td>
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
          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Zarada prethodnih dana</h3>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      
      
      <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">Konstantin Stikić</h3>
              <h5 class="widget-user-desc">Saintsu</h5>
              <div class="zarada">47€</div>    
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="dist/img/user1-128x128.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">30/60</h5>
                    <span class="description-text">GEJMOVI</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">50%</h5>
                    <span class="description-text">WIN RATE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">35€/dan</h5>
                    <span class="description-text">ZARADA</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                  <div class="isplata"><button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#zakazi-isplatu">Zakaži isplatu</button></div>
                  <div class="modal fade" id="zakazi-isplatu">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Zakazivanje isplate</h4>
                          </div>
                          <div class="modal-body">
                            <p><input class="form-control input-lg" type="number" placeholder=""></p>
                            <p>Maksimalan iznos koji možete podići je 47€</p>  
                            <p>Iznos u dinarima: <b>5.804 Din</b></p>  
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Zatvori</button>
                            <button type="button" class="btn btn-primary">Zakaži isplatu</button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Zarada Jun 2017.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th style="width: 20px">#</th>
                  <th>Booster</th>
                  <th style="width: 40px">€</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Shy</td>
                  <td><span class="badge bg-red">117€</span></td>
                </tr>
                  <tr>
                  <td>2.</td>
                  <td>Sima</td>
                  <td><span class="badge bg-red">98€</span></td>
                </tr>
                  <tr>
                  <td>3.</td>
                  <td>Palamudin</td>
                  <td><span class="badge bg-red">93€</span></td>
                </tr>
                  <tr>
                  <td>4.</td>
                  <td>Glisha</td>
                  <td><span class="badge bg-red">88€</span></td>
                </tr>
                  <tr>
                  <td>5.</td>
                  <td>Matija</td>
                  <td><span class="badge bg-red">54€</span></td>
                </tr>
                  <tr>
                  <td>6.</td>
                  <td>Saintsu</td>
                  <td><span class="badge bg-red">23€</span></td>
                </tr>
                  <tr>
                  <td>7.</td>
                  <td>Bang</td>
                  <td><span class="badge bg-red">21€</span></td>
                </tr>
                  <tr>
                  <td>8.</td>
                  <td>Rengar</td>
                  <td><span class="badge bg-red">10€</span></td>
                </tr>
                  <tr>
                  <td>6.</td>
                  <td>Saintsu</td>
                  <td><span class="badge bg-red">23€</span></td>
                </tr>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      <div class="col-md-12">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vesti
        <small>Važne infomracije u vezi BoostRoom-a</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    07 Jun. 2017
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-exclamation-triangle bg-red"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">Dado</a>: Rezervacije</h3>

                <div class="timeline-body">
                  Radi bolje organizacije i što bolje iskorišćenosti računara od danas je obavezno rezervisati termin u kojem želite da boostujete. Postavljene rezervacije su obavezne i moraju se poštovati. Booster bez rezervacije može zauzeti samo kompjuter koji nije rezervisan.<br><br>
                  Booster koji rezerviše računar, a ne ispoštuje rezervaciju, gubiće pravo da rezerviše računar. Zakazana rezervacija se poštuje sa najviše 15 minuta zakašnjenja, nakon toga je računar slobodan.    
                </div>

              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    06 Jun. 2017
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-camera bg-purple"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                <div class="timeline-body">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-video-camera bg-maroon"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 days ago</span>

                <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>

                <div class="timeline-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs"
                            frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
                <div class="timeline-footer">
                  <a href="#" class="btn btn-xs bg-maroon">See comments</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      
      <!-- /.row -->

    </section>
    <!-- /.content -->
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

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>