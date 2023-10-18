<!DOCTYPE html PUBLIC"">
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Misak</title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">




 <!--\\\\\\\ estilos css \\\\\\-->
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<link href="css/animate.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="css/jquerysctipttop.css" rel="stylesheet" type="text/css">


</head>
<body class="light_theme  fixed_header left_nav_fixed">
<div class="wrapper">
  <!--\\\\\\\ wrapper Start \\\\\\-->
  <div class="header_bar">
    <!--\\\\\\\ header Start \\\\\\-->
    
    <!--\\\\\\\ brand end \\\\\\-->
    <div class="header_top_bar">
      <!--\\\\\\\ header top bar start \\\\\\-->
      <a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>
     
	  
	  <div class="top_right_bar">
        <div class="top_right">
          <div class="top_right_menu">
            <ul>
              
              <li class="dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"> Traductor <span class="badge badge color_2">2</span> </a>
                <div class="notification_drop_down dropdown-menu">
                  <div class="top_pointer"></div>
                  <div class="box"> <a href="inbox.html"> <span class="block primery_6"> <i class="fa fa-envelope-o"></i> </span> <span class="block_text">Mailbox</span> </a> </div>
				  
                  <div class="box"> <a href="calendar.html"> <span class="block primery_2"> <i class="fa fa-calendar-o"></i> </span> <span class="block_text">Misak</span> </a> </div>
				  <div class="box"> <a href="calendar.html"> <span class="block primery_2"> <i class="fa fa-calendar-o"></i> </span> <span class="block_text">Español</span> </a> </div>
                  <div class="box"> <a href="maps.html"> <span class="block primery_4"> <i class="fa fa-map-marker"></i> </span> <span class="block_text">Map</span> </a> </div>
                  <div class="box"> <a href="todo.html"> <span class="block primery_3"> <i class="fa fa-plane"></i> </span> <span class="block_text">To-Do</span> </a> </div>
                  <div class="box"> <a href="task.html"> <span class="block primery_5"> <i class="fa fa-picture-o"></i> </span> <span class="block_text">Tasks</span> </a> </div>
                  <div class="box"> <a href="timeline.html"> <span class="block primery_1"> <i class="fa fa-clock-o"></i> </span> <span class="block_text">Timeline</span> </a> </div>
                
				</div>
              </li>
            </ul>
          </div>
        </div>
        <div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img src="images/shura.png" width="20" /><span class="user_adminname">USUARIO:{{ Auth::user()->name }}</span> <b class="caret"></b> </a>
            <ul class="dropdown-menu">
            <div class="top_pointer"></div>
            <li> <a href="profile.html"><i class="fa fa-user"></i>Usuario</a> </li>
            <li> <a href="help.html"><i class="fa fa-question-circle"></i>Ayuda</a> </li>
			<!--
            <li> <a href="settings.html"><i class="fa fa-cog"></i>  </a></li>
            -->
			<li> <a class="fa  fa-power-off" href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">SALIR</a>
		           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                   </form>
			</li>
          </ul>  
        </div>

        <a href="javascript:;" class="toggle-menu menu-right push-body jPushMenuBtn rightbar-switch"><i class="fa fa-comment chat"></i></a>
        
      </div>
    </div>
    <!--\\\\\\\ header top bar end \\\\\\-->
  </div>
  <!--\\\\\\\ header end \\\\\\-->
  <div class="inner">
    <!--\\\\\\\ inner start \\\\\\--><div class="left_nav">

       <img src="{{ asset('images/logo-web.png') }}"  width="215"  class="img-circle profile_img">
       
	     <br>
	  	<br>
	  	<br>
      <div class="left_nav_slidebar">
        <ul>
		
          <li class="left_nav_active theme_border"><a href="javascript:void(0);"><i class="fa fa-home"></i> MENU <span class="left_nav_pointer"></span> <span class="plus"><i class="fa fa-plus"></i></span> </a>
           <ul class="opened" style="display:block">
		    
              <!--<li> <a href="index.html"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b class="theme_color">Dashboard</b> </a> </li>
              <li> <a href="settings.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Settings</b> </a> </li>
              <li> <a href="layouts.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Layouts</b> </a> </li>
              <li> <a href="themes.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Themes</b> </a> </li>
              <li> <a href="widgets.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Widgets</b> </a> </li>
              <li> <a href="animations.html"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Animations</b> </a> </li>-->
            </ul> 
          </li>
		  
          <li> <a href="javascript:void(0);"> <i class="fa fa-edit"></i> CENSO POBLACIONAL <span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul>
			
              <li> <a href="{{ url('Hogar') }}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Nuevo Censo</b> </a> </li>
              <li> <a href="#"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Actualización</b> </a> </li>
              <li> <a href="#"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Otros</b> </a> </li>
              
        
            </ul>
          </li>
            <li> <a href="javascript:void(0);"> <i class="fa fa-tasks"></i>CUNSULTA POBLACIONAL<span class="plus"><i class="fa fa-plus"></i></span></a>
            <ul>
              <li> <a href="{{ url('informacion-perosona') }}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Informacion Habitante</b> </a> </li>
              <li> <a href="{{ url('#') }}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Cultural</b> </a> </li>
              <li> <a href="{{ url('#') }}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Familiar</b> </a> </li>
              <li> <a href="{{ url('#') }}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Vivienda</b> </a> </li>
            </ul>
          </li>
           <li> <a href="javascript:void(0);"> <i class="fa fa-users icon"></i> INFORMACIÓN GENERA <span class="plus"><i class="fa fa-plus"></i></span> </a>
            <ul class="opened" style="display:block">
              <li> <a href="{{ url('Censo_General') }}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Censo General </b> </a> </li>
              <li> <a href="{{ url('Reporte') }}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Habitantes</b> </a> </li>
              <li> <a href="{{ url('#') }}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Familia</b> </a> </li>
              <li> <a href="{{ url('#') }}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Cultural</b> </a> </li>
              <li> <a href="{{ url('#') }}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Otro</b> </a> </li>
              <li> <a href="{{ url('#') }}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Otros</b> </a> </li>
              <li> <a href="{{ url('#') }}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Otros</b> </a> </li>
            </ul>
          </li>
		  <!--
          <li> <a href="javascript:void(0);"> <i class="fa fa-envelope"></i> EMAIL <span class="plus"><i class="fa fa-plus"></i></span> </a>
            <ul>
              <li> <a href="{{ url('#') }}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Inbox</b> </a> </li>
              <li> <a href="{{ url('#') }}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Compose</b> </a> </li>
              <li> <a href="{{ url('#') }}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Read Mail</b> </a> </li>
            </ul>
          </li>-->
		  
        
          
        </ul>
      </div>
    </div>
    <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Administrador</h1>
          <h2 class="">Informacion</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Informacion</a></li>
            <li class="active">Habitante</li>
          </ol>
        </div>
      </div>



      
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <div class="row">
		<!--
          <div class="col-sm-3 col-sm-6">
            <div class="information green_info">   
              <div class="information_inner">
              	<div class="info green_symbols"><i class="fa fa-users icon"></i></div>
                <span>TODAY SALES </span>
                <h1 class="bolded">12,254K</h1>
                <div class="infoprogress_green">
                  <div class="greenprogress"></div>
                </div>
                <b class=""><small>Better than yesterday ( 7,5% )</small></b>
                <div class="pull-right" id="work-progress1">
                  <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;" width="47" height="25"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-sm-6">
            <div class="information blue_info">
              <div class="information_inner">
              <div class="info blue_symbols"><i class="fa fa-shopping-cart icon"></i></div>
                <span>TODAY FEEDBACK</span>
                <h1 class="bolded">12,254K</h1>
                <div class="infoprogress_blue">
                  <div class="blueprogress"></div>
                </div>
                <b class=""><small>Better than yesterday ( 7,5% )</small></b>
                <div class="pull-right" id="work-progress2">
                  <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;" width="47" height="25"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-sm-6">
            <div class="information red_info">
              <div class="information_inner">
              <div class="info red_symbols"><i class="fa fa-comments icon"></i></div>
                <span>TODAY EARNINGS</span>
                <h1 class="bolded">12,254K</h1>
                <div class="infoprogress_red">
                  <div class="redprogress"></div>
                </div>
                <b class=""><small>Better than yesterday ( 7,5% )</small></b>
                <div class="pull-right" id="work-progress3">
                  <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;" width="47" height="25"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-sm-6">
           <div class="information gray_info">
              <div class="information_inner">
              <div class="info gray_symbols"><i class="fa fa-money icon"></i></div>
                <span>TODAY VISITS </span>
                <h1 class="bolded">12,254K</h1>
                <div class="infoprogress_gray">
                  <div class="grayprogress"></div>
                </div>
                <b class=""><small>Better than yesterday ( 7,5% )</small></b>
                <div class="pull-right" id="work-progress4">
                  <canvas style="display: inline-block; width: 47px; height: 25px; vertical-align: top;" width="47" height="25"></canvas>
                </div>
              </div>
            </div>
          </div>-->
        </div>
        
        
        <div class="row">
          <div class="col-md-12">
            <div class="block-web">
              <div class="header">
                <h3 class="content-header">Reporte Poblacional</h3>
              </div>
              <div class="porlets-content">
                <div id="graph"></div>
              </div>
              <!--/porlets-content-->
            </div>
            <!--/block-web-->
          </div>
          <!--/col-md-12-->
        </div>
        <!--/row-->
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->
  </div>
  <!--\\\\\\\ inner end\\\\\\-->
  
             
<!----Java cript -->
<script src="js/jquery-2.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/common-script.js"></script>
<script src="js/graph.js"></script>
<script src="js/edit-graph.js"></script>





</body>
</html>
