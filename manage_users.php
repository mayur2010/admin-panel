<?php

	$page_title = "Manage Users";

	include('includes/header.php');
	include('includes/function.php');
	include('language/language.php');

	$tableName="tbl_users";   
	$targetpage = "manage_users.php"; 
	$limit = 15; 

	$keyword='';

	if(!isset($_GET['keyword']))
	{
		$query = "SELECT COUNT(*) as num FROM $tableName";
	}
	else
	{

		$keyword=addslashes(trim($_GET['keyword']));

		$query = "SELECT COUNT(*) as num FROM $tableName WHERE (`device_id` LIKE '%$keyword%' OR `country` LIKE '%$keyword%' OR `country_code` LIKE '%$keyword%' OR `city` LIKE '%$keyword%' OR `zip` LIKE '%$keyword%' OR `lat` LIKE '%$keyword%' OR `lon` LIKE '%$keyword%' OR `timezone` LIKE '%$keyword%' OR `isp` LIKE '%$keyword%' OR `org` LIKE '%$keyword%' OR `as_` LIKE '%$keyword%' OR `query` LIKE '%$keyword%' OR `package` LIKE '%$keyword%' OR `registered_on` LIKE '%$keyword%')";

		$targetpage = "manage_users.php?keyword=".$_GET['keyword'];

	}

	$total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
	$total_pages = $total_pages['num'];

	$stages = 3;
	$page=0;
	if(isset($_GET['page'])){
		$page = mysqli_real_escape_string($mysqli,$_GET['page']);
	}
	if($page){
		$start = ($page - 1) * $limit; 
	}else{
		$start = 0; 
	} 

	if(!isset($_GET['keyword']))
	{
		if(isset($_GET['package']))
		{
			$package = $_GET['package'];
            $sql_query="SELECT * FROM tbl_users WHERE `package` = '".$package."' ORDER BY tbl_users.`id` DESC"; 
		}
		else if(isset($_GET['country']))
		{
			$country = $_GET['country'];
            $sql_query="SELECT * FROM tbl_users WHERE `country` = '".$country."' ORDER BY tbl_users.`id` DESC"; 
		}
		else if(isset($_GET['state']))
		{
			$state = $_GET['state'];
            $sql_query="SELECT * FROM tbl_users WHERE `region_name` = '".$state."' ORDER BY tbl_users.`id` DESC"; 
		}
		else if(isset($_GET['city']))
		{
			$city = $_GET['city'];
      $sql_query="SELECT * FROM tbl_users WHERE `city` = '".$city."' ORDER BY tbl_users.`id` DESC"; 
		}
		else if(isset($_GET['datepicker']))
		{
			$datepicker = $_GET['datepicker'];

			// $date = 'July 25 2010';
			$datepicker = date('Y-m-d', strtotime($datepicker));

      $sql_query="SELECT * FROM tbl_users WHERE `register_date` = '".$datepicker."' ORDER BY tbl_users.`id` DESC"; 

      // $sql_query="SELECT * FROM tbl_users ORDER BY tbl_users.`id` DESC LIMIT $start, $limit"; 
		}
		else
		{
			$sql_query="SELECT * FROM tbl_users ORDER BY tbl_users.`id` DESC LIMIT $start, $limit"; 
		}
		
	}
	else
	{

		$sql_query="SELECT * FROM tbl_users WHERE (`device_id` LIKE '%$keyword%' OR `country` LIKE '%$keyword%' OR `country_code` LIKE '%$keyword%' OR `city` LIKE '%$keyword%' OR `zip` LIKE '%$keyword%' OR `lat` LIKE '%$keyword%' OR `lon` LIKE '%$keyword%' OR `timezone` LIKE '%$keyword%' OR `isp` LIKE '%$keyword%' OR `org` LIKE '%$keyword%' OR `as_` LIKE '%$keyword%' OR `query` LIKE '%$keyword%' OR `package` LIKE '%$keyword%' OR `registered_on` LIKE '%$keyword%') ORDER BY tbl_users.`id` DESC LIMIT $start, $limit"; 
	}

	$result=mysqli_query($mysqli,$sql_query) or die(mysqli_error($mysqli));
