<?php

	$page_title = "Manage Block Users";

	include('includes/header.php');
	include('includes/function.php');
	include('language/language.php');

	$tableName="tbl_block_users";   
	$targetpage = "manage_block_users.php"; 
	$limit = 15; 

	$keyword='';

	if(!isset($_GET['keyword']))
	{
		$query = "SELECT COUNT(*) as num FROM $tableName";
	}
	else
	{

		$keyword=addslashes(trim($_GET['keyword']));

		$query = "SELECT COUNT(*) as num FROM $tableName WHERE (`device_ids` LIKE '%$keyword%' OR `package_ids` LIKE '%$keyword%')";

		$targetpage = "manage_block_users.php?keyword=".$_GET['keyword'];

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
		$sql_query="SELECT * FROM tbl_block_users ORDER BY tbl_block_users.`id` DESC LIMIT $start, $limit"; 
	}
	else
	{

		$sql_query="SELECT * FROM tbl_block_users WHERE (`device_ids` LIKE '%$keyword%' OR `package_ids` LIKE '%$keyword%') ORDER BY tbl_block_users.`id` DESC LIMIT $start, $limit"; 
	}

	$result=mysqli_query($mysqli,$sql_query) or die(mysqli_error($mysqli));
?>

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
                    <a href="add_block_user.php?add=yes">
                      <button class="btn btn-primary button" type="submit">Add Block User</button>
                    </a>
                </div>
            </div>
            <hr>
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
        							<th>Package</th>
        							<th>Devices</th>
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
        								<td style="word-break: break-all;"><?php echo $users_row['package_ids']; ?></td>
        								<td style="word-break: break-all;"><?php echo $users_row['device_ids']; ?></td>
        								<td>
        									<?php if ($users_row['status'] != "0") { ?>
        										<a title="Change Status" class="toggle_btn_a" href="javascript:void(0)" data-id="<?= $users_row['id'] ?>" data-action="deactive" data-column="status"><span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Enable</span></span></a>
        
        									<?php } else { ?>
        										<a title="Change Status" class="toggle_btn_a" href="javascript:void(0)" data-id="<?= $users_row['id'] ?>" data-action="active" data-column="status"><span class="badge badge-danger badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span>Disable </span></span></a>
        									<?php } ?>
        								</td>
        								<td nowrap="">
        									<a href="add_block_user.php?user_block_id=<?php echo $users_row['id']; ?>&redirect=<?=$redirectUrl?>"class="btn btn-primary btn_delete" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a>
        
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
        									<td colspan="7">
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
						<?php include("pagination.php")?>
					</nav>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>




<?php include('includes/footer.php'); ?>

<script type="text/javascript">
	$(".toggle_btn_a").on("click", function(e) {
		e.preventDefault();

		var _for = $(this).data("action");
		var _id = $(this).data("id");
		var _column = $(this).data("column");
		var _table = 'tbl_block_users';

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
		var _table = 'tbl_block_users';

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

					var _table = 'tbl_block_users';

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