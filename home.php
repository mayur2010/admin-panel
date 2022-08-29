<?php 

    $page_title="Dashboard";
    include("includes/header.php");
    include("includes/function.php");

    $qry_page_cat = "SELECT COUNT(*) as num FROM tbl_page_category";
    $total_page_category = mysqli_fetch_array(mysqli_query($mysqli, $qry_page_cat));
    $total_page_category = $total_page_category['num'];

    $qry_page = "SELECT COUNT(*) as num FROM tbl_pages";
    $total_pages = mysqli_fetch_array(mysqli_query($mysqli, $qry_page));
    $total_pages = $total_pages['num'];

    $qry_apps = "SELECT COUNT(*) as num FROM tbl_apps";
    $total_apps = mysqli_fetch_array(mysqli_query($mysqli, $qry_apps));
    $total_apps = $total_apps['num'];


    $qry_key = "SELECT COUNT(*) as num FROM tbl_vpn_key";
    $total_key = mysqli_fetch_array(mysqli_query($mysqli, $qry_key));
    $total_key = $total_key['num'];


    $qry_country = "SELECT COUNT(*) as num FROM tbl_country";
    $total_country = mysqli_fetch_array(mysqli_query($mysqli, $qry_country));
    $total_country= $total_country['num'];

    $qry_users = "SELECT COUNT(*) as num FROM tbl_users";
    $total_users = mysqli_fetch_array(mysqli_query($mysqli, $qry_users));
    $total_users = $total_users['num'];

    $countStr='';
    $no_data_status=false;
    $count=$monthCount=0;

    for ($mon=1; $mon<=12; $mon++) {

        if(date('n') < $mon){
          break;
        }

        if(isset($_GET['filterByYear'])){

          $year=$_GET['filterByYear'];

          $month = date('M', mktime(0,0,0,$mon, 1, $year));

          $sql_user="SELECT `id` FROM tbl_users WHERE `id` <> 0 AND DATE_FORMAT(FROM_UNIXTIME(`registered_on`), '%c') = '$mon' AND DATE_FORMAT(FROM_UNIXTIME(`registered_on`), '%Y') = '$year'";
        }
        else{

          $month = date('M', mktime(0,0,0,$mon, 1, date('Y')));

          $sql_user="SELECT `id` FROM tbl_users WHERE `id` <> 0 AND DATE_FORMAT(FROM_UNIXTIME(`registered_on`), '%c') = '$mon'";
        }

        $count=mysqli_num_rows(mysqli_query($mysqli, $sql_user));

        $countStr.="['".$month."', ".$count."], ";

        if($count!=0){
          $monthCount++;
        }

    }

    if($monthCount!=0){
      $no_data_status=false;
    }
    else{
      $no_data_status=true;
    }

    $countStr=rtrim($countStr, ", ");

?>

 
<div class="content-body">
	<div class="container-fluid">
    <div class="row">
			<div class="col-xl-4 col-xxl-4 col-lg-6 col-md-6 col-sm-6">
        <a  href="manage_page_category.php">
					<div class="widget-stat card">
						<div class="card-body p-4">
							<div class="media ai-icon">
								<span class="mr-3 bgl-primary text-primary">
									 <i class="fa fa-sitemap" aria-hidden="true"></i>
								</span>
								<div class="media-body">
									<h3 class="mb-0 text-black">
                    <span class="counter ml-0"><?php echo thousandsNumberFormat($total_page_category); ?></span>
                  </h3>
									<p class="mb-0">Page Category</p>
								</div>
							</div>
						</div>
					</div>
        </a>
			</div>
			<div class="col-xl-4 col-xxl-4 col-lg-6 col-md-6 col-sm-6">
        <a  href="manage_pages.php">
					<div class="widget-stat card">
						<div class="card-body p-4">
							<div class="media ai-icon">
								<span class="mr-3 bgl-primary text-primary">
									 <i class="fa fa-buysellads" aria-hidden="true"></i>
								</span>
								<div class="media-body">
									<h3 class="mb-0 text-black">
                    <span class="counter ml-0"><?php echo thousandsNumberFormat($total_pages); ?></span>
                  </h3>
									<p class="mb-0">Pages</p>
								</div>
							</div>
						</div>
					</div>
        </a>
			</div>
			<div class="col-xl-4 col-xxl-4 col-lg-6 col-md-6 col-sm-6">
        <a  href="manage_apps.php">
					<div class="widget-stat card">
						<div class="card-body p-4">
							<div class="media ai-icon">
								<span class="mr-3 bgl-primary text-primary">
									 <i class="fa fa-book" aria-hidden="true"></i>
								</span>
								<div class="media-body">
									<h3 class="mb-0 text-black">
                    <span class="counter ml-0"><?php echo thousandsNumberFormat($total_apps); ?></span>
                  </h3>
									<p class="mb-0">Apps</p>
								</div>
							</div>
						</div>
					</div>
        </a>
			</div>
			<div class="col-xl-4 col-xxl-4 col-lg-6 col-md-6 col-sm-6">
        <a  href="manage_vpn_key.php">
					<div class="widget-stat card">
						<div class="card-body p-4">
							<div class="media ai-icon">
								<span class="mr-3 bgl-primary text-primary">
									 <i class="fa fa-contao" aria-hidden="true"></i>
								</span>
								<div class="media-body">
									<h3 class="mb-0 text-black">
                    <span class="counter ml-0"><?php echo thousandsNumberFormat($total_key); ?></span>
                  </h3>
									<p class="mb-0">Vpn Key</p>
								</div>
							</div>
						</div>
					</div>
        </a>
			</div>
			<div class="col-xl-4 col-xxl-4 col-lg-6 col-md-6 col-sm-6">
        <a  href="manage_country.php">
					<div class="widget-stat card">
						<div class="card-body p-4">
							<div class="media ai-icon">
								<span class="mr-3 bgl-primary text-primary">
									 <i class="fa fa-list" aria-hidden="true"></i>
								</span>
								<div class="media-body">
									<h3 class="mb-0 text-black">
                    <span class="counter ml-0"><?php echo thousandsNumberFormat($total_country); ?></span>
                  </h3>
									<p class="mb-0">Countries</p>
								</div>
							</div>
						</div>
					</div>
        </a>
			</div>
			<div class="col-xl-4 col-xxl-4 col-lg-6 col-md-6 col-sm-6">
        <a  href="manage_users.php">
					<div class="widget-stat card">
						<div class="card-body p-4">
							<div class="media ai-icon">
								<span class="mr-3 bgl-primary text-primary">
									 <i class="fa fa-users" aria-hidden="true"></i>
								</span>
								<div class="media-body">
									<h3 class="mb-0 text-black">
                    <span class="counter ml-0"><?php echo thousandsNumberFormat($total_users); ?></span>
                  </h3>
									<p class="mb-0">Users</p>
								</div>
							</div>
						</div>
					</div>
        </a>
			</div>	
		</div>