?>
    <link rel="stylesheet" href="./vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="./vendor/pickadate/themes/default.date.css">

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-6 col-sm-6" align="left">
                    <h2 class="text-black font-w600 mb-1"><?=$page_title?></h2>
                </div>
                <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-3 col-sm-3" align="right">
                 	<div class="search_list">
						<div class="search_block">
							<form method="get" action="">
				                <input class="form-control input-sm" placeholder="Search here..." aria-controls="DataTables_Table_0" type="search" name="keyword" value="<?php if(isset($_GET['keyword'])){ echo $_GET['keyword'];} ?>" required="required">
				            </form>
						</div> 
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-3 col-sm-3" align="right">
                    <a href="add_user.php?add=yes">
                      <button class="btn btn-primary button" type="submit">Add User</button>
                    </a>
                </div>
            </div>
            <hr>

            <form class="row" id="filterForm" accept="" method="GET">
			          <div class="col-md-3 col-xs-12">
			            <select name="package" class="form-control filter package" data-type="package" style="padding: 5px 10px;height: 40px;">
			              <option value="">All Package</option>
			              <?php
			              $sql_package = "SELECT * FROM tbl_apps ORDER BY id";     
			              $res_package = mysqli_query($mysqli, $sql_package);
			              while ($row_package = mysqli_fetch_array($res_package)) {
			              ?>
			                <option value="<?php echo $row_package['package_name']; ?>" <?php if (isset($_GET['package']) && $_GET['package'] == $row_package['package_name']) { echo 'selected'; } ?>><?php echo $row_package['package_name']; ?></option>
			              <?php
			              }
			              ?>
			            </select>
			          </div>
			          <div class="col-md-3 col-xs-12">
			            <select name="country" class="form-control filter country" data-type="country" style="padding: 5px 10px;height: 40px;">
			              <option value="">All Country</option>
			              <?php
			              // $sql_country = "SELECT * FROM tbl_country ORDER BY id"; 
			              $sql_country = "SELECT DISTINCT country FROM tbl_users ORDER BY tbl_users.`country` DESC";    
			              $res_country = mysqli_query($mysqli, $sql_country);
			              while ($row_country = mysqli_fetch_array($res_country)) {
			              ?>
			                <option value="<?php echo $row_country['country']; ?>" <?php if (isset($_GET['country']) && $_GET['country'] == $row_country['country']) { echo 'selected'; } ?>><?php echo $row_country['country']; ?></option>
			              <?php
			              }
			              ?>
			            </select>
			          </div>
			          <div class="col-md-3 col-xs-12">
			            <select name="state" class="form-control filter state" data-type="state" style="padding: 5px 10px;height: 40px;">
			              <option value="">All State</option>
			              <?php
			              if(isset($_GET['country']))
			              {
			              	$country = $_GET['country'];

			                $sql_state = "SELECT DISTINCT region_name FROM tbl_users  WHERE country = '".$country."' ORDER BY tbl_users.`region_name` DESC"; 
			              } 
			              else
			              {
			                $sql_state = "SELECT DISTINCT region_name FROM tbl_users ORDER BY tbl_users.`region_name` DESC"; 
			              } 
			              $res_state = mysqli_query($mysqli, $sql_state);
			              while ($row_state = mysqli_fetch_array($res_state)) {
			              ?>
			                <option value="<?php echo $row_state['region_name']; ?>" <?php if (isset($_GET['state']) && $_GET['state'] == $row_state['region_name']) { echo 'selected'; } ?>><?php echo $row_state['region_name']; ?></option>
			              <?php
			              }
			              ?>
			            </select>
			          </div>
			          <div class="col-md-3 col-xs-12">
			            <select name="city" class="form-control filter city" data-type="city" style="padding: 5px 10px;height: 40px;">
			              <option value="">All City</option>
			              <?php
			              if(isset($_GET['state']))
			              {
			              	$state = $_GET['state'];
			                $sql_city = "SELECT DISTINCT city FROM tbl_users  WHERE region_name = '".$state."' ORDER BY tbl_users.`city` DESC"; 
			              } 
			              else
			              {
			                $sql_city = "SELECT DISTINCT city FROM tbl_users ORDER BY tbl_users.`city` DESC"; 
			              } 
			              $res_city = mysqli_query($mysqli, $sql_city);
			              while ($row_city = mysqli_fetch_array($res_city)) {
			              ?>
			                <option value="<?php echo $row_city['city']; ?>" <?php if (isset($_GET['city']) && $_GET['city'] == $row_city['city']) { echo 'selected'; } ?>><?php echo $row_city['city']; ?></option>
			              <?php
			              }
			              ?>
			            </select>
			          </div>
		        </form>
		        <hr>
		        
		        <form class="row" id="filterForm" accept="" method="GET">
		        	<div class="col-md-2 col-xs-12">
		            <input name="datepicker" class="datepicker-default form-control" 
		                  <?php 
		                    if(isset($_GET['datepicker']) && !empty($_GET['datepicker'])) 
		                    	{ 
		                  ?> value="<?php echo $_GET['datepicker']; ?>"
		                  <?php 
		                      } 
		                  ?> id="datepicker" placeholder="Select Date">
		          </div>
		          <div class="col-md-2 col-xs-12">
		            <button type="submit" class="btn mr-2 btn-primary">Submit</button>
		          </div>
		        </form>
			<div class="col-md-12 col-xs-12 text-right" style="float: right;margin-bottom: 10px;">
                <div>
                    <div class="col-md-4 col-xs-12 text-right" style="float: right;">
                        <div class="checkbox">
                            <input type="checkbox" id="checkall_input">
                            <label for="checkall_input">
                                Select All
                            </label>
                        </div>
                        <div class="dropdown" style="float:right">
                            <button class="btn btn-primary dropdown-toggle btn_cust" type="button" data-toggle="dropdown">Action
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" style="right:0;left:auto;">
                              <li><a href="" class="actions" data-action="enable">Enable</a></li>
                              <li><a href="" class="actions" data-action="disable">Disable</a></li>
                              <li><a href="" class="actions" data-action="delete">Delete !</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
        			<div class="col-md-12 mrg-top table-responsive">
        				<table class="table table-striped table-bordered table-hover">
        					<thead>
        						<tr>
        							<th class="text-center">#</th>
        							<th>Device Id</th>
        							<th>package</th>
        							<th>country</th>
        							<!-- <th>country code</th> -->
        							<th>State</th>
        							<th>city</th>
        							<th>zip</th>
        							<th>Query</th>
        							<th>Date</th>
        							<th>Status</th>
        							<th class="cat_action_list">Action</th>
        						</tr>
        					</thead>
        					<tbody>
        						<?php
        							$i = 0;
        							if(mysqli_num_rows($result) > 0)
        							{
        								while ($users_row = mysqli_fetch_array($result)) {
        						?>
        							<tr>
        								<td width="50">
        									<div class="checkbox" style="float: right;margin: 0px">
        										<input type="checkbox" name="post_ids[]" id="checkbox<?php echo $i; ?>" value="<?php echo $users_row['id']; ?>" class="post_ids" style="margin: 0px;">
        										<label for="checkbox<?php echo $i;?>"></label>
        									</div>
        								</td>
        								<td style="word-break: break-all;"><?php echo $users_row['device_id']; ?></td>
        								<td style="word-break: break-all;"><?php echo $users_row['package']; ?></td>
        								
                        				
        								<td style="word-break: break-all;">
        				               			<?php echo $users_row['country'];?>	
        								</td>
        								<!-- <td style="word-break: break-all;">< ?php echo $users_row['country_code']; ?></td> -->
        								<td style="word-break: break-all;"><?php echo $users_row['region_name']; ?></td>
        								<td style="word-break: break-all;"><?php echo $users_row['city']; ?></td>
        								<td style="word-break: break-all;"><?php echo $users_row['zip']; ?></td>
        								<td style="word-break: break-all;"><?php echo $users_row['query']; ?></td>
        								<td style="word-break: break-all;"><?php echo $users_row['register_date'];?></td>
        								<td>
        									<?php if ($users_row['status'] != "0") { ?>
        										<a title="Change Status" class="toggle_btn_a" href="javascript:void(0)" data-id="<?= $users_row['id'] ?>" data-action="deactive" data-column="status"><span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Enable</span></span></a>
        
        									<?php } else { ?>
        										<a title="Change Status" class="toggle_btn_a" href="javascript:void(0)" data-id="<?= $users_row['id'] ?>" data-action="active" data-column="status"><span class="badge badge-danger badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Disable </span></span></a>
        									<?php } ?>
        								</td>
        								<td nowrap="">
        									<a href="add_user.php?user_id=<?php echo $users_row['id']; ?>&redirect=<?=$redirectUrl?>"class="btn btn-primary btn_delete" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a>
        
        									<a href="" data-id="<?php echo $users_row['id']; ?>" data-toggle="tooltip" data-tooltip="Delete" class="btn btn-danger btn_delete btn_delete_a">
        										<i class="fa fa-trash"></i>
        									</a>
        								</td>
        							</tr>
        						<?php
        								$i++;
        								}
        							}
        							else{
        								?>
        								<tr>
        									<td colspan="11">
        										<p class="not_data"><strong>Sorry</strong> no data found!</p>
        									</td>
        								</tr>
        								<?php
        							}
        						?>
        					</tbody>
        				</table>
        			</div>
    			</div>
            </div>
			<div class="col-md-12 col-xs-12">
				<div class="pagination_item_block">
					<nav>
						<?php 
						    if(isset($_GET['package']) || isset($_GET['country']) || isset($_GET['state']) || isset($_GET['city']) || isset($_GET['datepicker']))
						    {
						     //include("pagination.php");
						    }
						    else
						    {
                  include("pagination.php");
						    }
						?>
					</nav>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>




