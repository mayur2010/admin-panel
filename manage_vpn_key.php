<?php 
    
    $page_title = "Manage Vpn Key";

    include("includes/header.php");
    require("includes/function.php");
    require("language/language.php");

    $tableName="tbl_vpn_key";   
    $targetpage = "manage_vpn_key.php"; 
    $limit = 12; 

    $keyword='';

    if(!isset($_GET['keyword'])){
      $query = "SELECT COUNT(*) as num FROM $tableName";
    }
    else{

      $keyword=addslashes(trim($_GET['keyword']));

      $query = "SELECT COUNT(*) as num FROM $tableName WHERE `vpn_key` LIKE '%$keyword%' OR `vpn_url` LIKE '%$keyword%'";

      $targetpage = "manage_vpn_key.php?keyword=".$_GET['keyword'];

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

    if(!isset($_GET['keyword'])){
      $sql_query="SELECT * FROM tbl_vpn_key ORDER BY tbl_vpn_key.`id` DESC LIMIT $start, $limit"; 
    }
    else{

      $sql_query="SELECT * FROM tbl_vpn_key WHERE `vpn_key` LIKE '%$keyword%' OR `vpn_url` LIKE '%$keyword%' ORDER BY tbl_vpn_key.`id` DESC LIMIT $start, $limit"; 
    }

    $result=mysqli_query($mysqli,$sql_query) or die(mysqli_error($mysqli));

?>
<!DOCTYPE html>
<html lang="en">

<head>
   
</head>
<body>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-5 col-xxl-5 col-lg-5 col-md-5 col-sm-5" align="left">
                            <h2 class="text-black font-w600 mb-1"><?php echo $page_title; ?></h2>
                        </div>
                        <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-4 col-sm-4" align="right">
                             <form method="get" id="searchForm" action="">
                               <input class="form-control input-sm" placeholder="Search here..." aria-controls="DataTables_Table_0" type="search" name="keyword" value="<?php if(isset($_GET['keyword'])){ echo $_GET['keyword'];} ?>" required="required">
                             </form> 
                        </div>
                        <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-3 col-sm-3" align="right">
                           <a href="add_vpn_key.php?add=yes&amp;redirect=manage_vpn_key.php">
                              <button class="btn btn-primary button" type="submit">Add Vpn</button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="row mrg-top">
                        <div class="col-md-12">
                            <div class="col-md-12 col-sm-12">
                                <?php if(isset($_SESSION['msg'])){?> 
                                <div class="alert alert-success alert-dismissible" role="alert"> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">×</span>
                                    </button>
                                    <?php echo $client_lang[$_SESSION['msg']] ; ?>
                                     </a>  
                                </div>
                                    <?php unset($_SESSION['msg']);}?> 
                            </div>
                        </div>
                    </div>
                    <div class="card">
                <div class="card-body">
                    <div class="col-md-12 mrg-top table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>vpn_key</th>
                                    <th>vpn_url</th>
                                    <th>Status</th>
                                    <th class="cat_action_list">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td style="word-break: break-all;"><?php echo $row['vpn_key']; ?></td>
                                        <td style="word-break: break-all;"><?php echo $row['vpn_url']; ?></td>
                                        
                                        
                                        <td class="toggle_btn">
                                            <?php if ($row['status'] != "0") { ?>
                                                <a title="Change Status"  href="javascript:void(0)" data-id="<?= $row['id'] ?>" data-action="deactive" data-column="status">
                                                    <span class="badge badge-success badge-icon">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                        <span>Enable</span>
                                                    </span>
                                                </a>
        
                                            <?php } else { ?>
                                                <a title="Change Status" href="javascript:void(0)" data-id="<?= $row['id'] ?>" data-action="active" data-column="status">
                                                    <span class="badge badge-danger badge-icon">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                        <span>Disable </span>
                                                    </span>
                                                </a>
                                            <?php } ?>
                                        </td>
                                        <td nowrap="">
                                            <a href="add_vpn_key.php?vpn_id=<?php echo $row['id'];?>&redirect=<?=$redirectUrl?>"class="btn btn-primary btn_delete" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a>
        
                                            <a href="" data-id="<?php echo $row['id']; ?>" data-toggle="tooltip" data-tooltip="Delete" class="btn btn-danger btn_delete btn_delete_a">
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
                                <?php if(!isset($_POST["data_search"])){ include("pagination.php");}?>
                            </nav>
                        </div>
                    </div>
            </div>
        </div>
    
   
<script type="text/javascript">

  $("#searchForm").submit(function(e){
      $(".loader-container").parents("div").addClass("__loading");
  });

  $(".toggle_btn a").on("click",function(e){
    e.preventDefault();

    var _for=$(this).data("action");
    var _id=$(this).data("id");
    var _column=$(this).data("column");
    var _table='tbl_vpn_key';

    $.ajax({
      type:'post',
      url:'processData.php',
      dataType:'json',
      data:{id:_id,for_action:_for,column:_column,table:_table,'action':'toggle_status','tbl_id':'id'},
      success:function(res){
        console.log(res);
        if(res.status=='1'){
          location.reload();
        }
      }
    });

  });

  $(".btn_delete_a").on("click", function(e) {

    e.preventDefault();

    var _id = $(this).data("id");
    var _table = 'tbl_vpn_key';

    swal({
      title: "Are you sure?",
      text: "All data will be delete which belong to this.",
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
                  text: "Vpn Key is deleted.", 
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
</script>
   
</body>
</html>