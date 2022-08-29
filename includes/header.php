<?php

	date_default_timezone_set("Asia/Kolkata");
	include("includes/connection.php");
	include("includes/session_check.php");

	//Get file name
	$currentFile = $_SERVER["SCRIPT_NAME"];
	$parts = Explode('/', $currentFile);
	$currentFile = $parts[count($parts) - 1];

	$requestUrl = $_SERVER["REQUEST_URI"];
	$urlparts = Explode('/', $requestUrl);
	$redirectUrl = $urlparts[count($urlparts) - 1];

	$mysqli->set_charset("utf8mb4");

?>
<!DOCTYPE html>
<html>

<head>
	<meta name="author" content="">
	<meta name="description" content="">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo (isset($page_title)) ? $page_title.' | '.APP_NAME : APP_NAME; ?></title>
	<link rel="icon" href="images/<?php echo APP_LOGO;?>" sizes="16x16">
 <link rel="icon" type="image/png" sizes="16x16" href="images/<?php echo APP_LOGO;?>">
 

    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./vendor/chartist/css/chartist.min.css">
    <!--<link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">-->
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/stylish-tooltip.css">
    <link rel="stylesheet" type="text/css" href="assets/sweetalert/sweetalert.css">

	<style type="text/css">
		.btn_edit,
		.btn_delete,
		.btn_cust {
			padding: 5px 10px !important;
		}

		.sweet-alert h2 {
			font-size: 20px !important;
		}

		.sa-button-container .btn {
			font-size: 14px;
			padding: 6px 20px;
			font-weight: 500;
		}

		.multi_action .dropdown-menu {
			padding-top: 0px;
			padding-bottom: 0px;
			box-shadow: 0px 6px 12px 1px rgba(4, 4, 4, 0.23);
		}

		.multi_action .dropdown-menu>li>a {
			padding: 8px 20px !important;
		}

		.multi_action .dropdown-menu>li>a {
			border-bottom: 1px solid #eee;
		}

		p.not_data {
			font-size: 16px;
			text-align: center;
			margin-top: 10px;
		}
		.top{
			position: relative !important;
			padding: 0px 0px 20px 0px !important;
		}
		.dataTables_wrapper{
			overflow: initial !important;
		}
		
		@media (min-width:200px) and (max-width:991px) {
			.mytooltip:hover .tooltip-content {
				display: none
			}
		}
	</style>
</head>

<body>
  <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="home.php" class="brand-logo">
                <img class="logo-abbr" src="images/<?php echo APP_LOGO;?>" alt="app logo">
                <!--<img class="logo-compact" src="./images/logo-text.png" alt="">-->
                <!--<img class="brand-title" src="./images/logo-text.png" alt="">-->
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
     <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                          
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link dz-fullscreen primary" href="#">
                                  <svg id="Capa_1" enable-background="new 0 0 482.239 482.239" height="22" viewBox="0 0 482.239 482.239" width="22" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m0 17.223v120.56h34.446v-103.337h103.337v-34.446h-120.56c-9.52 0-17.223 7.703-17.223 17.223z" fill=""/>
                                    <path d="m465.016 0h-120.56v34.446h103.337v103.337h34.446v-120.56c0-9.52-7.703-17.223-17.223-17.223z" fill=""/>
                                    <path d="m447.793 447.793h-103.337v34.446h120.56c9.52 0 17.223-7.703 17.223-17.223v-120.56h-34.446z" fill="" />
                                    <path d="m34.446 344.456h-34.446v120.56c0 9.52 7.703 17.223 17.223 17.223h120.56v-34.446h-103.337z" fill=""/>
                                  </svg>
                                </a>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <div class="header-info">
                                      <span><strong><?php echo APP_NAME;?></strong></span>
                                    </div>
                                    <?php if(PROFILE_IMG){?>          
                                    <img src="images/<?php echo PROFILE_IMG;?>" width="20" alt=""/>
                                    <?php }else{?>
                                    <img src="images/profile/pic1.jpg" width="20" alt=""/>
                                    <?php }?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="profile.php" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                          <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="logout.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                          <polyline points="16 17 21 12 16 7"></polyline>
                                          <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
  <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li <?php if($currentFile=="manage_page_category.php" or $currentFile=="add_page_category.php"){?>class="mm-active"<?php }?>>
                        <a href="manage_page_category.php" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                            <span class="nav-text">Page Category</span>
                        </a>
                    </li>
                    <li <?php if($currentFile=="manage_pages.php" or $currentFile=="add_pages.php"){?>class="mm-active"<?php }?>>
                        <a href="manage_pages.php" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-file" aria-hidden="true"></i>
                            <span class="nav-text">Pages</span>
                        </a>
                    </li>
                    <li <?php if($currentFile=="manage_apps.php" or $currentFile=="add_apps.php"){?>class="mm-active"<?php }?>>
                        <a href="manage_apps.php" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-vimeo" aria-hidden="true"></i>
                            <span class="nav-text">Apps</span>
                        </a>
                    </li>
                    <li <?php if($currentFile=="manage_vpn_key.php" or $currentFile=="add_vpn_key.php"){?>class="mm-active"<?php }?>>
                        <a href="manage_vpn_key.php" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            <span class="nav-text">Vpn Key</span>
                        </a>
                    </li>
                    <li <?php if($currentFile=="manage_country.php" or $currentFile=="add_country.php"){?>class="mm-active"<?php }?>>
                        <a href="manage_country.php" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                            <span class="nav-text">Country</span>
                        </a>
                    </li>
				    
                    <li <?php if($currentFile=="manage_users.php" or $currentFile=="add_user.php" or $currentFile == "user_profile.php"){?>class="mm-active"<?php }?>>
                        <a href="manage_users.php" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span class="nav-text">Users</span>
                        </a>
                    </li>

                    <li <?php if($currentFile=="manage_block_users.php" or $currentFile=="add_block_user.php"){?>class="mm-active"<?php }?>>
                        <a href="manage_block_users.php" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span class="nav-text">Block Users</span>
                        </a>
                    </li>
                    
                    <li <?php if(isset($active_page) && $active_page=="user"){ echo 'active'; }?>>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span class="nav-text">Settings</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="app_settings.php" <?php if($currentFile=="app_settings.php"){?>class="mm-active"<?php }?>>App settings</a></li>
                        </ul>
                    </li> 
                    	<?php if (file_exists('api.php')) { ?>
                     <li <?php if($currentFile=="api.php"){?>class="mm-active"<?php }?>>
                        <a href="api_urls.php" class="ai-icon" aria-expanded="false">
                            <i class="fa fa-exchange" aria-hidden="true"></i>
                            <span class="nav-text">API URLS</span>
                        </a>
                    </li>
                    <?php } ?>

                </ul>
            
                <div class="add-menu-sidebar">
                     <p><strong><a href="https://example.com" target="_blank"  style="color: #ffffff !important;"> Example Site</a></strong> © 2021 All Rights Reserved</p>
                </div>
            </div>
        </div>
	
        