<?php include('includes/footer.php'); ?>

<script>
$("select[name='package']").on("change",function(e){
    if($(this).val()!='')
    {
      window.location.href="manage_users.php?package="+$(this).val();
    }else{
      window.location.href="manage_users.php";
    }
  });
</script>

<script>
$("select[name='country']").on("change",function(e){
    if($(this).val()!='')
    {
      window.location.href="manage_users.php?country="+$(this).val();
    }
    else
    {
      window.location.href="manage_users.php";
    }
  });
</script>

<script>
$("select[name='state']").on("change",function(e){
    if($(this).val()!='')
    {
      window.location.href="manage_users.php?state="+$(this).val();
    }else{
      window.location.href="manage_users.php";
    }
  });
</script>

<script>
$("select[name='city']").on("change",function(e){
    if($(this).val()!='')
    {
      window.location.href="manage_users.php?city="+$(this).val();
    }
    else
    {
      window.location.href="manage_users.php";
    }
  });
</script>
 <!-- pickdate -->
    <script src="./vendor/pickadate/picker.js"></script>
    <script src="./vendor/pickadate/picker.time.js"></script>
    <script src="./vendor/pickadate/picker.date.js"></script>
    <!-- Pickdate -->
    <script src="./js/plugins-init/pickadate-init.js"></script>