<div class="row">
  <div class="col-lg-12">
    <div class="container-fluid row" style="background: #FFF;box-shadow: 0px 5px 10px 0px #CCC;border-radius: 2px;">
      <div class="col-lg-10">
        <h3>Users Analysis</h3>
        <p>New registrations</p>
      </div>
      <div class="col-lg-2" style="padding-top: 20px">
        <form method="get" id="graphFilter">
          <select class="form-control" name="filterByYear" style="box-shadow: none;height: auto;border-radius: 0px;font-size: 16px;">
            <?php 
              $currentYear=date('Y');
              $minYear=2020;

              for ($i=$currentYear; $i >= $minYear ; $i--) { 
                ?>
                <option value="<?=$i?>" <?=(isset($_GET['filterByYear']) && $_GET['filterByYear']==$i) ? 'selected' : ''?>><?=$i?></option>
                <?php
              }
            ?>
          </select>
        </form>
      </div>
      <div class="col-lg-12">
        <?php 
          if($no_data_status){
            ?>
            <h3 class="text-muted text-center" style="padding-bottom: 2em">No data found !</h3>
            <?php
          }
          else{
            ?>
            <div id="registerChart">
              <p style="text-align: center;"><i class="fa fa-spinner fa-spin" style="font-size:3em;color:#aaa;margin-bottom:50px" aria-hidden="true"></i></p>
            </div>
            <?php    
          }
        ?>
      </div>
    </div>
  </div>

<?php include("includes/footer.php"); ?>

<?php 
    if(!$no_data_status){
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'line']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Month');
      data.addColumn('number', 'Users');

      data.addRows([<?=$countStr?>]);

      var options = {
        curveType: 'function',
        fontSize: 15,
        hAxis: {
          title: "Months of <?=(isset($_GET['filterByYear'])) ? $_GET['filterByYear'] : date('Y')?>",
          titleTextStyle: {
            color: '#000',
            bold:'true',
            italic: false
          },
        },
        vAxis: {
          title: "Nos of Users",
          titleTextStyle: {
            color: '#000',
            bold:'true',
            italic: false,
          },
          gridlines: { count: 5},
          format: '#',
          viewWindowMode: "explicit", viewWindow:{ min: 0 },
        },
        height: 400,
        chartArea:{
          left:100,top:20,width:'100%',height:'auto'
        },
        legend: {
            position: 'none'
        },
        lineWidth:4,
        animation: {
          startup: true,
          duration: 1200,
          easing: 'out',
        },
        pointSize: 5,
        pointShape: "circle",

      };
      var chart = new google.visualization.LineChart(document.getElementById('registerChart'));

      chart.draw(data, options);
    }

    $(document).ready(function () {
        $(window).resize(function(){
            drawChart();
        });
    });
</script>

<?php } ?>

<script type="text/javascript">
  
  // filter of graph
  $("select[name='filterByYear']").on("change",function(e){
    $("#graphFilter").submit();
  });

</script>