<!--<script type="text/javascript" src="assets/js/vendor.js"></script> -->
<script type="text/javascript" src="assets/js/app.js"></script>

    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/deznav-init.js"></script>

    <script src="assets/ckeditor/ckeditor.js"></script>
  
    <!-- Counter Up -->
    <script src="./vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script> 
    
    <!-- Apex Chart -->
    <script src="./vendor/apexchart/apexchart.js"></script> 
  
    <!-- Chart piety plugin files -->
    <script src="./vendor/peity/jquery.peity.min.js"></script>
  
    <!-- Dashboard 1 -->
    <script src="./js/dashboard/dashboard-1.js"></script>
    
    <script type="text/javascript" src="assets/js/vendor.js"></script> 
<script type="text/javascript" src="assets/js/app.js"></script>

<script src="assets/js/notify.min.js"></script>

<script type="text/javascript" src="assets/sweetalert/sweetalert.min.js"></script>
    <!-- For Bootstrap Tags -->
    <script type="text/javascript" src="assets/bootstrap-tag/bootstrap-tagsinput.js"></script>
    <!-- End -->
   <script>
        $(function() {
            $(".disabled").prop('disabled', true);
        });
    </script>
<script>
$("#checkall").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script> 

<?php if(isset($_SESSION['msg'])){?>

<script type="text/javascript">
  $('.notifyjs-corner').empty();
  $.notify(
    '<?php echo $client_lang[$_SESSION["msg"]];?>',
    { position:"top center",className: '<?=isset($_SESSION["class"]) ? $_SESSION["class"] : "success" ?>'}
  );
</script>
<?php
  unset($_SESSION['msg']);
  unset($_SESSION['class']);	 
  } 
?>
<script type="text/javascript">

if($(".dropdown-li").hasClass("active")){
    var _test='<?php echo $active_page; ?>';
    $("."+_test).next(".cust-dropdown-container").show();
    $("."+_test).find(".title").next("i").removeClass("fa-angle-right");
    $("."+_test).find(".title").next("i").addClass("fa-angle-down");
  }

  $(document).ready(function(e){
    var _flag=false;

    $(".dropdown-a").click(function(e){

      $(this).parents("ul").find(".cust-dropdown-container").slideUp();

      $(this).parents("ul").find(".title").next("i").addClass("fa-angle-right");
      $(this).parents("ul").find(".title").next("i").removeClass("fa-angle-down");

      if($(this).parent("li").next(".cust-dropdown-container").css('display') !='none'){
          $(this).parent("li").next(".cust-dropdown-container").slideUp();
          $(this).find(".title").next("i").addClass("fa-angle-right");
          $(this).find(".title").next("i").removeClass("fa-angle-down");
      }else{
        $(this).parent("li").next(".cust-dropdown-container").slideDown();
        $(this).find(".title").next("i").removeClass("fa-angle-right");
        $(this).find(".title").next("i").addClass("fa-angle-down");
      }

    });
  });
  
</script>
</body>
</html>