<script type="text/javascript">
	$(".toggle_btn_a").on("click", function(e) {
		e.preventDefault();

		var _for = $(this).data("action");
		var _id = $(this).data("id");
		var _column = $(this).data("column");
		var _table = 'tbl_users';

		$.ajax({
			type: 'post',
			url: 'processData.php',
			dataType: 'json',
			data: {
				id: _id,
				for_action: _for,
				column: _column,
				table: _table,
				'action': 'toggle_status',
				'tbl_id': 'id'
			},
			success: function(res) {
				console.log(res);
				if (res.status == '1') {
					location.reload();
				}
			}
		});

	});

	$(".btn_delete_a").on("click", function(e) {

		e.preventDefault();

		var _id = $(this).data("id");
		var _table = 'tbl_users';

		swal({
			title: "Are you sure to delete this?",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger btn_edit",
			cancelButtonClass: "btn-warning btn_edit",
			confirmButtonText: "Yes",
			cancelButtonText: "No",
			closeOnConfirm: false,
			closeOnCancel: false,
			showLoaderOnConfirm: true
		},
		function(isConfirm) {
			if (isConfirm) {

				$.ajax({
					type: 'post',
					url: 'processData.php',
					dataType: 'json',
					data: {id: _id, for_action: 'delete', table: _table, 'action': 'multi_action'},
					success: function(res) {
						console.log(res);
						$('.notifyjs-corner').empty();
						if(res.status=='1'){
		                    swal({
		                        title: "Successfully", 
		                        text: "User is deleted.", 
		                        type: "success"
		                    },function() {
		                        location.reload();
		                    });
		                }
		                else if(res.status=='-2'){
		                    swal(res.message);
		                }
					}
				});
			} else {
				swal.close();
			}

		});
	});

	$(".actions").click(function(e) {
		e.preventDefault();

		var _ids = $.map($('.post_ids:checked'), function(c) {
			return c.value;
		});
		var _action = $(this).data("action");

		if (_ids != '') {
			swal({
				title: "Do you really want to perform?",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger btn_edit",
				cancelButtonClass: "btn-warning btn_edit",
				confirmButtonText: "Yes",
				cancelButtonText: "No",
				closeOnConfirm: false,
				closeOnCancel: false,
				showLoaderOnConfirm: true
			},
			function(isConfirm) {
				if (isConfirm) {

					var _table = 'tbl_users';

					$.ajax({
						type: 'post',
						url: 'processData.php',
						dataType: 'json',
						data: {
							id: _ids,
							for_action: _action,
							table: _table,
							'action': 'multi_action'
						},
						success: function(res) {
							console.log(res);
							$('.notifyjs-corner').empty();
							if (res.status == '1') {
								swal({
									title: "Successfully",
									text: "You have successfully done",
									type: "success"
								}, function() {
									location.reload();
								});
							}
						}
					});
				} else {
					swal.close();
				}

			});
		} else {
			swal("Sorry no users selected !!")
		}
	});


	var totalItems = 0;

	$("#checkall_input").click(function() {

		totalItems = 0;

		$('input:checkbox').not(this).prop('checked', this.checked);
		$.each($("input[name='post_ids[]']:checked"), function() {
			totalItems = totalItems + 1;
		});

		if ($('input:checkbox').prop("checked") == true) {
			$('.notifyjs-corner').empty();
			$.notify(
				'Total ' + totalItems + ' item checked', {
					position: "top center",
					className: 'success',
					clickToHide: false,
					autoHide: false
				}
			);
		} else if ($('input:checkbox').prop("checked") == false) {
			totalItems = 0;
			$('.notifyjs-corner').empty();
		}
	});

	$(".post_ids").click(function(e) {

		if ($(this).prop("checked") == true) {
			totalItems = totalItems + 1;
		} else if ($(this).prop("checked") == false) {
			totalItems = totalItems - 1;
		}

		if (totalItems == 0) {
			$('.notifyjs-corner').empty();
			exit();
		}

		$('.notifyjs-corner').empty();

		$.notify(
			'Total ' + totalItems + ' item checked', {
				position: "top center",
				className: 'success',
				clickToHide: false,
				autoHide: false
			}
		);
	});
</script>